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
use App\Transformers\ArticleTransformer;
use App\Models\Article;
use App\Models\Category;

/**
 * 文章控制器
 *
 * Class ArticleController
 * @package App\Http\Controllers\Api\V1
 */
class ArticleController extends Controller
{
    /**
     * 列表
     *
     * @param int $category_id
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function index($category_id = 0, Request $request)
    {
        if( ! ($category = Category::find($category_id)) ){ abort(404); }

        $articles = $category->articles();
        $articles = $articles->ordered()->recent()->paginate(10);

        return $this->response->paginator($articles, new ArticleTransformer());
    }
}
