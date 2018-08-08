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
                <h2>菜品分类列表</h2>
            </div>

            <table class="orders-table table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>订单编号</th>
                    <th>订单用户</th>
                    <th>订单价格</th>
                    <th>订单状态</th>
                    <th>下单时间</th>
                    <th class="actions">操作</th>
                </tr>
                </thead>
                <tbody>
@foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->sn}}</td>
                    <td>{{$order->member->username}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->OrderStatus}}</td>
                    <td>{{$order->created_at}}</td>
                    <td class="actions">
                        <a class="btn btn-small btn-danger" data-toggle="modal" href="{{route("order.off",$order)}}">取消订单</a>
                        <a class="btn btn-small btn-primary" href="{{route("order.detail",$order)}}">查看订单</a>
                        <a class="btn btn-small btn-info" href="{{route("order.send",$order)}}">发货</a>
                    </td>
                </tr>
    @endforeach
                </tbody>
            </table>
        </div>
        {{$orders->links()}}
    </div>

    @endsection