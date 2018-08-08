<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        return view("admin.role.index",compact("roles"));
    }

    public function add(Request $request)
    {
        if ($request->isMethod("post")){
            $this->validate($request,[
                "name"=>"required",
                "per"=>"required",
            ]);
            $data['name']=$request->post('name');
            $data['guard_name']="admin";
            //创建角色
            $role=Role::create($data);
            //还给给角色添加权限
            $role->syncPermissions($request->post('per'));

            //跳转并提示
            return redirect()->route('role.index')->with('success','创建'.$role->name."成功");
        }
        $pers = Permission::all();
        return view("admin.role.add",compact("pers"));
    }

    public function edit(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        $pers = Permission::all();
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "name" => "required",
                "per" => "required",
            ]);
            $data['name'] = $request->post('name');
            $data['guard_name'] = "admin";
            //创建角色
            $role->update($data);
            //还给给角色添加权限
            $role->syncPermissions($request->post('per'));
            return redirect()->route('role.index')->with('success','修改'.$role->name."成功");
        }
        return view("admin.role.edit", compact("role", "pers"));
    }

    public function del($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('role.index')->with('success','删除'.$role->name."成功");

    }
}
