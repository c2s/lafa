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
use App\Models\Navigation;

/**
 * 导航授权策略
 *
 * Class NavigationPolicy
 * @package App\Policies
 */
class NavigationPolicy extends Policy
{
    public function index(User $user, Navigation $navigation)
    {
        return $user->can('manage_navigation');
    }

    public function create(User $user, Navigation $navigation)
    {
        return $user->can('manage_navigation');
    }

    public function update(User $user, Navigation $navigation)
    {
        return $user->can('manage_navigation');
    }

    public function destroy(User $user, Navigation $navigation)
    {
        return $user->can('manage_navigation');
    }
}
