<?

class Prefab_Checkbox extends Prefab_Plugin {

	public function render_edit() 
	{
		$s = Form::checkbox($this->data_structure['column_name'], 1, (bool)$this->value);
		return $s;
	}
 
}

