<?php 
class Contributor_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }
        public function upload_contributor_images($id,$name,$size) {
            $this->load->helper('url');
            $this->load->library('session');
            $upload_data = $this->upload->data(); 
            $ppic =   $upload_data['file_name'];
            $url = base_url("assets/uploads/".$ppic); 
            $query = 
            $this->db->query(" INSERT INTO contributor_image_uploads(user_id,file_url,file_name,file_size) VALUES(".$this->db->escape($id).",".$this->db->escape($url).","
                .$this->db->escape($name).",".$this->db->escape($size).")");
        }
        public function get_contributor_images($id) {
            $query = $this->db->query("SELECT * FROM contributor_image_uploads WHERE user_id = ".$this->db->escape($id)."");   
            return $query->result_array();
        }
        public function add_contributor_model($id){
            $model = $this->input->post("all_model_notification");
            $user_id = $id;
            $query = $this->db->query("     
            REPLACE INTO contributor_models (model_email,user_id)
            VALUES(".$this->db->escape($model).",".$this->db->escape($user_id).")");
        }
        public function find_contributor_model($id){
            $model = $this->input->post("model_email");
            $user_id = $id;
            $query = $this->db->query("SELECT * FROM contributor_models WHERE user_id = ".$this->db->escape($id)."AND model_email = ".$this->db->escape($model)."");   
            return $query->result_array();
        }
        public function replace_contributor_model($id,$email){
            $email = base64_decode($email);
            var_dump($email);
            
            $model = $this->input->post("replace_email");
            $user_id = $id;
            $query = 
            $this->db->query("UPDATE contributor_models SET model_email = ".$this->db->escape($model)." WHERE user_id = ".$this->db->escape($user_id)." AND model_email = ".$this->db->escape($email)."");   
        }

}

?>