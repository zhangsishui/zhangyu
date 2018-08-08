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
    <form class="form-horizontal" action="" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">管理员</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" placeholder="分类名称" name="name" value="{{old("name",$admin->name)}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="inputEmail3" placeholder="邮箱" name="email" value="{{old("email",$admin->email)}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">选择角色</label>
            <div class="col-sm-8">
                @foreach($roles as $role)
                    <input type="checkbox" class="checkbox-inline" id="inputEmail3" name="role[]"
                           value="{{$role->name}}"
                           @if($admin->hasRole($role->name)) checked @endif
                    >{{$role->name}}
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-default">修改</button>
            </div>
        </div>
    </form>

{{--{{$categories->links()}}--}}
    @endsection