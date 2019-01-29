<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2019-01-25 16:41:31
 */

namespace App\Models;


class Permissions extends Model
{

    // name前后缀
    const  MANAGE_PREFIX = 'manage_';
    const  FRONT_SUFFIX = 'front_';

    protected $table = 'permissions';

    protected $filltable = [
        'name',
        'guard_name',
        'remark',
    ];
}
