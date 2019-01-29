<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2019-01-13 19:48
 */

namespace App\Services;


use App\Models\Menu;
use App\Models\UserHasPermissions;

class SystemService extends BaseService
{
    /**
     * 树形菜单
     *
     * @return array
     */
    public function menuTree()
    {
        $menus = Menu::query()->where('status', '=', Menu::NORMAL)->orderByDesc('sort')->get();
        if ($menus) {
            $menus    = $menus->toArray();
            $menuTree = function ($tree, $parentId = 0) use (&$menuTree) {
                $return = array();
                foreach ($tree as $one) {
                    if ($one['parent'] == $parentId) {
                        foreach ($tree as $two) {
                            if ($two['parent'] == $one['id']) {
                                $one['children'] = $menuTree($tree, $one['id']);
                                break;
                            }
                        }
                        $return[] = $one;
                    }
                }

                return $return;
            };
            return $menuTree($menus);
        }
        return [];
    }


    /**
     * 权限.
     *
     * @return array
     */
    public function permissions($userId)
    {
        if (!$userId) {
            return [];
        }
        $userHasPermissions = UserHasPermissions::query()
            ->join('role_has_permissions as rp', 'user_has_roles.role_id', '=', 'rp.role_id')
            ->join('permissions as p', 'rp.permission_id', '=', 'p.id')
            ->select('p.name')
            ->get();
        if ($userHasPermissions) {
            $userHasPermissions = $userHasPermissions->toArray();
            return $userHasPermissions;
        }
        return [];
    }


    /**
     * 权限菜单.
     *
     * @return array
     */
    public function permissionsMenu($userId)
    {
        if (!$userId) {
            return [];
        }
        $permissionsMenu = $this->permissions($userId);
        dd($permissionsMenu);
        return [];
    }
}
