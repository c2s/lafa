<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-04-01 23:18
 */

namespace App\Transformers;

use App\Models\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    public function transform(Article $article)
    {
        return [
            'id' => $article->id,
            'object_id' => $article->object_id,
            'title' => $article->title,
            'subtitle' => $article->subtitle,
            'keywords' => $article->keywords,
            'description' => $article->description,
            'author' => $article->author,
            'thumb' => $article->getThumb(),
            'content' => $article->content,
            'is_link' => $article->is_link,
            'link' => $article->getLink(),
            'created_at' => $article->created_at->toDateTimeString(),
            'updated_at' => $article->updated_at->toDateTimeString(),
        ];
    }

}