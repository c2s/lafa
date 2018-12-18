<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-06-07 9:24
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Navigation;

/**
 * 页面控制器
 *
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    /**
     * 页面详情
     *
     * @param int $navigation
     * @param Page $safePage
     * @return mixed
     */
    public function show($navigation = 0, Page $safePage)
    {
        $page = $safePage;
        $page->increment('views');
        return frontend_view('page.'.$page->getTemplate(), compact('page'));
    }
}
