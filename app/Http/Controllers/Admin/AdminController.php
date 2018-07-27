<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends BaseController
{
    //
    public function index()
    {
        $admins = Admin::paginate(3);
        return view("admin.admin.index", compact("admins"));
    }

    public function add(Request $request)
    {
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "name" => "required",
                "email" => "required",
                "password" => "required",
            ]);
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
            Admin::create($data);
            session()->flash('success', '添加成功');
            //跳转至添加页面
            return redirect()->route("admin.index");
        }
        return view("admin.admin.add", compact("add"));
    }

    public function edit(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "name" => "required",
                "email" => "required",
            ]);
            $data = $request->all();
            $admin->update($data);
            session()->flash('success', '修改成功');
            //跳转至添加页面
            return redirect()->route("admin.index");

        }
        return view("admin.admin.edit", compact("admin"));
    }

    public function del(Request $request, $id)
    {
        if ($id === "4") {
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
        if ($request->isMethod("post")) {
            $this->validate($request, [
                    "name" => "required",
                    "password" => "required",
                ]
            );
            if (Auth::guard('admin')->attempt(['name' => $request->post('name'), 'password' => $request->password])) {
                session()->flash('success', '登录成功');
                //跳转至添加页面
                return redirect()->route("admin.index");
            } else {
                session()->flash('danger', '账号或密码不正确');
                return redirect()->back()->withInput();
            }
        }
        return view("admin.admin.login");
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        session()->flash('success', '您已成功退出！');
        return redirect()->route("admin.login");
    }

    public function changePwd(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "old_password" => "required",
                "password" => "required|confirmed",
            ]);
            if (Hash::check($request->old_password, $admin->password)) {
                // 密码对比...
                $admin->password = bcrypt($request->password);
                $admin->save();
                session()->flash('success', '密码修改成功');
                return redirect()->route("admin.index");

            } else {
                session()->flash('danger', '旧密码错误');
                return redirect()->back()->withInput();
            }

        }
        return view("admin.admin.changePwd");
    }
}
