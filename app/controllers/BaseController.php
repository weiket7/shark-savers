<?php

class BaseController extends Controller {


	public function __construct() {
    	$this->beforeFilter('csrf', array('on'=>'post'));
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	//protected $layout = 'template';	

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
