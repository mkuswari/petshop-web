<?php
class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Order_model', 'Order_model');
        if ($this->session->userdata("logged_in") !== "admin") {
            redirect("/");
        }
    }

    public function index()
    {
        $data["page_title"] = "Kelola Orderan";
        $data["orders"] = $this->Order_model->getAllOrders();

        $this->load->view("admin/orders/index_view", $data);
    }

    public function changeOrderStatus()
    {
        $orderId = $this->input->post("order_id");
        $orderStatus = $this->input->post("order_status");
        $this->Order_model->updateOrderStatus($orderId, $orderStatus);
        $this->session->set_flashdata('message', 'Diubah');
        redirect('kelola-orderan');
    }

    public function deleteOrder($id)
    {
        $this->Order_model->deleteOrder($id);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect("kelola-orderan");
    }

    public function detailOrder($id)
    {
        $data["page_title"] = "Detail Orderan";
        $data["items"] = $this->Order_model->showDetailOrder($id);

        $this->load->view("admin/orders/invoice_view", $data);
    }
}
