<?

class Model_User extends Model_Auth_User {
 
	// Relationships
	protected $_has_many = array(
		'user_tokens' => array('model' => 'user_token'),
		'roles'       => array('model' => 'role', 'through' => 'roles_users'),
		//'groups'      => array('model' => 'group', 'through' => 'groups_users'),
	);

	// Validation rules
	protected $_rules = array(
		'username' => array(),
		'password' => array(),

		/*
		'username' => array(
			'not_empty'  => NULL,
			'min_length' => array(2), // was 4 chars
			'max_length' => array(32),
			'regex'      => array('/^[-\pL\pN_.]++$/uD'),
		),
		'password' => array(
			'not_empty'  => NULL,
			'min_length' => array(5),
			'max_length' => array(42),
		),
		'password_confirm' => array(
			'matches'    => array('password'),
		),
		'email' => array(
			'not_empty'  => NULL,
			'min_length' => array(4),
			'max_length' => array(127),
			'email'      => NULL,
		),
		*/
	);

	// default sorting
	protected $_sorting = array('username' => 'ASC');
	
	
	/**
	 * Return all users
	 */
	public function list_users()
		{
		$users = $this->find_all()->as_array('id', 'username');

		return $users;
		}

}

?>
