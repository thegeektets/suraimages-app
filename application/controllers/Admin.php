<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
       $this->load->model('admin_model');
       $this->load->model('contributor_model');
   	}
	public function index()
	{
		$this->load->helper('url'); 
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$data['success'] ='';	
		$data['user_session']=$this->session->all_userdata();;

		if (isset($data['user_session']['logged_in'])) {
			if($data['user_session']['logged_in'] === TRUE ){
				$data['user_details'] = $this->fetch_user_details();
				$id = $data['user_details'][0]['user_id'];
				$data['all_contributor_images'] = $this->admin_model->get_contributor_images();
				$data['rf_pricing'] = $this->fetch_rf_pricing();
	     	   	$data['ex_pricing'] = $this->fetch_ex_pricing();
	     	   	$data['members'] = $this->fetch_member_users();
	     	   	$data['newcontributors'] = $this->fetch_newcontributor_users();
	     	   	for ( $i=0;$i<count($data['newcontributors']);$i++ ) {
	     	   		$user_id = $data['newcontributors'][$i]['user_id'];
	     	   		$data['newcontributors'][$i]['uploads']=
	     	   		$this->admin_model->get_all_image_uploads($user_id);
	     	   		$data['newcontributors'][$i]['new_uploads']=
	     	   		$this->admin_model->get_new_image_uploads($user_id);
	     	   	}
	     	   	$data['exscontributors'] = $this->fetch_excontributor_users();
	     	   	for ( $i=0;$i<count($data['exscontributors']);$i++ ) {
	     	   		$user_id = $data['exscontributors'][$i]['user_id'];
	     	   		$data['exscontributors'][$i]['uploads']=
	     	   		$this->admin_model->get_all_image_uploads($user_id);
	     	   		$data['exscontributors'][$i]['new_uploads']=
	     	   		$this->admin_model->get_new_image_uploads($user_id);
	     	   	}
	     	   	$this->load->view('admin/header' , $data);
				$this->load->view('admin/index' , $data);
				$this->load->view('admin/footer');
			} else {
				$data['success'] = FALSE ;
				$data['message'] = 'Login is required for this page';
				$this->load->helper(array('form', 'url'));
				$this->load->view('registration/header' , $data);
				$this->load->view('registration/login' , $data);
				$this->load->view('registration/footer');
			}
   		} else {
   			$data['success'] = FALSE ;
   			$data['message'] = 'Login is required for this page';
   			$this->load->helper(array('form', 'url'));
   			$this->load->view('registration/header' , $data);
   			$this->load->view('registration/login' , $data);
   			$this->load->view('registration/footer');
   		}
	}
	public function fetch_user_details() {
   		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();;
		return $this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
	}
	public function update_account() {
	    $this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		$data['user_details'] = $this->fetch_user_details();
		$data['rf_pricing'] = $this->fetch_rf_pricing();
	    $data['ex_pricing'] = $this->fetch_ex_pricing();
	    $data['members'] = $this->fetch_member_users();
	    $data['newcontributors'] = $this->fetch_contributor_users();
	    $data['exscontributors'] = $this->fetch_contributor_users();
	    $data['success'] = '';
	    $this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_fname', 'txt_fname', 'required'); 
        $this->form_validation->set_rules('txt_email', 'txt_email', 'required|valid_email'); 
        $this->form_validation->set_rules('txt_mname', 'txt_mname', 'required'); 
        $this->form_validation->set_rules('txt_city', 'txt_city', 'required'); 
        $this->form_validation->set_rules('txt_paddress', 'txt_paddress', 'required');
        $this->form_validation->set_rules('txt_telnumber', 'txt_telnumber', 'required'); 
        $this->form_validation->set_rules('slc_country', 'slc_country ', 'required'); 
        
        $this->load->view('admin/header', $data);

        if ($this->form_validation->run() == FALSE) {
	    		$data['success'] = FALSE;
	    		$data['message'] =  'Validation error';
	    		$this->load->view('admin/index', $data);
	    } else {
    			$this->user_model->update_account_details($data['user_session']['user_meta']['0']['id']);
    			$data['success'] = TRUE;
    			$data['message'] =  'Account details updated';
    			$data['user_details'] = $this->fetch_user_details();
    			$this->load->view('admin/index', $data);
	    }
	    $this->load->view('admin/footer');
	}
	
	public function change_password() {
	    $this->load->helper('url'); 
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));	
		$data['user_session']=$this->session->all_userdata();;
		$data['success'] = '';
	    $this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_opassword', 'txt_opassword', 'required'); 
        $this->form_validation->set_rules('txt_npassword', 'txt_npassword', 'required'); 
        $this->form_validation->set_rules('txt_cpassword', 'txt_cpassword', 'required'); 

        
        if ($this->form_validation->run() === FALSE) {
	    		$data['success'] = FALSE;
	    		$data['message'] =  'Validation error';
	    		echo 0;
	    } else {
	    		if(md5(set_value('txt_opassword')) === $data['user_session']['user_meta']['0']['password']){
	    			if (set_value('txt_npassword') === set_value('txt_cpassword')) {
	    				$data['success'] = TRUE;
	    				$data['message'] =  'Password successfully updated';
	    				$this->user_model->change_user_password($data['user_session']['user_meta']['0']['id']);
	    				echo 1;
		   			} else {
	    				$data['success'] = FALSE;
	    				$data['message'] =  'Password does not match confirmation Password';
	    				echo 2;
	    			}	
	    		} else {
	    			$data['success'] = FALSE;
	    			$data['message'] =  'Old password is incorrect please check and try again';
	    			echo 3;
	    		}
	    		
	    }
	}
	public function update_rf_pricing(){
	    $this->load->helper('url'); 
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));	
		$data['user_session']=$this->session->all_userdata();;
		$data['success'] = '';
	    $this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_photomin', 'txt_photomin', 'required'); 
        $this->form_validation->set_rules('txt_photomax', 'txt_photomax', 'required'); 
        $this->form_validation->set_rules('txt_videomin', 'txt_videomin', 'required'); 
        $this->form_validation->set_rules('txt_videomax', 'txt_videomax', 'required'); 


        if ($this->form_validation->run() === FALSE) {
	    		$data['success'] = FALSE;
	    		$data['message'] =  'Validation error';
	    		echo 0;
	    } else {
	    		if((set_value('txt_photomin') > set_value('txt_photomax')) || (set_value('txt_videomin') > set_value('txt_videomax'))) {
	    				$data['success'] = FALSE;
	    				$data['message'] =  'Error ! Max values should not be greater than min values';
	    				echo 2;
	    		} else {
	    			$data['success'] = TRUE;
	    			$data['message'] =  'RF Pricing updated successfully';
	    			$rf_pricing = $this->fetch_rf_pricing();
	    			if(sizeof($rf_pricing)> 0){
	    				$this->admin_model->update_rf_pricing($rf_pricing['0']['record_id']);
	    			} else {
	    				$id = '';
	    				$this->admin_model->update_rf_pricing($id);
	    			}
	    			echo 1;
	    		}
	    		
	    }
	}

	public function fetch_rf_pricing(){
		return $this->admin_model->get_rf_pricing();
	}

	public function update_ex_pricing(){
	    $this->load->helper('url'); 
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));	
		$data['user_session']=$this->session->all_userdata();;
		$data['success'] = '';
	    $this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_photo_1month', 'txt_photo_1month', 'required'); 
        $this->form_validation->set_rules('txt_photo_3month', 'txt_photo_3month', 'required'); 
        $this->form_validation->set_rules('txt_photo_6month', 'txt_photo_6month', 'required'); 
        $this->form_validation->set_rules('txt_photo_1year', 'txt_photo_1year', 'required'); 
        $this->form_validation->set_rules('txt_photo_1year', 'txt_photo_2year', 'required'); 
        $this->form_validation->set_rules('txt_video_1month', 'txt_video_1month', 'required'); 
        $this->form_validation->set_rules('txt_video_3month', 'txt_video_3month', 'required'); 
        $this->form_validation->set_rules('txt_video_6month', 'txt_video_6month', 'required'); 
        $this->form_validation->set_rules('txt_video_1year', 'txt_video_1year', 'required'); 
        $this->form_validation->set_rules('txt_video_2year', 'txt_video_2year', 'required'); 

        if ($this->form_validation->run() === FALSE) {
	    		$data['success'] = FALSE;
	    		$data['message'] =  'Validation error';
	    		echo 0;
	    } else {
			$data['success'] = TRUE;
			$data['message'] =  'Ex Pricing updated successfully';
			$ex_pricing = $this->fetch_ex_pricing();
			if( sizeof($ex_pricing)> 0 ) {
				$this->admin_model->update_ex_pricing($ex_pricing['0']['record_id']);
			} else {
				$id = '';
				$this->admin_model->update_ex_pricing($id);
			}
			echo 1;
		}
	}

	public function fetch_ex_pricing(){
		return $this->admin_model->get_ex_pricing();
	}
	public function fetch_member_users(){
		return $this->admin_model->get_member_users();
	}
	public function fetch_newcontributor_users(){
		return $this->admin_model->get_newcontributor_users();
	}
	public function fetch_excontributor_users(){
		return $this->admin_model->get_excontributor_users();
	}
	public function approve_id($id){
		$this->admin_model->update_user_idstatus($id,'Approved');
		$this->index();
	}
	public function decline_id($id){
		$this->admin_model->update_user_idstatus($id,'Declined');
		$this->index();
	}
	public function start_file_approval($user_id){
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();;
		$id = $data['user_session']['user_meta']['0']['id'];
		$data['user_session']['approval_file'] = $user_id;
		$data['user_session']['edit_status'] = TRUE;
		$this->session->set_userdata($data['user_session']);
		$this->index();
	}
	public function edit_uploaded_files(){
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();;
		$id = $data['user_session']['user_meta']['0']['id'];
    	$i = 0;
    	$size = sizeof($_POST['file_id']);
    	$success = 0;
    	$contributor_status = 0;
    	$file_user = $_POST['file_user']['0'];
    	while($i < $size) {
    		$file_id = $_POST['file_id'][$i];
    		$file_name = $_POST['file_name'][$i];
    		$file_keywords = $_POST['file_keywords'][$i];
    		$file_price_large = $_POST['file_price_large'][$i];
    		// $file_category = $_POST['file_category'][$i];
    		$file_license = $_POST['file_license'][$i];
    		$file_type = $_POST['file_type'][$i];
    		$file_subtype = $_POST['file_subtype'][$i];
    		$file_orientation = $_POST['file_orientation'][$i];
    		$file_people = $_POST['file_people'][$i];
    		$file_status = $_POST['file_status'][$i];
    		if($file_status == 1) {
    			$contributor_status = 1;
    		}
    		$this->admin_model->update_uploaded_files( $file_id,
				$file_name,$file_keywords,$file_price_large,$file_license,$file_status,$file_type,$file_subtype,
				$file_orientation,$file_people);	
    		$i++;
    		$success = 1;
    	}
    	
    	$this->admin_model->update_contributor_status($file_user,$contributor_status);
    	if($success === 1){
    		$data['user_session']['edit_status'] = FALSE;
    		$this->session->set_userdata($data['user_session']);
    		echo $success;
    	}
    	
		
	}
}	
