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
use App\Models\Setting;

/**
 * 设置授权策略
 *
 * Class SettingPolicy
 * @package App\Policies
 */
class SettingPolicy extends Policy
{

    public function basic(User $user, Setting $setting)
    {
        return $user->can("manage_site_basic");
    }

    public function company(User $user, Setting $setting)
    {
        return $user->can("manage_site_company");
    }

    public function contact(User $user, Setting $setting)
    {
        return $user->can("manage_site_contact");
    }
}
