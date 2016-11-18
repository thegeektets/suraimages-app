<?php 
class Admin_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }
        public function update_rr_pricing(){

                $subregion_price = $this->input->post("txt_subregion_price");
                $region_price = $this->input->post("txt_region_price");
                $usage_adv = $this->input->post("txt_usage_adv");
                $usage_edt = $this->input->post("txt_usage_edt");
                $usage_int = $this->input->post("txt_usage_int");
                $media_adv_print = $this->input->post("txt_media_adv_print");
                $media_adv_tv  = $this->input->post("txt_media_adv_tv");
                $media_adv_digital = $this->input->post("txt_media_adv_digital");
                $media_edt_print = $this->input->post("txt_media_edt_print");
                $media_edt_tv = $this->input->post("txt_media_edt_tv");
                $media_edt_digital = $this->input->post("txt_media_edt_digital");
                $media_int_print = $this->input->post("txt_media_int_print");
                $media_int_digital = $this->input->post("txt_media_int_digital");
                $details_adv_print_newsp = $this->input->post("txt_details_adv_print_newsp");
                $details_adv_print_mag = $this->input->post("txt_details_adv_print_mag");
                $details_adv_print_outd = $this->input->post("txt_details_adv_print_outd");
                $details_adv_print_pos = $this->input->post("txt_details_adv_print_pos");
                $details_adv_print_all = $this->input->post("txt_details_adv_print_all");
                $details_edt_print_newsp = $this->input->post("txt_details_edt_print_newsp");
                $details_edt_print_mag = $this->input->post("txt_details_edt_print_mag");
                $details_edt_print_book = $this->input->post("txt_details_edt_print_book");
                $details_edt_print_collateral = $this->input->post("txt_details_edt_print_collateral");
                $details_adv_tv_commercial = $this->input->post("txt_details_adv_tv_commercial");
                $details_edt_tv_program = $this->input->post("txt_details_edt_tv_program");
                $details_edt_tv_film = $this->input->post("txt_details_edt_tv_film");
                $details_adv_digital_website = $this->input->post("txt_details_adv_digital_website");
                $details_adv_digital_mobile = $this->input->post("txt_details_adv_digital_mobile");
                $details_adv_digital_social = $this->input->post("txt_details_adv_digital_social");
                $details_adv_digital_all     = $this->input->post("txt_details_adv_digital_all");
                $details_edt_digital_website = $this->input->post("txt_details_edt_digital_website");
                $details_edt_digital_mobile = $this->input->post("txt_details_edt_digital_mobile");
                $details_edt_digital_social = $this->input->post("txt_details_edt_digital_social");
                $details_edt_digital_all = $this->input->post("txt_details_edt_digital_all");
                $details_int_digital_website     = $this->input->post("txt_details_int_digital_website");
                $details_int_digital_presentation = $this->input->post("txt_details_int_digital_presentation");
             
                $duration_adv_1day = $this->input->post("txt_duration_adv_1day");
                $duration_adv_1month = $this->input->post("txt_duration_adv_1month");
                $duration_adv_3months = $this->input->post("txt_duration_adv_3months");
                $duration_adv_6months = $this->input->post("txt_duration_adv_6months");
                $duration_adv_1year = $this->input->post("txt_duration_adv_1year");
                $duration_adv_2years = $this->input->post("txt_duration_adv_2years");
                $duration_adv_1week = $this->input->post("txt_duration_adv_1week");
             
                $duration_edt_1day = $this->input->post("txt_duration_edt_1day");
                $duration_edt_1week = $this->input->post("txt_duration_edt_1week");
                $duration_edt_1month = $this->input->post("txt_duration_edt_1month");
                $duration_edt_3months    = $this->input->post("txt_duration_edt_3months");
                $duration_edt_6months = $this->input->post("txt_duration_edt_6months");
                $duration_edt_1year = $this->input->post("txt_duration_edt_1year");
                $duration_edt_2years = $this->input->post("txt_duration_edt_2years");
             
                $duration_int_1day = $this->input->post("txt_duration_int_1day");
                $duration_int_1week = $this->input->post("txt_duration_int_1week");
                $duration_int_1month     = $this->input->post("txt_duration_int_1month");
                $duration_int_3months = $this->input->post("txt_duration_int_3months");
                $duration_int_6months = $this->input->post("txt_duration_int_6months");
                $duration_int_1year = $this->input->post("txt_duration_int_1year");
                $duration_int_2years = $this->input->post("txt_duration_int_2years");
                $pricing_id = $this->input->post("txt_pricing_id");
               
                $query = $this->db->query("     
                    REPLACE INTO rr_pricing (subregion_price, region_price, usage_adv, usage_edt, usage_int, media_adv_print, media_adv_tv, media_adv_digital,media_edt_print, media_edt_tv , media_edt_digital, media_int_print,media_int_digital, details_adv_print_newsp, details_adv_print_mag, details_adv_print_outd  ,details_adv_print_pos, details_adv_print_all, details_edt_print_newsp, details_edt_print_mag,details_edt_print_book , details_edt_print_collateral, details_adv_tv_commercial, details_edt_tv_program,details_edt_tv_film, details_adv_digital_website, details_adv_digital_mobile, details_adv_digital_social,details_adv_digital_all , details_edt_digital_website , details_edt_digital_mobile, 
                    details_edt_digital_social,details_edt_digital_all, details_int_digital_website,details_int_digital_presentation, duration_adv_1day,duration_adv_1month, duration_adv_3months, duration_adv_6months, duration_adv_1year,duration_adv_2years, duration_adv_1week, duration_edt_1day , duration_edt_1week,duration_edt_1month, duration_edt_3months, duration_edt_6months, duration_edt_1year    ,duration_edt_2years, duration_int_1day , duration_int_1week, duration_int_1month   ,duration_int_3months, duration_int_6months, duration_int_1year, duration_int_2years, pricing_id)

                VALUES ( ".$this->db->escape($subregion_price).",".$this->db->escape($region_price).",".$this->db->escape($usage_adv).",".$this->db->escape($usage_edt).",".$this->db->escape($usage_int).",".$this->db->escape($media_adv_print).",".$this->db->escape($media_adv_tv).",".$this->db->escape($media_adv_digital).",".$this->db->escape($media_edt_print).",".$this->db->escape($media_edt_tv).",".$this->db->escape($media_edt_digital).",".$this->db->escape($media_int_print).",".$this->db->escape($media_int_digital).",".$this->db->escape($details_adv_print_newsp).",".$this->db->escape($details_adv_print_mag).",".$this->db->escape($details_adv_print_outd).",".$this->db->escape($details_adv_print_pos).",".$this->db->escape($details_adv_print_all).",".$this->db->escape($details_edt_print_newsp).",".$this->db->escape($details_edt_print_mag).",".$this->db->escape($details_edt_print_book).",".$this->db->escape($details_edt_print_collateral).",".$this->db->escape($details_adv_tv_commercial).",".$this->db->escape($details_edt_tv_program).",".$this->db->escape($details_edt_tv_film).",".$this->db->escape($details_adv_digital_website).",".$this->db->escape($details_adv_digital_mobile).",".$this->db->escape($details_adv_digital_social).",".$this->db->escape($details_adv_digital_all).",".$this->db->escape($details_edt_digital_website).",".$this->db->escape($details_edt_digital_mobile).",".$this->db->escape($details_edt_digital_mobile).",".$this->db->escape($details_edt_digital_social).",".$this->db->escape($details_edt_digital_all).",".$this->db->escape($details_int_digital_website).$this->db->escape($details_int_digital_presentation).",".$this->db->escape($duration_adv_1day).",".$this->db->escape($duration_adv_1month).",".$this->db->escape($duration_adv_3months).",".$this->db->escape($duration_adv_6months).",".$this->db->escape($duration_adv_1year).",".$this->db->escape($duration_adv_2years).",".$this->db->escape($duration_adv_1week).",".$this->db->escape($duration_edt_1day).",".$this->db->escape($duration_edt_1week).",".$this->db->escape($duration_edt_1month).",".$this->db->escape($duration_edt_3months).",".$this->db->escape($duration_edt_6months).",".$this->db->escape($duration_edt_1year).",".$this->db->escape($duration_edt_2years).",".$this->db->escape($duration_int_1day).",".$this->db->escape($duration_int_1week).",".$this->db->escape($duration_int_1month).",".$this->db->escape($duration_int_3months).",".$this->db->escape($duration_int_6months).",".$this->db->escape($duration_int_1year).",".$this->db->escape($duration_int_2years).",".$this->db->escape($pricing_id).")");
                      
        }
        public function get_rr_pricing() {
                $query = $this->db->query("select * from rr_pricing");
                   return $query->result_array();
        }

        
        public function update_rm_pricing(){

                $subregion_price = $this->input->post("txt_subregion_price");
                $region_price = $this->input->post("txt_region_price");
                $usage_adv = $this->input->post("txt_usage_adv");
                $usage_edt = $this->input->post("txt_usage_edt");
                $usage_int = $this->input->post("txt_usage_int");
                $media_adv_print = $this->input->post("txt_media_adv_print");
                $media_adv_tv  = $this->input->post("txt_media_adv_tv");
                $media_adv_digital = $this->input->post("txt_media_adv_digital");
                $media_edt_print = $this->input->post("txt_media_edt_print");
                $media_edt_tv = $this->input->post("txt_media_edt_tv");
                $media_edt_digital = $this->input->post("txt_media_edt_digital");
                $media_int_print = $this->input->post("txt_media_int_print");
                $media_int_digital = $this->input->post("txt_media_int_digital");
                $details_adv_print_newsp = $this->input->post("txt_details_adv_print_newsp");
                $details_adv_print_mag = $this->input->post("txt_details_adv_print_mag");
                $details_adv_print_outd = $this->input->post("txt_details_adv_print_outd");
                $details_adv_print_pos = $this->input->post("txt_details_adv_print_pos");
                $details_adv_print_all = $this->input->post("txt_details_adv_print_all");
                $details_edt_print_newsp = $this->input->post("txt_details_edt_print_newsp");
                $details_edt_print_mag = $this->input->post("txt_details_edt_print_mag");
                $details_edt_print_book = $this->input->post("txt_details_edt_print_book");
                $details_edt_print_collateral = $this->input->post("txt_details_edt_print_collateral");
                $details_adv_tv_commercial = $this->input->post("txt_details_adv_tv_commercial");
                $details_edt_tv_program = $this->input->post("txt_details_edt_tv_program");
                $details_edt_tv_film = $this->input->post("txt_details_edt_tv_film");
                $details_adv_digital_website = $this->input->post("txt_details_adv_digital_website");
                $details_adv_digital_mobile = $this->input->post("txt_details_adv_digital_mobile");
                $details_adv_digital_social = $this->input->post("txt_details_adv_digital_social");
                $details_adv_digital_all     = $this->input->post("txt_details_adv_digital_all");
                $details_edt_digital_website = $this->input->post("txt_details_edt_digital_website");
                $details_edt_digital_mobile = $this->input->post("txt_details_edt_digital_mobile");
                $details_edt_digital_social = $this->input->post("txt_details_edt_digital_social");
                $details_edt_digital_all = $this->input->post("txt_details_edt_digital_all");
                $details_int_digital_website     = $this->input->post("txt_details_int_digital_website");
                $details_int_digital_presentation = $this->input->post("txt_details_int_digital_presentation");
             
                $duration_adv_1day = $this->input->post("txt_duration_adv_1day");
                $duration_adv_1month = $this->input->post("txt_duration_adv_1month");
                $duration_adv_3months = $this->input->post("txt_duration_adv_3months");
                $duration_adv_6months = $this->input->post("txt_duration_adv_6months");
                $duration_adv_1year = $this->input->post("txt_duration_adv_1year");
                $duration_adv_2years = $this->input->post("txt_duration_adv_2years");
                $duration_adv_1week = $this->input->post("txt_duration_adv_1week");
             
                $duration_edt_1day = $this->input->post("txt_duration_edt_1day");
                $duration_edt_1week = $this->input->post("txt_duration_edt_1week");
                $duration_edt_1month = $this->input->post("txt_duration_edt_1month");
                $duration_edt_3months    = $this->input->post("txt_duration_edt_3months");
                $duration_edt_6months = $this->input->post("txt_duration_edt_6months");
                $duration_edt_1year = $this->input->post("txt_duration_edt_1year");
                $duration_edt_2years = $this->input->post("txt_duration_edt_2years");
             
                $duration_int_1day = $this->input->post("txt_duration_int_1day");
                $duration_int_1week = $this->input->post("txt_duration_int_1week");
                $duration_int_1month     = $this->input->post("txt_duration_int_1month");
                $duration_int_3months = $this->input->post("txt_duration_int_3months");
                $duration_int_6months = $this->input->post("txt_duration_int_6months");
                $duration_int_1year = $this->input->post("txt_duration_int_1year");
                $duration_int_2years = $this->input->post("txt_duration_int_2years");
                $pricing_id = $this->input->post("txt_pricing_id");
               
                $query = $this->db->query("     
                    REPLACE INTO rm_pricing (subregion_price, region_price, usage_adv, usage_edt, usage_int, media_adv_print, media_adv_tv, media_adv_digital,media_edt_print, media_edt_tv , media_edt_digital, media_int_print,media_int_digital, details_adv_print_newsp, details_adv_print_mag, details_adv_print_outd  ,details_adv_print_pos, details_adv_print_all, details_edt_print_newsp, details_edt_print_mag,details_edt_print_book , details_edt_print_collateral, details_adv_tv_commercial, details_edt_tv_program,details_edt_tv_film, details_adv_digital_website, details_adv_digital_mobile, details_adv_digital_social,details_adv_digital_all , details_edt_digital_website , details_edt_digital_mobile, 
                    details_edt_digital_social,details_edt_digital_all, details_int_digital_website,details_int_digital_presentation, duration_adv_1day,duration_adv_1month, duration_adv_3months, duration_adv_6months, duration_adv_1year,duration_adv_2years, duration_adv_1week, duration_edt_1day , duration_edt_1week,duration_edt_1month, duration_edt_3months, duration_edt_6months, duration_edt_1year    ,duration_edt_2years, duration_int_1day , duration_int_1week, duration_int_1month   ,duration_int_3months, duration_int_6months, duration_int_1year, duration_int_2years, pricing_id)

                VALUES ( ".$this->db->escape($subregion_price).",".$this->db->escape($region_price).",".$this->db->escape($usage_adv).",".$this->db->escape($usage_edt).",".$this->db->escape($usage_int).",".$this->db->escape($media_adv_print).",".$this->db->escape($media_adv_tv).",".$this->db->escape($media_adv_digital).",".$this->db->escape($media_edt_print).",".$this->db->escape($media_edt_tv).",".$this->db->escape($media_edt_digital).",".$this->db->escape($media_int_print).",".$this->db->escape($media_int_digital).",".$this->db->escape($details_adv_print_newsp).",".$this->db->escape($details_adv_print_mag).",".$this->db->escape($details_adv_print_outd).",".$this->db->escape($details_adv_print_pos).",".$this->db->escape($details_adv_print_all).",".$this->db->escape($details_edt_print_newsp).",".$this->db->escape($details_edt_print_mag).",".$this->db->escape($details_edt_print_book).",".$this->db->escape($details_edt_print_collateral).",".$this->db->escape($details_adv_tv_commercial).",".$this->db->escape($details_edt_tv_program).",".$this->db->escape($details_edt_tv_film).",".$this->db->escape($details_adv_digital_website).",".$this->db->escape($details_adv_digital_mobile).",".$this->db->escape($details_adv_digital_social).",".$this->db->escape($details_adv_digital_all).",".$this->db->escape($details_edt_digital_website).",".$this->db->escape($details_edt_digital_mobile).",".$this->db->escape($details_edt_digital_mobile).",".$this->db->escape($details_edt_digital_social).",".$this->db->escape($details_edt_digital_all).",".$this->db->escape($details_int_digital_website).$this->db->escape($details_int_digital_presentation).",".$this->db->escape($duration_adv_1day).",".$this->db->escape($duration_adv_1month).",".$this->db->escape($duration_adv_3months).",".$this->db->escape($duration_adv_6months).",".$this->db->escape($duration_adv_1year).",".$this->db->escape($duration_adv_2years).",".$this->db->escape($duration_adv_1week).",".$this->db->escape($duration_edt_1day).",".$this->db->escape($duration_edt_1week).",".$this->db->escape($duration_edt_1month).",".$this->db->escape($duration_edt_3months).",".$this->db->escape($duration_edt_6months).",".$this->db->escape($duration_edt_1year).",".$this->db->escape($duration_edt_2years).",".$this->db->escape($duration_int_1day).",".$this->db->escape($duration_int_1week).",".$this->db->escape($duration_int_1month).",".$this->db->escape($duration_int_3months).",".$this->db->escape($duration_int_6months).",".$this->db->escape($duration_int_1year).",".$this->db->escape($duration_int_2years).",".$this->db->escape($pricing_id).")");
                      
        }
        public function get_rm_pricing() {
                $query = $this->db->query("select * from rm_pricing");
                   return $query->result_array();
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
        public function update_uploaded_file($file_id,$file_name,$file_keywords,$file_price_large,$file_license,$file_type,$file_subtype,$file_orientation,$file_people){
            $this->db->query("UPDATE contributor_image_uploads SET date_uploaded = date_uploaded , file_name = ".$this->db->escape($file_name)." , file_keywords = ".$this->db->escape($file_keywords)." , file_price_large = ".$this->db->escape($file_price_large).", file_license = ".$this->db->escape($file_license)." , file_type = ".$this->db->escape($file_type)." , file_subtype = ".$this->db->escape($file_subtype)." , file_orentiation = ".$this->db->escape($file_orientation).", file_people = ".$this->db->escape($file_people)." WHERE upload_id = ".$this->db->escape($file_id)."");   
        }
        public function update_uploaded_files($file_id,$file_name,$file_keywords,$file_price_large,$file_license,$file_status,$file_type,$file_subtype,$file_orientation,$file_people,$file_category){
            $this->db->query("UPDATE contributor_image_uploads SET date_uploaded = date_uploaded , file_name = ".$this->db->escape($file_name)." , file_keywords = ".$this->db->escape($file_keywords)." , file_price_large = ".$this->db->escape($file_price_large).
            ", file_status = ".$this->db->escape($file_status).", file_license = ".$this->db->escape($file_license)." , file_type = ".$this->db->escape($file_type)." , file_subtype = ".$this->db->escape($file_subtype)." , file_orentiation = ".$this->db->escape($file_orientation).", file_category = ".$this->db->escape($file_category)." , file_people = ".$this->db->escape($file_people)." WHERE upload_id = ".$this->db->escape($file_id)."");   
        }
        public function update_uploaded_videos($file_id,$file_name,$file_keywords,$file_price_large,$file_license,$file_status,$file_type,$file_subtype,$file_orientation,$file_people){
            $this->db->query("UPDATE contributor_video_uploads SET date_uploaded = date_uploaded , file_name = ".$this->db->escape($file_name)." , file_keywords = ".$this->db->escape($file_keywords)." , file_price_large = ".$this->db->escape($file_price_large).
            ", file_status = ".$this->db->escape($file_status).", file_license = ".$this->db->escape($file_license)." , file_type = ".$this->db->escape($file_type)." , file_subtype = ".$this->db->escape($file_subtype)." , file_orentiation = ".$this->db->escape($file_orientation)." , file_people = ".$this->db->escape($file_people)." WHERE upload_id = ".$this->db->escape($file_id)."");   
        }
        public function get_all_image_uploads($user_id){
            $query = $this->db->query("SELECT count(*) AS image_uploads FROM contributor_image_uploads WHERE user_id = ".$user_id."");
              return $query->result_array();
        }
        public function get_new_image_uploads($user_id){
            $query = $this->db->query("SELECT count(*) AS image_uploads FROM contributor_image_uploads WHERE file_status
            = 0 AND user_id = ".$user_id."");
              return $query->result_array();
        }
        public function get_all_video_uploads($user_id){
            $query = $this->db->query("SELECT count(*) AS video_uploads FROM contributor_video_uploads WHERE file_status = 1 AND user_id = ".$user_id."");
              return $query->result_array();
        }
        public function get_new_video_uploads($user_id){
            $query = $this->db->query("SELECT count(*) AS video_uploads FROM contributor_video_uploads WHERE file_status
            = 0 AND user_id = ".$user_id."");
              return $query->result_array();
        }

        public function get_contributor_videos() {
            $query = $this->db->query("SELECT * FROM contributor_video_uploads");   
            $image = $query->result_array();
            return array_reverse($image);
        }
        public function get_contributor_images() {
            $query = $this->db->query("SELECT * FROM contributor_image_uploads, user_details WHERE user_details.user_id = contributor_image_uploads.user_id");   
            $image = $query->result_array();
            return array_reverse($image);
        }
}