<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-04-01 23:18
 */

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Permission;

/**
 * 权限授权策略
 *
 * Class PermissionPolicy
 * @package App\Policies
 */
class PermissionPolicy extends Policy
{

    public function index(User $user, Permission $permission)
    {
        return $user->can("manage_permissions");
    }

    public function manage(User $user, Permission $permission)
    {
        return $user->can("manage_permissions");
    }

    public function create(User $user, Permission $permission)
    {
        return $user->can("manage_permissions");
    }

    public function update(User $user, Permission $permission)
    {
        return $user->can("manage_permissions");
    }

    public function destroy(User $user, Permission $permission)
    {
        return $user->can("manage_permissions");
    }
}
