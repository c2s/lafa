<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * 回复模型
 *
 * Class Reply
 * @package App\Models
 */
class Reply extends Model
{
//    use SoftDeletes;
    protected $fillable = [
        'content'
    ];

//    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
