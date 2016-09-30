<?php 
class Admin_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }
        public function update_rf_pricing($id){
                $photomin = $this->input->post("txt_photomin");
                $photomax = $this->input->post("txt_photomax");
                $videomin = $this->input->post("txt_videomin");
                $videomax = $this->input->post("txt_videomax");
                $recordid = $id;

                $query = $this->db->query("     
                REPLACE INTO rf_pricing (photo_min, photo_max, video_min, video_max, record_id)
                VALUES(".$this->db->escape($photomin).",".$this->db->escape($photomax).",".$this->db->escape($videomin).",".$this->db->escape($videomax).",".$this->db->escape($recordid).")");
                      
        }
        public function get_rf_pricing() {
                $query = $this->db->query("select * from rf_pricing");
                   return $query->result_array();
        }
        public function update_ex_pricing($id){
                $photo_1month = $this->input->post("txt_photo_1month");
                $photo_3month = $this->input->post("txt_photo_3month");
                $photo_6month = $this->input->post("txt_photo_6month");
                $photo_1year = $this->input->post("txt_photo_1year");
                $photo_2year = $this->input->post("txt_photo_2year");
                $video_1month = $this->input->post("txt_video_1month");
                $video_3month = $this->input->post("txt_video_3month");
                $video_6month = $this->input->post("txt_video_6month");
                $video_1year = $this->input->post("txt_video_1year");
                $video_2year = $this->input->post("txt_video_2year");
                
                $recordid = $id;

                $query = $this->db->query("     
                REPLACE INTO ex_pricing (photo_1month, photo_3month, photo_6month, photo_1year, photo_2year, video_1month, video_3month, video_6month, video_1year, video_2year, record_id)
                VALUES(".$this->db->escape($photo_1month).",".$this->db->escape($photo_3month).",".$this->db->escape($photo_6month).",".$this->db->escape($photo_1year).","
                	.$this->db->escape($photo_2year).",".$this->db->escape($video_1month).",".$this->db->escape($video_3month).",".$this->db->escape($video_6month).","
                	.$this->db->escape($video_1year).",".$this->db->escape($video_2year).",".$this->db->escape($recordid).")");
                      
        }
        public function get_ex_pricing() {
                $query = $this->db->query("select * from ex_pricing");
                   return $query->result_array();
        }

        public function get_member_users() {
                $query = $this->db->query("select * from user_details , users  where  users.id = user_details.user_id AND users.account = 'member'");
                   return $query->result_array();
        }
        public function get_newcontributor_users() {
         		$query = $this->db->query("select * from user_details,user_payment_details, users where       users.id = user_payment_details.user_id AND users.id = user_details.user_id AND users.account = 'contributor' AND contributor_status = 0");
                   return $query->result_array();
        }
        public function get_excontributor_users() {
                $query = $this->db->query("select * from user_details,user_payment_details, users where       users.id = user_payment_details.user_id AND users.id = user_details.user_id AND users.account = 'contributor' AND contributor_status = 1");
                   return $query->result_array();
        }
        public function update_contributor_status($id , $status) {
                $sql = "UPDATE user_details SET contributor_status = ".$this->db->escape($status)." where user_id = '".$id ."'";
                $this->db->query($sql);
        }
        public function update_user_idstatus($id , $status) {
            $sql = "UPDATE user_details SET id_status = ".$this->db->escape($status)." where user_id = '".$id ."'";
            $this->db->query($sql);
        }
        public function update_uploaded_files($file_id,$file_name,$file_keywords,$file_price_large,$file_license,$file_status,$file_type,$file_subtype,$file_orientation,$file_people){
            $this->db->query("UPDATE contributor_image_uploads SET 
            file_name = ".$this->db->escape($file_name)." , file_keywords = ".$this->db->escape($file_keywords)." , file_price_large = ".$this->db->escape($file_price_large).
            ", file_status = ".$this->db->escape($file_status).", file_license = ".$this->db->escape($file_license)." , file_type = ".$this->db->escape($file_type)." , file_subtype = ".$this->db->escape($file_subtype)." , file_orentiation = ".$this->db->escape($file_orientation)." , file_people = ".$this->db->escape($file_people)." WHERE upload_id = ".$this->db->escape($file_id)."");   
        }
        public function get_all_image_uploads($user_id){
            $query = $this->db->query("SELECT count(*) AS image_uploads FROM contributor_image_uploads WHERE file_status != 0 AND user_id = ".$user_id."");
              return $query->result_array();
        }
        public function get_new_image_uploads($user_id){
            $query = $this->db->query("SELECT count(*) AS image_uploads FROM contributor_image_uploads WHERE file_status
            = 0 AND user_id = ".$user_id."");
              return $query->result_array();
        }
        public function get_contributor_images() {
            $query = $this->db->query("SELECT * FROM contributor_image_uploads");   
            $image = $query->result_array();
            return array_reverse($image);
        }
}