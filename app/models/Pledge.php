<?php

class Pledge extends Eloquent {

	protected $table = 'pledge';

	public static $rules = array(
  	'first_name'=>'required',
  	'last_name'=>'required',
  	'nric'=>'required',
  	'email'=>'required',
  	'address'=>'required',
  );

}
