@extends("admin.layouts.default")

@section("li-index")
    <li class="active"><a href="{{route("admin.index")}}">首页 <span class="sr-only">(current)</span></a></li>
    @endsection

@section("li-about")
    <li><a href="#">关于我们</a></li>
@endsection

@section("title","商家分类")

@section("content")
    <a href="{{route('role.add')}}" class="btn btn-info">添加</a>
    <table class="table" >

        <tr>
            <th>ID</th>
            <th>角色名称</th>
            <th>守卫</th>
            <th>拥有权限</th>
            <th>操作</th>
        </tr>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->guard_name}}</td>
                <td>{{ str_replace(['[',']','"'],'', $role->permissions()->pluck('name')) }}</td>
                <td>
                    <a href="{{route('role.edit',$role)}}" class="btn btn-warning">编辑</a>
                    <a href="{{route('role.del',$role)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>

    @endsection