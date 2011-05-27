<?

class Prefab_Select extends Prefab_Plugin {

	public function render_edit() 
	{
		$foreign_model = ORM::factory($this->params['model']);
		$this->params['label'] = $this->get_foreign_label($foreign_model);

		$s = Form::select(
			$this->data_structure['column_name'], 
			$foreign_model->find_all()->as_array('id',$this->params['label']), 
			$this->value);

		return $s;
	}

	public function render_browse()
	{
		$foreign_alias = $this->get_foreign_alias();
		$foreign_label = $this->get_foreign_label($this->model->$foreign_alias);
		$s = $this->model->$foreign_alias->$foreign_label;
		return $s;
	}

	public function apply_browse_filter()
	{
		$alias = $this->get_foreign_alias();
		if (Arr::get($this->model->_belongs_to, $alias))
		{
			$this->model->with($alias);
		}
	}

	/**
	 * Return alias of foreign table
	 */
	protected function get_foreign_alias()
	{
		return str_replace($this->foreign_key_suffix, '', $this->data_structure['column_name']);
	}

	/**
	 * Return field to use as text label for foreign table.
	 * If not specified get the first string field from forein table.
	 */
	protected function get_foreign_label($foreign_model)
	{
		$label = '';

		if (Arr::get($this->params, 'label'))
		{
			return $this->params['label'];
		}
		else
		{
			foreach ($foreign_model->list_columns() as $column)
			{
				if ($column['type'] == 'string')
				{
					return $column['column_name'];
				}
			}
		}


	}
 
}

