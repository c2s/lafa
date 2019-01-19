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
    {{--<link href="{{asset('plugins/zui/css/zui.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" href="/favicon.png">

    <style>
        body {
            background-color: #f6f5f5;
            padding-top: 0;
            background-image: url('/images/bg_1.png');
            background-repeat:no-repeat;
            background-size:cover;
        }
        .card-main {
            position: absolute;
            top: 30%;
            width: 100%;
            height: 100%;
        }

        .login {
            top: 20%;
            margin-left:auto;margin-right:auto;
            width: 500px;
            height: 400px;
        }

        /*.submitForm {*/
            /*width: 300px;*/
        /*}*/

        /*.submitBtn {*/
            /*margin-top: 30px;*/
            /*margin-left: 100px;*/
            /*width: 400px;*/
        /*}*/

    </style>

    @yield('styles')
</head>
<body class="layui-container {{ route_class() }}-body bg_image">






<div id="app">
    <row class="main card-main">
        <i-col span="100">
            <card class="login">
                <p slot="title">{{ config('app.name') }}管理系统</p>
                <i-form ref="form" :model="form" :rules="ruleCustom" :label-width="60">
                    <input type="hidden" v-model="form._token">
                    <form-item label="邮箱" prop="email">
                        <i-input type="text" v-model="form.email" placeholder="请输入邮箱">
                            <icon type="ios-person" slot="prepend"></icon>
                        </i-input>
                    </form-item>
                    <form-item label="密码" prop="password">
                        <i-input type="password" v-model="form.password">
                            <icon type="md-lock" slot="prepend"></icon>
                        </i-input>
                    </form-item>
                    <form-item label="验证码" prop="captcha">
                        <i-input type="text" v-model="form.captcha" number>
                            <icon type="ios-train" slot="prepend"></icon>
                        </i-input>
                    </form-item>
                    <form-item label="" prop="interest">
                        <checkbox-group v-model="form.remember">
                            <checkbox label="记住登录"></checkbox>
                            <div class="" style="float: right">
                                <img class="img-rounded captcha" src="{{ captcha_src('login') }}"
                                     onclick="this.src='{{ captcha_src("login") }}?'+Math.random()"
                                     title="点击图片重新获取验证码">
                            </div>
                        </checkbox-group>
                    </form-item>
                    <form-item>
                        <i-button class="ivu-btn-long" type="primary" @click="handleSubmit('form')">登录</i-button>
                    </form-item>
                </i-form>
            </card>
        </i-col>
    </row>
</div>


{{--<div id="app1" class="{{ route_class() }}-page">--}}
    {{--<div>--}}
            {{--<div id="login">--}}
                {{--<div class='panel-head'>--}}
                    {{--<h4>{{ config('app.name') }}管理系统</h4>--}}
                {{--</div>--}}
                {{--<div class="panel-body" id="loginForm">--}}

                    {{--@include('backend::layouts._message')--}}
                    {{--@include('backend::layouts._error')--}}
                    {{--<div class="form-con">--}}
                        {{--<form autocomplete="off" class="ivu-form ivu-form-label-right" method="POST" action="{{ route('admin.login') }}">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--<div class="ivu-form-item ivu-form-item-required @if ($errors->has('email')) has-error @endif"><!---->--}}
                                {{--<div class="ivu-form-item-content">--}}
                                    {{--<div class=" ivu-input-wrapper ivu-input-wrapper-default ivu-input-type ivu-input-group ivu-input-group-default ivu-input-group-with-prepend">--}}
                                        {{--<div class="ivu-input-group-prepend" style=""><span><i--}}
                                                        {{--class="ivu-icon ivu-icon-ios-person"--}}
                                                        {{--style="font-size: 16px;"></i></span></div> <!----> <i--}}
                                                {{--class="ivu-icon ivu-icon-ios-loading ivu-load-loop ivu-input-icon ivu-input-icon-validate"></i>--}}
                                        {{--<input name="email" autocomplete="off" spellcheck="false" type="text" placeholder="请输入Email"--}}
                                               {{--class="ivu-input ivu-input-default">--}}
                                        {{--<!----></div>--}}
                                    {{--@if ($errors->has('email'))--}}
                                        {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('email') }}</strong>--}}
                            {{--</span>--}}
                                {{--@endif--}}
                                    {{--<!----></div>--}}
                            {{--</div>--}}

                            {{--<div class="ivu-form-item ivu-form-item-required @if ($errors->has('password')) has-error @endif"><!---->--}}
                                {{--<div class="ivu-form-item-content">--}}
                                    {{--<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type ivu-input-group ivu-input-group-default ivu-input-group-with-prepend">--}}
                                        {{--<div class="ivu-input-group-prepend" style=""><span><i--}}
                                                        {{--class="ivu-icon ivu-icon-md-lock" style="font-size: 14px;"></i></span>--}}
                                        {{--</div> <!----> <i--}}
                                                {{--class="ivu-icon ivu-icon-ios-loading ivu-load-loop ivu-input-icon ivu-input-icon-validate"></i>--}}
                                        {{--<input name="password" autocomplete="off" spellcheck="false" type="password" placeholder="请输入密码"--}}
                                               {{--class="ivu-input ivu-input-default">--}}
                                        {{--<!----></div>--}}
                                    {{--@if ($errors->has('password'))--}}
                                        {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('password') }}</strong>--}}
                            {{--</span>--}}
                                {{--@endif--}}
                                    {{--<!----></div>--}}
                            {{--</div>--}}


                            {{--<div class="ivu-form-item ivu-form-item-required @if ($errors->has('captcha')) has-error @endif"><!---->--}}
                                {{--<div class="ivu-form-item-content">--}}
                                    {{--<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type ivu-input-group ivu-input-group-default ivu-input-group-with-prepend">--}}
                                        {{--<div class="ivu-input-group-prepend" style=""><span><i--}}
                                                        {{--class="ivu-icon ivu-icon-ios-contacts" style="font-size: 14px;"></i></span>--}}
                                        {{--</div> <!---->--}}
                                        {{--<i class="ivu-icon ivu-icon-ios-loading ivu-load-loop ivu-input-icon ivu-input-icon-validate"></i>--}}
                                        {{--<input name="captcha" style="width: 200px; float:left; height: 35px"  autocomplete="off" spellcheck="false" type="text" placeholder="请输入验证码"--}}
                                               {{--class="ivu-input ivu-input-default">--}}
                                        {{--<div class="" style="float: right">--}}
                                            {{--<img class="img-rounded captcha" src="{{ captcha_src('login') }}"--}}
                                                 {{--onclick="this.src='{{ captcha_src("login") }}?'+Math.random()"--}}
                                                 {{--title="点击图片重新获取验证码">--}}
                                        {{--</div>--}}
                                        {{--<!----></div>--}}
                                    {{--@if ($errors->has('captcha'))--}}
                                        {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('captcha') }}</strong>--}}
                            {{--</span>--}}
                                {{--@endif--}}
                                    {{--<!----></div>--}}
                            {{--</div>--}}

                            {{--<div class="ivu-form-item"><!---->--}}

                                {{--<label> <input  type="checkbox" name='remember' {{ old('remember') ? 'checked' : '' }}>&nbsp;&nbsp;记住我</label>--}}
                            {{--</div>--}}
                            {{--<div class="ivu-form-item"><!---->--}}
                                {{--<div class="ivu-form-item-content">--}}
                                    {{--<button type="submit" class="ivu-btn ivu-btn-primary ivu-btn-long">--}}
                                        {{--<span>登录</span></button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--<div class='notice text-center'>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--</div>--}}

