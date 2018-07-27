<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
    <title>@yield("title","商铺首页")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Le styles -->
    <link href="http://fonts.googleapis.com/css?family=Oxygen|Marck+Script" rel="stylesheet" type="text/css">
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.css" rel="stylesheet">
    <link href="/assets/css/admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
</head>    
<body>

{{--引用错误子视图--}}
@include("admin.layouts._errors")
{{--引用消息提示子视图--}}
@include("admin.layouts._msg")

<div class="container">

	<div class="row">

		@include("shop.layouts._left") <!-- end span2 -->

	<div class="span10">

		@include("shop.layouts._top")

	@yield("content")

	</div> <!-- end span10 -->

	</div> <!-- end row -->

</div> <!-- end container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
@yield("js")
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.js"></script>
<script src="/assets/js/excanvas.min.js"></script>
<script src="/assets/js/jquery.flot.min.js"></script>
<script src="/assets/js/jquery.flot.resize.js"></script>
<script type="text/javascript" src="/webuploader/webuploader.js"></script>
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