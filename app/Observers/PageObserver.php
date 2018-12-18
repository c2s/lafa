<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Observers;

use App\Models\Page;
use Illuminate\Support\Facades\Auth;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

/**
 * 单页面观察者
 *
 * Class PageObserver
 * @package App\Observers
 */
class PageObserver
{
    public function creating(Page $page)
    {
        //
        $page->object_id = create_object_id();
        $page->status = '1';
        $page->order = 999;
        $page->created_op || $page->created_op = Auth::id();
        $page->updated_op || $page->updated_op = Auth::id();

    }

    public function updating(Page $page)
    {
        $page->updated_op = Auth::id();
    }

    public function saving(Page $page){
        $page->type = 'page';
        $page->content = clean($page->content, 'user_body');
    }
}