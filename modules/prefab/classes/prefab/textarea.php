<?

class Prefab_Textarea extends Prefab_Plugin {

	public function render_edit() 
	{
		$s = Form::textarea($this->data_structure['column_name'], $this->value);
		return $s;
	}
 
}

