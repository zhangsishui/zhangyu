@extends("shop.layouts.default")

@section("content")
    <h2 style="font-family: 楷体;text-align: center">添加菜品分类</h2>
    <br>
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">菜品名称</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="goods_name"
                           value="{{old("goods_name",$menu->goods_name)}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">菜品价格</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="goods_price"
                           value="{{old("goods_price",$menu->goods_price)}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="selectError">所属商铺</label>
                <div class="controls">
                    <select id="selectError" name="shop_id">
                        @foreach($shops as $shop)
                            <option value="{{$shop->id}}"
                                    @if($shop->id===$menu->shop_id) selected @endif>{{$shop->shop_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="selectError">所属分类</label>
                <div class="controls">
                    <select id="selectError" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if($category->id===$menu->category_id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">是否上架</label>
                <div class="controls">
                    <input type="radio" id="inputSuccess" name="status" value="1"
                           @if($menu->status=="1") checked @endif>是
                    <input type="radio" id="inputSuccess" name="status" value="0"
                           @if($menu->status=="0") checked @endif>否
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">描述</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="description"
                           value="{{old("description",$menu->description)}}">
                </div>
            </div>

            <div class="control-group success">
                <label class="control-label" for="inputSuccess">提示信息</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="tips" value="{{old("tips",$menu->tips)}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">菜品图片</label>
                <img src="/uploads/images/{{$menu->goods_img}}" alt="" width="100">
                <div class="controls">
                    <input type="file" id="inputSuccess" name="goods_img">
                </div>
            </div>

            <div class="controls">
                <input type="submit" class="btn btn-success" value="修改">
            </div>

        </fieldset>
    </form>
@endsection