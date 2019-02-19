<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2019-01-25 16:41:31
 */

namespace App\Models;


class Menu extends Model
{

    // 菜单状态：1:正常
    const  NORMAL = 1;

    private static $statusMap = [
        self::NORMAL         => '正常',
    ];

    protected $table = 'menu';

    protected $fillable = [
        'parent',
        'name',
        'ename',
        'icon',
        'code',
        'path',
        'sort',
        'status',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
