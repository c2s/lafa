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
use App\Models\Project;

class ProjectPolicy extends Policy
{
    public function update(User $user, Project $project)
    {
        // return $project->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Project $project)
    {
        return true;
    }
}
