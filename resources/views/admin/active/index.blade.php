@extends("admin.layouts.default")

@section("li-index")
    <li class="active"><a href="{{route("admin.index")}}">首页 <span class="sr-only">(current)</span></a></li>
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
    <a href="{{route('active.add')}}" class="btn btn-info">添加</a>
    <table class="table" >

        <tr>
            <th>Id</th>
            <th>标题</th>
            <th>开始时间</th>
            <th>结束时间</th>
            <th>操作</th>
        </tr>
        @foreach($actives as $active)
            <tr>
                <td>{{$active->id}}</td>
                <td>{{$active->title}}</td>
                <td>{{$active->start_time}}</td>
                <td>{{$active->end_time}}</td>
                <td>
                    <a href="{{route('active.edit',$active)}}" class="btn btn-success">编辑</a>
                    <a href="{{route('active.del',$active)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>

{{$actives->links()}}
    @endsection