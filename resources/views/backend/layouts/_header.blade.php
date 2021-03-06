<header class="main-header">
    <div class="navbar-header navbar-fixed-top">
        <a class="navbar-toggle" href="javascript:;" data-toggle="collapse" data-target=".navbar-collapse"><i
                    class="icon icon-th-large"></i></a>
        <a class="sidebar-toggle" href="javascript:;" data-toggle="push-menu"><i class="icon icon-bars"></i></a>
        <a class="logo" href="#">
            <span class="logo-big">{{ config('app.name', 'Lafa')  }}</span>
        </a>
        <a class="logo-m" href="#">
            <span class="logo-mini">LF</span>
        </a>
    </div>
    <nav class="navbar navbar-fixed-top bg-primary">
        <a class="navbar-toggle" href="javascript:;" data-target=".navbar-collapse"><i
                    class="icon icon-th-large"></i></a>
        <div class="collapse navbar-collapse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="javascript:;" data-toggle="push-menu"><i class="icon icon-bars"></i></a></li>
                    {{--<li role="presentation" id="tab_1" class="active">--}}
                        {{--<a href="#con_1" node-id="1" aria-controls="1" role="tab" data-toggle="tab">--}}
                            {{--<i class="fa fa-dashboard fa-fw fa-fw"></i>--}}
                            {{--<span>控制台</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li role="presentation" id="tab_277" class="">--}}
                        {{--<a href="#con_277" node-id="277" aria-controls="277" role="tab" data-toggle="tab">--}}
                            {{--<i class="icon icon-cog"></i>--}}
                            {{--<span>自定义搜索</span>--}}
                            {{--<span class="pull-right-container"> </span>--}}
                        {{--</a>--}}
                        {{--<span href="https://www.baidu.com">--}}
                            {{--<i class="close-tab icon  icon-remove">--}}
                            {{--</i>--}}
                        {{--</span>--}}
                    {{--</li>--}}
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li><a href="{{ route('admin.login') }}">登录</a></li>
                        @else
                            <li class="dropdown">
                                <a href="javascript:;" data-toggle="dropdown">
                                    <img src="{{ Auth::user()->getAvatar() }}" width="32px" height="32px"
                                         class="img-circle" alt="{{ Auth::user()->name }}"/>&nbsp;&nbsp;
                                    {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('user.edit', Auth::user()->id)  }}"><i
                                                    class="icon icon-edit"></i> 基本资料</a></li>
                                    <li><a href="{{ route('admin.password.edit', Auth::user()->id )  }}"><i
                                                    class="icon icon-key"></i> 修改密码</a></li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ route('admin.logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                    class="icon icon-signout"></i> 退出</a>
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="GET"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
