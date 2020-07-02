<?php

class News_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listNews()
	{
		$query = $this->db->get('news');
		return $query->result_array();
	}

	public function createNews($content)
	{
		$data = array(
			"content" => $content
		);
		$this->db->insert("news", $data);
	}

	public function editNews($id, $content)
	{
		$data = array(
			'content' => $content
		);

		$this->db->where('id', $id);
		$this->db->update('news', $data);
	}

	public function deleteNews($id)
	{
		$this->db->delete('news', array('id' => $id));
	}

	public function getInfo($id)
	{
		$data = array(
			"id" => $id
		);
		$query = $this->db->get_where('news', $data);
		return $query->result_array();
	}
}
