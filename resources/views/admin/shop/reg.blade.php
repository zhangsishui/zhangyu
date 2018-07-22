<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>@yield("title","商户注册")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://fonts.googleapis.com/css?family=Oxygen|Marck+Script" rel="stylesheet" type="text/css">
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.css" rel="stylesheet">
    <link href="/assets/css/admin.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
</head>
<body>


    <div class="slate" >
        {{--引用错误子视图--}}
        @include("shop.layouts._errors")
        {{--引用消息提示子视图--}}
        @include("shop.layouts._msg")

        <div class="page-header">
            <h2 style="text-align: center">商户注册</h2>
        </div>

        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
            <fieldset >
                {{csrf_field()}}
                <div class="control-group success">
                    <label class="control-label" for="focusedInput">商户名</label>
                    <div class="controls">
                        <input class="input-xlarge focused" id="focusedInput" type="text" value="{{old("name")}}" name="name">
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">商户密码</label>
                    <div class="controls">
                        <input type="password" class="input-xlarge focused" name="password">
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">商户邮箱</label>
                    <div class="controls">
                        <input type="email" class="input-xlarge focused" name="email" value="{{old("email")}}">
                    </div>
                </div>

                <div class="control-group success">
                    <label class="control-label" for="focusedInput">店铺名称</label>
                    <div class="controls">
                        <input class="input-xlarge focused" id="focusedInput" type="text" value="{{old("shop_name")}}" name="shop_name">
                    </div>
                </div>

                <div class="control-group success">
                    <label class="control-label" for="selectError">商铺分类</label>
                    <div class="controls">
                        <select id="selectError" name="shop_category_id">
                            @foreach($shop_cates as $shop_cate)
                            <option value="{{$shop_cate->id}}">{{$shop_cate->name}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">是否准标记</label>
                    <div class="controls">
                        <input type="checkbox" class="input-xlarge focused" name="brand" value="1">是
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">是否品牌</label>
                    <div class="controls">
                        <input type="checkbox" class="input-xlarge focused" name="brand" value="1">是
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">是否准时送达</label>
                    <div class="controls">
                        <input type="checkbox" class="input-xlarge focused" name="on_time" value="1">是
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">是否蜂鸟配送</label>
                    <div class="controls">
                        <input type="checkbox" class="input-xlarge focused" name="fengniao" value="1">是
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">是否保标记</label>
                    <div class="controls">
                        <input type="checkbox" class="input-xlarge focused" name="bao" value="1">是
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">是否票标记</label>
                    <div class="controls">
                        <input type="checkbox" class="input-xlarge focused" name="piao" value="1">是
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">是否准标记</label>
                    <div class="controls">
                        <input type="checkbox" class="input-xlarge focused" name="zhun" value="1">是
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">起送金额</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge focused" name="start_send">
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">配送费</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge focused" name="send_cost">
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">店铺公告</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge focused" name="notice">
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">优惠信息</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge focused" name="discount">
                    </div>
                </div>
                <div class="control-group success">
                    <label class="control-label">商铺图片</label>
                    <div class="controls">
                        <input type="file" class="input-xlarge focused" name="shop_img">
                    </div>
                </div>
                <div class="control-group success">
                    <div class="controls">
                        <input type="submit" class="btn btn-info" value="注册">
                    </div>
                </div>


            </fieldset>
        </form>

    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/excanvas.min.js"></script>
    <script src="/assets/js/jquery.flot.min.js"></script>
    <script src="/assets/js/jquery.flot.resize.js"></script>
    <script type="text/javascript">
        $(function () {
            var d1 = [];
            d1.push([0, 32]);
            d1.push([1, 30]);
            d1.push([2, 24]);
            d1.push([3, 17]);
            d1.push([4, 11]);
            d1.push([5, 25]);
            d1.push([6, 28]);
            d1.push([7, 36]);
            d1.push([8, 44]);
            d1.push([9, 52]);
            d1.push([10, 53]);
            d1.push([11, 50]);
            d1.push([12, 45]);
            d1.push([13, 42]);
            d1.push([14, 40]);
            d1.push([15, 36]);
            d1.push([16, 34]);
            d1.push([17, 24]);
            d1.push([18, 17]);
            d1.push([19, 17]);
            d1.push([20, 20]);
            d1.push([21, 28]);
            d1.push([22, 36]);
            d1.push([23, 38]);

            $.plot($("#placeholder"), [ d1 ], { grid: { backgroundColor: 'white', color: '#999', borderWidth: 1, borderColor: '#DDD' }, colors: ["#FC6B0A"], series: { lines: { show: true, fill: true, fillColor: "rgba(253,108,11,0.4)" } } });
        });
    </script>


</body>
</html>