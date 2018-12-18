<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-11-7 19:24
 */

namespace App\Handlers;
use App\Http\Requests\Request;
use App\Models\WechatMenu;

/**
 * 微信菜单工具类
 *
 * Class WechatMenuHandler
 * @package App\Handlers
 */
class WechatMenuHandler
{

    /**
     * 处理分类层级关系
     *
     * @param $menus
     * @param int $parent
     * @param int $lavel
     * @return array
     */
    public function level($menus, $parent = 0, $lavel = 0)
    {
        $newMenus = [];
        foreach($menus as $menu){
            if($menu->parent == $parent){
                $menu->lavel = $lavel;
                $menu->is_end = 0;
                $newMenus[] = $menu;

                if($tmp = call_user_func_array([$this, __FUNCTION__],[$menus, $menu->id, ($lavel+1) ])){
                    $newMenus = !empty($newMenus) ? array_merge($newMenus, $tmp) : $tmp;
                }
            }
        }

        return $newMenus;
    }

    /**
     * 递归处理导航菜单
     *
     * @param $menus
     * @param int $parent
     * @return array
     */
    public function withRecursionWeixinServer($menus, $parent = 0){
        $newMenus = [];
        foreach($menus as $menu){
            if($menu->parent == $parent){
                $child = call_user_func_array([$this, __FUNCTION__],[$menus, $menu->id ]);
                if($child){
                    $tmp = [
                        'name' => $menu->name,
                        'sub_button' => $child,
                    ];
                }else{
                    $tmp = [
                        'type' => $menu->type,
                        'name' => $menu->name,
                    ];

                    $tmp = array_merge($tmp,$this->getMenuValue($menu));
                }

                $newMenus[] = $tmp;
            }
        }

        return $newMenus;
    }

    /**
     * 重构微信菜单结构
     *
     * @param $menu
     * @return array
     */
    private function getMenuValue($menu){
        $tmp = [];
        switch (strtolower($menu->type)){
            case 'view':
                $tmp['type'] = 'view';
                $tmp['url'] = get_json_params($menu->data,'link');
                break;
            case 'text':
                $tmp['type'] = 'click';
                $tmp['key'] = 'm_'.$menu->id;
                break;
            case 'event':
                $tmp['type'] = 'click';
                $tmp['key'] = 'm_'.$menu->id;
                break;
            case 'content':
                $tmp['type'] = 'click';
                $tmp['key'] = 'm_'.$menu->id;
                break;
            case 'media_id':
                $tmp['type'] = 'media_id';
                $tmp['media_id'] = get_json_params($menu->data,'media_id');
                break;
            case 'view_limited':
                $tmp['type'] = 'view_limited';
                $tmp['media_id'] = get_json_params($menu->data,'media_id');
                break;
        }

        return $tmp;
    }


}