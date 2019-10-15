<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-06-07 9:24
 */

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

/**
 * 文章控制器
 *
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{

    /**
     * 文章分类
     *
     * @param int $navigation
     * @param Category $articleCategory
     * @param Article $article
     * @return mixed
     */
    public function category($navigation = 0, Category $articleCategory, Article $article)
    {
        $category = $articleCategory;
        $articles = [];
        $articles = $articleCategory->articles()->ordered()->recent()->paginate(10);
        return frontend_view('category.'.$articleCategory->getTemplate('index'), compact('navigation','category','articles'));
    }

    /**
     * 文章列表
     *
     * @param int $navigation
     * @param Category $articleCategory
     * @param Article $article
     * @return mixed
     */
    public function index($navigation = 0, Category $articleCategory, Article $article)
    {
        $category = $articleCategory;
        $articles = $category->articles()->active()->ordered()->recent()->paginate(10);
        return frontend_view('article.'.$articleCategory->getTemplate('list'), compact('navigation','category','articles'));
    }

    /**
     * 详情
     *
     * @param int $navigation
     * @param int $category
     * @param Article $safeArticle
     * @return mixed
     */
    public function show($navigation = 0, $category = 0, Article $safeArticle)
    {
        $article = $safeArticle;
        $article->increment('views');
        return frontend_view('article.'.$article->getTemplate($category), compact('article'));
    }

}
