<?php 
class Contributor_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }
        public function upload_contributor_videos($id,$name,$size) {
            $this->load->helper('url');
            $this->load->library('session');
            $upload_data = $this->upload->data(); 
            $ppic =   $upload_data['file_name'];
            $url = base_url("assets/uploads/".$ppic); 
            $query = 
            $this->db->query(" INSERT INTO contributor_video_uploads(user_id,file_url,file_name,file_size) VALUES(".$this->db->escape($id).",".$this->db->escape($url).","
                .$this->db->escape($name).",".$this->db->escape($size).")");
        }
        public function upload_contributor_images($id,$name,$size,$thumb_path,$keywords) {
            $this->load->helper('url');
            $this->load->library('session');
            $upload_data = $this->upload->data(); 
            $ppic =   $upload_data['file_name'];
            $url = base_url("assets/uploads/".$ppic); 
            $thumb_path = base_url($thumb_path);
            list($width, $height) = getimagesize($url);
            $query = 
            $this->db->query(" INSERT INTO contributor_image_uploads(user_id,file_url,file_name,file_size,file_width,file_height,file_thumbnail,file_keywords) VALUES(".$this->db->escape($id).",".$this->db->escape($url).","
                .$this->db->escape($name).",".$this->db->escape($size).",".$this->db->escape($width).",".$this->db->escape($height).",".$this->db->escape($thumb_path)
                .",".$this->db->escape($keywords).")");
        }
        public function upload_contributor_releases($id,$name) {
            $this->load->helper('url');
            $this->load->library('session');
            $upload_data = $this->upload->data(); 
            $ppic =   $upload_data['file_name'];
            $url = base_url("assets/uploads/".$ppic); 
            $query = 
            $this->db->query(" INSERT INTO contributor_releases(user_id,release_name,release_url) VALUES(".$this->db->escape($id).",".$this->db->escape($name).","
                .$this->db->escape($url).")");
        }
        public function get_contributor_releases($id) {
            $query = $this->db->query("SELECT * FROM contributor_releases WHERE user_id = ".$this->db->escape($id)."");   
            $files = $query->result_array();
            return array_reverse($files);
        }
        public function delete_contributor_image($file_id) {
                $this->db->query("     
                DELETE from  contributor_image_uploads WHERE upload_id = ".$this->db->escape($file_id) ."");      
        }
        public function delete_contributor_video($file_id) {
                $this->db->query("     
                DELETE from  contributor_video_uploads WHERE upload_id = ".$this->db->escape($file_id) ."");      
        }
        public function delete_contributor_release($file_id) {
                $this->db->query("     
                DELETE from  contributor_releases WHERE release_id = ".$this->db->escape($file_id) ."");      
        }
        public function get_edit_contributor_images($id) {
            $query = $this->db->query("SELECT * FROM contributor_image_uploads WHERE
            file_status = 0 AND user_id = ".$this->db->escape($id)."");   
            $image = $query->result_array();
            return array_reverse($image);
        }
        public function get_contributor_images($id) {
            $query = $this->db->query("SELECT * FROM contributor_image_uploads WHERE user_id = ".$this->db->escape($id)."");   
            $image = $query->result_array();
            return array_reverse($image);
        }
        public function get_contributor_videos($id) {
            $query = $this->db->query("SELECT * FROM contributor_video_uploads WHERE user_id = ".$this->db->escape($id)."");   
            $video = $query->result_array();
            return array_reverse($video);
        }
        public function get_video_models($file_id){
            $query = $this->db->query("SELECT * FROM contributor_video_models, contributor_models WHERE contributor_models.model_id = contributor_video_models.model_id  AND file_id =  ".$this->db->escape($file_id)." GROUP BY contributor_models.model_id");   
            return $query->result_array();
        }
        public function get_video_releases($file_id){
            $query = $this->db->query("SELECT * FROM contributor_video_releases, contributor_releases WHERE contributor_releases.release_id = contributor_video_releases.release_id  AND file_id =  ".$this->db->escape($file_id)." GROUP BY contributor_releases.release_id");   
            return $query->result_array();
        }
        public function get_image_models($file_id){
            $query = $this->db->query("SELECT * FROM contributor_image_models, contributor_models WHERE contributor_models.model_id = contributor_image_models.model_id  AND file_id =  ".$this->db->escape($file_id)." GROUP BY contributor_models.model_id");   
            return $query->result_array();
        }
        public function get_image_releases($file_id){
            $query = $this->db->query("SELECT * FROM contributor_image_releases, contributor_releases WHERE contributor_releases.release_id = contributor_image_releases.release_id  AND file_id =  ".$this->db->escape($file_id)." GROUP BY contributor_releases.release_id");   
            return $query->result_array();
        }
        public function add_contributor_model(){
            $model = $this->input->post("all_model_notification");
            $query = $this->db->query("     
            REPLACE INTO contributor_models (model_email)
            VALUES(".$this->db->escape($model).")");
        }
        public function get_model_id($model){
            $query = $this->db->query("SELECT model_id FROM contributor_models WHERE model_email = ".$this->db->escape($model)."");   
            foreach ($query->result() as $row)
                {
                return $row->model_id;
            }
        }
        public function add_video_model($file_id,$user_id,$model){
            $model_id = $this->get_model_id($model);
            if($model_id !== NULL){
                $query = 
                $this->db->query(" INSERT INTO contributor_video_models(user_id,model_id,file_id) VALUES(".$this->db->escape($user_id).",".$this->db->escape($model_id).","
                    .$this->db->escape($file_id).")");      
            } else {
                $query = $this->db->query("     
                REPLACE INTO contributor_models (model_email)
                VALUES(".$this->db->escape($model).")");
                $model_id = $this->get_model_id($model);
                $this->db->query(" INSERT INTO contributor_video_models(user_id,model_id,file_id) VALUES(".$this->db->escape($user_id).",".$this->db->escape($model_id).","
                    .$this->db->escape($file_id).")");      
            }
        }       
        public function add_file_model($file_id,$user_id,$model){
            $model_id = $this->get_model_id($model);
            if($model_id !== NULL){
                $query = 
                $this->db->query(" INSERT INTO contributor_image_models(user_id,model_id,file_id) VALUES(".$this->db->escape($user_id).",".$this->db->escape($model_id).","
                    .$this->db->escape($file_id).")");      
            } else {
                $query = $this->db->query("     
                REPLACE INTO contributor_models (model_email)
                VALUES(".$this->db->escape($model).")");
                $model_id = $this->get_model_id($model);
                $this->db->query(" INSERT INTO contributor_image_models(user_id,model_id,file_id) VALUES(".$this->db->escape($user_id).",".$this->db->escape($model_id).","
                    .$this->db->escape($file_id).")");      
            }
        }
        public function add_file_release($file_id,$user_id,$release) {
            $this->db->query(" INSERT INTO contributor_image_releases(user_id,file_id,release_id) VALUES(".$this->db->escape($user_id).",".$this->db->escape($file_id).","
                .$this->db->escape($release).")");      
            
        }
        // replace per user images
        public function find_contributor_model($id){
            $model = $this->input->post("model_email");
            $user_id = $id;
            $query = $this->db->query("SELECT * FROM contributor_models WHERE user_id = ".$this->db->escape($id)."AND model_email = ".$this->db->escape($model)."");   
            return $query->result_array();
        }
        public function replace_contributor_model($id){
            $email = $this->input->post("model_email");
            $model = $this->input->post("replace_email");
            $user_id = $id;
            $query = 
            $this->db->query("UPDATE contributor_models SET model_email = ".$this->db->escape($model)." WHERE user_id = ".$this->db->escape($user_id)." AND model_email = ".$this->db->escape($email)."");   
        }
        public function edit_contributor_images($file_id,$file_name,$file_keywords,$file_price_large,$file_price_medium,$file_price_small,$file_type,$file_subtype,
                    $file_orientation,$file_people,$file_shoot,$file_category){
            $this->db->query("UPDATE contributor_image_uploads SET date_uploaded = date_uploaded ,file_name = ".$this->db->escape($file_name)." , file_keywords = ".$this->db->escape($file_keywords)." , file_price_large = ".$this->db->escape($file_price_large).", file_price_medium = ".$this->db->escape($file_price_medium)." , file_price_small = ".$this->db->escape($file_price_small)." , file_type = ".$this->db->escape($file_type)." , file_subtype = ".$this->db->escape($file_subtype)." , file_orentiation = ".$this->db->escape($file_orientation)." , file_people = ".$this->db->escape($file_people)." , file_category = ".$this->db->escape($file_category).", file_same_shoot_code  = ".$this->db->escape($file_shoot)." WHERE upload_id = ".$this->db->escape($file_id)."");   
        }
        public function edit_contributor_videos($file_id,$file_name,$file_keywords,$file_price_large,$file_price_medium,$file_price_small,$file_type,$file_subtype,
                    $file_orientation,$file_people,$file_shoot,$file_category){
            $this->db->query("UPDATE contributor_video_uploads SET date_uploaded = date_uploaded ,file_name = ".$this->db->escape($file_name)." , file_keywords = ".$this->db->escape($file_keywords)." , file_price_large = ".$this->db->escape($file_price_large).", file_price_medium = ".$this->db->escape($file_price_medium)." , file_price_small = ".$this->db->escape($file_price_small)." , file_type = ".$this->db->escape($file_type)." , file_subtype = ".$this->db->escape($file_subtype)." , file_orentiation = ".$this->db->escape($file_orientation)." , file_people = ".$this->db->escape($file_people)." ,file_category = ".$this->db->escape($file_category)." , file_same_shoot_code  = ".$this->db->escape($file_shoot)." WHERE upload_id = ".$this->db->escape($file_id)."");   
        }
        
        public function get_history_per_image($contributor_id,$file_id) {
                $query = $this->db->query("select * from orders,user_details,order_items,contributor_image_uploads where contributor_image_uploads.user_id = '".$contributor_id."' AND order_status = 'COMPLETE' AND user_details.user_id = member_id AND orders.order_id = order_items.order_id AND order_items.product_id = upload_id AND contributor_image_uploads.user_id = user_details.user_id AND upload_id = ".$file_id." GROUP BY item_id");
                echo "select * from orders,user_details,order_items,contributor_image_uploads where contributor_image_uploads.user_id = '".$contributor_id."' AND order_status = 'COMPLETE' AND user_details.user_id = member_id AND orders.order_id = order_items.order_id AND order_items.product_id = upload_id AND contributor_image_uploads.user_id = user_details.user_id AND upload_id = ".$file_id." GROUP BY item_id";
                return $query->result_array();
        }
        public function get_history_per_date($contributor_id, $from_date, $to_date) {
                $query = $this->db->query("select * from orders,user_details,order_items,contributor_image_uploads where contributor_image_uploads.user_id = '".$contributor_id."' AND order_status = 'COMPLETE' AND orders.order_id = order_items.order_id AND order_items.product_id = upload_id AND contributor_image_uploads.user_id = user_details.user_id AND date_purchased BETWEEN '".$from_date."' AND '".$to_date."' GROUP BY item_id");
                return $query->result_array();
        }
        public function get_history_per_month($contributor_id,$month) {
                $query = $this->db->query("select * from orders,user_details,order_items,contributor_image_uploads where contributor_image_uploads.user_id = '".$contributor_id."' AND order_status = 'COMPLETE' AND orders.order_id = order_items.order_id AND order_items.product_id = upload_id AND contributor_image_uploads.user_id = user_details.user_id AND date_purchased like '".$month."%' GROUP BY item_id");
                return $query->result_array();
        }
        public function get_history_per_license($contributor_id,$license) {

                if($license == 'Royalty Free' || $license == 'Right Managed'){
                    $query = $this->db->query("select * from orders,user_details,order_items,contributor_image_uploads where contributor_image_uploads.user_id = '".$contributor_id."' AND order_status = 'COMPLETE' AND orders.order_id = order_items.order_id AND order_items.product_id = upload_id AND contributor_image_uploads.user_id = user_details.user_id AND product_license = '".$license."' AND product_duration = '' AND exclusive_duration = '' GROUP BY item_id");
              
                } else {
                    $query = $this->db->query("select * from orders,user_details,order_items,contributor_image_uploads where contributor_image_uploads.user_id = '".$contributor_id."' AND order_status = 'COMPLETE' AND orders.order_id = order_items.order_id AND order_items.product_id = upload_id AND contributor_image_uploads.user_id = user_details.user_id AND product_license = '".$license."' AND product_duration != '' OR exclusive_duration != '' GROUP BY item_id");
                }
                
                return $query->result_array();
        }

}

?>