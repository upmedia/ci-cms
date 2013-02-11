<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ECART_Controller extends CI_Controller {

	public $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data['errors'] = array();
		$this->data['site_name'] = config_item('site_name');
	}
}

/* End of file ECART_Controller.php */
/* Location: ./application/core/ECART_Controller.php */