<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Member;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderGood;
use App\Models\Shop;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    //
    public function add(Request $request)
    {
        /*global $order;
        DB::transaction(function () use ($request) {*/
        //执行添加操作
        $data = $request->input();
        $sn = "zhangyu_" . date("Ymdhis") . rand(1000, 9999);
        $userId = $request->input("user_id");
        $addressId = $request->input("address_id");
        $carts = Cart::where("user_id", $userId)->get();
        $address = Address::find($addressId);
        $data['sn'] = $sn;
        $data['province'] = $address->provence;
        $data['city'] = $address->city;
        $data['county'] = $address->area;
        $data['address'] = $address->detail_address;
        $data['tel'] = $address->tel;
        $data['name'] = $address->name;
        $data['status'] = 0;
        $data['total'] = 0;
        $goodsId = Cart::where("user_id", $userId)->first()->goods_id;
        $data['shop_id'] = Menu::find($goodsId)->shop_id;
        foreach ($carts as $cart) {
            $good = Menu::find($cart->goods_id);
            $data['total'] += $cart->amount * $good->goods_price;
        }
        //开启事务
        DB::beginTransaction();
        try {
            $order = Order::create($data);
            $data1["order_id"] = $order->id;
            foreach ($carts as $cart) {
                $good = Menu::find($cart->goods_id);
                $data1['goods_id'] = $good->id;
                $data1['amount'] = $cart->amount;
                $data1['goods_name'] = $good->goods_name;
                $data1['goods_img'] = $good->goods_img;
                $data1['goods_price'] = $good->goods_price;
                OrderGood::create($data1);
            }
//提交事务
            DB::commit();
        } catch (QueryException $exception) {
            DB::rollBack();
            return [
                'status' => "false",
                "message" => $exception->getMessage(),
            ];
        }


//        });

        return [
            'status' => "true",
            "message" => "添加成功",
            "order_id" => $order->id,
        ];


    }

    public function order(Request $request)
    {
        $orderId = $request->input("id");
        $order = Order::find($orderId);
        $data = [];
        $data['id'] = $orderId;
        $data['order_code'] = $order->sn;
        $data['order_birth_time'] = (string)$order->created_at;
        $data['order_status'] = $order->OrderStatus;
        $data['shop_id'] = $order->shop_id;
        $data['shop_name'] = Shop::find($order->shop_id)->shop_name;
        $data['shop_img'] = Shop::find($order->shop_id)->shop_img;
        $data['order_price'] = $order->total;
        $data['order_address'] = $order->address;
        $goods = $order->goods;
        $data['goods_list'] = $goods;

        return $data;

    }

    public function pay(Request $request)
    {
        $order = Order::find($request->post('id'));
        //得到用户
        $member = Member::find($order->user_id);

        //判断钱够不
        if ($order->total > $member->money) {
            return [
                'status' => 'false',
                "message" => "余额不足请及时充值"
            ];
        }
        //减金额
        $member->money = $member->money - $order->total;
        $member->save();
        //更改订单状态
        $order->status = 1;
        $order->save();
        return [
            'status' => 'true',
            "message" => "支付成功"
        ];
    }

//订单列表
    public function list(Request $request)
    {
        $userId = $request->input('user_id');
        $orders = Order::where("user_id", $userId)->get();

        foreach ($orders as $k => $order) {
            $shops = Shop::find($order->shop_id);

            $data['id'] = $order->id;
            $data['order_code'] = $order->sn;
            $data['order_birth_time'] = (string)$order->created_at;
            $data['order_status'] = $order->order_status;
            $data['shop_id'] = (string)$order->shop_id;
            $data['shop_name'] = $shops['shop_name'];
            $data['shop_img'] = $shops['shop_img'];
            $data['order_price'] = $order->total;
            $data['order_address'] = $order->provence . $order->city . $order->area . $order->detail_address;

            $data['goods_list'] = $order->goods;

            $lists[] = $data;
        }

        return $lists;
    }
}
