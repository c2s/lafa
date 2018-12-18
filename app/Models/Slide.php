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

/**
 * 幻灯模型
 *
 * Class Slide
 * @package App\Models
 */
class Slide extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['id','object_id', 'group', 'title', 'description', 'trage', 'link', 'image', 'order', 'status'];
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
    /**
     * 追加过滤条件
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }

}
