<?php defined('SYSPATH') or die('No direct access allowed.');

return array
(
	'default' => array
	(
		'type'       => 'mysql',
		'connection' => array(
			/**
			 * The following options are available for MySQL:
			 *
			 * string   hostname
			 * string   username
			 * string   password
			 * boolean  persistent
			 * string   database
			 *
			 * Ports and sockets may be appended to the hostname.
			 */
			'hostname'   => '127.0.0.1',
			'username'   => '',
			'password'   => '',
			'persistent' => FALSE,
			'database'   => '',
			//'dsn'        => 'mysql:host=albert;dbname=i18n',
		),
		'table_prefix' => '',
		'charset'      => '',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	),
);
