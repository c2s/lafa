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
use App\Models\Link;

/**
 * 链接授权策略
 *
 * Class LinkPolicy
 * @package App\Policies
 */
class LinkPolicy extends Policy
{

    public function index(User $user, Link $link)
    {
        return $user->can('manage_links');
    }

    public function create(User $user, Link $link)
    {
        return $user->can('manage_links');
    }

    public function update(User $user, Link $link)
    {
        return $user->can('manage_links');
    }

    public function destroy(User $user, Link $link)
    {
        return $user->can('manage_links');
    }
}
