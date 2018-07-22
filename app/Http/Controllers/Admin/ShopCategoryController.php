<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShopCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ShopCategoryController extends BaseController
{
    //分类首页
    public function index()
    {
        $categories = ShopCategory::paginate(3);
        return view("admin.shop_category.index", compact("categories"));
    }

    //添加分类
    public function add(Request $request)
    {
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "name" => "required|max:6",
                "status" => "required"
            ]);
            $data = $request->all();
            $data['logo'] = "";
            if ($request->file("img")) {
                $data['logo'] = $request->file("img")->store("shop_category", "images");
            }
            ShopCategory::create($data);
            $request->session()->flash("success", "添加成功");
            return redirect()->route("shop_category.index");
        }

        return view("admin.shop_category.add");
    }

    //编辑分类
    public function edit(Request $request,$id)
    {
        $cate = ShopCategory::find($id);
        if($request->isMethod("post")){
            $this->validate($request,[
                "name" => "required|max:6",
                "status" => "required"
            ]);
            $data = $request->all();
            if ($request->file("img")) {
                File::delete("uploads/images/$cate->logo");
                $data['logo'] = $request->file("img")->store("shop_category", "images");
            }
            $cate->update($data);
            $request->session()->flash("success", "修改成功");
            return redirect()->route("shop_category.index");
        }

        return view("admin.shop_category.edit",compact("cate"));
    }

    //删除分类
    public function del(Request $request,$id)
    {
        $cate = ShopCategory::find($id);
        File::delete("uploads/images/$cate->logo");
        $cate->delete();
        $request->session()->flash("success", "删除成功");
        return redirect()->route("shop_category.index");
    }
}
