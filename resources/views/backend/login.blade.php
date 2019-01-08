<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>登录 - {{ config('app.name', 'Lafa')  }}</title>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token()
        ]) !!};
    </script>
    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{asset('plugins/zui/css/zui.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/iview/iview.css')}}">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" href="/favicon.png">

    <style>
        body {
            background-color: #f6f5f5;
            padding-top: 0;
        }

        .user-control-nav {
            margin-bottom: 20px;
        }

        .page-content {
            padding: 0;
        }

        .text-bold {
            font-weight: bold;
        }

        .container {
            margin: 10% auto 0 auto
        }

        #login {
            margin-top: 200px;
            /*margin: 0 auto;*/
            _width: 420px;
            min-height: 230px;
            background-color: #fff;
            border: 1px solid #dfdfdf;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            -moz-box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.15);
            -webkit-box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.15)
        }

        #login .panel-head {
            border-bottom: 1px solid #e8eaec;
            padding: 14px 16px;
            line-height: 1;
        }

        #login .panel-head h4 {
            margin: 0 0 0 20px;
            padding: 0;
            line-height: 55px;
            font-size: 14px
        }

        #login .panel-actions {
            float: right;
            position: absolute;
            right: 15px;
            top: 12px;
            padding: 0
        }

        #login .panel-actions .dropdown {
            display: inline-block;
            margin-right: 2px
        }

        #login #submit {
            min-width: 100px;
        }

        .panel-body {
            /*padding: 20px 20px;*/
            padding: 16px;
        }

        .table-form th {
            text-align: right;
            vertical-align: middle;
        }

        .table-form th, .table-form td {
            padding: 8px 5px;
            border: none;
        }

        .notice {
            padding: 10px;
        }

        .la-card {
            background: #fff;
            border-radius: 4px;
            font-size: 14px;
            position: relative;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }

        .form-con {
            padding: 10px 0 0;
        }

    </style>

    @yield('styles')
</head>
<body class="layui-container {{ route_class() }}-body">

<div id="app" class="{{ route_class() }}-page">

    <div class='container'>

        <div class="col-md-6 col-md-offset-3">
            <div id='login' class="la-card">
                <div class='panel-head'>
                    <h4>{{ config('app.name') }}管理系统</h4>
                </div>
                <div class="panel-body" id="loginForm">

                    {{--@include('backend::layouts._message')--}}
                    {{--@include('backend::layouts._error')--}}
                    <div class="form-con">
                        <form autocomplete="off" class="ivu-form ivu-form-label-right" method="POST" action="{{ route('admin.login') }}">
                            {{ csrf_field() }}
                            <div class="ivu-form-item ivu-form-item-required @if ($errors->has('email')) has-error @endif"><!---->
                                <div class="ivu-form-item-content">
                                    <div class=" ivu-input-wrapper ivu-input-wrapper-default ivu-input-type ivu-input-group ivu-input-group-default ivu-input-group-with-prepend">
                                        <div class="ivu-input-group-prepend" style=""><span><i
                                                        class="ivu-icon ivu-icon-ios-person"
                                                        style="font-size: 16px;"></i></span></div> <!----> <i
                                                class="ivu-icon ivu-icon-ios-loading ivu-load-loop ivu-input-icon ivu-input-icon-validate"></i>
                                        <input name="email" autocomplete="off" spellcheck="false" type="text" placeholder="请输入Email"
                                               class="ivu-input ivu-input-default">
                                        <!----></div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                                    <!----></div>
                            </div>

                            <div class="ivu-form-item ivu-form-item-required @if ($errors->has('password')) has-error @endif"><!---->
                                <div class="ivu-form-item-content">
                                    <div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type ivu-input-group ivu-input-group-default ivu-input-group-with-prepend">
                                        <div class="ivu-input-group-prepend" style=""><span><i
                                                        class="ivu-icon ivu-icon-md-lock" style="font-size: 14px;"></i></span>
                                        </div> <!----> <i
                                                class="ivu-icon ivu-icon-ios-loading ivu-load-loop ivu-input-icon ivu-input-icon-validate"></i>
                                        <input name="password" autocomplete="off" spellcheck="false" type="password" placeholder="请输入密码"
                                               class="ivu-input ivu-input-default">
                                        <!----></div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                @endif
                                    <!----></div>
                            </div>


                            <div class="ivu-form-item ivu-form-item-required @if ($errors->has('captcha')) has-error @endif"><!---->
                                <div class="ivu-form-item-content">
                                    <div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type ivu-input-group ivu-input-group-default ivu-input-group-with-prepend">
                                        <div class="ivu-input-group-prepend" style=""><span><i
                                                        class="ivu-icon ivu-icon-md-lock" style="font-size: 14px;"></i></span>
                                        </div> <!---->
                                        <i class="ivu-icon ivu-icon-ios-loading ivu-load-loop ivu-input-icon ivu-input-icon-validate"></i>
                                        <input name="captcha" style="width: 200px; float:left; height: 35px"  autocomplete="off" spellcheck="false" type="text" placeholder="请输入验证码"
                                               class="ivu-input ivu-input-default">
                                        <div class="" style="float: right">
                                            <img class="img-rounded captcha" src="{{ captcha_src('login') }}"
                                                 onclick="this.src='{{ captcha_src("login") }}?'+Math.random()"
                                                 title="点击图片重新获取验证码">
                                        </div>
                                        <!----></div>
                                    @if ($errors->has('captcha'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('captcha') }}</strong>
                            </span>
                                @endif
                                    <!----></div>
                            </div>

                            <div class="ivu-form-item"><!---->

                                <label><input  type="checkbox"
                                              name='remember' {{ old('remember') ? 'checked' : '' }}>
                                    记住我</label>
                                <div class="ivu-form-item-content">
                                    <button type="submit" class="ivu-btn ivu-btn-primary ivu-btn-long"><!----> <!---->
                                        <span>登录</span></button> <!----></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class='notice text-center'>
        </div>
    </div>

</div>

<!-- Scripts -->
<script src="{{asset('js/app.js')}}"></script>
@yield('scripts')
</body>
</html>
