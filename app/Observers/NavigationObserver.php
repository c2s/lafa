<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */
namespace App\Observers;

use App\Models\Navigation;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

/**
 * 导航观察者
 *
 * Class NavigationObserver
 * @package App\Observers
 */
class NavigationObserver
{
    public function creating(Navigation $navigation)
    {
        $navigation->order = $navigation->order ?? 999;
    }

    public function updating(Navigation $navigation)
    {

    }

    public function saving(Navigation $navigation){
        $parent = Navigation::find($navigation->parent);
        if(isset($parent->path)){
            $navigation->path = $parent->path . '-'. $parent->id;
        }else{
            $navigation->path = $navigation->parent;
        }

        if(is_array($navigation->params) || is_object($navigation->params)){
            $navigation->params = json_encode($navigation->params, JSON_UNESCAPED_UNICODE);
        }
    }

    // 更新url
    public function saved(Navigation $navigation){
        $link = app(\App\Handlers\NavigationHandler::class)->createUrl($navigation);
        Navigation::where('id', $navigation->id)->update(['link'=>$link]);
    }

    public function deleting(Navigation $navigation){
        // 先删除子分类
        Navigation::where('parent',$navigation->id)->delete();
    }

    public function updated(Navigation $navigation){
        // 更新下一级子分类path
        $navigations = Navigation::where('parent',$navigation->id)->get();
        foreach($navigations as $nav){
            $nav->path = $navigation->path . '-'. $navigation->id;
            $nav->save();
        }
        
        Navigation::clearCache($navigation->id, $navigation->category);
    }
}