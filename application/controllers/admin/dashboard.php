<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		// Fetch recently modified articles
		$this->load->model('article_m');
		$this->db->order_by('modified DESC');
		$this->db->limit(5);
		$this->data['recent_articles'] = $this->article_m->get();

		$this->data['subview'] = 'admin/dashboard/index';
		$this->load->view('admin/_layout_main', $this->data);	
	}
	public function modal()
	{
		$this->load->view('admin/_layout_modal', $this->data);	
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */
