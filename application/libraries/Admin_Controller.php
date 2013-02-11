<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends ECART_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = 'écart Admin';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');

		// Login check
		$exception_urls = array('admin/user/login', 'admin/user/logout');
		if(in_array(uri_string(), $exception_urls) == FALSE){
			if($this->user_m->loggedin() == FALSE){
				redirect('admin/user/login');
			}
		}
	}
}

/* End of file Admin_Controller.php */
/* Location: ./application/libraries/Admin_Controller.php */