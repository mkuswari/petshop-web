<?php

class Grooming extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/Grooming_model', 'Grooming_model');
	}

	public function index()
	{
		$data["page_title"] = "Kelola Grooming Pelanggan";
		$data["groomings"] = $this->Grooming_model->getAllGroomings();

		$this->load->view("admin/groomings/index_view", $data);
	}

	public function changeStatus($id)
	{
		$groomingId = $this->input->post("grooming_id");
		$groomingStatus = $this->input->post("grooming_status");
		$this->Grooming_model->updateGroomingStatus($groomingId, $groomingStatus);
		$this->session->set_flashdata('message', 'Diubah');
		redirect('kelola-grooming');
	}
}
