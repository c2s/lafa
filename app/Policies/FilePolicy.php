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
use App\Models\File;

/**
 * 媒体授权策略
 *
 * Class WechatPolicy
 * @package App\Policies
 */
class FilePolicy extends Policy
{
    public function images(User $user, File $file)
    {
        return $user->can("manage_images");
    }

    public function annex(User $user, File $file)
    {
        return $user->can("manage_annex");
    }

}
