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
use App\Models\Wechat;

/**
 * 微信公众号授权策略
 *
 * Class WechatPolicy
 * @package App\Policies
 */
class WechatPolicy extends Policy
{
    public function update(User $user, Wechat $wechat)
    {
        return $user->can("manage_wechat");
    }

    public function destroy(User $user, Wechat $wechat)
    {
        return $user->can("manage_wechat");
    }

    public function show(User $user, Wechat $wechat){
        return $user->can("manage_wechat");
    }
}
