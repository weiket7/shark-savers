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

    $s = new Supporter();
    $s->company = "Accomplice";
    $s->image = "accomplice.jpg";
    $s->logo = "accomplice-logo.jpg";
    $s->text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sagittis eleifend lectus, vel vehicula lectus sagittis ut. Curabitur volutpat mi nec velit tincidunt euismod a id dolor. Pellentesque egestas nunc tincidunt luctus dignissim. Donec id ex erat. Sed varius scelerisque massa in bibendum. Praesent pulvinar, lectus quis fringilla aliquet, mi justo consequat augue, eget dignissim nisi mauris nec urna. Fusce ultrices egestas tellus eget blandit. Fusce porta accumsan laoreet. Morbi nec ante vehicula, venenatis nunc id, sollicitudin nulla. Pellentesque condimentum dui sit amet rhoncus commodo. Mauris ut efficitur nisi. Duis id sapien vel ex eleifend ullamcorper. Integer aliquam odio ipsum, vitae pretium elit venenatis consectetur. Proin bibendum dolor eu nisi lacinia pharetra. Donec vitae consectetur libero.";
    $s->save();
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
