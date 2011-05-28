<?php defined('SYSPATH') or die('No direct script access.');

/**
 * TODO: Error handling
 * TODO: Has-many-through relations
 * TODO: Simple search
 * TODO: Delete
 * TODO: Column order by
 */
abstract class Controller_Admin_Prefab extends Controller_Admin_Default {
	
	protected $_view = '';
	protected $_model = '';
	protected $_fields = array();

	protected $config_browse = array();
	protected $config_edit = array();

	/**
	 * Maps database types to edit types for
	 * automagic edit screen generation
	 */
	protected $_edit_typemap = array(
		array('source' => array('type' => 'int', 'key' => 'PRI'), 'config' => array('type' => 'display')),
		array('source' => array('data_type' => 'varchar'), 'config' => array('type' => 'input')),
		array('source' => array('data_type' => 'tinyint unsigned'), 'config' => array('type' => 'checkbox')),
		array('source' => array('type' => 'int'), 'config' => array('type' => 'input')),
		array('source' => array('data_type' => 'text'), 'config' => array('type' => 'textarea')),
		array('source' => array(), 'config' => array('type' => 'input')),
		);

	/**
	 * Automatic mapping for browse fields.
	 */
	protected $_browse_typemap = array(
		array('source' => array(), 'config' => array('type' => 'display')),
		);

	public function before()
	{
		parent::before();

		if ( ! $this->_view)
		{
			$this->_view = 'admin/prefab_' . $this->request->action();
		}
		$this->_view = View::factory($this->_view);
		$this->_view->request = $this->request;

		$name = $this->_model;

		if ( ! $this->_model)
		{
			$name = explode('_', get_class($this));
			$name = end($name);
		}

		$id = $this->request->param('id');
		$this->_model = ORM::factory($name, $id);

		if ( ! $this->_fields)
		{
			$this->_fields = $this->_model->list_columns();
		}

		$config = Kohana::config('prefab');
		$menu = array();
		foreach ($config['menu'] as $key => $item)
		{
			$menu[$key] = Route::get($item['route'])->uri($item['params']);
		}

		$this->_view->title = $name;
		$this->_view->menu = $menu;
		$this->_view->_fields = $this->_fields;
	}

	public function after()
	{
		$this->template->content = $this->_view;

		parent::after();
	}

	public function action_index($id = null)
	{

		$config = $this->automap($this->_browse_typemap, $this->_model);
		$config = Arr::merge($config, $this->config_browse);

		$plugins = Prefab::get_plugins($config, $this->_model);

		foreach ($plugins as $key => $plugin)
		{
			$plugin->apply_browse_filter();
		}

		$pagination = Pagination::factory(array(
			'total_items' => $this->_model->count_all(),
			'items_per_page' => 10,
			));

		$records = $this->_model
			->limit($pagination->items_per_page)
			->offset($pagination->offset)
			->find_all()->as_array();

		// generate browse content
		foreach ($records as &$record)
		{
			$model = $record;
			$row = array();

			foreach ($plugins as $key => $plugin)
			{
				$row[$key] = $plugin
					->load($model)
					->render_browse();
			}

			$record = $row;
		}

		$this->_view->page_links = $pagination->render();
		$this->_view->records = $records;
	}

	public function action_edit($id = null)
	{
		if ($_POST)
		{
			$this->_model->values($_POST);
		}

		$config = $this->automap($this->_edit_typemap, $this->_model);
		$config = Arr::merge($config, $this->config_edit);

		$screen_objects = Prefab::get_plugins($config, $this->_model);

		$this->_view->screen_objects = $screen_objects;
		$this->_view->model = $this->_model;

		// save/update data
		if ($_POST)
		{
			// prepare array with values
			$values = array();
			foreach ($screen_objects as $key => $object)
			{
				$values[$key] = $object->get_save_value();
			}

			$this->_model->values($values);

			if ($this->_model->check())
			{
				$this->_model->save();
				$this->request->redirect($this->request->uri(array('id' => $this->_model->pk())));
			}
			else
			{
				echo 'errors!';
			}
		}
	}

	/**
	 * Automatically generate config array
	 */
	protected function automap(array $typemap, $model)
	{
		$config = array();

		// walk every field in this record
		foreach ($this->_fields as $key => $field)
		{
			$a = array();

			// check if there's a matching typemap for this field type based on its sql properties
			foreach ($typemap as $typemap_item)
			{
				foreach ($typemap_item['source'] as $prop_name => $prop_value)
				{
					if (Arr::get($field, $prop_name) != $prop_value)
						continue 2;
				}

				$a = $typemap_item['config'];
				break;
			}

			// do some further processing
			$a['mandatory'] = 0;
			$a['column_name'] = $key;

			// check for foreign keys
			foreach ($model->_belongs_to as $relation)
			{
				if (Arr::get($relation, 'foreign_key') == $field['column_name'])
				{
					$a['type'] = 'select';
					$a['model'] = $relation['model'];
					break;
				}
			}
			
			// save to config array
			$config[$key] = $a;
		}

		return $config;
	}

	public function action_delete($id)
	{
		/*
		$ref = $this->request->uri(array('action' => 'index', 'id' => null));

		if (Arr::get($_GET, 'sure'))
		{
			ORM::factory('vegetable', $id)->delete();
			Flash::factory()->add('Record was removed');
			$this->request->redirect($ref);
		}

		$this->template->content = View::factory('admin/delete')->set('ref', $ref);
		*/
	}

}
