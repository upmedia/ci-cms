<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_M extends ECART_Model {

	protected $_table_name = 'pages';
	protected $_order_by = 'parent_id, order';
	public $_rules = array(
		'parent_id' => array('field' => 'parent_id', 'label' => 'Parent', 'rules' => 'trim|intval'),
		'template' => array('field' => 'template', 'label' => 'Template', 'rules' => 'trim|required|xss_clean'),
		'title' => array('field' => 'title', 'label' => 'Title', 'rules' => 'trim|required|max_length[100]|xss_clean'),
		'slug' => array('field' => 'slug', 'label' => 'Slug', 'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'),
		#'order' => array('field' => 'order', 'label' => 'Order', 'rules' => 'trim'),
		'body' => array('field' => 'body', 'label' => 'Body', 'rules' => 'trim|required|xss_clean'),
	);

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_new()
	{
		$page = new stdClass();
		$page->title = '';
		$page->template = 'page'; 
		$page->slug = '';
		$page->parent_id = 0;
		$page->body = '';
		return $page;
	}

	public function delete($id)
	{
		// Delete a page
		parent::delete($id);
		
		// Reset parent ID for its children
		$this->db->set(array('parent_id' => 0))->where('parent_id', $id)->update($this->_table_name);
	}

	public function save_order($pages)
	{
		if (count($pages)){
			foreach ($pages as $order => $page) {
				if ($page['item_id'] != '') {
					$data = array('parent_id' => (int)$page['parent_id'], 'order' => $order);
					$this->db->set($data)->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
				}
			}
		}
	}

	public function get_nested()
	{
		$this->db->order_by($this->_order_by);
		$pages = $this->db->get('pages')->result_array();

		$array = array();
		foreach ($pages as $page) {
			if(!$page['parent_id']){
				$array[$page['id']] = $page;
			}
			else{
				$array[$page['parent_id']]['children'][] = $page;
			}
		}
		return $array;
	}

	public function get_with_parent($id = NULL, $single = FALSE)
	{	
		$this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
		$this->db->join('pages p','pages.parent_id = p.id', 'LEFT');
		return parent::get($id, $single);
	}

	public function get_no_parents()
	{
		# // fatch pages with no parents
		$this->db->select('id, title');
		$this->db->where('parent_id', 0);
		$pages = parent::get();

		// Return key => values pair array
		$array = array(0 => 'No parent');
		if (count($pages)){
			foreach ($pages as $page) {
				$array[$page->id] = $page->title;
			}
		}
		return $array;
	}
	public function get_archive_link()
	{
		$page = parent::get_by(array('template'=>'news_archive'), TRUE); // only i single row
		return isset($page->slug) ? $page->slug : '';
	}

}

/* End of file page_m.php */
/* Location: ./application/models/page_m.php */