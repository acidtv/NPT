<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Groentekalender extends Controller_Template {

	public function action_index()
	{
	$view = View::factory('groentekalender');

	$vegetables = ORM::factory('vegetable')
		->order_by('month_'.date('n'), 'desc')
		->order_by('month_'.(date('n')+1), 'desc')
		->order_by('month_'.(date('n')+2), 'desc')
		->order_by('name', 'asc')
		->find_all()->as_array();

	$view->vegetables = $vegetables;
	$view->months = array(1 => 'Jan', 'Feb', 'Mrt', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec');
	$view->month = intval(date('m'));

	$this->template->content = $view;
	}

} // End Welcome
