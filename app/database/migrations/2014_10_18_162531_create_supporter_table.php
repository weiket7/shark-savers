<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupporterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supporter', function($table)
    {
    	//http://laravel.com/docs/4.2/security
        $table->increments('id');
        $table->string('company', 50);
        $table->string('image', 50);
        $table->string('logo', 50);
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
		Schema::dropIfExists('supporter');
	}

}
