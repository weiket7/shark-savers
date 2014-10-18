<?php

class Supporter extends Eloquent {

	protected $table = 'supporter';

	/*public static $rules = array(
  	'first_name'=>'required',
  	'last_name'=>'required',
  	'nric'=>'required',
  	'email'=>'required',
  	'address'=>'required',
  );*/

	public static function bare () {
		$columns = Schema::getColumnListing('supporter');
		$data = new stdClass();
		foreach($columns as $c) {
			$data->$c = '';
		}
		return $data;
	}

}
