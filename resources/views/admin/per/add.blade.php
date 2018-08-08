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
                <h2>添加权限</h2>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">权限名称</label>
                <div class="col-sm-8">
                    <select name="name" id="" class="form-control">
                        @for($i = 0;$i < count($urls) ;$i++)
                            <option value="{{$urls[$i]}}" >{{$urls[$i]}}</option>
                        @endfor
                    </select>
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