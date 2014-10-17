<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGridTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grid', function($table)
    {
    	//http://laravel.com/docs/4.2/security
        $table->increments('id');
        $table->string('name1', 50);
        $table->string('name2', 50);
        $table->string('sub1', 50);
        $table->string('sub2', 50);
        $table->string('caption', 50);
        $table->char('type', 1);
        $table->string('vid', 100);
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
		Schema::dropIfExists('grid');
	}

}
