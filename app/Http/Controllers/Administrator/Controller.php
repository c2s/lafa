<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-05-02 18:08
 */

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller as BaseController;

/**
 * Administrator 基础控制器
 *
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    // 后台导航ID
    public static $activeNavId = 'dashboard';
}
