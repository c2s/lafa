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
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" href="{{asset('favicon.png')}}">

    <style>
        body {
            background-color: #f6f5f5;
            padding-top: 0;
            background-image: url({{asset('images/bg_1.png')}});
            background-repeat:no-repeat;
            background-size:cover;
        }
        .card-main {
            position: absolute;
            top: 25%;
            width: 100%;
        }

        .login {
            top: 20%;
            margin-left:auto;margin-right:auto;
            width: 400px;
            height: 400px;
        }
        .login-logo {
            text-align:center;
        }
    </style>

    @yield('styles')
</head>
<body class="bg_image">

<div id="app">
    <row class="main card-main">
        <i-col span="100">
            <card class="login">
                {{--<p slot="title">{{ config('app.name') }}管理系统</p>--}}
                <div class="login-logo">
                    <span style="font-size: 50px; font-weight: 800;">{{ config('app.name') }}</span>
{{--                    <img src="{{asset('images/logo-black.png')}}" alt="" style="width: 200px; height: 70px;">--}}
                </div>
                <i-form ref="form" :model="form" :rules="ruleCustom" :label-width="0">
                    <input type="hidden" v-model="form._token">
                    <form-item label="" prop="email">
                        <i-input type="text" v-model="form.email" placeholder="请输入Email">
                            <icon type="ios-person" slot="prepend" size="16"></icon>
                        </i-input>
                    </form-item>
                    <form-item label="" prop="password">
                        <i-input type="password" v-model="form.password" placeholder="亲输入密码">
                            <icon type="md-lock" slot="prepend" size="13"></icon>
                        </i-input>
                    </form-item>
                    <form-item label="" prop="captcha">
                        <i-input type="text" v-model="form.captcha" placeholder="请输入验证码"  number>
                            <icon type="ios-train" slot="prepend" size="14"></icon>
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
                },
                owner:''
            }
        },
        methods: {
            handleSubmit (name) {
                this.$refs[name].validate((valid) => {
                    owner = this;
                    if (valid) {
                        axios({
                           method: 'post',
                           url: '/admin/login',
                           data: this.form,
                       }).then(function (response) {
                           window.location.href = "/admin";
                        }).catch(function (error) {
                            var errors = error.response.data.errors;
                            if (errors.captcha && typeof(errors.captcha)!="undefined" && errors.captcha!=0) {
                                owner.$Message.error(errors.captcha[0]);
                            }

                            if (errors.email && typeof(errors.email)!="undefined" && errors.email!=0) {
                                owner.$Message.error(errors.email[0]);
                            }
                           });
                    } else {
                        this.$Message.error('请检查Email和密码是否有误!');
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
