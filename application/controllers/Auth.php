<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$data["title"] = "Login";
		$this->load->view("_components/auth/auth_header", $data);
		$this->load->view("auth/login_view");
		$this->load->view("_components/auth/auth_footer");
	}

	public function register()
	{
		$data["title"] = "Register";
		$this->load->view("_components/auth/auth_header", $data);
		$this->load->view("auth/register_view");
		$this->load->view("_components/auth/auth_footer");
	}
}
