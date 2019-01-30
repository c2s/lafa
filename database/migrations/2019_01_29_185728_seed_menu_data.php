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
        Menu::create(['parent' => 1, 'name' => '用户管理', 'ename' => 'manage_users', 'icon' => 'icon-user', 'code' => 'b', 'path' => 'users', 'sort'=> 1, 'status' => 1]);
        Menu::create(['parent' => 1, 'name' => '权限管理', 'ename' => 'manage_permissions', 'icon' => 'icon-circle', 'code' => 'c', 'path' => 'permissions', 'sort'=> 2, 'status' => 1]);
        Menu::create(['parent' => 1, 'name' => '角色管理', 'ename' => 'manage_roles', 'icon' => 'icon-group', 'code' => 'd', 'path' => 'roles', 'sort'=> 3, 'status' => 1]);
        Menu::create(['parent' => 1, 'name' => '菜单管理', 'ename' => 'manage_menu', 'icon' => 'icon-group', 'code' => 'e', 'path' => 'menu', 'sort'=> 4, 'status' => 1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Menu::where('id', '>', 0)->delete();
    }
}
