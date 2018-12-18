<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-05-19 18:08
 */

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Transformers\PageTransformer;
use App\Models\Page;

/**
 * 页面控制器
 *
 * Class PageController
 * @package App\Http\Controllers\Api\V1
 */
class PageController extends Controller
{
    /**
     * 详情
     *
     * @param int $page_id
     * @return \Dingo\Api\Http\Response
     */
    public function show($page_id = 0)
    {
        $page = Page::where('id', intval($page_id))->where('status', '1')->first();
        if(!$page->id){ abort(404); }
        return $this->response->item($page, new PageTransformer());
    }

    /**
     * 关于我们
     *
     * @return mixed
     */
    public function about(){
        return $this->response->array(['content' => config("system.common.company.content") ]);
    }
}
