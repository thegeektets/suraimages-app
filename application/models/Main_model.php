<?php 
class Main_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }
        public function optimize_all_uploads($search_term,
            $license_type,$image_type,$orientation,$people,$category,$contributor){
            $query = $this->db->query("SELECT * FROM contributor_image_uploads,user_details WHERE user_details.user_id = 
                contributor_image_uploads.user_id AND file_status = 1
                AND file_name LIKE '%".$search_term."%' AND file_keywords LIKE '%".$search_term."%' AND file_type LIKE '%".$image_type."%' AND file_orentiation LIKE '%".$orientation."%'  AND file_license LIKE '%".$license_type."%' AND file_people LIKE '%".$people."%' AND file_category LIKE '%".$category."%'AND file_category LIKE '%".$category."%' AND user_details.user_id LIKE '%".$contributor."%' GROUP BY upload_id");

            $image = $query->result_array();
            return array_reverse($image);
        }
        public function search_all_uploads($search_term){
            $query = $this->db->query("SELECT * FROM contributor_image_uploads,user_details WHERE user_details.user_id = 
                contributor_image_uploads.user_id AND file_status = 1
                AND (file_name LIKE '%".$search_term."%' OR file_keywords LIKE '%".$search_term."%' OR file_type LIKE '%".$search_term."%' OR file_subtype LIKE '%".$search_term."%'  OR file_license LIKE '%".$search_term."%') GROUP BY upload_id");
            $image = $query->result_array();
            return array_reverse($image);
        }
        public function get_all_uploads(){
            $query = $this->db->query("SELECT DISTINCT * FROM contributor_image_uploads,user_details WHERE user_details.user_id = 
                contributor_image_uploads.user_id AND file_status = 1");
            $image = $query->result_array();
            return array_reverse($image);
        }
        public function get_same_shoots($same_shoot){
            $query = $this->db->query("SELECT * FROM contributor_image_uploads,user_details WHERE user_details.user_id = 
                contributor_image_uploads.user_id AND file_status = 1 AND file_same_shoot_code = ".$same_shoot."");
            $image = $query->result_array();
            return array_reverse($image);
        }
        public function get_single_upload($upload_id){
            $query = $this->db->query("SELECT * FROM contributor_image_uploads,user_details WHERE user_details.user_id = 
                contributor_image_uploads.user_id AND file_status = 1 AND upload_id = ".$upload_id."");
            $image = $query->result_array();
            return array_reverse($image);
        }

} ?>