@extends('backend::layouts.app')

@section('title',$title = '控制台')

@section('breadcrumb')
    <li class="active">控制台</li>
@endsection

@section('content')

    <style type="text/css">
        .sm-st {
            background:#fff;
            padding:20px;
            -webkit-border-radius:3px;
            -moz-border-radius:3px;
            border-radius:3px;
            margin-bottom:20px;
            -webkit-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
            box-shadow: 0 1px 0px rgba(0,0,0,0.05);
        }
        .sm-st-icon {
            width:60px;
            height:60px;
            display:inline-block;
            line-height:60px;
            text-align:center;
            font-size:30px;
            background:#eee;
            -webkit-border-radius:5px;
            -moz-border-radius:5px;
            border-radius:5px;
            float:left;
            margin-right:10px;
            color:#fff;
        }
        .sm-st-info {
            font-size:12px;
            padding-top:2px;
        }
        .sm-st-info span {
            display:block;
            font-size:24px;
            font-weight:600;
        }
        .orange {
            background:#fa8564 !important;
        }
        .tar {
            background:#45cf95 !important;
        }
        .sm-st .green {
            background:#86ba41 !important;
        }
        .pink {
            background:#AC75F0 !important;
        }
        .yellow-b {
            background: #fdd752 !important;
        }
        .stat-elem {

            background-color: #fff;
            padding: 18px;
            border-radius: 40px;

        }

        .stat-info {
            text-align: center;
            background-color:#fff;
            border-radius: 5px;
            margin-top: -5px;
            padding: 8px;
            -webkit-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
            box-shadow: 0 1px 0px rgba(0,0,0,0.05);
            font-style: italic;
        }

        .stat-icon {
            text-align: center;
            margin-bottom: 5px;
        }

        .st-red {
            background-color: #F05050;
        }
        .st-green {
            background-color: #27C24C;
        }
        .st-violet {
            background-color: #7266ba;
        }
        .st-blue {
            background-color: #23b7e5;
        }

        .stats .stat-icon {
            color: #28bb9c;
            display: inline-block;
            font-size: 26px;
            text-align: center;
            vertical-align: middle;
            width: 50px;
            float:left;
        }

        .stat {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: inline-block;
            margin-right: 10px; }
        .stat .value {
            font-size: 20px;
            line-height: 24px;
            overflow: hidden;
            text-overflow: ellipsis;
            font-weight: 500; }
        .stat .name {
            overflow: hidden;
            text-overflow: ellipsis; }
        .stat.lg .value {
            font-size: 26px;
            line-height: 28px; }
        .stat.lg .name {
            font-size: 16px; }
        .stat-col .progress {height:2px;}
        .stat-col .progress-bar {line-height:2px;height:2px;}

        .item {
            padding:30px 0;
        }
        .alert-danger-light {
            background-color: #f2dede;
            border-color: #ebcdcd;
            color: #b94a48;
        }

        .bg-info {
            color: #fff;
            background-color: #03b8cf;
        }
    </style>

    <div class="alert alert-danger-light">
        <span>温馨提示:<br/></span>
        <span>系统将在2019年春节法定假期2月4日（除夕）至2月10日（初六）暂停营业.<br/></span>
    </div>

    <div class="panel panel-default panel-intro">
        <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#one" data-toggle="tab">控制台</a></li>
                <li><a href="#two" data-toggle="tab">自定义</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="one">

                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-users"></i></span>
                                <div class="sm-st-info">
                                    <span>{$totaluser}</span>
                                    会员总数
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-book"></i></span>
                                <div class="sm-st-info">
                                    <span>{$totalviews}</span>
                                    访问总数
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-shopping-bag"></i></span>
                                <div class="sm-st-info">
                                    <span>{$totalorder}</span>
                                    订单总数
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fa fa-cny"></i></span>
                                <div class="sm-st-info">
                                    <span>{$totalorderamount}</span>
                                    订单金额
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div id="echart" style="height:200px;width:100%;"></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card sameheight-item stats">
                                <div class="card-block">
                                    <div class="row row-sm stats-container">
                                        <div class="col-xs-6 stat-col">
                                            <div class="stat-icon"> <i class="fa fa-rocket"></i> </div>
                                            <div class="stat">
                                                <div class="value"> {$todayusersignup} </div>
                                                <div class="name"> {:__('Today user signup')} </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" style="width: 30%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 stat-col">
                                            <div class="stat-icon"> <i class="fa fa-shopping-cart"></i> </div>
                                            <div class="stat">
                                                <div class="value"> {$todayuserlogin} </div>
                                                <div class="name"> {:__('Today user login')} </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" style="width: 25%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6  stat-col">
                                            <div class="stat-icon"> <i class="fa fa-line-chart"></i> </div>
                                            <div class="stat">
                                                <div class="value"> {$todayorder} </div>
                                                <div class="name"> {:__('Today order')} </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" style="width: 25%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6  stat-col">
                                            <div class="stat-icon"> <i class="fa fa-users"></i> </div>
                                            <div class="stat">
                                                <div class="value"> {$unsettleorder} </div>
                                                <div class="name"> {:__('Unsettle order')} </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" style="width: 25%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6  stat-col">
                                            <div class="stat-icon"> <i class="fa fa-list-alt"></i> </div>
                                            <div class="stat">
                                                <div class="value"> {$sevendnu} </div>
                                                <div class="name"> {:__('Seven dnu')} </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" style="width: 25%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 stat-col">
                                            <div class="stat-icon"> <i class="fa fa-dollar"></i> </div>
                                            <div class="stat">
                                                <div class="value"> {$sevendau} </div>
                                                <div class="name"> {:__('Seven dau')} </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" style="width: 25%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:15px;">

                        <div class="col-lg-12">
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="panel bg-info">
                                <div class="panel-body">
                                    <div class="panel-title">
                                        <span class="label label-success pull-right">实时</span>
                                        <h5>{:__('Category count')}</h5>
                                    </div>
                                    <div class="panel-content">
                                        <h1 class="no-margins">1234</h1>
                                        <div class="stat-percent font-bold text-gray"><i class="fa fa-commenting"></i> 1234</div>
                                        <small>{:__('Category count tips')}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="panel bg-dashboard-2">
                                <div class="panel-body">
                                    <div class="ibox-title">
                                        <span class="label label-info pull-right">实时</span>
                                        <h5>{:__('Attachment count')}</h5>
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins">1043</h1>
                                        <div class="stat-percent font-bold text-gray"><i class="fa fa-modx"></i> 2592</div>
                                        <small>{:__('Attachment count tips')}</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <div class="panel bg-dashboard-3">
                                <div class="panel-body">
                                    <div class="ibox-title">
                                        <span class="label label-primary pull-right">实时</span>
                                        <h5>{:__('Article count')}</h5>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h1 class="no-margins">1234</h1>
                                                <div class="font-bold"><i class="fa fa-commenting"></i> <small>{:__('Comment count')}</small></div>
                                            </div>
                                            <div class="col-md-6">
                                                <h1 class="no-margins">6754</h1>
                                                <div class="font-bold"><i class="fa fa-heart"></i> <small>{:__('Like count')}</small></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="panel bg-dashboard-4">
                                <div class="panel-body">
                                    <div class="ibox-title">
                                        <span class="label label-primary pull-right">实时</span>
                                        <h5>{:__('News count')}</h5>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h1 class="no-margins">5302</h1>
                                                <div class="font-bold"><i class="fa fa-commenting"></i> <small>{:__('Comment count')}</small></div>
                                            </div>
                                            <div class="col-md-6">
                                                <h1 class="no-margins">8205</h1>
                                                <div class="font-bold"><i class="fa fa-user"></i> <small>{:__('Like count')}</small></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">{:__('Recent news')}</h3>
                                    <div class="box-tools pull-right">
                                        <a href="https://www.fastadmin.net" target="_blank" class="btn btn-box-tool">{:__('More')}</a>
                                    </div>
                                </div>
                                <div class="box-body" id="news-list">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">{:__('Recent discussion')}</h3>
                                    <div class="box-tools pull-right">
                                        <a href="https://forum.fastadmin.net" class="btn btn-box-tool">{:__('More')}</a>
                                    </div>
                                </div>
                                <div class="box-body" id="discussion-list">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="box box-info">
                                <div class="box-header"><h3 class="box-title">{:__('Server info')}</h3></div>
                                <div class="box-body">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td width="140">{:__('FastAdmin version')}</td>
                                            <td>{$Think.config.fastadmin.version} <a href="javascript:;" class="btn btn-xs btn-checkversion">检查最新版</a></td>
                                        </tr>
                                        <tr>
                                            <td>{:__('FastAdmin addon version')}</td>
                                            <td>{$addonversion}</td>
                                        </tr>
                                        <tr>
                                            <td>{:__('Sapi name')}</td>
                                            <td>{:php_sapi_name()}</td>
                                        </tr>
                                        <tr>
                                            <td>{:__('Debug mode')}</td>
                                            <td>{$Think.config.app_debug?__('Yes'):__('No')}</td>
                                        </tr>
                                        <tr>
                                            <td>{:__('Software')}</td>
                                            <td>{$Think.server.SERVER_SOFTWARE}</td>
                                        </tr>
                                        <tr>
                                            <td>{:__('Upload mode')}</td>
                                            <td>{$uploadmode}</td>
                                        </tr>
                                        <tr>
                                            <td>{:__('Upload url')}</td>
                                            <td>{$config.upload.uploadurl}</td>
                                        </tr>
                                        <tr>
                                            <td>{:__('Upload Cdn url')}</td>
                                            <td>{$config.upload.cdnurl}</td>
                                        </tr>
                                        <tr>
                                            <td>{:__('Timezone')}</td>
                                            <td>{:date_default_timezone_get()}</td>
                                        </tr>
                                        <tr>
                                            <td>{:__('Cdn url')}</td>
                                            <td>__CDN__</td>
                                        </tr>
                                        <tr>
                                            <td>{:__('Language')}</td>
                                            <td>{$config.language}</td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="two">
                    <div class="row">
                        <div class="col-xs-12">
                            {:__('Custom zone')}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{--<div class="row">--}}
        {{--<div class="col-md-3 col-sm-6 col-xs-12">--}}
            {{--<div class="info-box bg-info">--}}
                {{--<div class="info-box-icon">--}}
                    {{--<i class="icon icon-file-text"></i>--}}
                {{--</div>--}}
                {{--<div class="info-box-content">--}}
                    {{--<span class="info-box-text">新增订单</span>--}}
                    {{--<span class="info-box-number">320--}}
                        {{--<small>单</small>--}}
                    {{--</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-3 col-sm-6 col-xs-12">--}}
            {{--<div class="info-box bg-dashboard-2">--}}
                {{--<div class="info-box-icon">--}}
                    {{--<i class="icon icon-user"></i>--}}
                {{--</div>--}}
                {{--<div class="info-box-content">--}}
                    {{--<span class="info-box-text">新增用户</span>--}}
                    {{--<span class="info-box-number">90--}}
                        {{--<small>个</small>--}}
                    {{--</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-3 col-sm-6 col-xs-12">--}}
            {{--<div class="info-box bg-dashboard-3">--}}
                {{--<div class="info-box-icon">--}}
                    {{--<i class="icon icon-bars"></i>--}}
                {{--</div>--}}
                {{--<div class="info-box-content">--}}
                    {{--<span class="info-box-text">在售商品</span>--}}
                    {{--<span class="info-box-number">129--}}
                        {{--<small>种</small>--}}
                    {{--</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-3 col-sm-6 col-xs-12">--}}
            {{--<div class="info-box bg-dashboard-4">--}}
                {{--<div class="info-box-icon">--}}
                    {{--<i class="icon icon-eye-open"></i>--}}
                {{--</div>--}}
                {{--<div class="info-box-content">--}}
                    {{--<span class="info-box-text">库存预警</span>--}}
                    {{--<span class="info-box-number">66--}}
                        {{--<small>元</small>--}}
                    {{--</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="row">--}}
        {{--<div class="col-md-6">--}}
            {{--<div class="panel">--}}
                {{--<div class="panel-heading">--}}
                    {{--<div class="panel-title">产品信息</div>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<table class="table table-info">--}}
                        {{--<tr>--}}
                            {{--<td width="100">产品名称</td>--}}
                            {{--<td><a target="_blank" href="https://www.Lafa.cn">Lafa</a></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>核心框架</td>--}}
                            {{--<td>Laravel / {{ app()->version() }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>开发作者</td>--}}
                            {{--<td><a target="_blank" href="https://github.com/imofei">莫非</a></td>--}}
                        {{--</tr>--}}

                        {{--<tr>--}}
                            {{--<td>系统时区</td>--}}
                            {{--<td>{{ config('app.timezone') }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>语言环境</td>--}}
                            {{--<td>{{ config('app.locale') }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>系统模式</td>--}}
                            {{--<td>{{ config('app.env') }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>系统URL</td>--}}
                            {{--<td>{{ config('app.url') }}</td>--}}
                        {{--</tr>--}}

                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-6">--}}
            {{--<div class="panel">--}}
                {{--<div class="panel-heading">--}}
                    {{--<div class="panel-title">服务器信息</div>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<table class="table table-info">--}}
                        {{--<tr>--}}
                            {{--<td width="100">操作系统</td>--}}
                            {{--<td>{{ php_uname() }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>运行环境</td>--}}
                            {{--<td>{{ array_get($_SERVER, 'SERVER_SOFTWARE') }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>PHP版本</td>--}}
                            {{--<td>PHP / {{PHP_VERSION}}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>缓存驱动</td>--}}
                            {{--<td>{{ config('cache.default') }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>会话驱动</td>--}}
                            {{--<td>{{ config('session.driver') }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>队列驱动</td>--}}
                            {{--<td>{{ config('queue.default') }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>文件系统</td>--}}
                            {{--<td>{{ config('filesystems.default') }}</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection
