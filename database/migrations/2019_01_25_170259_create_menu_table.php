<?php

/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2019-01-25 17:07:18
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent')->default(0)->comment('父菜单');
            $table->string('name', 25)->comment('菜单名称');
            $table->string('enname', 25)->comment('英文名称');
            $table->string('icon', 50)->comment('图标');
            $table->string('code', 25)->comment('菜单code');
            $table->string('route', 25)->comment('路由');
            $table->integer('status', 1)->comment('状态');

            $table->timestamps();
            $table->softDeletes();

            $table->index('status', 'status_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