<!-- Scripts -->
<script src="{{asset('js/app.js')}}"></script>

<script>

    var Main = {
        data () {
            const validateEmail = (rule, value, callback) => {
                if (value === '') {
                    callback(new Error('邮箱不能为空!'));
                } else {
                    callback();
                }
            };
            const validatePassword= (rule, value, callback) => {
                if (value === '') {
                    callback(new Error('密码不能为空!'));
                } else {
                    callback();
                }
            };
            const validateCode = (rule, value, callback) => {
                if (!value) {
                    return callback(new Error('验证码不能为空!'));
                }
                // 模拟异步验证效果
                setTimeout(() => {
//                    if (value > 4) {
//                        callback(new Error('必须是4位验证码'));
//                    } else {
//                        callback();
//                    }
                    callback();

                }, 1000);
            };

            return {
                form: {
                    _token: window.Laravel.csrfToken,
                    email: '',
                    password: '',
                    captcha: '',
                    remember: []
                },
                ruleCustom: {
                    email: [
                        { validator: validateEmail, trigger: 'blur' }
                    ],
                    password: [
                        { validator: validatePassword, trigger: 'blur' }
                    ],
                    captcha: [
                        { validator: validateCode, trigger: 'blur' }
                    ]
                }
            }
        },
        methods: {
            handleSubmit (name) {
                this.$refs[name].validate((valid) => {
                    if (valid) {

                       axios({
                           method: 'post',
                           url: '/admin/login',
                           data: this.form,
                           // headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                       }).then(function (response) {
                           console.log(response);
                       }).catch(function (error) {
                           alert(error.response.data.errors.captcha[0]);
                           this.$Message.error(error.response.data.errors.captcha[0]);
                           });
                        // this.$Message.success('Success!');
                    } else {
                        this.$Message.error('请检查邮箱密码是否有误!');
                    }
                })
            },
            handleReset (name) {
                this.$refs[name].resetFields();
            }
        }
    }

    var Component = Vue.extend(Main);
    new Component().$mount('#app')
</script>


@yield('scripts')
</body>
</html>
