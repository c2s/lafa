<?php

/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
	public function up()
	{
		Schema::create('replies', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned()->default(0)->index();
            $table->integer('user_id')->unsigned()->default(0)->index();
            $table->text('content');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('replies');
	}
}
