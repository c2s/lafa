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
use App\Models\Article;
use TeamTNT\TNTSearch\Indexer\TNTIndexer;
use TeamTNT\TNTSearch\TNTSearch;
use App\Handlers\TokenizerHandler;

/**
 * 前台搜索控制器
 *
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{

    /**
     * 搜索首页
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->article($request);
    }

    /**
     *
     * 参考地址：http://tnt.studio/blog/did-you-mean-functionality-with-laravel-scout
     * Github: https://github.com/teamtnt/laravel-scout-tntsearch-driver
     * @param Request $request
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function article(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->paginate(10);

        return frontend_view('search.article', compact('articles', 'query'));
    }


}
