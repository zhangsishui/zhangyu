@extends("shop.layouts.default")

@section("content")
    <div class="row">

        <div class="span10">

            <div class="slate">

                <form class="form-inline" action="" method="get">
                    <input type="text" class="input-large" placeholder="查询......" name="keywords" value="{{request()->input("keywords")}}">
                    <input type="text" style="width: 190px" class="input-large" placeholder="输入最低价格" name="deep_price" value="{{request()->input("deep_price")}}">
                    --
                    <input type="text" style="width: 190px" class="input-large" placeholder="输入最高价格" name="high_price" value="{{request()->input("high_price")}}">

                    <select class="span2" name="category">
                        <option value=""> 搜索分类 </option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if(request()->input("category")==$category->id) selected @endif>{{request()->input("id")}} {{$category->name}} </option>
                        @endforeach

                    </select>

                    <button type="submit" class="btn btn-primary">搜索</button>
                </form>

            </div>

        </div>

    </div>

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
                <h2>菜品列表</h2>
                <a href="{{route("menu.add")}}" class="btn btn-info">添加菜品</a>
            </div>

            <table class="orders-table table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>菜品</th>
                    <th>所属分类</th>
                    <th>所属商铺</th>
                    <th>菜品价格</th>
                    <th>是否上架</th>
                    <th>商品图片</th>
                    <th class="actions">操作</th>
                </tr>
                </thead>
                <tbody>
@foreach($menus as $menu)
                <tr>
                    <td>{{$menu->id}}</td>
                    <td>{{$menu->goods_name}}</td>
                    <td>{{$menu->menuCategory->name}}</td>
                    <td>{{$menu->shop->shop_name}}</td>
                    <td>{{$menu->goods_price}}</td>
                    <td>{{$menu->status ? "是" : "否"}}</td>
                    <td><img src="/uploads/images/{{$menu->goods_img}}" alt="" width="50"></td>
                    <td class="actions">
                        <a class="btn btn-small btn-danger" data-toggle="modal" href="{{route("menu.del",$menu)}}">删除</a>
                        <a class="btn btn-small btn-primary" href="{{route("menu.edit",$menu)}}">修改</a>
                    </td>
                </tr>
    @endforeach
                </tbody>
            </table>

        </div>

    </div>
    <div class="span5">

        <div class="pagination pull-left">
            <ul>
                <li><a href="#">Prev</a></li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
    </div>
    @endsection