<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		must_login();
	}

	public function index()
	{
		$data["title"] = 'Home';
		$data["user"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$this->load->view("frontend/home_view", $data);
	}
}
