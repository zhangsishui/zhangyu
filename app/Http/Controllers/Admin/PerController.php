<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PerController extends Controller
{
    //
    public function index()
    {
        $pers = Permission::all();
        return view("admin.per.index",compact("pers"));
    }

    public function add(Request $request)
    {
        if($request->isMethod("post")){
            $this->validate($request,[
                "name"=>"required",
                ]);
            $per=Permission::create(['name'=>$request->input("name"),'guard_name'=>'admin']);
            return redirect()->route("per.index");
        }
        //得到所有路由
        $routes=Route::getRoutes();
//定义数组
        $urls=[];
        foreach ($routes as $k=>$value){

            //dd($value->action);
            if ($value->action['namespace']==="App\Http\Controllers\Admin"){
                $urls[]=$value->action['as'];
            }
        }

        return view("admin.per.add",compact("urls"));
    }

    public function edit()
    {
        
    }

    public function del($id)
    {
        $per = Permission::findOrFail($id);
        $per->delete();
        session()->flash("success", "删除成功");
        return redirect()->route("per.index");
    }
}
