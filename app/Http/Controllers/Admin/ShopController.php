<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ShopController extends BaseController
{
    //首页
    public function index()
    {
        $shops = Shop::paginate(3);
        return view("admin.shop.index", compact("shops"));
    }

//注册
    public function reg(Request $request)
    {
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "name" => "required",
                "password" => "required",
                "email" => "required",
                "shop_name" => "required",
                "shop_img" => "image",
            ]);
            $shop = new Shop();
            $shop->status = -1;
            $shop->shop_img = "";
            $shop->fill($request->input());
            $file = $request->file('shop_img');
            if ($file) {
                $shop->shop_img = $file->store("shop_img", "images");
            }
            DB::transaction(function () use ($shop, $request) {
                $shop->save();

                User::create([
                    'shop_id' => $shop->id,
                    'password' => bcrypt($request->input('password')),
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'status' => 1
                ]);
            });
            session()->flash('success', '注册成功');
            //跳转至添加页面
            return redirect()->route("shop.index");
        }
        $shop_cates = ShopCategory::where("status", 1)->get();
        return view("admin.shop.reg", compact("shop_cates"));
    }

    //添加
    public function add(Request $request)
    {
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "name" => "required",
                "password" => "required",
                "email" => "required",
                "shop_name" => "required",
                "shop_img" => "image",
            ]);
            $shop = new Shop();
            $shop->status = 1;
            $shop->shop_img = "";
            $shop->fill($request->input());
            $file = $request->file('shop_img');
            if ($file) {
                $shop->shop_img = $file->store("shop_img", "images");
            }
            DB::transaction(function () use ($shop, $request) {
                $shop->save();

                User::create([
                    'shop_id' => $shop->id,
                    'password' => bcrypt($request->input('password')),
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'status' => 1
                ]);
            });
            session()->flash('success', '注册成功');
            //跳转至添加页面
            return redirect()->route("shop.index");
        }
        $shop_cates = ShopCategory::where("status", 1)->get();
        return view("admin.shop.add",compact("shop_cates"));

    }

    //编辑
    public function edit(Request $request,$id)
    {
        $shop = Shop::findOrFail($id);
        $user = User::where("shop_id",$id)->first();
        $shop_cates = ShopCategory::all();
        if($request->isMethod("post")){
            $this->validate($request, [
                "name" => "required",
                "email" => "required",
                "shop_name" => "required",
                "shop_img" => "image",
            ]);
            $data = $request->all();
            if($data['password']===null){
                unset($data['password']);
            }else{
                $data['password'] = bcrypt($data['password']);
            }
            $file = $request->file('shop_img');
            if ($file) {
                File::delete("uploads/images/$shop->shop_img");
                $data['shop_img'] = $file->store("shop_img", "images");
            }
            DB::transaction(function () use ($shop,$user,$request,$data) {
                $shop->update($data);

                $user->update($data);
            });

            $request->session()->flash("success", "修改成功");
            return redirect()->route("shop.index");

        }
        return view("admin.shop.edit",compact("shop","shop_cates"));
    }
    //删除
    public function del(Request $request,$id)
    {
        $shop = Shop::findOrFail($id);
        $user = User::where("shop_id",$id)->first();
        DB::transaction(function () use ($shop,$user,$request) {
        File::delete("uploads/images/$shop->shop_img");
        $shop->delete();
        $user->delete();
        });
        $request->session()->flash("success", "删除成功");
        return redirect()->route("shop.index");
    }

    //充值密码
    public function reset(Request $request,$id){

    }

    //通过审核
    public function change(Request $request, $id)
    {
        $shop = Shop::findOrfail($id);
        $shop->status = 0;
        $shop->update($request->all());
        return back();
    }

    //不通过审核
    public function change_status(Request $request, $id)
    {
        $shop = Shop::findOrfail($id);
        $shop->status = 1;
        $shop->update($request->all());
        return back();
    }
}
