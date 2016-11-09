<?php 
class Member_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }
        public function get_user_cart($member_id) {
                $query = $this->db->query("select * from orders where member_id = '".$member_id."' AND order_status = 'CART'");
                return $query->result_array();
        }
        public function get_cart_items($order_id) {
                $query = $this->db->query("select * from order_items,contributor_image_uploads where order_id = '".$order_id."' AND product_id = upload_id");
                return $query->result_array();
        }
        public function remove_cart_item($item_id) {
                $query = $this->db->query("DELETE FROM `order_items` WHERE `item_id` = $item_id");
        }
        public function create_new_order($member_id,$order_cost) {
        	$query = "INSERT INTO orders (member_id,order_cost) " .
        	"VALUES (".$this->db->escape($member_id).",". $this->db->escape($order_cost).")";
        	 $this->db->query($query);
        }
        public function update_order_cost($order_id,$order_cost) {
                if($order_cost < 0){
                        // set it to zero 
                        $order_cost = 0;
                }
        	$query = "UPDATE orders SET order_cost = ".$this->db->escape($order_cost)." WHERE order_id = ". $this->db->escape($order_id)."";
        	 $this->db->query($query);	
        }
        public function add_cart_item($order_id,$product_id,$product_type,$product_size,$product_duration,$product_cost,$product_license) {
        	$query = "INSERT INTO order_items (order_id,product_id,product_type,product_size,product_duration,product_cost,product_license) " .
        	"VALUES (".$this->db->escape($order_id).",".$this->db->escape($product_id).",".$this->db->escape($product_type).",".$this->db->escape($product_size).",".$this->db->escape($product_duration).",".$this->db->escape($product_cost).",". $this->db->escape($product_license).")";
        	 $this->db->query($query);	
        }

        public function replace_cart_item($order_id,$product_id,$product_type,$product_size,$product_duration,$product_cost,$product_license,$item_id) {
        	$query = "REPLACE INTO order_items (order_id,product_id,product_type,product_size,product_duration,product_cost,product_license,item_id) " .
        	"VALUES (".$this->db->escape($order_id).",".$this->db->escape($product_id).",".$this->db->escape($product_type).",".$this->db->escape($product_size).",".$this->db->escape($product_duration).",".$this->db->escape($product_cost).",". $this->db->escape($product_license).",". $this->db->escape($item_id).")";
        	 $this->db->query($query);	
        }
}
?>