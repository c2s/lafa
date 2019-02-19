@php
    $activeNavId = app('active')->getController()::$activeNavId;
    $menus = app(\App\Services\SystemService::class)->permissionsMenu(Auth::user()->id);
@endphp

<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="@if($activeNavId == 'dashboard') active @endif">
                <a href="{{route('admin.dashboard')}}">
                    <i class="icon icon-dashboard"></i>
                    <span>控制台</span>
                    <span class="pull-right-container"> <small class="label pull-right bg-blue">hot</small></span>
                </a>
            </li>

            @foreach($menus as $key1 => $menu)
                <li class="treeview @if($activeNavId == $menu['ename']) active @endif">
                    <a href="@if(!empty($menu['path'])) {{$menu['path']}} @else javascript:; @endif">
                        <i class="icon {{ empty($menu['icon']) ? 'icon-circle-blank' : $menu['icon'] }}"></i>
                        <span>{{ $menu['name'] }}</span>
                        <span class="pull-right-container">
                            <i class="icon icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @foreach($menu['children'] as $key2 => $item)
                            <li id="nav_{{$key1}}_{{$key2}}" class="@if($activeNavId == $item['ename']) active @endif">
                                <a href="@if(!empty($item['path'])){{$item['path']}} @else javascript:;@endif">
                                    <i class="icon {{ empty($item['icon']) ? 'icon-circle-blank' : $item['icon'] }}"></i> {{ $item['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach

            <!--
            <li class="treeview">
                <a href="javascript:;">
                    <i class="icon icon-file"></i>
                    <span>页面演示</span>
                    <span class="pull-right-container">
                        <i class="icon icon-angle-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href=""><i class="icon icon-circle-blank"></i> 空白页</a></li>
                    <li><a href=""><i class="icon icon-circle-blank"></i> 登录</a></li>
                    <li><a href=""><i class="icon icon-circle-blank"></i> 404页</a></li>
                    <li><a href=""><i class="icon icon-circle-blank"></i> 系统设置</a></li>
                    <li><a href=""><i class="icon icon-circle-blank"></i> 用户列表</a></li>
                </ul>
            </li>
            -->
        </ul>
    </section>
</aside>
