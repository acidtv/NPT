<?php

Route::set('admin', 'admin(/<controller>(/<action>(/<id>)))')
	->defaults(array(
		'directory'	 => 'admin',
		'controller' => 'welcome',
		'action'     => 'index',
	));

