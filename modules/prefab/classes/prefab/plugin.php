<?

abstract class Prefab_Plugin {

	/**
	 * Keep field params
	 */
	protected $params = array();

	/**
	 * Keep database structure of current field
	 */
	protected $data_structure = array();

	protected $value = null;

	protected $model = null;

	protected $foreign_key_suffix = '_id';

	public function __construct(array $params, $model = null)
	{
		$this->params = $params;
		$this->load($model);
	}

	/**
	 * Load new model with data into plugin
	 */
	public function load($model)
	{
		if ($model)
		{
			$this->model = $model;
			$column_name = $this->params['column_name'];
			$this->value = $model->$column_name;

			// set database structure if it doesnt exist already
			if ( ! $this->data_structure)
			{
				$this->data_structure = Arr::get($model->list_columns(), $column_name);
			}
		}

		return $this;
	}

	/**
	 * Return field name
	 */
	public function name()
	{
		return Arr::get($this->params, 'name', $this->data_structure['column_name']);
	}

	/**
	 * Return value prepared for saving
	 */
	public function get_save_value()
	{
		return $this->value;
	}

	/**
	 * Possibility to set some filters before browse on model
	 */
	public function apply_browse_filter()
	{
		return;
	}

	/**
	 * Render browse field
	 */
	public function render_browse()
	{
		return $this->value;
	}

	/**
	 * Render the field for display
	 */
	abstract public function render_edit();
 
}

