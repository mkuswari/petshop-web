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
}
