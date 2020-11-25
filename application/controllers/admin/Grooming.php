<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Grooming extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		must_login();
		must_admin_and_staff();

		$this->load->model('Grooming_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["page_title"] = "Kelola Grooming";
		$data["groomings"] = $this->Grooming_model->getAllGroomings();

		$this->load->view("backend/groomings/index_view", $data);
	}

	public function create()
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["page_title"] = "Tambah Data Grooming";
		$data["groomings"] = $this->Grooming_model->getAllGroomings();
		$data["packages"] = $this->Grooming_model->getAllGroomingPackages();

		$this->form_validation->set_rules("customer_name", "Nama Customer", "required");
		$this->form_validation->set_rules("customer_phone", "Phone Customer", "required");
		$this->form_validation->set_rules("customer_address", "Alamat Customer", "required");
		$this->form_validation->set_rules("pet_type", "Tipe Peliharaan", "required");
		$this->form_validation->set_rules("package_id", "Paket Grooming", "required");
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("backend/groomings/create_view", $data);
		} else {
			$customerName = $this->input->post("customer_name");
			$customerPhone = $this->input->post("customer_phone");
			$customerAddress = $this->input->post("customer_address");
			$petType = $this->input->post("pet_type");
			$groomingStatus = "Diterima";
			$packageId =  $this->input->post("package_id");
			$notes = $this->input->post("notes");
			$dateCreated = time();

			$groomingData = [
				"customer_name" => $customerName,
				"customer_phone" => $customerPhone,
				"customer_address" => $customerAddress,
				"pet_type" => $petType,
				"grooming_status" => $groomingStatus,
				"package_id" => $packageId,
				"notes" => $notes,
				"date_created" => $dateCreated
			];

			$this->Grooming_model->addGroomingData($groomingData);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect("kelola-grooming");
		}
	}

	public function update()
	{
		$groomingId = $this->input->post("grooming_id");
		$groomingStatus = $this->input->post("grooming_status");
		$this->Grooming_model->updateGroomingStatus($groomingId, $groomingStatus);
		$this->session->set_flashdata('message', 'Diubah');
		redirect("kelola-grooming");
	}

	public function detail($id)
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->input->post("email")])->row_array();
		$data["page_title"] = "Detail Data Grooming";
		$data["grooming"] = $this->Grooming_model->getGroomingById($id);

		$this->load->view("backend/groomings/detail_view", $data);
	}

	public function delete($id)
	{
		$this->Grooming_model->deleteGrooming($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect("kelola-grooming");
	}
}
