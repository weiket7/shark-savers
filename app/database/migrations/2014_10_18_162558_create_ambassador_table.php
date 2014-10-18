<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbassadorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ambassador', function($table)
    {
    	//http://laravel.com/docs/4.2/security
        $table->increments('id');
        $table->string('name1', 50);
        $table->string('name2', 50);
        $table->string('sub1', 50);
        $table->string('image', 50);
        $table->string('sub2', 50);
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
		Schema::dropIfExists('ambassador');
	}

}
