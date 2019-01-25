<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2019-01-25 16:41:31
 */

namespace App\Models;


class RoleHasPermissions extends Model
{
    protected $table = 'role_has_permissions';

    protected $filltable = [
        'permission_id',
        'role_id'
    ];
}
