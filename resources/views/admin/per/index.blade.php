@extends("admin.layouts.default")

@section("li-index")
    <li class="active"><a href="{{route("admin.index")}}">首页 <span class="sr-only">(current)</span></a></li>
    @endsection

@section("li-about")
    <li><a href="#">关于我们</a></li>
@endsection

@section("title","商家分类")

@section("content")
    <a href="{{route('per.add')}}" class="btn btn-info">添加</a>
    <table class="table" >

        <tr>
            <th>ID</th>
            <th>权限名称</th>
            <th>守卫</th>
            <th>操作</th>
        </tr>
        @foreach($pers as $per)
            <tr>
                <td>{{$per->id}}</td>
                <td>{{$per->name}}</td>
                <td>{{$per->guard_name}}</td>
                <td>
                    <a href="{{route('per.del',$per)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>

    @endsection