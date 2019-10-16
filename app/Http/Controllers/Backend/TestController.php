<?php
/**
 * Author: <easy> easy@kucoin.com
 * Date: 2019/1/23 下午3:48
 */

namespace App\Http\Controllers\Backend;

use App\Services\SystemService;
use Auth;


class TestController extends Controller
{
    public function index()
    {
        $list = app(SystemService::class)->permissionsMenu(Auth::user()->id);
        dd($list);
    }

    /**
     * 更新权限
     */
    public function updateRoles()
    {
        $list = app(SystemService::class)->permissionsMenu(Auth::user()->id);
        dd($list);
    }
}
