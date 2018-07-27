<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    //
    public function list(Request $request)
    {
        $keyword = $request->input("keyword");
        $shop = Shop::where('status',1)
            ->where("shop_name","like","%$keyword%")
            ->get();
        return $shop;
    }
    public function index(Request $request){
        $id = $request->input("id");

        $shop = Shop::findOrFail($id);
        $shop->distance = rand(1000, 3000);
        $shop->estimate_time = $shop->distance / 100;
        $shop->evaluate = [
            [
                "user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http://www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 1,
                "send_time" => 30,
                "evaluate_details" => "不怎么好吃"],
        ];
        $cates=MenuCategory::where("shop_id",$id)->get();
        $menus = Menu::all();
        foreach ($cates as $cate){
            $arr = [];
            foreach ($menus as $menu){
                if($cate->id === $menu->category_id){
                    array_push($arr,$menu);
                }

            }
            $cate->goods_list=$arr;
        }
        //再把分类数据追加到$shop
        $shop->commodity=$cates;
        // dump($cates->toArray());
        return $shop;
    }
}
