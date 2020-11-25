<?php
defined('BASEPATH') or exit('No direct script access');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$data["page_title"] = "Dashboard";

		$this->load->view("admin/dashboard_view", $data);
	}
}
