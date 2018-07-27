@extends("shop.layouts.default")

@section("content")
    <h2 style="font-family: 楷体;text-align: center">修改菜品分类</h2>
    <br>
    <form class="form-horizontal" action="" method="post">
        {{csrf_field()}}
        <fieldset>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">分类名称</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="name" value="{{old("name",$menu_category->name)}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">菜品编号</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="type_accumulation"
                           value="{{old("type_accumulation",$menu_category->type_accumulation)}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">描述</label>
                <div class="controls">
                    <input type="text" id="inputSuccess" name="description"
                           value="{{old("description",$menu_category->description)}}">
                </div>
            </div>
            <div class="control-group success">
                <label class="control-label" for="inputSuccess">是否默认分类</label>
                <div class="controls">
                    <input type="radio" id="inputSuccess" name="is_selected" value="1"
                           @if($menu_category->is_selected == "1") checked @endif>是
                    <input type="radio" id="inputSuccess" name="is_selected" value="0"
                           @if($menu_category->is_selected == "0") checked @endif>否
                </div>
            </div>
            <div class="controls">
                <input type="submit" class="btn btn-success" value="修改">
            </div>

        </fieldset>
    </form>
@endsection