<?php

/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeedRolesAndPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 清除缓存
        app()['cache']->forget('spatie.permission.cache');

        // 先创建权限
        Permission::create(['name' => 'manage_develop', 'remarks'=> '系统开发']);
        Permission::create(['name' => 'manage_log', 'remarks'=> '操作日志']);
        Permission::create(['name' => 'manage_system', 'remarks'=> '系统管理']);
        Permission::create(['name' => 'manage_users', 'remarks'=> '用户管理']);
        Permission::create(['name' => 'manage_permissions', 'remarks'=> '权限管理']);
        Permission::create(['name' => 'manage_roles', 'remarks'=> '角色管理']);
        Permission::create(['name' => 'manage_setting', 'remarks'=> '系统设置']);
        Permission::create(['name' => 'manage_site_basic', 'remarks'=> '站点信息']);
        Permission::create(['name' => 'manage_site_company', 'remarks'=> '公司信息']);
        Permission::create(['name' => 'manage_site_contact', 'remarks'=> '联系方式']);
        Permission::create(['name' => 'manage_links', 'remarks'=> '友情链接']);
        Permission::create(['name' => 'manage_navigation', 'remarks'=> '栏目导航']);
        Permission::create(['name' => 'manage_wechat', 'remarks'=> '微信管理']);
        Permission::create(['name' => 'manage_content', 'remarks'=> '内容管理']);
        Permission::create(['name' => 'manage_category', 'remarks'=> '分类管理']);
        Permission::create(['name' => 'manage_article', 'remarks'=> '文章管理']);
        Permission::create(['name' => 'manage_page', 'remarks'=> '页面管理']);
        Permission::create(['name' => 'manage_images', 'remarks'=> '图片管理']);
        Permission::create(['name' => 'manage_slide', 'remarks'=> '幻灯管理']);
        Permission::create(['name' => 'manage_block', 'remarks'=> '区块管理']);
        Permission::create(['name' => 'manage_annex', 'remarks'=> '附件管理']);
        Permission::create(['name' => 'manage_xcx', 'remarks'=> '小程序管理']);
        Permission::create(['name' => 'manage_media', 'remarks'=> '媒体管理']);
        Permission::create(['name' => 'manage_form', 'remarks'=> '表单管理']);

        // 创建超级管理角色，并赋予权限
        $admin = Role::create(['name' => 'Administrator', 'remarks'=> '超级管理员']);
        $admin->givePermissionTo('manage_develop');
        $admin->givePermissionTo('manage_log');
        $admin->givePermissionTo('manage_system');
        $admin->givePermissionTo('manage_users');
        $admin->givePermissionTo('manage_permissions');
        $admin->givePermissionTo('manage_roles');
        $admin->givePermissionTo('manage_setting');
        $admin->givePermissionTo('manage_site_basic');
        $admin->givePermissionTo('manage_site_company');
        $admin->givePermissionTo('manage_site_contact');
        $admin->givePermissionTo('manage_links');
        $admin->givePermissionTo('manage_navigation');
        $admin->givePermissionTo('manage_wechat');
        $admin->givePermissionTo('manage_content');
        $admin->givePermissionTo('manage_category');
        $admin->givePermissionTo('manage_article');
        $admin->givePermissionTo('manage_page');
        $admin->givePermissionTo('manage_images');
        $admin->givePermissionTo('manage_slide');
        $admin->givePermissionTo('manage_block');
        $admin->givePermissionTo('manage_annex');
        $admin->givePermissionTo('manage_xcx');
        $admin->givePermissionTo('manage_media');
        $admin->givePermissionTo('manage_form');

        // 创建站长角色，并赋予权限
        $founder = Role::create(['name' => 'Founder', 'remarks'=> '创始人']);
        $founder->givePermissionTo('manage_log');
        $founder->givePermissionTo('manage_system');
        $founder->givePermissionTo('manage_users');
        $founder->givePermissionTo('manage_permissions');
        $founder->givePermissionTo('manage_setting');
        $founder->givePermissionTo('manage_article');
        $founder->givePermissionTo('manage_page');
        $founder->givePermissionTo('manage_slide');
        $founder->givePermissionTo('manage_block');
        $founder->givePermissionTo('manage_annex');
        $founder->givePermissionTo('manage_wechat');
        $founder->givePermissionTo('manage_xcx');
        $founder->givePermissionTo('manage_media');
        $founder->givePermissionTo('manage_form');

        // 创建管理员角色，并赋予权限
        $maintainer = Role::create(['name' => 'Maintainer', 'remarks'=> '站长']);
        $maintainer->givePermissionTo('manage_system');
        $maintainer->givePermissionTo('manage_users');
        $maintainer->givePermissionTo('manage_setting');
        $maintainer->givePermissionTo('manage_article');
        $maintainer->givePermissionTo('manage_page');
        $maintainer->givePermissionTo('manage_slide');
        $maintainer->givePermissionTo('manage_block');
        $maintainer->givePermissionTo('manage_annex');
        $maintainer->givePermissionTo('manage_form');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 清除缓存
        app()['cache']->forget('spatie.permission.cache');

        // 清空所有数据表数据
        $tableNames = config('permission.table_names');

        Model::unguard();
        DB::table($tableNames['role_has_permissions'])->delete();
        DB::table($tableNames['model_has_roles'])->delete();
        DB::table($tableNames['model_permissions'])->delete();
        DB::table($tableNames['roles'])->delete();
        DB::table($tableNames['permissions'])->delete();
        Model::reguard();
    }
}
