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

            if($contributor !== ''){
                $search = "SELECT * FROM contributor_image_uploads,user_details WHERE user_details.user_id = 
                contributor_image_uploads.user_id AND file_status = 1
                AND file_name LIKE '%".$search_term."%' AND file_keywords LIKE '%".$search_term."%' AND file_type LIKE '%".$image_type."%' AND file_orentiation LIKE '%".$orientation."%'  AND file_license LIKE '%".$license_type."%' AND file_people LIKE '%".$people."%' AND file_category LIKE '%".$category."%' AND contributor_image_uploads.user_id  = '".$contributor."' GROUP BY upload_id";
                
            } else {
                $search = "SELECT * FROM contributor_image_uploads,user_details WHERE user_details.user_id = 
                contributor_image_uploads.user_id AND file_status = 1
                AND file_name LIKE '%".$search_term."%' AND file_keywords LIKE '%".$search_term."%' AND file_type LIKE '%".$image_type."%' AND file_orentiation LIKE '%".$orientation."%' AND file_license LIKE '%".$license_type."%' AND file_people LIKE '%".$people."%' AND file_category LIKE '%".$category."%' GROUP BY upload_id";
            }
            $query = $this->db->query($search);
            $image = $query->result_array();
            return array_reverse($image);
        }
        public function search_all_uploads($search_term){
            $query = $this->db->query("SELECT * FROM contributor_image_uploads,user_details WHERE user_details.user_id = 
                contributor_image_uploads.user_id AND file_status = 1
                AND (upload_id = '".$search_term."' OR file_name LIKE '%".$search_term."%' OR file_keywords LIKE '%".$search_term."%' OR file_type LIKE '%".$search_term."%' OR file_subtype LIKE '%".$search_term."%'  OR file_license LIKE '%".$search_term."%') GROUP BY upload_id");
            $image = $query->result_array();
            return array_reverse($image);
        }
        public function get_all_uploads(){
            $query = $this->db->query("SELECT DISTINCT * FROM contributor_image_uploads,user_details WHERE user_details.user_id = 
                contributor_image_uploads.user_id AND file_status = 1");
            $image = $query->result_array();
            return array_reverse($image);
        }
        public function get_all_resources(){
            $query = $this->db->query("SELECT DISTINCT * FROM resources");
            return $query->result_array();
        }
        public function get_same_shoots($same_shoot){
            $query = $this->db->query("SELECT * FROM contributor_image_uploads,user_details WHERE user_details.user_id = 
                contributor_image_uploads.user_id AND file_status = 1 AND file_same_shoot_code = ".$same_shoot."");
            $image = $query->result_array();
            return array_reverse($image);
        }
        public function get_similar_images($upload_id) {
            $file = $this->get_single_upload($upload_id);
            $search_term = $file[0]['file_name'];
            $image_type = $file[0]['file_type'];
            $orientation = $file[0]['file_orentiation'];
            $license_type = $file[0]['file_license'];
            $people = $file[0]['file_people'];
            $keywords = $file[0]['file_keywords'];
            $category = $file[0]['file_category'];

            $query = $this->db->query("SELECT * FROM contributor_image_uploads,user_details WHERE user_details.user_id = 
                contributor_image_uploads.user_id AND file_status = 1
                AND (file_name LIKE '%".$search_term."%' OR file_keywords LIKE '%".$search_term."%' OR file_type LIKE '%".$image_type."%' OR file_orentiation LIKE '%".$orientation."%'  OR file_license LIKE '%".$license_type."%' OR file_people LIKE '%".$people."%' OR file_keywords LIKE '%".$keywords."%'OR file_category LIKE '%".$category."%') GROUP BY upload_id");

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