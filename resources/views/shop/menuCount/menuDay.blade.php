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
            <table class="orders-table table">
                <thead>
                <tr>
                    <th>日期</th>
                    <th>商品</th>
                    <th>数量</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menuDays as $menuDay)
                    <tr>
                        <td>{{$menuDay->date}}</td>
                        <td>{{$menuDay->goods_name}}</td>
                        <td>{{$menuDay->nums}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
        {{--{{$orders->links()}}--}}
    </div>
    @endsection