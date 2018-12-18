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
use App\Models\WechatMenu;

/**
 * 微信菜单授权策略
 *
 * Class WechatMenuPolicy
 * @package App\Policies
 */
class WechatMenuPolicy extends Policy
{
    public function update(User $user, WechatMenu $wechat_menu)
    {
        return $user->can("manage_wechat");
    }

    public function destroy(User $user, WechatMenu $wechat_menu)
    {
        return $user->can("manage_wechat");
    }
}
