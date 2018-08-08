<?php

namespace App\Http\Controllers\Shop;

use App\Models\Member;
use App\Models\Order;
use App\Models\OrderGood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
{
    //
    public function index()
    {
        $shopId = Auth::user()->id;
        $orders = Order::where("shop_id", $shopId)->orderBy("created_at", "desc")->paginate(7);
        return view("shop/order/index", compact("orders"));
    }

    public function detail(Request $request, $id)
    {
        $order = Order::find($id);
        return view("shop/order/detail", compact("order"));
    }

    public function send($id)
    {
        $order = Order::find($id);
        $order->update(['status' => '2']);
        return redirect()->back();
    }

    public function off($id)
    {
        $order = Order::find($id);
        $order->update(['status' => '-1']);
        $total = $order->total;
        $member = Member::find($order->user_id);
        $money = $member->money + $total;
        $member->update(['money' => $money]);
        return redirect()->back();

    }

    public function count()
    {
        $shopId = Auth::user()->id;
        $count = Order::where('shop_id', $shopId)->where('status', '>', '0')->Select(DB::raw("SUM(total) AS money,
	count(*) AS count"))->first();
        return view("shop/count/count", compact("count"));
    }

    public function month()
    {
        $shopId = Auth::user()->id;
        $count = Order::where("shop_id", $shopId)->where("status", ">", "0")->Select(DB::raw("SUM(total) AS money,
	count(*) AS count"))->first();
        $orders = Order::where("shop_id", $shopId)->where("status", ">", "0")->Select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') AS date,
	SUM(total) AS money,count(*) AS count"))->groupBy("date")->orderBy("date", 'desc')->get();
        return view("shop/count/month", compact("count", "orders"));
    }

    public function day()
    {
        $shopId = Auth::user()->id;
        $count = Order::where("shop_id", $shopId)->where("status", ">", "0")->Select(DB::raw("SUM(total) AS money,
	count(*) AS count"))->first();
        $orders = Order::where("shop_id", $shopId)->where("status", ">", "0")->Select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') AS date,
	SUM(total) AS money,count(*) AS count"))->groupBy("date")->orderBy("date", 'desc')->get();
        return view("shop/count/day", compact("count", "orders"));
    }

    public function menuCount()
    {
        $id = Auth::user()->id;
        $orderIds = Order::where('shop_id', $id)->where("status", ">", "0")->pluck('id')->toArray();
        $menuCount = OrderGood::whereIn('order_id', $orderIds)->Select(DB::raw("sum(amount) as nums"))->first();

        return view("shop.menuCount.menuCount", compact("menuCount"));
    }

    public function menuDay()
    {
        $id = Auth::user()->id;
        $orderIds = Order::where('shop_id', $id)->where("status", ">", "0")->pluck('id')->toArray();
        $menuCount = OrderGood::whereIn('order_id', $orderIds)->Select(DB::raw("sum(amount) as nums"))->first();
        $menuDays = OrderGood::whereIn('order_id', $orderIds)->Select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') AS date,
	        goods_id,goods_name,sum(amount) as nums"))
            ->groupBy("date")->groupBy("goods_id")->get();

        return view("shop.menuCount.menuDay", compact("menuDays","menuCount"));
    }

    public function menuMonth()
    {
        $id = Auth::user()->id;
        $orderIds = Order::where('shop_id', $id)->where("status", ">", "0")->pluck('id')->toArray();
        $menuCount = OrderGood::whereIn('order_id', $orderIds)->Select(DB::raw("sum(amount) as nums"))->first();
        $menuDays = OrderGood::whereIn('order_id', $orderIds)->Select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') AS date,
	        goods_id,goods_name,sum(amount) as nums"))
            ->groupBy("date")->groupBy("goods_id")->get();

        return view("shop.menuCount.menuMonth", compact("menuDays","menuCount"));
    }
}
