<?php
defined('BASEPATH') or exit('No direct script access');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		must_login();
		must_admin_and_staff();
	}


	public function index()
	{
		$data["title"] = "Dashboard";
		$data["user"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$this->load->view("_components/backend/header", $data);
		$this->load->view("_components/backend/sidebar");
		$this->load->view("_components/backend/topbar", $data);
		$this->load->view("backend/dashboard_view");
		$this->load->view("_components/backend/footer");
	}
}
