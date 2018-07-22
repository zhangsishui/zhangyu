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
                <label class="control-label" for="focusedInput">商户名</label>
                <div class="controls">
                    <input class="input-xlarge focused" id="focusedInput" type="text" value="{{old("name",$shop->user->name)}}" name="name">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">商户密码</label>
                <div class="controls">
                    <input type="password" class="input-xlarge focused" name="password" >
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">商户邮箱</label>
                <div class="controls">
                    <input type="email" class="input-xlarge focused" name="email" value="{{old("email",$shop->user->email)}}">
                </div>
            </div>

            <div class="control-group success">
                <label class="control-label" for="focusedInput">店铺名称</label>
                <div class="controls">
                    <input class="input-xlarge focused" id="focusedInput" type="text" value="{{old("shop_name",$shop->shop_name)}}" name="shop_name">
                </div>
            </div>

            <div class="control-group success">
                <label class="control-label" for="selectError">商铺分类</label>
                <div class="controls">
                    <select id="selectError" name="shop_category_id">
                        @foreach($shop_cates as $shop_cate)
                            <option value="{{$shop_cate->id}}" @if($shop->shop_category->id === $shop->shop_category_id) selected @endif>{{$shop_cate->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">是否品牌</label>
                <div class="controls">
                    <input type="radio" class="input-xlarge focused" name="brand" value="1" @if($shop->brand=="1") checked @endif>是
                    <input type="radio" class="input-xlarge focused" name="brand" value="0" @if($shop->brand=="0") checked @endif>否
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">是否准时送达</label>
                <div class="controls">
                    <input type="radio" class="input-xlarge focused" name="on_time" value="1" @if($shop->on_time=="1") checked @endif>是
                    <input type="radio" class="input-xlarge focused" name="on_time" value="0" @if($shop->on_time=="0") checked @endif>否
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">是否蜂鸟配送</label>
                <div class="controls">
                    <input type="radio" class="input-xlarge focused" name="fengniao" value="1" @if($shop->fengniao=="1") checked @endif>是
                    <input type="radio" class="input-xlarge focused" name="fengniao" value="0" @if($shop->fengniao=="0") checked @endif>是
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">是否保标记</label>
                <div class="controls">
                    <input type="radio" class="input-xlarge focused" name="bao" value="1" @if($shop->bao=="1") checked @endif>是
                    <input type="radio" class="input-xlarge focused" name="bao" value="0" @if($shop->bao=="0") checked @endif>否
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">是否票标记</label>
                <div class="controls">
                    <input type="radio" class="input-xlarge focused" name="piao" value="1" @if($shop->piao=="1") checked @endif>是
                    <input type="radio" class="input-xlarge focused" name="piao" value="1" @if($shop->piao=="0") checked @endif>否
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">是否准标记</label>
                <div class="controls">
                    <input type="radio" class="input-xlarge focused" name="zhun" value="1" @if($shop->zhun=="1") checked @endif>是
                    <input type="radio" class="input-xlarge focused" name="zhun" value="0" @if($shop->zhun=="0") checked @endif>否
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">起送金额</label>
                <div class="controls">
                    <input type="text" class="input-xlarge focused" name="start_send" value="{{old("start_send",$shop->start_send)}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">配送费</label>
                <div class="controls">
                    <input type="text" class="input-xlarge focused" name="send_cost" value="{{old("send_cost",$shop->send_cost)}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">店铺公告</label>
                <div class="controls">
                    <input type="text" class="input-xlarge focused" name="notice" value="{{old("notice",$shop->notice)}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">优惠信息</label>
                <div class="controls">
                    <input type="text" class="input-xlarge focused" name="discount" value="{{old("discount",$shop->discount)}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label">商铺图片</label>
                <div class="controls">
                    <img src="/uploads/images/{{$shop->shop_img}}" alt="" width="100">
                    <input type="file" class="input-xlarge focused" name="shop_img">
                </div>
            </div>
            <div class="control-group success">
                <div class="controls">
                    <input type="submit" class="btn btn-info" value="修改">
                </div>
            </div>


        </fieldset>
    </form>

{{--{{$categories->links()}}--}}
    @endsection