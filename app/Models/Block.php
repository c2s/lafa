<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Models;

/**
 * 区块模型
 *
 * Class Block
 * @package App\Models
 */
class Block extends Model
{
    protected $fillable = ['id','type', 'object_id', 'title', 'template', 'icon', 'more_title', 'more_link', 'content','created_op','updated_op'];

    public function getRouteKeyName()
    {
        return 'id';
    }
    
    /**
     * 清除缓存
     *
     * @param $object_id
     *
     * @return bool
     */
    public static function clearCache($object_id){
        $key = 'block_cache_'.$object_id;
    
        \Cache::forget($key);
    
        return true;
    }
}
