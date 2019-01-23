<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\BehaviorLogEvent;

/**
 * 导航模型
 *
 * Class Navigation
 * @package App\Models
 */
class Navigation extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'category',
        'type',
        'title',
        'description',
        'target',
        'link',
        'image',
        'icon',
        'parent',
        'path',
        'params',
        'order',
        'is_show'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public $dispatchesEvents  = [
        'saved' => BehaviorLogEvent::class,
    ];

    public function titleName(){
        return 'title';
    }

    /**
     * 清除缓存
     *
     * @param $id
     * @param $category
     *
     * @return bool
     */
    public static function clearCache($id, $category = 'desktop'){
        $key = 'navigation_cache_'.$category;
        \Cache::forget($key);

        $key = 'navigation_item_cache_'.$id;
        \Cache::forget($key);

        return true;
    }

}
