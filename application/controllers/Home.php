<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$data["title"] = 'Home';
		$data["users"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$this->load->view("frontend/home_view", $data);
	}
}
