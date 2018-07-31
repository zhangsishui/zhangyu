<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                @yield("li-index")

                @yield("li-about")

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">管理列表<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route("admin.index")}}">管理员管理</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route("shop.index")}}">商家管理</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route("active.index")}}">活动管理</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest('admin')
                    <li><a href="{{route("admin.login")}}">登录</a></li>
                @endguest

                @auth('admin')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">个人中心</a></li>
                            <li><a href="{{route("admin.changePwd",\Illuminate\Support\Facades\Auth::guard('admin')->user())}}">修改密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route("admin.logout")}}">注销</a></li>
                        </ul>
                    </li>
                @endauth


            </ul>
            @yield("search")
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>