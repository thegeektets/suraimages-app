<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registration extends CI_Controller {

	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
   	}

	public function index()
	{	
		$data['success'] = '';
		$this->load->helper(array('form', 'url'));	
		$this->load->helper('url'); 
		$this->load->view('registration/header', $data);
		$this->load->view('registration/index' ,$data);
		$this->load->view('registration/footer');
	}

	public function register_user()
	{
		$data['success'] = '';
	    $this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_email', 'txt_email ', 'required|valid_email'); 
        $this->form_validation->set_rules('txt_password', 'txt_password  ', 'required'); 
		$this->form_validation->set_rules('txt_cpassword', 'txt_cpassword  ', 'required'); 
	    
	   	$this->load->view('registration/header', $data);

        if ($this->form_validation->run() === FALSE) {
	    		$data['success'] = FALSE;
	    		$data['message'] =  'Validation error';
	    		$this->load->view('registration/index', $data);
	    } else {
	    		if (set_value('txt_password') === set_value('txt_cpassword')) {
	    			$value = $this->user_model->insert_new_user();
    				if ( $value === TRUE){
    					$data['success'] = TRUE;
    					$result = $this->send_welcome_email(set_value('txt_email'),set_value('txt_username'));
    					
    					if(strlen($result) == 13 ){
    						$data['message'] = 	'Registration Successfull <br/>
    											 An email has been sent to your email address please confirm your email before you can proceed';
    					} else {
    					  $data['message'] = 	'Registration Successfull <br/>
    											 Failed to send email <br/>';
    					}
    					$this->load->view('registration/login' , $data);
    				} else {
	    				$data['success'] = FALSE;
	    				$data['message'] = $value['message'];
	    				$this->load->view('registration/index' , $data);
    			    }
    			
	    			
	    		} else {
	    			$data['success'] = FALSE;
	    			$data['message'] =  'Password does not match Confirmation password';
					$this->load->view('registration/index' , $data);
	    		}
	    }
	    $this->load->view('registration/footer');                          
	   
	}
		
	public function login()
	{
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        if ($this->session->userdata('logged_in') === TRUE ) {
           $this->dashboard();
        } else {
        $data['success']=("") ;
		$this->load->view('registration/header', $data);
		$this->load->view('registration/login' , $data);
		$this->load->view('registration/footer');
		}
	}

	public function login_user() {
      
      $this->load->library('session');
      $data['success']=("") ;
  	  $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('txt_email', 'txt_email', 'required'); 
      $this->form_validation->set_rules('txt_password', 'txt_password', 'required');
      $result = ""; 
                      
	    if ($this->form_validation->run() == FALSE) {
	 	   $data['success'] = FALSE;
	 	   $data['message'] =  'Validation error all fields are required';
	 	   $this->load->view('registration/header', $data);
	       $this->load->view('registration/login',$data);
	       $this->load->view('registration/footer');   
	     
	    } else {
	       $user_pass = $this->user_model->get_user_pass();
	       $user_meta = $this->user_model-> get_user_meta();
	       $user_approval = $this->user_model-> get_user_approval();

		       if(md5($this->input->post("txt_password")) === $user_pass) {
			       	
			       	if($user_approval == TRUE ){
			       		$newdata = array(
			       		        'user_meta'  => $user_meta,
			       		        'logged_in' => TRUE,
			       		        );
			       		$this->session->set_userdata($newdata);
			       		$user_session = $this->session->all_userdata();
			       		
			       		if ($user_session['add_to_cart'] === TRUE ){
			       			
			       			header('Location:'.base_url('index.php/main/complete_add_to_cart'));

			       		} else {
			       			$this->dashboard();
			       		}


			       	} else {
			       	   $result = $this->send_welcome_email(set_value('txt_email'),set_value('txt_email'));
			       	   $data['success'] = FALSE;
				 	   $data['message'] =  'An email has been sent to your email address please confirm your email before you can proceed';
				 	   $this->load->view('registration/header', $data);
				       $this->load->view('registration/login',$data);
				       $this->load->view('registration/footer');   
			       	}
		        
		        } else {
			 	   $data['success'] = FALSE;
			 	   $data['message'] =  'Login failed , email or password is incorrect';
			 	   $this->load->view('registration/header', $data);
			       $this->load->view('registration/login',$data);
			       $this->load->view('registration/footer');   
			    }
    	}

	}
	public function forgot_password()
	{
      $data['success']=("") ;
  	    $this->load->helper(array('form', 'url'));
		$this->load->view('registration/header', $data);
		$this->load->view('registration/forgot', $data);
		$this->load->view('registration/footer');
	}
	public function recover_password() {
      $data['success']=("") ;
  	  $this->load->helper(array('form', 'url'));
	  $user_meta = $this->user_model-> get_user_meta();
	  
	  if(sizeof($user_meta)> 0){
	  		$this->send_reset_email();
	  		$data['success'] = TRUE;
	  	    $data['message'] =  'A recovery email hes been sent to your email';
	  		$this->load->view('registration/header', $data);
	  		$this->load->view('registration/forgot',$data);
	  		$this->load->view('registration/footer');   
	  } else {
	  	   $data['success'] = FALSE;
	 	   $data['message'] =  'email does not exist please check and try again';
	 	   $this->load->view('registration/header', $data);
	       $this->load->view('registration/forgot',$data);
	       $this->load->view('registration/footer');   
	  }
   	}
   	public function approve_email($code){
   		$this->load->helper(array('form', 'url'));
   		$this->load->library('session');
   		$code_user = $this->user_model-> get_code_user($code);
   		if(count($code_user)>0){
   			$this->user_model->update_approve_status($code_user[0]['email']);
   			$data['success'] = TRUE;
			$data['message'] =  'Email address approved login to access your account';
   		} else {
   			$data['success'] = FALSE;
			$data['message'] =  'Failed to approve email please check your email and try again';
		}

   		$this->load->view('registration/header', $data);
   		$this->load->view('registration/login' , $data);
   		$this->load->view('registration/footer');
   	}
   	public function choose_account() {
   		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();;
   		$this->load->view('registration/header', $data);
		$this->load->view('registration/choose',$data);
		$this->load->view('registration/footer');   	
   	}
   	public function switch_contributor_account() {
	    $this->load->library('session');
	    $this->load->helper('url');
	    $user_session=$this->session->all_userdata();
		$this->user_model->update_user_login($user_session['user_meta']['0']['email'], 'contributor');
		$this->open_contributor_dashboard();
   	}
   	public function switch_member_account() {
	    $this->load->library('session');
	    $this->load->helper('url');
	    $user_session=$this->session->all_userdata();
		$this->user_model->update_user_login($user_session['user_meta']['0']['email'], 'member');
		$this->open_member_dashboard();
   	}
	public function dashboard()
	{
		$this->load->library('session');
		$user_session = $this->session->all_userdata();
		if($user_session['user_meta']['0']['login'] == FALSE ) {
		   $this->choose_account();
		} else {
			if($user_session['user_meta']['0']['account'] == 'member') {
				$this->open_member_dashboard();
			} else if ( $user_session['user_meta']['0']['account'] == 'contributor' ) {
				$this->open_contributor_dashboard();
			} else {
				$this->open_admin_dashboard();
			}
		}
	}

	public function open_member_dashboard(){
	    $this->load->library('session');
	    $this->load->helper('url');
	    $user_session=$this->session->all_userdata();
	   	$result = "";
	   	if ($user_session['user_meta']['0']['login'] == FALSE) {
			$this->user_model->update_user_login($user_session['user_meta']['0']['email'], 'member');
			$result = $this->send_member_welcome_email($user_session['user_meta']['0']['email'],$user_session['user_meta']['0']['username']);
		}
		
		if(strlen($result) == 13 ){
			$data['message'] = 	'Registration Successfull <br/>
								 A welcome email has been send to your account';
		} else {
		  $data['message'] = 	'Registration Successfull <br/>
								 '.$result;
		}
   		header('Location:'.base_url('index.php/member'));
	}

	public function open_contributor_dashboard(){
	    $this->load->library('session');
	    $this->load->helper('url');
		$user_session=$this->session->all_userdata();
		$result = "";
		if ($user_session['user_meta']['0']['login'] == FALSE) {
			$this->user_model->update_user_login($user_session['user_meta']['0']['email'], 'contributor');
			$result = $this->send_contributor_welcome_email($user_session['user_meta']['0']['email'],$user_session['user_meta']['0']['username']);
			
		}
		
		if(strlen($result) == 13 ){
			$data['message'] = 	'Registration Successfull <br/>
								 A welcome email has been send to your account';
		} else {
		  $data['message'] = 	'Registration Successfull <br/>
								 '.$result;
		}
   		header('Location:'.base_url('index.php/contributor'));
	}

	public function open_admin_dashboard(){
	    $this->load->library('session');
	    $this->load->helper('url');
		$user_session=$this->session->all_userdata();
		if ($user_session['user_meta']['0']['login'] == FALSE) {
			$this->user_model->update_user_login($user_session['user_meta']['0']['email'], 'admin');
		}
   		header('Location:'.base_url('index.php/admin'));
	}

	public function logout() 
	{
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->session->sess_destroy();
        $data['success']= '';
        $data['message'] = 	'';
		$this->load->view('registration/header', $data);
		$this->load->view('registration/login' , $data);
		$this->load->view('registration/footer');
	}

	public function initializemail() {
	    $this->load->library('email');
		 $config['useragent'] = 'CodeIgniter';
		 $config['mailpath']  = "/usr/bin/sendmail";
		 $config['protocol'] = ""; 
		 $config['smtp_host'] = ""; 
		 $config['smtp_port'] = ""; 
		 $config['smtp_user'] = "suraimagesbackend@gmail.com"; 
		 $config['smtp_pass'] = "Sura@Images"; 
		 $config['smtp_timeout'] = 5;
		 $config['wordwrap'] = TRUE;
		 $config['wrapchars'] = 76;
		 $config['mailtype'] = 'html';
		 $config['charset'] = 'utf-8';
		 $config['validate'] = FALSE;
		 $config['priority'] = 3;
		 $config['crlf'] = "\r\n";
		 $config['newline'] = "\r\n";
		 $config['bcc_batch_mode'] = FALSE;
		 $config['bcc_batch_size'] = 200;
	     $this->email->initialize($config);
	 } 

	public function send_welcome_email($email , $username) {
		 $code = $this->generate_random_password();
		 $this->user_model->update_approve_code($code,$email);

	     $this->load->helper(array('form', 'url'));
	     $name = $username;
	     $html = "<head>
				<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'/>
				<style type='text/css'>
				@font-face {
				font-family: 'Calibri';
				font-weight: 700;
				src: url('".base_url('assets/admin/calibri/Calibri Bold.ttf')."');
				}

				@font-face {
				font-family: 'Calibri';
				font-weight: normal;
				src: url('".base_url('assets/admin/calibri/Calibri.ttf')."');
				}
				@font-face {
				font-family: 'Calibri';
				font-weight: 100;
				src: url('".base_url('assets/admin/calibri/calibril.ttf')."');
				
				}
				body,
				html {
				background: #fff !important;
				} 
				body {
				background: #f3f3f3 !important;
				margin: 0px auto;
				padding-left: 25px;
				padding-right: 25px;
				width: 900px;
				box-shadow: 5px 5px 5px #888888;
				margin-top: 10;
				margin-bottom: 10;
				position: relative;
				font-family: 'Calibri';
				font-weight: 300;
				font-size: 18px;
				color: #888;
				}
				.header {
				background: #262134 !important;
				margin-left: -25px;
				margin-right: -25px;
				display: block;
				}
				.body-drip {
				margin-top: 10px;
				display: block;
				}
				.logo {
				padding: 10px;
				float: left;
				}
				.logo > img {
				height: 40px;
				}
				.phone {
				margin-top: 10px;
				float: right;
				padding: 10px;
				color: #fff;
				}
				.footer {
				 background: #262134 !important;
				 padding: 15px;
				 display: block; 
				 position: absolute;
				 bottom: 0px;
				 left: 0px;
				 width: 920px;
				}
				.copyright {
				color: #fff;
				float: right;
				font-size: 14px;
				}
				.social {
				float: right;
				color: #fff;
				font-size: 14px;
				margin-right: 10px;
				}
				</style>
				</head>

				<container class='header'>
				<div class='logo'>
				<img src='".base_url('assets/admin/img/sura_logo.png')."' alt=''>

				</div>
				<div class='phone'>
				  <i class='fa fa-phone' aria-hidden='true'></i>
				  +254 20 242 9588
				</div>
				<div style='clear: both'></div>
				</container>

				<container class='body-drip'>

				<spacer size='16'></spacer>

				<spacer size='16'></spacer>

				<row>
				<columns>
				  <h4 class='text-center'>Subject: You have successfully registered with Sura Images. </h4>
				</columns>
				</row>


				<row>
				<columns>
				  <p class='text-center'> Welcome ".$name.", </br>
				  Thank you for registering with Sura Images. 
				  <spacer size='16'></spacer>
				  <spacer size='16'></spacer>
				  <br/><br/>
				  Click the <a href='".base_url('index.php/registration/approve_email/'.$code)."'> Link </a> to Continue.
				  </p>
				</columns>
				</row>

				<row class='collapsed footer'>
				<columns>
				  <spacer size='16'></spacer>
				  
				  <div class='copyright'>
				      Copyright &copy; 2016 Sura Images.
				  </div>

				  <div class='social'>
				      Follow Us 
				      <i class='fa fa-facebook-square' aria-hidden='true'></i>
				      <i class='fa fa-twitter-square' aria-hidden='true'></i>
				      <i class='fa fa-youtube-square' aria-hidden='true'></i>
				  </div>
				</columns>
				</row>

				</container>";
	     $this->initializemail();
	     $this->load->helper('url');
	     $this->load->library('email');
	     $this->email->from('support@suraimages.com', 'SuraImages Support');
	     $this->email->to($email); 
	     $this->email->subject('You have successfully registered with Sura Images');
	     $this->email->message(''.$html); 
	     
	     if($this->email->send()){
	        return $this->email->print_debugger();
	     }else{
	        return $this->email->print_debugger();
	     }

	 }
	public function send_contributor_welcome_email($email , $username) {
	     $this->load->helper(array('form', 'url'));
	     $name = $username;
	     $html = "<head>
				<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'/>
				<style type='text/css'>
				@font-face {
				font-family: 'Calibri';
				font-weight: 700;
				src: url('".base_url('assets/admin/calibri/Calibri Bold.ttf')."');
				}

				@font-face {
				font-family: 'Calibri';
				font-weight: normal;
				src: url('".base_url('assets/admin/calibri/Calibri.ttf')."');
				}
				@font-face {
				font-family: 'Calibri';
				font-weight: 100;
				src: url('".base_url('assets/admin/calibri/calibril.ttf')."');
				
				}
				body,
				html {
				  background: #fff !important;
				} 
				body {
				  background: #f3f3f3 !important;
				  margin: 0px auto;
				  padding-left: 25px;
				  padding-right: 25px;
				  width: 900px;
				  box-shadow: 5px 5px 5px #888888;
				  margin-top: 10;
				  margin-bottom: 10;
				  position: relative;
				  font-family: 'Calibri';
				  font-weight: 300;
				  font-size: 18px;
				  color: #888;
				}
				.header {
				  background: #262134 !important;
				  margin-left: -25px;
				  margin-right: -25px;
				  display: block;
				  font-family: 'Calibri';
				}
				.body-drip {
				  display: block;
				  border-top:20px #c2b59b solid;
				}
				.logo {
				  padding: 10px;
				  float: left;
				}
				.logo > img {
				  height: 40px;
				}
				.phone {
				  margin-top: 10px;
				  float: right;
				  padding: 10px;
				  color: #fff;
				  font-family: 'Calibri';
				}
				.footer {
				   background: #262134 !important;
				   padding: 15px;
				   display: block; 
				   position: absolute;
				   bottom: 0px;
				   left: 0px;
				   width: 920px;
				   font-family: 'Calibri';
				}
				.copyright {
				  color: #fff;
				  float: right;
				  font-size: 14px;
				  font-family: 'Calibri';
				}
				.social {
				  float: right;
				  color: #fff;
				  font-size: 14px;
				  margin-right: 10px;
				  font-family: 'Calibri';
				}
				</style>
				</head>

				<container class='header'>
				<div class='logo'>
				<img src='".base_url('assets/admin/img/sura_logo.png')."' alt=''>

				</div>
				<div class='phone'>
				  <i class='fa fa-phone' aria-hidden='true'></i>
				  +254 20 242 9588
				</div>
				<div style='clear: both'></div>
				</container>

				<container class='body-drip'>

				<spacer size='16'></spacer>

				<spacer size='16'></spacer>

				<row>
				<columns>
				  <h4 class='text-center'>Subject: You are now a contributor to Sura Images. </h4>
				</columns>
				</row>


				<row>
				<columns>
				  <p class='text-center'> Welcome ".$name.", </br>
				      Thank you for registering with Sura Images, you are now a contributor to
				      Sura Images.
				      <br/>
				      <br/>
				      Turn your work into a cash cow by easily uploading to Sura images, set your own price, sit back and money will start flowing in.
				      <br/>
				      <br/>
				      Now you can hit the <a href='".base_url()."/index.php/contributor/'> jackpot! </a>
				  </p>
				</columns>
				</row>

				<row class='collapsed footer'>
				<columns>
				  <spacer size='16'></spacer>
				  
				  <div class='copyright'>
				      Copyright &copy; 2016 Sura Images.
				  </div>

				  <div class='social'>
				      Follow Us 
				      <i class='fa fa-facebook-square' aria-hidden='true'></i>
				      <i class='fa fa-twitter-square' aria-hidden='true'></i>
				      <i class='fa fa-youtube-square' aria-hidden='true'></i>
				  </div>
				</columns>
				</row>

				</container>";
	     $this->initializemail();
	     $this->load->helper('url');
	     $this->load->library('email');
	     $this->email->from('support@suraimages.com', 'SuraImages Support');
	     $this->email->to($email); 
	     $this->email->subject('You are now a contributor to Sura Images');
	     $this->email->message(''.$html); 
	     
	     if($this->email->send()){
	        return $this->email->print_debugger();
	     }else{
	        return $this->email->print_debugger();
	     }

	 }
	public function send_member_welcome_email($email , $username) {
	     $this->load->helper(array('form', 'url'));
	     $name = $username;
	     $html = "<head>
				<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'/>
				<style type='text/css'>
				@font-face {
				font-family: 'Calibri';
				font-weight: 700;
				src: url('".base_url('assets/admin/calibri/Calibri Bold.ttf')."');
				}

				@font-face {
				font-family: 'Calibri';
				font-weight: normal;
				src: url('".base_url('assets/admin/calibri/Calibri.ttf')."');
				}
				@font-face {
				font-family: 'Calibri';
				font-weight: 100;
				src: url('".base_url('assets/admin/calibri/calibril.ttf')."');
				
				}
				body,
				html {
				background: #fff !important;
				} 
				body {
				background: #f3f3f3 !important;
				margin: 0px auto;
				padding-left: 25px;
				padding-right: 25px;
				width: 900px;
				box-shadow: 5px 5px 5px #888888;
				margin-top: 10;
				margin-bottom: 10;
				position: relative;
				font-family: 'Calibri';
				font-weight: 300;
				font-size: 18px;
				color: #888;
				}
				.header {
				background: #262134 !important;
				margin-left: -25px;
				margin-right: -25px;
				display: block;
				}
				.body-drip {
				margin-top: 10px;
				display: block;
				}
				.logo {
				padding: 10px;
				float: left;
				}
				.logo > img {
				height: 40px;
				}
				.phone {
				margin-top: 10px;
				float: right;
				padding: 10px;
				color: #fff;
				}
				.footer {
				 background: #262134 !important;
				 padding: 15px;
				 display: block; 
				 position: absolute;
				 bottom: 0px;
				 left: 0px;
				 width: 920px;
				}
				.copyright {
				color: #fff;
				float: right;
				font-size: 14px;
				}
				.social {
				float: right;
				color: #fff;
				font-size: 14px;
				margin-right: 10px;
				}
				</style>
				</head>

				<container class='header'>
				<div class='logo'>
				<img src='".base_url('assets/admin/img/sura_logo.png')."' alt=''>

				</div>
				<div class='phone'>
				  <i class='fa fa-phone' aria-hidden='true'></i>
				  +254 20 242 9588
				</div>
				<div style='clear: both'></div>
				</container>

				<container class='body-drip'>

				<spacer size='16'></spacer>

				<spacer size='16'></spacer>

				<row>
				<columns>
				  <h4 class='text-center'>Subject: You are now a member to Sura Images. </h4>
				</columns>
				</row>


				<row>
				<columns>
				  <p class='text-center'> Welcome ".$name.", </br>
				      Thank you for registering with Sura Images, you are now a member to
				      Sura Images.
				      <br/>
				      <br/>
				      You can now start enjoying our vast collections of authentic African
				      content be it images, footage or illustrations at affordable prices.
				      <br/>
				      <br/>
				      Jump  <a href='".base_url()."/index.php/member/'> over</a> and enjoy the ride!
				  </p>
				</columns>
				</row>

				<row class='collapsed footer'>
				<columns>
				  <spacer size='16'></spacer>
				  
				  <div class='copyright'>
				      Copyright &copy; 2016 Sura Images.
				  </div>

				  <div class='social'>
				      Follow Us 
				      <i class='fa fa-facebook-square' aria-hidden='true'></i>
				      <i class='fa fa-twitter-square' aria-hidden='true'></i>
				      <i class='fa fa-youtube-square' aria-hidden='true'></i>
				  </div>
				</columns>
				</row>

				</container>";
	     $this->initializemail();
	     $this->load->helper('url');
	     $this->load->library('email');
	     $this->email->from('support@suraimages.com', 'SuraImages Support');
	     $this->email->to($email); 
	     $this->email->subject('Congratulations! You are now a member to Sura Images');
	     $this->email->message(''.$html); 
	     
	     if($this->email->send()){
	        return $this->email->print_debugger();
	     }else{
	        return $this->email->print_debugger();
	     }

	 }

	public function send_test_email() {
	     $email = 'griffinmuteti31@gmail.com';
	     $this->initializemail();
	     $this->load->helper('url');
	     $this->load->library('email');
	     $this->email->from('support@suraimages.com', 'SuraImages Support');
	     $this->email->to($email); 
	     $this->email->subject('SuraImages Password');
	     $this->email->message('This is a test email' ); 
	     
	     if($this->email->send()){
	        echo $this->email->print_debugger();
	     }else{
	        echo $this->email->print_debugger();
	     }

	 }
	public function send_reset_email(){
	     $email = $this->input->post("txt_email");
	     $password = $this->generate_random_password();
	     $this->user_model->update_user_password($password);

	     $this->initializemail();
	     $this->load->helper('url');
	     $this->load->library('email');
	     $this->email->from('support@suraimages.com', 'SuraImages Support');
	     $this->email->to($email); 
	     $this->email->subject('SuraImages Password');
	     $this->email->message('Your Password has been reset to '. $password ); 
	     $this->email->send();
	 }
    public function generate_random_password() {
	     $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	     $pass = array(); //remember to declare $pass as an array
	     $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	     for ($i = 0; $i < 8; $i++) {
	         $n = rand(0, $alphaLength);
	         $pass[] = $alphabet[$n];
	     }
	     return implode($pass); //turn the array into a string
	 }

}
