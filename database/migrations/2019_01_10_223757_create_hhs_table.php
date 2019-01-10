<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHhsTable extends Migration 
{
	public function up()
	{
		Schema::create('hhs', function(Blueprint $table) {
            $table->increments('id');
            
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('hhs');
	}
}
