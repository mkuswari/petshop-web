<?php
defined('BASEPATH') or exit('No direct access allowed');

class Landing extends CI_Controller
{
	public function index()
	{
		$data["title"] = "Beli Makan untuk Kucing Kesayanganmu";
		$this->load->view("_components/frontend/header", $data);
		$this->load->view("_components/frontend/navbar", $data);
		$this->load->view("landing_view");
		$this->load->view("_components/frontend/footer");
	}
}
