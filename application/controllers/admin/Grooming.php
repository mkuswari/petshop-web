<?php

class Grooming extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/Grooming_model', 'Grooming_model');
		if ($this->session->userdata("logged_in") !== "admin") {
			redirect("/");
		}
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

	public function detail($id)
	{
		$data["page_title"] = "Detail Data Grooming";
		$data["grooming"] = $this->Grooming_model->getGroomingById($id);

		$this->load->view("admin/groomings/detail_view", $data);
	}

	public function delete($id)
	{
		$this->Grooming_model->deleteGrooming($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect("kelola-grooming");
	}
}
