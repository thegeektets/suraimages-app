<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HAuth extends CI_Controller {
	
	public function __construct()
	{
		// Constructor to auto-load HybridAuthLib
		parent::__construct();
		$this->load->model('user_model');
		//error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	}
	public function index()
	{
		$this->load->view('hauth/home');
	}

	public function login($provider)
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		 
		log_message('debug', "controllers.HAuth.login($provider) called");

		try
		{
			log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');
			$this->load->library('HybridAuthLib');

			if ($this->hybridauthlib->providerEnabled($provider))
			{
				log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
				$service = $this->hybridauthlib->authenticate($provider);

				if ($service->isUserConnected())
				{
					log_message('debug', 'controller.HAuth.login: user authenticated.');

					$user_profile = $service->getUserProfile();

					log_message('info', 'controllers.HAuth.login: user profile:'.PHP_EOL.print_r($user_profile, TRUE));

					$data['user_profile'] = $user_profile;
					$user_profile = (array) $user_profile;
					$this->set_twitter_profile($user_profile);
					
					if ($provider == "Facebook" || $provider == "Google" ) {
						$this->user_model->create_facebook_user($user_profile);
						$this->dashboard($user_profile);
					
					} else if ($provider == "Twitter") {
						$this->load->view('hauth/header',$data);
						$this->load->view('hauth/twitter',$data);
						$this->load->view('hauth/footer',$data);							 
					} else {

						$this->load->view('hauth/done',$data);	
					}
				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				log_message('error', 'controllers.HAuth.login: This provider is not enabled ('.$provider.')');
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
				case 0 : $error = 'Unspecified error.'; break;
				case 1 : $error = 'Hybriauth configuration error.'; break;
				case 2 : $error = 'Provider not properly configured.'; break;
				case 3 : $error = 'Unknown or disabled provider.'; break;
				case 4 : $error = 'Missing provider application credentials.'; break;
				case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				         //redirect();
				         if (isset($service))
				         {
				         	log_message('debug', 'controllers.HAuth.login: logging out from service.');
				         	$service->logout();
				         }
				         show_error('User has cancelled the authentication or the provider refused the connection.');
				         break;
				case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				         break;
				case 7 : $error = 'User not connected to the provider.';
				         break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			log_message('error', 'controllers.HAuth.login: '.$error);
			show_error('Error authenticating user.');
		}
	}
	public function set_twitter_profile($user_profile){
		error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
		session_start();
		session_destroy();

		$this->load->library('session');
		$this->session->set_userdata('twitter_profile', $user_profile);
		
	}
	public function twitter_user(){
		session_start();
		session_destroy();
		$data['success'] = '';
	    $this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
	    $this->load->library('session');
	    $this->form_validation->set_rules('txt_email', 'txt_email ', 'required|valid_email'); 
       
        if ($this->form_validation->run() === FALSE) {
	    		$data['success'] = FALSE;
	    		$data['message'] =  'Validation error';
	    		$this->load->view('hauth/header', $data);
	    		$this->load->view('hauth/twitter', $data);
	    		$this->load->view('hauth/footer');                          
	    } else {
	    	$user_profile = $this->session->all_userdata();
	    	$user_profile = $user_profile['twitter_profile'];
	    	$user_profile['email'] = set_value('txt_email');
	    	$this->user_model->create_facebook_user($user_profile);
	    	$this->dashboard($user_profile);
	    }
	}

	public function endpoint()
	{

		log_message('debug', 'controllers.HAuth.endpoint called.');
		log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: '.print_r($_REQUEST, TRUE));

		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
			$_GET = $_REQUEST;
		}

		log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
		require_once APPPATH.'/third_party/hybridauth/index.php';

	}

		public function dashboard($profile)
		{	
			error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
			session_start();
			
			$this->load->library('session');
			$useremail = $profile['email'];
			$user_meta = $this->user_model-> get_user_smeta($useremail);

			
			$user_meta['0']['logged_in'] = "TRUE";
			$newdata = array(
			        'user_meta'  => $user_meta,
			        'logged_in' => 'TRUE',
			        );
			$this->session->set_userdata($newdata);
			$user_session = $this->session->all_userdata();

			$data['user_session']=$this->session->all_userdata();;
			
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

	   	public function choose_account() {
	   		$this->load->library('session');
			$data['user_session']=$this->session->all_userdata();;
	   		
	   		$this->load->view('registration/header', $data);
			$this->load->view('registration/choose',$data);
			$this->load->view('registration/footer');   	
	   	}

		public function open_member_dashboard(){
		    $this->load->library('session');
		    $this->load->helper('url');
		    $user_session=$this->session->all_userdata();
		    
			if ($user_session['user_meta']['0']['login'] == FALSE) {
				$this->user_model->update_user_login($user_session['user_meta']['0']['email'], 'member');
				$result = $this->send_member_welcome_email($user_session['user_meta']['0']['email'],$user_session['user_meta']['0']['username']);
				
				if(strlen($result) == 13 ){
					$data['message'] = 	'Registration Successfull <br/>
										 A welcome email has been send to your account';
				} else {
				  $data['message'] = 	'Registration Successfull <br/>
										 Failed to send email <br/>'.$result;
				}
			}
			
	   		redirect('member/index');
		}

		public function open_contributor_dashboard(){
			
			$this->load->library('session');
		    $this->load->helper('url');
			$user_session=$this->session->all_userdata();
			if ($user_session['user_meta']['0']['login'] == FALSE) {
				$this->user_model->update_user_login($user_session['user_meta']['0']['email'], 'contributor');
				$result = $this->send_contributor_welcome_email($user_session['user_meta']['0']['email'],$user_session['user_meta']['0']['username']);
				
				if(strlen($result) == 13 ){
					$data['message'] = 	'Registration Successfull <br/>
										 A welcome email has been send to your account';
				} else {
				  $data['message'] = 	'Registration Successfull <br/>
										 Failed to send email <br/>'.$result;
				}
			}
			
			redirect('contributor/index');
	   		
	   		
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
			public function initializemail() {
			    $this->load->library('email');
			     $config['protocol'] = "smtp"; 
			     $config['smtp_host'] = "ssl://smtp.googlemail.com"; 
			     $config['smtp_port'] = "465"; 
			     $config['smtp_user'] = " suraimagesbackend@gmail.com"; 
			     $config['smtp_pass'] = "Sura@Images"; 
			     $config['mailtype'] = "html"; 
			     $config['charset'] = "iso-8859-1"; 
		  	     $config['newline'] = "\r\n";
			     $this->email->initialize($config);
			 } 

			public function send_welcome_email($email , $username) {
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
						  Click the <a href='".base_url('index.php/registration/choose_account')."'> Link </a> to Continue.
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
						      You can now start enjoying our vast collections of authentic African
						      content be it images, footage or illustrations at affordable prices.
						      <br/>
						      <br/>
						      Jump  <a href='".base_url()."/index.php/contributor/'> over</a> and enjoy the ride!
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

}

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */
