<?php

namespace App\Http\Controllers\Shop;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenuCategoryController extends BaseController
{
    //
    public function index()
    {
        $shopId = Auth::user()->shop_id;
        $menu_cates = MenuCategory::where("shop_id",$shopId)->get();
        return view("shop.menuCategory.index", compact("menu_cates"));
    }

    public function add(Request $request)
    {
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "name" => "required",
                "is_selected" => "required",
                "type_accumulation" => "required",
                "description" => "required",
            ]);
            if ($request->is_selected === "1") {
                MenuCategory::where('is_selected', 1)->update(['is_selected' => 0]);
            }
            $data = $request->all();
            $data['shop_id'] = Auth::user()->shop_id;
            MenuCategory::create($data);
            session()->flash('success', '添加成功');
            return redirect()->route("menuCategory.index");

        }
        $shops = Shop::all();
        return view("shop.menuCategory.add", compact("shops"));
    }

    //修改
    public function edit(Request $request, $id)
    {
        $menu_category = MenuCategory::findOrFail($id);
        $shops = Shop::all();
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "name" => "required",
                "is_selected" => "required",
                "type_accumulation" => "required",
                "description" => "required",
            ]);
            if ($request->is_selected === "1") {
                MenuCategory::where('is_selected', 1)->update(['is_selected' => 0]);
            }
            $menu_category->shop_id = Auth::user()->shop_id;
            $menu_category->update($request->all());
            session()->flash('success', '修改成功');
            return redirect()->route("menuCategory.index");
        }
        return view("shop.menuCategory.edit", compact("shops", "menu_category"));
    }

    public function del($id)
    {
        $menu_category = MenuCategory::findOrFail($id);
        $menu = Menu::where("category_id",$id)->count();
        if($menu){
            return redirect()->route("menuCategory.index")->with("danger","有菜品的分类不能删除");
        }
        $menu_category->delete();
        session()->flash('success', '删除成功');
        return redirect()->route("menuCategory.index");
    }

    public function default($id)
    {
        $menu_category = MenuCategory::findOrFail($id);
        MenuCategory::where('is_selected', 1)->update(['is_selected' => 0]);
        $menu_category->update(['is_selected'=> 1 ]);
        return redirect()->back();
    }

}
