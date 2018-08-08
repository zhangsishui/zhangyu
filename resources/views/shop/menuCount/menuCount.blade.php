@extends("shop.layouts.default")

@section("content")
    <div class="span10">

        <div class="slate">

            <div class="page-header">
                <h2><b>菜品销量统计：</b></h2>
                <br><br>
                <h3><b>菜品总销量：{{$menuCount->nums}}&nbsp;</b></h3>
                <a href="{{route("order.menuMonth")}}" class="btn btn-info">按月统计</a>
                <a href="{{route("order.menuDay")}}" class="btn btn-info">按日统计</a>
            </div>



        </div>

    </div>
    @endsection