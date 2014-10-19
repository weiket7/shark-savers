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

    $a = new Ambassador();
    $a->name1 = "Kimberly Chia";
    $a->name2 = "谢静仪";
    $a->sub1 = "Artiste/Youth Ambassador";
    $a->sub2 = "艺人";
    $a->image = "kimberly-chia.jpg";
    $a->save();
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
