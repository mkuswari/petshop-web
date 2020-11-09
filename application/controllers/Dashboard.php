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
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["page_title"] = "Dashboard";

		$this->load->view("backend/dashboard_view", $data);
	}
}
