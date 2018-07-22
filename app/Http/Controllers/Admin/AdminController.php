<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index()
    {
        $admins = Admin::paginate(3);
        return view("admin.admin.index",compact("admins"));
    }

    public function add(Request $request)
    {
        if($request->isMethod("post")){
            $this->validate($request,[
                "name" => "required",
                "email" => "required",
                "password" => "required",
            ]);
            $data=$request->all();
            $data['password'] = bcrypt($data['password']);
            Admin::create($data);
            session()->flash('success', '添加成功');
            //跳转至添加页面
            return redirect()->route("admin.index");
        }
        return view("admin.admin.add",compact("add"));
    }

    public function edit(Request $request,$id)
    {
        $admin = Admin::findOrFail($id);
        if($request->isMethod("post")){
            $this->validate($request,[
                "name" => "required",
                "email" => "required",
            ]);
            $data = $request->all();
            if($data['password']===null){
                unset($data['password']);
            }else{
                $data['password'] = bcrypt($data['password']);
            }
            $admin->update($data);
            session()->flash('success', '修改成功');
            //跳转至添加页面
            return redirect()->route("admin.index");

        }
        return view("admin.admin.edit",compact("admin"));
    }

    public function del(Request $request,$id)
    {
        if ($id === 2){
            session()->flash('danger', '不能删除最高权限用户');
            return redirect()->route("admin.index");
        }
        $admin = Admin::findOrFail($id);
        $admin->delete();
        session()->flash('success', '删除成功');
        //跳转至添加页面
        return redirect()->route("admin.index");
    }

    public function login(Request $request)
    {
        return view("admin.admin.login");
    }
}
