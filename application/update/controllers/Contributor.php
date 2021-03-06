<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contributor extends CI_Controller {
	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
       $this->load->model('contributor_model');
       $this->load->model('admin_model');
   	}
	public function index()
	{
		$this->load->helper(array('form', 'url'));	
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		//var_dump($data['user_session']);
		$data['success'] = '' ;
		
	if (isset($data['user_session']['logged_in'])) {
		
		if(strlen($data['user_session']['user_meta']['0']['email']) > 0 ){
			$data['user_details'] = $this->fetch_user_details();
			$id = $data['user_details'][0]['user_id'];
			$data['rf_pricing'] = $this->admin_model->get_rf_pricing();
			$data['payment_details'] = $this->fetch_payment_details();
			$data['edit_contributor_images'] = $this->contributor_model->get_edit_contributor_images($id);
			$data['contributor_images'] = $this->contributor_model->get_contributor_images($id);
			$data['contributor_releases'] = $this->contributor_model->get_contributor_releases($id);
			$data['contributor_videos'] = $this->contributor_model->get_contributor_videos($id);
			for($f = 0; $f < count($data['contributor_videos']); $f++){
				
				$file_id = $data['contributor_videos'][$f]['upload_id'];
				$models = $this->contributor_model->get_video_models($file_id);
				$releases= $this->contributor_model->get_video_releases($file_id);
				$data['contributor_videos'][$f]['models']=$models;
				$data['contributor_videos'][$f]['releases']=$releases;
			}

			for($f = 0; $f < count($data['contributor_images']); $f++){
				
				$file_id = $data['contributor_images'][$f]['upload_id'];
				$models = $this->contributor_model->get_image_models($file_id);
				$releases= $this->contributor_model->get_image_releases($file_id);
				$data['contributor_images'][$f]['models']=$models;
				$data['contributor_images'][$f]['releases']=$releases;
			}
			for($f = 0; $f < count($data['edit_contributor_images']); $f++){
				
				$file_id = $data['edit_contributor_images'][$f]['upload_id'];
				$models = $this->contributor_model->get_image_models($file_id);
				$releases= $this->contributor_model->get_image_releases($file_id);
				$data['edit_contributor_images'][$f]['models']=$models;
				$data['edit_contributor_images'][$f]['releases']=$releases;
			}
			
			if(sizeof($data['user_details']) > 0){
				   $data['code'] = array_search($data['user_details']['0']['country'], $this->countrycodes()); // returns 'US'
		    }
			$this->load->view('contributor/header', $data);
			$this->load->view('contributor/index', $data);
			$this->load->view('contributor/footer');
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
	public function update_account() {
	    $this->load->helper('url'); 
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));	
		$data['user_session']=$this->session->all_userdata();;
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
        $this->form_validation->set_rules('slc_payment', 'slc_payment ', 'required');
        
        if ($this->form_validation->run() === FALSE) {
	    	echo 0;
	    } else {
			$this->user_model->update_account_details($data['user_session']['user_meta']['0']['id']);
			$this->user_model->update_payment_details($data['user_session']['user_meta']['0']['id']);
			echo 1;
	    }
	}

	public function delete_image_file($file_id){
		$this->contributor_model->delete_contributor_image($file_id);
		echo 1;
	}
	public function delete_video_file($file_id){
		$this->contributor_model->delete_contributor_video($file_id);
		echo 1;
	}
	public function delete_release_file($file_id){
		$this->contributor_model->delete_contributor_release($file_id);
		echo 1;
	}
	public function update_id() {
		 
		 $this->load->library('session');
		 $this->load->helper(array('form', 'url'));
		 $data['user_details'] = $this->fetch_user_details();
		 $data['payment_details'] = $this->fetch_payment_details();
		 $data['user_session']=$this->session->all_userdata();;
		 $config['upload_path'] = './assets/uploads/';
		 $config['allowed_types'] = 'gif|jpg|png|pdf|docx|doc|odt';
		 $config['max_size'] = '10000';
		 $config['max_width']  = '10240';
		 $config['max_height']  = '7680';
		 $config['overwrite'] = TRUE; 
		 
		 $this->load->library('upload', $config);
		 $this->upload->initialize($config);
		 $idfile = 'idfile' ;
		 $id_name = $_FILES['idfile']['name'];
		 if ($this->upload->do_upload($idfile)) {
		      $this->load->library('session');
		      $data['success'] = TRUE;
		      $data['message'] = 'Upload successfull';
		      $id = $data['user_session']['user_meta']['0']['id'];
		      $this->user_model->update_user_idfile($id,$id_name);
		      redirect('/contributor/index', 'refresh');

		   	} else {
		   	   $data['success'] = FALSE;
		       $data['message'] = $this->upload->display_errors();
		       $this->load->view('contributor/header', $data);
		       $this->load->view('contributor/index', $data);
		       $this->load->view('contributor/footer', $data);
		  	}
	}

	public function update_user_avatar() {
		 
		 $this->load->library('session');
		 $this->load->helper(array('form', 'url'));
		 $data['user_details'] = $this->fetch_user_details();
		 $data['payment_details'] = $this->fetch_payment_details();
		 $data['user_session']=$this->session->all_userdata();;
		 $config['upload_path'] = './assets/uploads/';
		 $config['allowed_types'] = 'gif|jpg|png';
		 $config['max_size'] = '10000';
		 $config['max_width']  = '10240';
		 $config['max_height']  = '7680';
		 $config['overwrite'] = TRUE; 

		 $this->load->library('upload', $config);
		 $this->upload->initialize($config);
	     $avatarfile = 'avatarfile';
	     $_FILES['avatarfile']['name'] = $_FILES['avatarfile']['name']['0'];
	     $_FILES['avatarfile']['type'] = $_FILES['avatarfile']['type']['0'];
	     $_FILES['avatarfile']['tmp_name'] = $_FILES['avatarfile']['tmp_name']['0'];
	     $_FILES['avatarfile']['error'] = $_FILES['avatarfile']['error']['0'];
	     $_FILES['avatarfile']['size'] = $_FILES['avatarfile']['size']['0'];

        if (!$this->upload->do_upload($avatarfile)) {
               $error = array('error' => $this->upload->display_errors());
           	   $data['success'] = FALSE;
               $data['message'] = $this->upload->display_errors();
               $this->load->view('contributor/header', $data);
               $this->load->view('contributor/index', $data);
               $this->load->view('contributor/footer', $data); 
        } else {
            //success
            $this->load->library('session');
            $data['success'] = TRUE;
            $data['message'] = 'Upload successfull';
            $id = $data['user_session']['user_meta']['0']['id'];
            $this->user_model->update_user_avatar($id);
            $this->index();
        }

		 
	}
	public function upload_contributor_videos() {
		 
		 $this->load->library('session');
		 $data['user_session']=$this->session->all_userdata();;
		 $this->load->helper(array('form', 'url'));
		 $config['upload_path'] = './assets/uploads/';
		 $config['allowed_types'] = 'avi|mkv|mp4|flv';
		 $config['overwrite'] = FALSE; 

		 $this->load->library('upload', $config);
		 $this->upload->initialize($config);

		 $files = $_FILES;
		 $count = count($_FILES['videofiles']['name']);
		 $i = 0;
		 $_FILES = array();
		 $success = 0;
		 while ($i < $count) { 

			 $videofiles = 'videofiles';
		     $_FILES['videofiles']['name'] = $files['videofiles']['name'][$i];
		     $_FILES['videofiles']['size'] = $files['videofiles']['size'][$i];
		     $_FILES['videofiles']['tmp_name'] = $files['videofiles']['tmp_name'][$i];
		     $_FILES['videofiles']['error'] = $files['videofiles']['error'][$i];
		     $_FILES['videofiles']['type'] = $files['videofiles']['type'][$i];


		    if (!$this->upload->do_upload($videofiles)) {
		           $error = array('error' => $this->upload->display_errors());
		    	   echo $this->upload->display_errors();
		 	  } else {
		 	       $id = $data['user_session']['user_meta']['0']['id'];
		           $this->contributor_model->upload_contributor_videos($id, $_FILES['videofiles']['name'], $_FILES['videofiles']['size']);
		           $success = 1;
         	    }
		    $i++;
		}
		if($success === 1 &&  $count > 0){
			$this->user_model->update_video_edit_status($id,TRUE);
			$this->user_model->update_video_upload_status($id,FALSE);
		}
		echo $success;
	}
	
	public function upload_contributor_images() {
		 
		 $this->load->library('session');
		 $data['user_session']=$this->session->all_userdata();;
		 $this->load->helper(array('form', 'url'));
		 $id = $data['user_session']['user_meta']['0']['id'];
		 $config['upload_path'] = './assets/uploads/';
		 $config['allowed_types'] = 'gif|jpg|png';
		 $config['overwrite'] = FALSE; 

		 $this->load->library('upload', $config);
		 $this->upload->initialize($config);

		 $files = $_FILES;
		 $count = count($_FILES['trialfiles']['name']);
		 $i = 0;
		 $_FILES = array();
		 $success = 0;
		 while ($i < $count) { 

			 $trialfiles = 'trialfiles';
		     $_FILES['trialfiles']['name'] = $files['trialfiles']['name'][$i];
		     $_FILES['trialfiles']['size'] = $files['trialfiles']['size'][$i];
		     $_FILES['trialfiles']['tmp_name'] = $files['trialfiles']['tmp_name'][$i];
		     $_FILES['trialfiles']['error'] = $files['trialfiles']['error'][$i];
		     $_FILES['trialfiles']['type'] = $files['trialfiles']['type'][$i];


		    if (!$this->upload->do_upload($trialfiles)) {
		           $error = array('error' => $this->upload->display_errors());
		    	   echo $this->upload->display_errors();
		 	  } else {
		 	  	 /*	$config2['image_library'] = 'gd2';
	                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                $config2['upload_path'] = './assets/uploads/thumbs';
	                $config2['maintain_ratio'] = TRUE;
	                $config2['create_thumb'] = TRUE;
	                $config2['thumb_marker'] = '_thumb';
	                $config2['width'] = 350;
	                $this->load->library('image_lib',$config2); 
	                if ( !$this->image_lib->resize()) {
	            		$this->image_lib->display_errors();
	          		} */

		           $this->contributor_model->upload_contributor_images($id, $_FILES['trialfiles']['name'], $_FILES['trialfiles']['size']);
		           $success = 1;
         	    }
		    $i++;
		}
		if($success === 1 &&  $count > 0){
			$this->user_model->update_edit_status($id,TRUE);
			$this->user_model->update_upload_status($id,FALSE);
		}
		echo $success;
	}
	public function _create_thumbnail($fileName,$width,$height) {
        $this->load->library('image_lib');
        $config['image_library'] = '	gd2';
        $config['source_image'] = $_SERVER['DOCUMENT_ROOT'].$fileName;       
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        $config['height'] = $height;
        $config['new_image'] = $_SERVER['DOCUMENT_ROOT'].$fileName;               
        $this->image_lib->initialize($config);
        if(!$this->image_lib->resize())
        { 
            echo $this->image_lib->display_errors();
        }        
    }
	public function upload_contributor_releases() {
		 
		 $this->load->library('session');
		 $data['user_session']=$this->session->all_userdata();;
		 $this->load->helper(array('form', 'url'));
		 $config['upload_path'] = './assets/uploads/';
		 $config['allowed_types'] = 'pdf|jpg|png';
		 $config['overwrite'] = FALSE; 

		 $this->load->library('upload', $config);
		 $this->upload->initialize($config);

		 $files = $_FILES;
		 $count = count($_FILES['releasefiles']['name']);
		 $i = 0;
		 $_FILES = array();
		 $success = 0;
		 while ($i < $count) { 

			 $releasefiles = 'releasefiles';
		     $_FILES['releasefiles']['name'] = $files['releasefiles']['name'][$i];
		     $_FILES['releasefiles']['size'] = $files['releasefiles']['size'][$i];
		     $_FILES['releasefiles']['tmp_name'] = $files['releasefiles']['tmp_name'][$i];
		     $_FILES['releasefiles']['error'] = $files['releasefiles']['error'][$i];
		     $_FILES['releasefiles']['type'] = $files['releasefiles']['type'][$i];


		    if (!$this->upload->do_upload($releasefiles)) {
		           $error = array('error' => $this->upload->display_errors());
		    	   echo $this->upload->display_errors();
		 	  } else {
		 	       $id = $data['user_session']['user_meta']['0']['id'];
		           $this->contributor_model->upload_contributor_releases($id, $_FILES['releasefiles']['name']);
		           $success = 1;
         	    }
		    $i++;
		}
		echo $success;
	}
	public function edit_contributor_videos() {
		$this->load->helper('url'); 
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));	
		$this->load->library('form_validation');
	    $data['user_session']=$this->session->all_userdata();
	    $id = $data['user_session']['user_meta']['0']['id'];
	    	$i = 0;
	    	$size = sizeof($_POST['file_id']);
	    	$success = 0;
	    	
	    	while($i < $size) {
	    	if(strlen($_POST['file_id'][$i])> 0){
	    		$file_id = $_POST['file_id'][$i];
	    		$file_name = $_POST['file_name'][$i];
	    		$file_keywords = $_POST['file_keywords'][$i];
	    		$file_price_large = $_POST['file_price_large'][$i];
	    		$file_price_medium =$_POST['file_price_medium'][$i];
	    		$file_price_small =$_POST['file_price_small'][$i];
	    		if(is_array($_POST['file_category'.$file_id])){
	    			$file_category = implode(', ' ,$_POST['file_category'.$file_id] );
	    		} else {
	    			$file_category = $_POST['file_category'.$file_id];
	    		}
	    		$file_type = $_POST['file_type'][$i];
	    		$file_subtype = $_POST['file_subtype'][$i];
	    		$file_orientation = $_POST['file_orientation'][$i];
	    		$file_people = $_POST['file_people'][$i];
	    		$file_shoot = $_POST['file_shoot'][$i];
	    		$file_model = $_POST['file_models'][$i];
	    		$file_release = $_POST['file_releases'][$i];
	    		$model_array = explode(",", $file_model);
	    		$release_array= explode(",", $file_release);
	    		
	    		if(trim($file_name) === "" || trim($file_keywords) === ""){

	    			// validation error
	    			echo $success;
	    			return false;
	    			
	    		} else {
		    		for ($t=0; $t < count($model_array) ; $t++) { 
		    			$this->add_video_model($file_id,$id,$model_array[$t],$file_price_large);
		    		}
		    		for ($r=0; $r < count($release_array); $r++) {
		    			$this->add_file_release($file_id,$id,$release_array[$r]);
		    		}
					    $this->contributor_model->edit_contributor_videos( $file_id,
						$file_name,$file_keywords,$file_price_large,$file_price_medium,$file_price_small,$file_type,$file_subtype,
						$file_orientation,$file_people,$file_shoot,$file_category );	
		    		$i++;
		    		$success = 1;	
	    		}
	    		
	    	} else {
	    		$success = 1;
	    	}}
	    	if($success === 1){
	    		$this->user_model->update_video_edit_status($id,FALSE);
	    		$this->user_model->update_video_upload_status($id,TRUE);
	    	}
	    	echo $success;
	}
	public function edit_contributor_images() {
		$this->load->helper('url'); 
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));	
		$this->load->library('form_validation');
	    $data['user_session']=$this->session->all_userdata();
	    $id = $data['user_session']['user_meta']['0']['id'];
	    
	    	$i = 0;
	    	$size = sizeof($_POST['file_id']);
	    	$success = 0;

	    	while($i < $size) {
	    	if(strlen($_POST['file_id'][$i])> 0){
	    		$file_id = $_POST['file_id'][$i];
	    		$file_name = $_POST['file_name'][$i];
	    		$file_keywords = $_POST['file_keywords'][$i];
	    		$file_price_large = $_POST['file_price_large'][$i];
	    		$file_price_medium =$_POST['file_price_medium'][$i];
	    		$file_price_small =$_POST['file_price_small'][$i];
	    		if(is_array($_POST['file_category'.$file_id])){
	    			$file_category = implode(', ' ,$_POST['file_category'.$file_id] );
	    		} else {
	    			$file_category = $_POST['file_category'.$file_id];
	    		}
	    		$file_type = $_POST['file_type'][$i];
	    		$file_subtype = $_POST['file_subtype'][$i];
	    		$file_orientation = $_POST['file_orientation'][$i];
	    		$file_people = $_POST['file_people'][$i];
	    		$file_shoot = $_POST['file_shoot'][$i];
	    		$file_model = $_POST['file_models'][$i];
	    		$file_release = $_POST['file_releases'][$i];
	    		$model_array = explode(",", $file_model);
	    		$release_array= explode(",", $file_release);
	    		
	    		if(trim($file_name) === "" || trim($file_keywords) === "" ) {
	    			// validation error
	    			echo $success;
	    			return false;
	    			
	    		} else {
		    		for ($t=0; $t < count($model_array) ; $t++) { 
		    			$this->add_file_model($file_id,$id,$model_array[$t],$file_price_large);
		    		}
		    		for ($r=0; $r < count($release_array); $r++) {
		    			$this->add_file_release($file_id,$id,$release_array[$r]);
		    		}
					    $this->contributor_model->edit_contributor_images( $file_id,
						$file_name,$file_keywords,$file_price_large,$file_price_medium,$file_price_small,$file_type,$file_subtype,
						$file_orientation,$file_people,$file_shoot,$file_category );	
		    		$i++;
		    		$success = 1;	
	    		}
	    		
	    	} else {
	    		$success = 1;
	    	} }
	    	
	    	if($success === 1){
	    		$this->user_model->update_edit_status($id,FALSE);
	    		$this->user_model->update_upload_status($id,TRUE);
	    	}
	    	echo $success;
	}
	public function add_model(){
	    $this->load->helper('url'); 
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));	
		$this->load->library('form_validation');
	    $data['user_session']=$this->session->all_userdata();;
	    $this->form_validation->set_rules('all_model_notification', 'all_model_notification', 'required|valid_email'); 
        
        if ($this->form_validation->run() === FALSE) {
	    	echo 0;
	    } else {
	    	$id = $data['user_session']['user_meta']['0']['id'];
			$this->contributor_model->add_contributor_model();
			echo 1;
	    }	
	}
	public function add_video_model($file_id,$user_id,$model_email,$price){
		$this->load->library('session');
		if(strlen(trim($model_email)) > 0){
			$this->contributor_model->add_file_model($file_id,$user_id,$model_email);
		}
		// send email to model with details of the file and photographer and price if set
	}
	
	public function add_file_model($file_id,$user_id,$model_email,$price){
		$this->load->library('session');
		if(strlen(trim($model_email)) > 0){
			$this->contributor_model->add_file_model($file_id,$user_id,$model_email);
		}
		// send email to model with details of the file and photographer and price if set
	}
	public function add_file_release($file_id,$user_id,$release_id){
		$this->load->library('session');
		$this->contributor_model->add_file_release($file_id,$user_id,$release_id);
		if(strlen(trim($release_id)) > 0){
			$this->contributor_model->add_file_release($file_id,$user_id,$release_id);
		}
		
	}
	public function find_model(){
	    $this->load->helper('url'); 
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));	
		$this->load->library('form_validation');
	    $data['user_session']=$this->session->all_userdata();;
	    $this->form_validation->set_rules('model_email', 'model_email', 'required|valid_email'); 
        
        if ($this->form_validation->run() === FALSE) {
	    	echo 2;
	    } else {
	    	$id = $data['user_session']['user_meta']['0']['id'];
			$result = $this->contributor_model->find_contributor_model($id);
			if(count($result) == 0){
				echo 0 ;
			} else {
				echo 1;	
			}
	    }	
	}
	public function replace_model(){
	    $this->load->helper('url'); 
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));	
		$this->load->library('form_validation');
	    $data['user_session']=$this->session->all_userdata();;
	    $this->form_validation->set_rules('replace_email', 'replace_email', 'required|valid_email'); 
        if ($this->form_validation->run() === FALSE) {
	    	echo 2;
	    } else {
	    	$id = $data['user_session']['user_meta']['0']['id'];
		    $this->contributor_model->replace_contributor_model($id);
			echo 1;	
	    }			
	}
	public function fetch_user_details() {
   		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();;
		return $this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
	}
	public function fetch_payment_details() {
   		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();;
		return $this->user_model->get_payment_details($data['user_session']['user_meta']['0']['email']);
	}
	public function countrycodes() {
	 return array (
	  'AF' => 'Afghanistan',
	  'AX' => 'Åland Islands',
	  'AL' => 'Albania',
	  'DZ' => 'Algeria',
	  'AS' => 'American Samoa',
	  'AD' => 'Andorra',
	  'AO' => 'Angola',
	  'AI' => 'Anguilla',
	  'AQ' => 'Antarctica',
	  'AG' => 'Antigua and Barbuda',
	  'AR' => 'Argentina',
	  'AU' => 'Australia',
	  'AT' => 'Austria',
	  'AZ' => 'Azerbaijan',
	  'BS' => 'Bahamas',
	  'BH' => 'Bahrain',
	  'BD' => 'Bangladesh',
	  'BB' => 'Barbados',
	  'BY' => 'Belarus',
	  'BE' => 'Belgium',
	  'BZ' => 'Belize',
	  'BJ' => 'Benin',
	  'BM' => 'Bermuda',
	  'BT' => 'Bhutan',
	  'BO' => 'Bolivia',
	  'BA' => 'Bosnia and Herzegovina',
	  'BW' => 'Botswana',
	  'BV' => 'Bouvet Island',
	  'BR' => 'Brazil',
	  'IO' => 'British Indian Ocean Territory',
	  'BN' => 'Brunei Darussalam',
	  'BG' => 'Bulgaria',
	  'BF' => 'Burkina Faso',
	  'BI' => 'Burundi',
	  'KH' => 'Cambodia',
	  'CM' => 'Cameroon',
	  'CA' => 'Canada',
	  'CV' => 'Cape Verde',
	  'KY' => 'Cayman Islands',
	  'CF' => 'Central African Republic',
	  'TD' => 'Chad',
	  'CL' => 'Chile',
	  'CN' => 'China',
	  'CX' => 'Christmas Island',
	  'CC' => 'Cocos (Keeling) Islands',
	  'CO' => 'Colombia',
	  'KM' => 'Comoros',
	  'CG' => 'Congo',
	  'CD' => 'Zaire',
	  'CK' => 'Cook Islands',
	  'CR' => 'Costa Rica',
	  'CI' => 'Côte D\'Ivoire',
	  'HR' => 'Croatia',
	  'CU' => 'Cuba',
	  'CY' => 'Cyprus',
	  'CZ' => 'Czech Republic',
	  'DK' => 'Denmark',
	  'DJ' => 'Djibouti',
	  'DM' => 'Dominica',
	  'DO' => 'Dominican Republic',
	  'EC' => 'Ecuador',
	  'EG' => 'Egypt',
	  'SV' => 'El Salvador',
	  'GQ' => 'Equatorial Guinea',
	  'ER' => 'Eritrea',
	  'EE' => 'Estonia',
	  'ET' => 'Ethiopia',
	  'FK' => 'Falkland Islands (Malvinas)',
	  'FO' => 'Faroe Islands',
	  'FJ' => 'Fiji',
	  'FI' => 'Finland',
	  'FR' => 'France',
	  'GF' => 'French Guiana',
	  'PF' => 'French Polynesia',
	  'TF' => 'French Southern Territories',
	  'GA' => 'Gabon',
	  'GM' => 'Gambia',
	  'GE' => 'Georgia',
	  'DE' => 'Germany',
	  'GH' => 'Ghana',
	  'GI' => 'Gibraltar',
	  'GR' => 'Greece',
	  'GL' => 'Greenland',
	  'GD' => 'Grenada',
	  'GP' => 'Guadeloupe',
	  'GU' => 'Guam',
	  'GT' => 'Guatemala',
	  'GG' => 'Guernsey',
	  'GN' => 'Guinea',
	  'GW' => 'Guinea-Bissau',
	  'GY' => 'Guyana',
	  'HT' => 'Haiti',
	  'HM' => 'Heard Island and Mcdonald Islands',
	  'VA' => 'Vatican City State',
	  'HN' => 'Honduras',
	  'HK' => 'Hong Kong',
	  'HU' => 'Hungary',
	  'IS' => 'Iceland',
	  'IN' => 'India',
	  'ID' => 'Indonesia',
	  'IR' => 'Iran, Islamic Republic of',
	  'IQ' => 'Iraq',
	  'IE' => 'Ireland',
	  'IM' => 'Isle of Man',
	  'IL' => 'Israel',
	  'IT' => 'Italy',
	  'JM' => 'Jamaica',
	  'JP' => 'Japan',
	  'JE' => 'Jersey',
	  'JO' => 'Jordan',
	  'KZ' => 'Kazakhstan',
	  'KE' => 'Kenya',
	  'KI' => 'Kiribati',
	  'KP' => 'Korea, Democratic People\'s Republic of',
	  'KR' => 'Korea, Republic of',
	  'KW' => 'Kuwait',
	  'KG' => 'Kyrgyzstan',
	  'LA' => 'Lao People\'s Democratic Republic',
	  'LV' => 'Latvia',
	  'LB' => 'Lebanon',
	  'LS' => 'Lesotho',
	  'LR' => 'Liberia',
	  'LY' => 'Libyan Arab Jamahiriya',
	  'LI' => 'Liechtenstein',
	  'LT' => 'Lithuania',
	  'LU' => 'Luxembourg',
	  'MO' => 'Macao',
	  'MK' => 'Macedonia, the Former Yugoslav Republic of',
	  'MG' => 'Madagascar',
	  'MW' => 'Malawi',
	  'MY' => 'Malaysia',
	  'MV' => 'Maldives',
	  'ML' => 'Mali',
	  'MT' => 'Malta',
	  'MH' => 'Marshall Islands',
	  'MQ' => 'Martinique',
	  'MR' => 'Mauritania',
	  'MU' => 'Mauritius',
	  'YT' => 'Mayotte',
	  'MX' => 'Mexico',
	  'FM' => 'Micronesia, Federated States of',
	  'MD' => 'Moldova, Republic of',
	  'MC' => 'Monaco',
	  'MN' => 'Mongolia',
	  'ME' => 'Montenegro',
	  'MS' => 'Montserrat',
	  'MA' => 'Morocco',
	  'MZ' => 'Mozambique',
	  'MM' => 'Myanmar',
	  'NA' => 'Namibia',
	  'NR' => 'Nauru',
	  'NP' => 'Nepal',
	  'NL' => 'Netherlands',
	  'AN' => 'Netherlands Antilles',
	  'NC' => 'New Caledonia',
	  'NZ' => 'New Zealand',
	  'NI' => 'Nicaragua',
	  'NE' => 'Niger',
	  'NG' => 'Nigeria',
	  'NU' => 'Niue',
	  'NF' => 'Norfolk Island',
	  'MP' => 'Northern Mariana Islands',
	  'NO' => 'Norway',
	  'OM' => 'Oman',
	  'PK' => 'Pakistan',
	  'PW' => 'Palau',
	  'PS' => 'Palestinian Territory, Occupied',
	  'PA' => 'Panama',
	  'PG' => 'Papua New Guinea',
	  'PY' => 'Paraguay',
	  'PE' => 'Peru',
	  'PH' => 'Philippines',
	  'PN' => 'Pitcairn',
	  'PL' => 'Poland',
	  'PT' => 'Portugal',
	  'PR' => 'Puerto Rico',
	  'QA' => 'Qatar',
	  'RE' => 'Réunion',
	  'RO' => 'Romania',
	  'RU' => 'Russian Federation',
	  'RW' => 'Rwanda',
	  'SH' => 'Saint Helena',
	  'KN' => 'Saint Kitts and Nevis',
	  'LC' => 'Saint Lucia',
	  'PM' => 'Saint Pierre and Miquelon',
	  'VC' => 'Saint Vincent and the Grenadines',
	  'WS' => 'Samoa',
	  'SM' => 'San Marino',
	  'ST' => 'Sao Tome and Principe',
	  'SA' => 'Saudi Arabia',
	  'SN' => 'Senegal',
	  'RS' => 'Serbia',
	  'SC' => 'Seychelles',
	  'SL' => 'Sierra Leone',
	  'SG' => 'Singapore',
	  'SK' => 'Slovakia',
	  'SI' => 'Slovenia',
	  'SB' => 'Solomon Islands',
	  'SO' => 'Somalia',
	  'ZA' => 'South Africa',
	  'GS' => 'South Georgia and the South Sandwich Islands',
	  'ES' => 'Spain',
	  'LK' => 'Sri Lanka',
	  'SD' => 'Sudan',
	  'SR' => 'Suriname',
	  'SJ' => 'Svalbard and Jan Mayen',
	  'SZ' => 'Swaziland',
	  'SE' => 'Sweden',
	  'CH' => 'Switzerland',
	  'SY' => 'Syrian Arab Republic',
	  'TW' => 'Taiwan, Province of China',
	  'TJ' => 'Tajikistan',
	  'TZ' => 'Tanzania, United Republic of',
	  'TH' => 'Thailand',
	  'TL' => 'Timor-Leste',
	  'TG' => 'Togo',
	  'TK' => 'Tokelau',
	  'TO' => 'Tonga',
	  'TT' => 'Trinidad and Tobago',
	  'TN' => 'Tunisia',
	  'TR' => 'Turkey',
	  'TM' => 'Turkmenistan',
	  'TC' => 'Turks and Caicos Islands',
	  'TV' => 'Tuvalu',
	  'UG' => 'Uganda',
	  'UA' => 'Ukraine',
	  'AE' => 'United Arab Emirates',
	  'GB' => 'United Kingdom',
	  'US' => 'United States',
	  'UM' => 'United States Minor Outlying Islands',
	  'UY' => 'Uruguay',
	  'UZ' => 'Uzbekistan',
	  'VU' => 'Vanuatu',
	  'VE' => 'Venezuela',
	  'VN' => 'Viet Nam',
	  'VG' => 'Virgin Islands, British',
	  'VI' => 'Virgin Islands, U.S.',
	  'WF' => 'Wallis and Futuna',
	  'EH' => 'Western Sahara',
	  'YE' => 'Yemen',
	  'ZM' => 'Zambia',
	  'ZW' => 'Zimbabwe',
	);
	}
}	

