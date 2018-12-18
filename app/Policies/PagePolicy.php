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
use App\Models\Page;

/**
 * 页面授权策略
 *
 * Class PagePolicy
 * @package App\Policies
 */
class PagePolicy extends Policy
{

    public function index(User $user, Page $page)
    {
        return $user->can("manage_page");
    }

    public function manage(User $user, Page $page)
    {
        return $user->can("manage_page");
    }

    public function create(User $user, Page $page)
    {
        return $user->can("manage_page");
    }

    public function update(User $user, Page $page)
    {
        return $user->can("manage_page");
    }

    public function destroy(User $user, Page $page)
    {
        return $user->can("manage_page");
    }
}
