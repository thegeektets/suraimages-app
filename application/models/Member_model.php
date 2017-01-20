<?php 
class Member_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }
        public function update_exclusive_image($upload_id, $start, $end) {
                $query = "UPDATE contributor_image_uploads SET exclusive_from = '".$start."', exclusive_to = '".$end."' WHERE upload_id = ".$upload_id."";
                $this->db->query($query);
        }
        public function get_new_cart($member_id) {
                $query = $this->db->query("select * from orders where member_id = '".$member_id."' AND order_status = 'CART'");
                return $query->result_array();
        }
        public function get_user_cart($member_id) {
                $query = $this->db->query("select * from orders,user_details,order_items,contributor_image_uploads where member_id = '".$member_id."' AND order_status = 'CART' AND user_details.user_id = member_id AND orders.order_id = order_items.order_id AND order_items.product_id = upload_id GROUP BY item_id");
                return $query->result_array();
        }
        public function get_purchase_history($member_id) {
                $query = $this->db->query("select * from orders,user_details,order_items,contributor_image_uploads where member_id = '".$member_id."' AND order_status = 'COMPLETE' AND user_details.user_id = member_id AND orders.order_id = order_items.order_id AND order_items.product_id = upload_id GROUP BY item_id");
                return $query->result_array();
        }
        public function get_contributor_history($contributor_id) {
                $query = $this->db->query("select * from orders,user_details,order_items,contributor_image_uploads where contributor_image_uploads.user_id = '".$contributor_id."' AND order_status = 'COMPLETE' AND orders.order_id = order_items.order_id AND order_items.product_id = upload_id AND contributor_image_uploads.user_id = user_details.user_id GROUP BY item_id");
                return $query->result_array();
        }
        public function get_all_history() {
                $query = $this->db->query("select * from orders,user_details,order_items,contributor_image_uploads where   order_status = 'COMPLETE' AND orders.order_id = order_items.order_id AND order_items.product_id = upload_id GROUP BY item_id");
                return $query->result_array();
        }
        public function get_package_files($order_id) {
                $query = $this->db->query("select * from orders,user_details,order_items,contributor_image_uploads where orders.order_id = '".$order_id."' AND order_status = 'COMPLETE' AND user_details.user_id = member_id AND orders.order_id = order_items.order_id AND order_items.product_id = upload_id GROUP BY item_id");
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
                } else {
                       $cart_items = $this->get_cart_items($order_id);
                       $order_cost = 0;
                       for($i=0; $i < count($cart_items); $i++){
                            $order_cost += $cart_items[$i]['product_cost'];
                        }
                }
        	$query = "UPDATE orders SET order_cost = ".$this->db->escape($order_cost)." WHERE order_id = ". $this->db->escape($order_id)."";
        	 $this->db->query($query);	
        }
        public function update_order_payment($order_id,$payment_id) {
                $query = "UPDATE orders SET payment_id = '".$payment_id."', order_status = 'COMPLETE', date_purchased = '".DATE('Y-m-d')."' WHERE order_id = ".$order_id."";
                $this->db->query($query);
        }
        public function add_cart_item($order_id,$product_id,$product_type,$product_size,$product_duration,$product_cost,$product_license,$exclusive_duration) {
        	$query = "INSERT INTO order_items (order_id,product_id,product_type,product_size,product_duration,product_cost,product_license,exclusive_duration) " .
        	"VALUES (".$this->db->escape($order_id).",".$this->db->escape($product_id).",".$this->db->escape($product_type).",".$this->db->escape($product_size).",".$this->db->escape($product_duration).",".$this->db->escape($product_cost).",". $this->db->escape($product_license).",". $this->db->escape($exclusive_duration).")";
        	 $this->db->query($query);	
        }

        public function replace_cart_item($order_id,$product_id,$product_type,$product_size,$product_duration,$product_cost,$product_license,$exclusive_duration,$item_id) {
        	$query = "REPLACE INTO order_items (order_id,product_id,product_type,product_size,product_duration,product_cost,product_license,exclusive_duration,item_id) " .
        	"VALUES (".$this->db->escape($order_id).",".$this->db->escape($product_id).",".$this->db->escape($product_type).",".$this->db->escape($product_size).",".$this->db->escape($product_duration).",".$this->db->escape($product_cost).",". $this->db->escape($product_license).",". $this->db->escape($exclusive_duration).",". $this->db->escape($item_id).")";
        	 $this->db->query($query);	
        }
}
?>