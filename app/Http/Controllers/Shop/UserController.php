<?php

namespace App\Http\Controllers\Shop;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    //
    public function index()
    {
        return view("shop.user.index");
    }

    public function login(Request $request)
    {
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "name" => "required",
                "password" => "required",
            ]);
            if (Auth::guard()->attempt(['name' => $request->post('name'), 'password' => $request->password])) {
                session()->flash('success', '登录成功');
                //跳转至添加页面
                return redirect()->route("user.index");
            } else {
                session()->flash('danger', '账号或密码不正确');
                return redirect()->back()->withInput();
            }
        }
        return view("shop.user.login");
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();
        session()->flash('success', '您已成功退出！');
        return redirect()->route("user.login");
    }

    public function changePwd(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "old_password" => "required",
                "password" => "required|confirmed",
            ]);
            if (Hash::check($request->old_password, $user->password)) {
                // 密码对比...
                $user->password = bcrypt($request->password);
                $user->save();
                session()->flash('success', '密码修改成功');
                return redirect()->route("user.index");

            } else {
                session()->flash('danger', '旧密码错误');
                return redirect()->back()->withInput();
            }
        }
        return view("shop.user.changePwd");
    }
}
