<?

class Prefab {

	/**
	 * Get all plugins for $config
	 */
	public static function get_plugins($config, $model)
	{
		$plugins = array();

		foreach ($config as $key => $params)
		{
			if (is_array($params))
			{
				$plugins[$key] = Prefab::get_plugin(
					$params['type'],	// plugin name
					$params,
					$model
					);
			}
		}

		return $plugins;
	}

	/**
	 * Create a new plugin instance
	 */
	public static function get_plugin($name, array $params, $model)
	{
		$obj = null;
		$name = 'Prefab_'.$name;

		if (class_exists($name))
		{
			$obj = new $name($params, $model);
		}

		return $obj;
	}
 
}

