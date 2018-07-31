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
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
        <fieldset >
            {{csrf_field()}}
            <div class="control-group success">
                <label class="control-label" for="focusedInput">活动标题</label>
                <div class="controls">
                    <input class="input-xlarge focused" id="focusedInput" type="text" value="{{old("title")}}" name="title">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">活动开始时间</label>
                <div class="controls">
                    <input type="date" class="input-xlarge focused" name="start_time" value="{{old("start_time")}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">活动截止时间</label>
                <div class="controls">
                    <input type="date" class="input-xlarge focused" name="end_time" value="{{old("end_time")}}">
                </div>
            </div>

            <div class="control-group success">
                <label class="control-label" for="focusedInput">活动内容</label>
                <script type="text/javascript">
                    var ue = UE.getEditor('container');
                    ue.ready(function() {
                        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                    });
                </script>

                <!-- 编辑器容器 -->
                <script id="container" name="content" type="text/plain"></script>
            </div>


            <div class="control-group success">
                <div class="controls">
                    <input type="submit" class="btn btn-info" value="添加">
                </div>
            </div>


        </fieldset>
    </form>

{{--{{$categories->links()}}--}}
    @endsection