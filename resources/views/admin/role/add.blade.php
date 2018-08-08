@extends("admin.layouts.default")

@section("li-index")
    <li class="active"><a href="{{route("shop_category.index")}}">首页 <span class="sr-only">(current)</span></a></li>
@endsection

@section("li-about")
    <li><a href="#">关于我们</a></li>
@endsection

@section("title","商家分类")

@section("content")
    <form class="form-horizontal" action="" method="post">
        <fieldset>
            {{csrf_field()}}
            <div class="form-group" style="text-align: center">
                <h2>添加角色</h2>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">角色名称</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="角色名称" name="name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">角色权限</label>
                <div class="col-sm-8">
                    @foreach($pers as $per)
                        <input type="checkbox" class="checkbox-inline" name="per[]"
                               value="{{$per->name}}">{{$per->name}}
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-info">添加</button>
                </div>
            </div>


        </fieldset>
    </form>

    {{--{{$categories->links()}}--}}
@endsection