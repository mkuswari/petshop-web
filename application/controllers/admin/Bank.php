<?php
defined('BASEPATH') or exit('No direct script access');

class Bank extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data["page_title"] = "Kelola Rekening Pembayaran";

		$this->load->view("admin/banks/index_view", $data);
	}
}
