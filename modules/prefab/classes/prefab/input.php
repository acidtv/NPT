<?

class Prefab_Input extends Prefab_Plugin {

	public function render_edit() 
	{
		$s = Form::input($this->data_structure['column_name'], $this->value);
		return $s;
	}
 
}

