<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Observers;

use App\Models\User;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

/**
 * 用户观察者
 *
 * Class UserObserver
 * @package App\Observers
 */
class UserObserver
{

    public function creating(User $user)
    {
        //
    }

    public function updating(User $user)
    {
        //
    }
}