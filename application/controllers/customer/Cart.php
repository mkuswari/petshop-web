<?php

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer/Product_model', 'Product_model');
        if ($this->session->userdata("logged_in") !== "customer") {
            redirect("login");
        }
    }

    public function index()
    {
        $data["page_title"] = "Keranjang Saya";
        $this->load->view("customer/cart/index_view", $data);
    }

    public function addToCart($id)
    {
        $barang = $this->Product_model->find($id);
        $data = array(
            "id" => $barang->item_id,
            "qty" => 1,
            "price" => $barang->price,
            "name" => $barang->name,
        );
        $this->cart->insert($data);
        $this->session->set_flashdata('message', 'Ditambah ke Keranjang');
        redirect("detail-keranjang");
    }

    public function emptyCart()
    {
        $this->cart->destroy();
        redirect('detail-keranjang');
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

    public function checkoutSuccess()
    {
        $data["page_title"] = "Checkout Berhasil";

        $this->load->view("customer/cart/checkout_view", $data);
    }

    public function showMyOrder()
    {
        $data["page_title"] = "Orderan Saya";

        $this->load->view("customer/cart/order_view", $data);
    }
}
