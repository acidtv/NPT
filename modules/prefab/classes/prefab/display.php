<?

class Prefab_Display extends Prefab_Plugin {

	public function render_edit() 
	{
		$s = htmlentities($this->value);
		return $s;
	}
 
}

