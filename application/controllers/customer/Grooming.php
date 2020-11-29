<?php
class Grooming extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata("logged_in") !== "customer") {
			redirect("login");
		}
	}

	public function index()
	{
		$data["page_title"] = "Form Registrasi Grooming";

		$this->load->view("customer/groomings/registration_view", $data);
	}
}
