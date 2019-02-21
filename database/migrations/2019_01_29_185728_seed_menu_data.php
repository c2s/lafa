<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Menu;

class SeedMenuData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Menu::create(['parent' => 0, 'name' => '系统管理', 'ename' => 'manage_system', 'icon' => 'icon-cog', 'code' => 'a', 'path' => '', 'sort'=> 0, 'status' => 1]);
        Menu::create(['parent' => 1, 'name' => '用户管理', 'ename' => 'manage_users', 'icon' => 'icon-user', 'code' => 'b', 'path' => 'admin/users', 'sort'=> 1, 'status' => 1]);
        Menu::create(['parent' => 1, 'name' => '权限管理', 'ename' => 'manage_permissions', 'icon' => 'icon-circle', 'code' => 'c', 'path' => 'admin/permissions', 'sort'=> 2, 'status' => 1]);
        Menu::create(['parent' => 1, 'name' => '角色管理', 'ename' => 'manage_roles', 'icon' => 'icon-group', 'code' => 'd', 'path' => 'admin/roles', 'sort'=> 3, 'status' => 1]);
        Menu::create(['parent' => 1, 'name' => '菜单管理', 'ename' => 'manage_menu', 'icon' => 'icon-group', 'code' => 'e', 'path' => 'menu', 'sort'=> 4, 'status' => 1]);

        Menu::create(['parent' => 0, 'name' => '站点设置', 'ename' => 'manage_website', 'icon' => 'icon-sitemap', 'code' => 'e1', 'path' => '', 'sort'=> 0, 'status' => 1]);
        Menu::create(['parent' => 6, 'name' => '站点信息', 'ename' => 'manage_website_basic', 'icon' => 'icon-ie', 'code' => 'e1', 'path' => 'admin/site/basic', 'sort'=> 1, 'status' => 1]);
        Menu::create(['parent' => 6, 'name' => '公司信息', 'ename' => 'manage_website_company', 'icon' => 'icon-home', 'code' => 'e1', 'path' => 'admin/site/company', 'sort'=> 2, 'status' => 1]);
        Menu::create(['parent' => 6, 'name' => '联系方式', 'ename' => 'manage_website_contact', 'icon' => 'icon-phone', 'code' => 'e1', 'path' => 'admin/site/contact', 'sort'=> 3, 'status' => 1]);
        Menu::create(['parent' => 6, 'name' => '友情链接', 'ename' => 'manage_website_link', 'icon' => 'icon-link', 'code' => 'e1', 'path' => 'admin/site/link', 'sort'=> 4, 'status' => 1]);
        Menu::create(['parent' => 6, 'name' => '栏目导航', 'ename' => 'manage_website_navigation', 'icon' => 'icon-th-large', 'code' => 'e1', 'path' => 'admin/site/navigation', 'sort'=> 5, 'status' => 1]);

        Menu::create(['parent' => 0, 'name' => '内容管理', 'ename' => 'manage_content', 'icon' => 'icon-bars', 'code' => 'e1', 'path' => '', 'sort'=> 0, 'status' => 1]);
        Menu::create(['parent' => 12, 'name' => '内容分类', 'ename' => 'manage_content_category_artice', 'icon' => 'icon-list-ul', 'code' => 'e1', 'path' => 'admin/content/category/article', 'sort'=> 0, 'status' => 1]);
        Menu::create(['parent' => 12, 'name' => '内容管理', 'ename' => 'manage_content_article_article', 'icon' => 'icon-paste', 'code' => 'e1', 'path' => 'admin/content/article/article', 'sort'=> 0, 'status' => 1]);
        Menu::create(['parent' => 12, 'name' => '视频管理', 'ename' => 'manage_content_article_video', 'icon' => 'icon-play-sign', 'code' => 'e1', 'path' => 'admin/content/category/video', 'sort'=> 0, 'status' => 1]);
        Menu::create(['parent' => 12, 'name' => '页面管理', 'ename' => 'manage_content_page', 'icon' => 'icon-archive', 'code' => 'e1', 'path' => 'admin/content/page', 'sort'=> 0, 'status' => 1]);
        Menu::create(['parent' => 12, 'name' => '幻灯管理', 'ename' => 'manage_content_slide', 'icon' => 'icon-sliders', 'code' => 'e1', 'path' => 'admin/content/slide', 'sort'=> 0, 'status' => 1]);
        Menu::create(['parent' => 12, 'name' => '区块管理', 'ename' => 'manage_content_block', 'icon' => 'icon-check-empty', 'code' => 'e1', 'path' => 'admin/content/block', 'sort'=> 0, 'status' => 1]);
        Menu::create(['parent' => 12, 'name' => '图片管理', 'ename' => 'manage_content_images', 'icon' => 'icon-file-image', 'code' => 'e1', 'path' => 'admin/content/images', 'sort'=> 0, 'status' => 1]);
        Menu::create(['parent' => 12, 'name' => '反馈管理', 'ename' => 'manage_content_form_feedback', 'icon' => 'icon-users', 'code' => 'e1', 'path' => '', 'sort'=> 0, 'status' => 1]);
        Menu::create(['parent' => 12, 'name' => '文件管理', 'ename' => 'manage_content_file', 'icon' => 'icon-file-image', 'code' => 'e1', 'path' => '', 'sort'=> 0, 'status' => 1]);


        Menu::create(['parent' => 0, 'name' => '微信管理', 'ename' => 'manage_wechat', 'icon' => 'icon-bars', 'code' => 'e1', 'path' => '', 'sort'=> 0, 'status' => 1]);
        Menu::create(['parent' => 22, 'name' => '微信设置', 'ename' => 'manage_wechat_set', 'icon' => 'icon-wechat', 'code' => 'e1', 'path' => 'admin/website/wechat', 'sort'=> 0, 'status' => 1]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Menu::delete();
    }
}
