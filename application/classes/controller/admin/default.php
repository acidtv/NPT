<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Default extends Controller_Template {
	
	public function before()
	{
		if (!Auth::instance()->logged_in(array('admin')))
		{
			$this->request->redirect('/');
		}

		$this->template = 'admin/template';

		parent::before();
	}

}
