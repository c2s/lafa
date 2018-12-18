<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-06-01 16:24
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

/**
 * 前台公共控制器
 *
 * Class WelcomeController
 * @package App\Http\Controllers
 */
class WelcomeController extends Controller
{
    /**
     * 前台首页
     *
     * @return mixed
     */
    public function index()
    {
        return frontend_view('welcome');
    }

    /**
     * 关于我们
     */
    public function company(){
        return frontend_view('company');
    }

    /**
     * 站点地图
     */
    public function map(){
        return frontend_view('map');
    }
}
