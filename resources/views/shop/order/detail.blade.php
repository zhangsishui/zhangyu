@extends("shop.layouts.default")

@section("content")
    <div class="span10">

        <div class="slate">

            <div class="page-header">
                <div class="btn-group pull-right">
                    <button class="btn dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-download-alt"></i> 下载菜单
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">CSV</a></li>
                        <li><a href="#">Excel</a></li>
                        <li><a href="3">PDF</a></li>
                    </ul>
                </div>
                <h2>订单信息</h2>
            </div>

            <table class="orders-table table">
                <thead>

                <tr>
                    <th>id</th>
                    <td>{{$order->id}}</td>
                <tr>
                <tr>
                    <th>订单编号</th>
                    <td>{{$order->sn}}</td>
                </tr>
                <tr></tr>
                <th>订单用户</th>
                <td>{{$order->member->username}}</td>
                <tr>
                    <th>订单价格</th>
                    <td>{{$order->total}}</td>
                </tr>
                <tr>
                    <th>订单状态</th>
                    <td>{{$order->status}}</td>
                </tr>
                </tr>
                </thead>

            </table>
        </div>
        <a href="{{route("order.index")}}" class="btn btn-info">返回</a>
    </div>

@endsection