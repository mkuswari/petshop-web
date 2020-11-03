<?php
defined('BASEPATH') or exit('No direct access allowed');

class Landing extends CI_Controller
{
	public function index()
	{
		$data["title"] = "Beli Makan untuk Kucing Kesayanganmu";
		$data["user"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$this->load->view("_components/frontend/header", $data);
		$this->load->view("_components/frontend/navbar", $data);
		$this->load->view("landing_view");
		$this->load->view("_components/frontend/footer");
	}
}
