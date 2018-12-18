<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Policies;

use App\Models\User;
use App\Models\Block;

/**
 * 区块授权策略
 *
 * Class BlockPolicy
 * @package App\Policies
 */
class BlockPolicy extends Policy
{

    public function index(User $user, Block $block)
    {
        return $user->can('manage_block');
    }

    public function create(User $user, Block $block)
    {
        return false;
//        return $user->can('manage_develop');
    }

    public function update(User $user, Block $block)
    {
        return $user->can('manage_block');
    }

    public function destroy(User $user, Block $block)
    {
        return false;
//        return $user->can('manage_develop');
    }
}
