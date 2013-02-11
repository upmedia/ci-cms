<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_M extends ECART_Model {

	protected $_table_name = 'articles';
	protected $_order_by = 'pubdate DESC, id DESC';
	protected $_timestamps = TRUE;
	public $_rules = array(
		'pubdate' => array('field' => 'pubdate', 'label' => 'Publication date', 'rules' => 'trim|exact_length[10]'),
		'title' => array('field' => 'title', 'label' => 'Title', 'rules' => 'trim|required|max_length[100]|xss_clean'),
		'slug' => array('field' => 'slug', 'label' => 'Slug', 'rules' => 'trim|required|max_length[100]|url_title|xss_clean'),
		#'order' => array('field' => 'order', 'label' => 'Order', 'rules' => 'trim'),
		'body' => array('field' => 'body', 'label' => 'Body', 'rules' => 'trim|required|xss_clean'),
	);

	public function __construct()
	{
		parent::__construct();
		
	}

	/**
	 * This instantites a new article with no value
	 * @return Article
	 */
	public function get_new()
	{
		$article = new stdClass();
		$article->title = '';
		$article->slug = '';
		$article->pubdate = date('Y-m-d');
		$article->body = '';
		return $article;
	}

	/**
	 * Filters the query for not yet published articles
	 */
	public function set_published()
	{
		// TODO Replace all instances of pubdate
		$this->db->where('pubdate <=',date('Y-m-d'));
	}

	/**
	 * [get_recent description]
	 * @param  integer $limit [description]
	 * @return [type]         [description]
	 */
	public function get_recent($limit = 3)
	{
		$limit = (int)$limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();
	}
	

}

/* End of file article_m.php */
/* Location: ./application/models/article_m.php */