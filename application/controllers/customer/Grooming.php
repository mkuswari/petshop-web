<?php
class Grooming extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer/Grooming_model', 'Grooming_model');
		if ($this->session->userdata("logged_in") !== "customer") {
			redirect("login");
		}
	}

	public function index()
	{
		$data["page_title"] = "Form Registrasi Grooming";
		$data["packages"] = $this->Grooming_model->getAllPackages();

		$this->load->view("customer/groomings/registration_view", $data);
	}
}
