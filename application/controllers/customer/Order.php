<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Order extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function transfer()
	{
		$data["page_title"] = "Lengkapi Detail Pesanan";



		$this->load->view("customer/order/payment/transfer_view", $data);
	}

	public function processOrder()
	{

		$dataOrder = array(
			"customer_id" => $this->input->post("customer_id"),
			"receipent_name" => $this->input->post("receipent_name"),
			"receipent_phone" => $this->input->post("receipent_phone"),
			"receipent_address" => $this->input->post("receipent_address"),
			"total_payment" => $this->input->post("total_payment")
		);
		$idOrder = $this->Product_model->addOrder($dataOrder);
		// input detail order disini
		if ($cart = $this->cart->contents()) {
			foreach ($cart as $item) {
				$dataDetailOrder = array(
					"order_id" => $idOrder,
					"item_id" => $item["id"],
					"qty" => $item["qty"],
					"total_price" => $item["qty"] * $item["price"]
				);
				$this->Product_model->addOrderDetail($dataDetailOrder);
			}
		}
		$this->cart->destroy();
		redirect("checkout-success");
	}
}
