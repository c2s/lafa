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
use Auth;

/**
 * Welcome 控制器
 *
 * Class WelcomeController
 * @package App\Http\Controllers\Backend
 */
class WelcomeController extends Controller
{
    
    public function __construct()
    {
        static::$activeNavId = 'dashboard';
    }
    
    /**
     * 仪表盘
     * @return mixed
     */
    public function dashboard(){
        $data = [
            'totalUsers' => 9854,
            'TotalViews' => 542323,
            'totalOrder' => 76534,
            'totalOrderAmount' => 34532342.123,
        ];
        return backend_view("dashboard");
    }

    public function permissionDenied(){
        // 如果当前用户有权限访问后台，直接跳转访问
        if (Auth::user()->can('manage_system')) {
            //return redirect()->route('admin.dashboard')->status(302);
        }

        // 否则使用视图
        return backend_view('permission_denied');
    }
}
