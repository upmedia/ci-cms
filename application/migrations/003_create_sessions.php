<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_Sessions extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$fields = array(
			'session_id' => array(
				'type' => 'VARCHAR',
				'constraint' => 40,
				'null' => FALSE,
				'default' => 0
			),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => 45,
				'null' => FALSE,
				'default' => 0
			),
			'user_agent' => array(
				'type' => 'VARCHAR',
				'constraint' => '120',
				'null' => FALSE
			),
			'last_activity' => array(
				'type' => 'INT',
				'constraint' => '10',
				'unsigned' => TRUE,
				'default'	=> 0,
				'null' => FALSE
			),
			'user_data' => array(
				'type' => 'TEXT',
				'null' => FALSE
			),
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('session_id', TRUE);
		$this->dbforge->create_table('ci_sessions');
		$this->db->query('ALTER TABLE `ci_sessions` ADD KEY `last_activity_idx` (`last_activity`)');
	}

	public function down() {
		$this->dbforge->drop_table('ci_sessions');
	}

}

/* End of file 003-create_sessions.php */
/* Location: ./application/migrations/003-create_sessions.php */