<?php
/**
 * Author: <easy> easy@kucoin.com
 * Date: 2019/1/23 下午3:48
 */

namespace App\Http\Controllers\Backend;


use App\Services\SystemService;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index()
    {
        $list = app(SystemService::class)->menuTree();
        dd($list);
    }
}
