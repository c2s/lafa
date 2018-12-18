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
 * 文件模型
 *
 * Class File
 * @package App\Models
 */
class File extends Model
{
    use SoftDeletes;
    protected $fillable = ['id','type', 'path', 'mime_type', 'md5', 'title', 'folder', 'object_id', 'size', 'width', 'height', 'downloads', 'public', 'editor', 'status', 'created_op'];
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
}
