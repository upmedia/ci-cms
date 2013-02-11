<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_M extends ECART_Model {

	protected $_table_name = 'users';
	protected $_order_by = 'name';
	public $_rules = array(
		'email' => array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|xss_clean'),
		'password' => array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required'),		
	);
	public $_rules_admin = array(
		'name' => array('field' => 'name', 'label' => 'Name', 'rules' => 'trim|required|xss_clean'),
		'email' => array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'),
		'password' => array('field' => 'password', 'label' => 'Password', 'rules' => 'trim'),
		'password_confirm' => array('field' => 'password_confirm', 'label' => 'Confirm password', 'rules' => 'trim|matches[password]'),		
	);

	public function __construct()
	{
		parent::__construct();
		
	}
	public function login(){
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password'))
			), TRUE);

		if (count($user)) {
			// log in user
			$data = array(
					'name' => $user->name,
					'email' => $user->email,
					'id' => $user->id,
					'loggedin' => TRUE
			);
			$this->session->set_userdata($data);
		}		
	}

	public function logout(){
		$this->session->sess_destroy();
	}

	public function loggedin(){
		return (bool)$this->session->userdata('loggedin');
	}

	public function hash($string){
		return hash('sha512', $string . config_item('encryption_key'));
	}

	public function get_new()
	{
		$user = new stdClass();
		$user->name = '';
		$user->email = '';
		$user->password = '';
		return $user;
	}

}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */