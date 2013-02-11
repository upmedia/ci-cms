<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_Controller extends ECART_Controller {

	public function __construct()
	{
		parent::__construct();

		// load stuff
		$this->load->model('page_m');
		$this->load->model('article_m');

		// fetch navigation
		$this->data['menu'] = $this->page_m->get_nested();
		$this->data['news_archive_link'] = $this->page_m->get_archive_link();
		$this->data['meta_title'] = config_item('site_name');
	}
}

/* End of file Frontend_Controller.php */
/* Location: ./application/libraries/Frontend_Controller.php */