@extends("shop.layouts.default")

@section("content")
    <h2 style="font-family: 楷体;text-align: center;color: mediumaquamarine">添加菜品分类</h2>
    <br>
    <form class="form-horizontal" action="" method="post">
        {{csrf_field()}}
        <fieldset>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">分类名称</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="name" value="{{old("name")}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">菜品编号</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="type_accumulation" value="{{old("type_accumulation")}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">描述</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="description" value="{{old("description")}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">是否默认分类</label>
                <div class="controls">
                    <input type="radio" id="inputSuccess" name="is_selected" value="1">是
                    <input type="radio" id="inputSuccess" name="is_selected" value="0">否
                </div>
            </div>

                <div class="controls">
                <input type="submit" class="btn btn-success" value="添加">
            </div>

        </fieldset>
    </form>
@endsection