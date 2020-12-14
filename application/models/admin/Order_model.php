<?php
class Order_model extends CI_Model
{

    public function getAllOrders()
    {
        return $this->db->get("orders")->result_array();
    }

    public function updateOrderStatus($orderId, $orderStatus)
    {
        $this->db->set("order_status", $orderStatus);
        $this->db->where("order_id", $orderId);
        $this->db->update("orders");
    }

    public function deleteOrder($id)
    {
        $this->db->where("order_id", $id);
        $this->db->delete("orders");
    }

    public function showDetailOrder($id)
    {
        $this->db->select("*");
        $this->db->from("order_details");
        $this->db->join("items", "items.item_id = order_details.item_id");
        $this->db->where("order_id", $id);
        return $this->db->get()->result_array();
    }
}
