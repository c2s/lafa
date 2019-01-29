<?php
/**
 * Author: <easy> easy@kucoin.com
 * Date: 2019/1/23 下午3:48
 */

namespace App\Http\Controllers\Backend;

use Auth;
use App\Services\SystemService;


class TestController extends Controller
{
    public function index()
    {
        $list = app(SystemService::class)->permissionsMenu(Auth::user()->id);
        dd($list);
    }
}
