<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Welcome extends Controller_Admin_Default {

	public function action_index()
	{
		$view = View::factory('admin/welcome');
		$this->template->content = $view;
	}

}
