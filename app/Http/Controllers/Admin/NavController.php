<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class NavController extends BaseController
{

    //导航添加
    public function add(Request $request)
    {
        if ($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required',
            ]);
            if ($request->post('url')===null){
                $data=$request->except('url');
            }else{
                $data=$request->post();
            }
            $nav=Nav::create($data);
            return redirect()->route('nav.add')->with('success','添加'.$nav->name.'成功');


        }

        //得到所有路由
        $routes=Route::getRoutes();
        //定义一个空数组
        $urls=[];

        foreach ($routes as $k=>$value){

            if (isset($value->action['namespace'])&&$value->action['namespace']==="App\Http\Controllers\Admin"){
                if (isset($value->action['as'])){
                    $urls[]=$value->action['as'];
                }
            }
        }
        $navs=Nav::where('pid',0)->orderBy('sort')->get();
        return view('admin.nav.add',compact('navs','urls'));

    }
}