<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-04-01 23:18
 */

namespace App\Transformers;

use App\Models\Page;
use League\Fractal\TransformerAbstract;

class PageTransformer extends TransformerAbstract
{
    public function transform(Page $page)
    {
        return [
            'id' => $page->id,
            'object_id' => $page->object_id,
            'title' => $page->title,
            'subtitle' => $page->subtitle,
            'keywords' => $page->keywords,
            'description' => $page->description,
            'author' => $page->author,
//            'thumb' => $page->getThumb(),
            'content' => $page->content,
            'is_link' => $page->is_link,
            'link' => $page->getLink(),
            'created_at' => $page->created_at->toDateTimeString(),
            'updated_at' => $page->updated_at->toDateTimeString(),
        ];
    }

}