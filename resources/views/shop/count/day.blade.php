@extends("shop.layouts.default")

@section("content")
    <div class="span10">

        <div class="slate">

            <div class="page-header">
                <h2><b>店铺销量统计：</b></h2>
                <br><br>
                <h3><b>订单总数：{{$count->count}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  总营业额：{{$count->money}}</b></h3>
                <a href="{{route("order.month")}}" class="btn btn-info">按月统计</a>
                <a href="{{route("order.day")}}" class="btn btn-info">按日统计</a>
            </div>
            <table class="orders-table table">
                <thead>
                <tr>
                    <th>日期</th>
                    <th>订单数量</th>
                    <th>营业额</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->date}}</td>
                        <td>{{$order->count}}</td>
                        <td>{{$order->money}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
        {{--{{$orders->links()}}--}}
    </div>
    @endsection