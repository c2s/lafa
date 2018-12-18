<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-05-02 18:08
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * 后台登录控制器
 *
 * Class LoginController
 * @package App\Http\Controllers\Backend
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * 重写登录后跳转方法
     *
     * @return string
     */
    public function redirectTo(){
        return route('admin.dashboard');
    }

    /**
     * 重写登录方法
     * @return mixed
     */
    public function showLoginForm()
    {
        return backend_view('login');
    }

    /**
     * 重写验证规则方法
     *
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
            'captcha' => 'required|captcha',
        ],[
            'captcha.required' => '验证码不能为空.',
            'captcha.captcha' => '验证码错误.',
        ]);
    }

    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'), ['status' => 2]);
    }

    /**
     * 重写退出方法
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }
}
