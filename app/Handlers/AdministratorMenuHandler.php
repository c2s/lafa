<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-11-7 19:24
 */

namespace App\Handlers;

/**
 * 后台菜单工具类
 *
 * Class AdministratorMenuHandler
 * @package App\Handlers
 */
class AdministratorMenuHandler
{
    static $administratorMenu = [];

    /**
     * 获取后台菜单
     * @return array
     */
    public function getAdministratorMenu(){
        if(empty(static::$administratorMenu)){
            static::$administratorMenu = $this->filterPermissionWith(config('administrator.menu'));
        }

        return static::$administratorMenu;
    }

    /**
     * 获取后台当前子菜单
     *
     * @return array
     */
    public function getChildrenAdministratorMenu($menuId){
        return $this->filterChildrenAdministratorMenuWith($this->getAdministratorMenu(), $menuId);
    }

    /**
     * 遍历子菜单
     *
     * @param $menus
     * @param $menuId
     * @return array|mixed
     */
    protected function filterChildrenAdministratorMenuWith($menus,$menuId)
    {
        foreach($menus as $menu){
            if($menu['id'] == $menuId){
                return isset($menu['children']) ? $menu['children'] : [];
            }else{
                return isset($menu['children']) && is_array($menu['children'])
                    ? call_user_func_array([$this, __FUNCTION__], [$menu['children'], $menuId]) : [];
            }
        }
        
        return [];
    }

    /**
     * 过滤有权限显示的菜单
     *
     * @param $menus
     * @return array
     */
    protected function filterPermissionWith($menus){
        $newMenu = [];
        foreach($menus as $menu){
            $permission = call_user_func($menu['permission']);
            if($permission == true){
                if(!empty($menu['children'])){
                    $menu['children'] = call_user_func_array([$this, __FUNCTION__], [$menu['children']]);
                }else{
                    $menu['children'] = [];
                }
                $newMenu[] = $menu;
            }
        }
        return $newMenu;
    }



}