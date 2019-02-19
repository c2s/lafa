<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2019-01-25 16:41:31
 */

namespace App\Models;


class UserHasPermissions extends Model
{

    protected $table = 'user_has_roles';

    protected $fillable = [
        'user_id',
        'role_id'
    ];
}
