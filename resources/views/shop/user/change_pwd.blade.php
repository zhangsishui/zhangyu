@extends("shop.layouts.default")
@section("content")
    <form class="form-horizontal" action="" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">旧密码</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name="old_password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name="password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name="password_confirmation">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-default">修改</button>
            </div>
        </div>
    </form>
    @endsection