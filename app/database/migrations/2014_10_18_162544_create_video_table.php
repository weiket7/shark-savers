<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('video', function($table)
    {
    	//http://laravel.com/docs/4.2/security
        $table->increments('id');
        $table->string('title', 50);
        $table->string('link', 50);
        $table->text('text');
        $table->timestamps();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('video');
	}

}
