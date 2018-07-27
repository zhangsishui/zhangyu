@extends("shop.layouts.default")

@section("content")
    <h2 style="font-family: 楷体;text-align: center;color: orangered">添加菜品</h2>
    <br>
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">菜品名称</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="goods_name" value="{{old("goods_name")}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">菜品价格</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="goods_price" value="{{old("goods_price")}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="selectError">所属商铺</label>
                <div class="controls">
                    <select id="selectError" name="shop_id">
                        @foreach($shops as $shop)
                            <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="selectError">所属分类</label>
                <div class="controls">
                    <select id="selectError" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">是否上架</label>
                <div class="controls">
                    <input type="radio" id="inputSuccess" name="status" value="1">是
                    <input type="radio" id="inputSuccess" name="status" value="0">否
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">描述</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="description" value="{{old("description")}}">
                </div>
            </div>

            <div class="control-group success">
                <label class="control-label" for="inputSuccess">提示信息</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="tips" value="{{old("tips")}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">菜品图片</label>
                <div class="controls">
                    <div id="uploader-demo" class="wu-example">
                        <div id="fileList" class="uploader-list">
                        </div>
                        <div id="filePicker">选择图片</div>
                    </div>
                </div>
            </div>


            <div class="controls">
                <input type="submit" class="btn btn-success" value="添加">
            </div>

        </fieldset>
    </form>
@endsection

@section("js")

@endsection