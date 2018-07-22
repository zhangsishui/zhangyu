@extends("admin.layouts.default")

@section("li-index")
    <li class="active"><a href="{{route("shop_category.index")}}">首页 <span class="sr-only">(current)</span></a></li>
    @endsection

@section("li-about")
    <li><a href="#">关于我们</a></li>
@endsection



{{--@section("search")
    <form class="navbar-form navbar-right" action="" method="get">
            <div class="form-group">
                <select name="is_on_sale" id="" class="form-control">
                    <option value="" @if($navs['status']===null) selected @endif>全部</option>
                    <option value="0" @if($navs['status']==="0") selected @endif>下架</option>
                    <option value="1" @if($navs['status']==="1") selected @endif>上架</option>
                </select>
            </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search" name="keyword" value="{{$navs['keyword'] ?? ""}}">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
    </form>
@endsection--}}

@section("title","商家分类")

@section("content")
    <a href="{{route('shop.add')}}" class="btn btn-info">添加</a>
    <table class="table" >

        <tr>
            <th>Id</th>
            <th>商家名称</th>
            <th>店铺所属分类</th>
            <th>店铺名称</th>
            <th>商家状态</th>
            <th>店铺图片</th>
            <th>操作</th>
        </tr>
        @foreach($shops as $shop)
            <tr>
                <td>{{$shop->id}}</td>
                <td>{{$shop->user->name}}</td>
                <td>{{$shop->shop_category->name}}</td>
                <td>{{$shop->shop_name}}</td>
                <td>@if($shop->status=="-1") 待审核 @elseif($shop->status=="1") 是 @else 否  @endif</td>
                <td><img src="/uploads/images/{{$shop->shop_img}}" alt="" width="100"></td>
                <td>
                    <a href="{{route('shop.edit',$shop)}}" class="btn btn-success">编辑</a>
                    {{--<a href="{{route('shop.del',$shop)}}" class="btn btn-danger">删除</a>--}}
                    <a href="{{route('shop.change_status',$shop)}}" class="btn btn-info">通过</a>
                    <a href="{{route('shop.change',$shop)}}" class="btn btn-warning">不通过</a>
                    <a href="{{route('shop.reset',$shop)}}" class="btn btn-danger">重置密码</a>
                </td>
            </tr>
        @endforeach
    </table>

{{$shops->links()}}
    @endsection