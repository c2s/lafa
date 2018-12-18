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
 * 日志模型
 * 
 * Class Log
 * @package App\Models
 */
class Log extends Model
{
    protected $fillable = ['group','type', 'account', 'browser', 'host', 'uri', 'method', 'model', 'ip', 'location', 'user_agent', 'description', 'data', 'user_id',];
}
