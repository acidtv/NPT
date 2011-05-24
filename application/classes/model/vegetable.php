<?php defined('SYSPATH') or die('No direct script access.');

class Model_Vegetable extends ORM {
	
	public $_belongs_to = array(
		'vegetabletype' => array(),
		);
	

}
