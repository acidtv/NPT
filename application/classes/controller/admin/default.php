<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Default extends Controller_Admin_Prefab {
	
	public function before()
	{
		if (!Auth::instance()->logged_in(array('admin')))
		{
			$this->request->redirect('/');
		}

		parent::before();
	}

}
