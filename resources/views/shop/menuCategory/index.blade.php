@extends("shop.layouts.default")

@section("content")
    <div class="span10">

        <div class="slate">

            <div class="page-header">
                <div class="btn-group pull-right">
                    <button class="btn dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-download-alt"></i> 下载菜单
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">CSV</a></li>
                        <li><a href="#">Excel</a></li>
                        <li><a href="3">PDF</a></li>
                    </ul>
                </div>
                <h2>菜品分类列表</h2>
                <a href="{{route("menuCategory.add")}}" class="btn btn-info">添加分类</a>
            </div>

            <table class="orders-table table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>分类名称</th>
                    <th>菜品编号</th>
                    <th>描述</th>
                    <th>所属商户</th>
                    <th>是否默认分类</th>
                    <th class="actions">操作</th>
                </tr>
                </thead>
                <tbody>
@foreach($menu_cates as $menu_cate)
                <tr>
                    <td><a href="form.html">{{$menu_cate->id}}</a></td>
                    <td><a href="form.html">{{$menu_cate->name}}</a></td>
                    <td><a href="form.html">{{$menu_cate->type_accumulation}}</a></td>
                    <td><a href="form.html">{{$menu_cate->description}}</a></td>
                    <td><a href="form.html">{{$menu_cate->shop->shop_name}}</a></td>
                    <td><a href="form.html">{{$menu_cate->is_selected?"是":"否"}}</a></td>
                    <td class="actions">
                        <a class="btn btn-small btn-danger" data-toggle="modal" href="{{route("menuCategory.del",$menu_cate)}}">删除</a>
                        <a class="btn btn-small btn-primary" href="{{route("menuCategory.edit",$menu_cate)}}">修改</a>
                        <a class="btn btn-small btn-info" href="{{route("menuCategory.default",$menu_cate)}}">设为默认</a>
                    </td>
                </tr>
    @endforeach
                </tbody>
            </table>

        </div>

    </div>
    {{--<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">--}}
    @endsection