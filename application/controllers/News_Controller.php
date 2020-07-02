<?php

class News_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("News_model");
		$this->load->helper('url');
	}

	public function view()
	{
		$data['news'] = $this->News_model->listNews();
		$this->load->view('templates/news', $data);
	}

	public function saveNews()
	{
		$action = $this->input->post('action');
		$id = $this->input->post('id');
		$content = $this->input->post('content');
		if ($action == 'create') {
			$this->News_model->createNews($content);
		} elseif ($action == 'edit') {
			$this->News_model->editNews($id, $content);
		}
		echo json_encode($content);
	}

	public function deleteNews($id)
	{
		$this->News_model->deleteNews($id);
		redirect(base_url());
	}

	public function getInfo()
	{
		$id = $this->input->post('id');
		$data = $this->News_model->getInfo($id);
		echo json_encode($data[0]);
	}
}
