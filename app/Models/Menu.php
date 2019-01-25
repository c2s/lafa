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
    protected $table = 'menu';

    protected $filltable = [
        'parent',
        'name',
        'name_en',
        'icon',
        'code',
        'route',
        'status',
    ];
}
