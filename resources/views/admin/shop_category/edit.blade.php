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
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">分类名称</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" placeholder="分类名称" name="name" value="{{old("name",$cate->name)}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">简介</label>
            <div class="col-sm-8">
                <input type="intro" class="form-control" id="inputPassword3" placeholder="简介" name="intro" value="{{old("intro",$cate->intro)}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否显示</label>
            <div class="col-sm-8">
                <input type="radio" id="status" name="status" @if($cate->status===1) checked @endif value="1">显示
                <input type="radio" id="status" name="status" @if($cate->status===0) checked @endif value="0">隐藏
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">分类图片</label>
            <div class="col-sm-8">
                <img src="/uploads/images/{{$cate->logo}}" alt="">
                <input type="file" class="form-control" id="file" name="img">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>

{{--{{$categories->links()}}--}}
    @endsection