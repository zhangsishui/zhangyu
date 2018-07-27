<div class="secondary-masthead">

    <ul class="nav nav-pills pull-right">
        @guest()
            <li>
                <a href="{{route("user.login")}}"><i class="icon-globe"></i>登录</a>
            </li>
        @endguest
        @auth()
            <li class="dropdown" style="font-family: 楷体;color: palegreen;font-size: 18px;">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user"></i>{{\Illuminate\Support\Facades\Auth::guard()->user()->name}}<b
                            class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="profile.html">个人中心</a></li>
                    <li><a href="{{route("user.changePwd",\Illuminate\Support\Facades\Auth::guard()->user())}}">修改密码</a></li>
                    <li class="divider"></li>
                    <li><a href="{{route("user.logout")}}">注销</a></li>
                </ul>
            </li>
        @endauth
    </ul>

    <ul class="breadcrumb">
        <li>
            <a href="#">首页</a> <span class="divider">/</span>
        </li>
        <li class="active">Dashboard</li>
    </ul>

</div>