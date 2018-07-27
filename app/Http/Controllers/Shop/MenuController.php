<?php

namespace App\Http\Controllers\Shop;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MenuController extends BaseController
{
    //
    public function index(Request $request)
    {
        $deep_price = $request->deep_price;
        $high_price = $request->high_price;
        $category = $request->category;
        $keywords = $request->keywords;
        $query = Menu::orderBy("id");
        if($deep_price!==null){
            $query->where("goods_price",">=",$deep_price);
        }
        if($high_price!==null){
            $query->where("goods_price","<=",$high_price);
        }
        if($category!==null){
            $query->where("category_id","=",$category);
        }
        if($keywords!==null){
            $query->where("goods_name","like","%$keywords%");
        }
        $menus = $query->get();
        $categories = MenuCategory::all();
        return view("shop.menu.index",compact("menus","categories"));
    }

    public function add(Request $request)
    {
        $shops = Shop::all();
        $categories = MenuCategory::all();
        if($request->isMethod("post")){
            $this->validate($request,[
                "goods_name"=>"required",
                "shop_id"=>"required",
                "category_id"=>"required",
                "goods_price"=>"required",
                "status"=>"required",
                "goods_img"=>"required",
            ]);
            $menu = new Menu();
            $menu->goods_img = "";
            $menu->fill($request->input());
            $file = $request->file('goods_img');
            if ($file) {
                $menu->goods_img = $file->store("menu_img", "images");
            }
            $menu->save();
            session()->flash('success', '添加成功');
            //跳转至添加页面
            return redirect()->route("menu.index");
        }
        return view("shop.menu.add",compact("categories","shops"));
    }
    //修改
    public function edit(Request $request,$id)
    {
        $shops = Shop::all();
        $categories = MenuCategory::all();
        $menu = Menu::findOrFail($id);
        if($request->isMethod("post")){
            $this->validate($request,[
                "goods_name"=>"required",
                "shop_id"=>"required",
                "category_id"=>"required",
                "goods_price"=>"required",
                "status"=>"required",
            ]);
            $data = $request->all();
            $file = $request->file('goods_img');
            if ($file) {
                File::delete("uploads/images/$menu->goods_img");
                $data['goods_img'] = $file->store("goods_img", "images");
            }
            $menu->update($data);
            session()->flash('success', '修改成功');
            //跳转至添加页面
            return redirect()->route("menu.index");
        }
        return view("shop.menu.edit",compact("categories","shops","menu"));
    }
    //删除
    public function del($id)
    {
        $menu = Menu::findOrFail($id);
        File::delete("uploads/images/$menu->goods_img");
        $menu->delete();
        session()->flash('success', '删除成功');
        //跳转至添加页面
        return redirect()->route("menu.index");
    }
    //test
    public function test(Request $request)
    {
        if ($request->isMethod("post")){
            $file=$request->file('img');
            if ($file!==null){
                //上传文件
                $fileName= $file->store("test","oss");

                dd(env("ALIYUN_OSS_URL").$fileName);

            }
        }
        return view("shop/test/test");

    }
}
