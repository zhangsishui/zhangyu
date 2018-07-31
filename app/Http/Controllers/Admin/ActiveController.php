<?php

namespace App\Http\Controllers\Admin;

use App\Models\Active;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveController extends Controller
{
    //
    public function index()
    {
        $actives = Active::paginate(3);
        return view("admin.active.index",compact("actives"));
    }

    public function add(Request $request)
    {
        if ($request->isMethod("post")){
            $this->validate($request,[
                "title" => "required",
                "start_time" => "required",
                "end_time" => "required",
                "content" => "required",
            ]);

            Active::create($request->all());
            $request->session()->flash("success", "添加成功");
            return redirect()->route("active.index");
        }
        return view("admin.active.add");
    }

    public function edit(Request $request,$id)
    {
        $active = Active::findOrFail($id);
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "title" => "required",
                "start_time" => "required",
                "end_time" => "required",
                "content" => "required",
            ]);
            $active->update($request->all());
            $request->session()->flash("success", "修改成功");
            return redirect()->route("active.index");
        }

        return view("admin.active.edit",compact("active"));
    }

    public function del($id)
    {
        $active = Active::findOrFail($id);
        $active->delete();
        session()->flash("success", "删除成功");
        return redirect()->route("active.index");
    }
}
