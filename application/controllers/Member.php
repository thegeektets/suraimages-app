<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class member extends CI_Controller {

	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
       $this->load->model('member_model');
       $this->load->model('contributor_model');
      	}


	public function index($data = NULL)
	{
		$this->load->helper('url'); 
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		if ($data == NULL ){
			$data['success'] ='';	
		} else {
			$data = $data;
		}
		if (isset($data['iframe_src']) || isset($data['payment_success']) ) {
			$data['checkout'] = true;
		} else {
			$data['checkout'] = false;
		}
		$data['user_session']=$this->session->all_userdata();;
		
		if (isset($data['user_session']['logged_in'])) {
			if(strlen($data['user_session']['user_meta']['0']['email']) > 0 ){
				$data['user_details'] = $this->fetch_user_details();
				$member_id = $data['user_details'][0]['user_id'];
				$data['user_cart'] = $this->member_model->get_user_cart($member_id);
				$data['purchase_history'] = $this->member_model->get_purchase_history($member_id);
				if (count($data['user_cart']) > 0) {
					$order_id = $data['user_cart'][0]['order_id'];
					$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
				}
				
				if(sizeof($data['user_details']) > 0){
				   $data['code'] = array_search($data['user_details']['0']['country'], $this->countrycodes()); // returns 'US'
				 }
	     	   	$this->load->view('member/header' , $data);
				$this->load->view('member/index' , $data);
				$this->load->view('member/footer');
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
	public function pesapal_res(){
		// load thankyou
		$reference = null;
		$pesapal_tracking_id = null;
		
		if(isset($_GET['pesapal_merchant_reference']))
		 $reference = $_GET['pesapal_merchant_reference'];
		if(isset($_GET['pesapal_transaction_tracking_id']))
		 $pesapal_tracking_id = $_GET['pesapal_transaction_tracking_id'];
		
		$data['payment_success'] = true;
		
		// introduce check here

		// store payment
		if($reference !== null && $pesapal_tracking_id !== null ){
			$this->member_model->update_order_payment($reference, $pesapal_tracking_id);	
		}
		$data['reference'] = $reference;
		$this->index($data);

	}

	public function download_package($order_id) {
		$package_files = $this->member_model->get_package_files($order_id);

		for($i=0; $i < count($package_files); $i++) {
			
			if($package_files[$i]['product_license'] == 'Exclusive License') {
			
					$duration = $package_files[$i]['product_duration'];
			
			} else if($package_files[$i]['exclusive_duration'] !== NULL ) {

					$duration = $package_files[$i]['exclusive_duration'];		
			}
			if($duration !== '') {
				$duration = trim($duration);
				 if($duration == '1 Month'){
				 	
				 	$start = Date('Y-m-d');
				 	$end = new DateTime('+ '.$duration);
				 	$end = $end->format('Y-m-d');

				  } else if ($duration == '3 Months' ) {
				  	 $start = Date('Y-m-d');
				 	 $end = new DateTime('+ '.$duration);
				 	 $end = $end->format('Y-m-d');

				  } else if ($duration == '6 Months') {
				 	 
				 	 $start = Date('Y-m-d');
				 	 $end = new DateTime('+ '.$duration);
				 	 $end = $end->format('Y-m-d');

				  } else if ($duration == '1 Year') {
				 	
				 	$start = Date('Y-m-d');
				 	$end = new DateTime('+ '.$duration);
				 	$end = $end->format('Y-m-d');

				  } else if ($duration == '2 Years') {
				 	
				 	$start = Date('Y-m-d');
				 	$end = new DateTime('+ '.$duration);
				 	$end = $end->format('Y-m-d');
				  }
				  $upload_id = $package_files[$i]['upload_id'];
				  $this->member_model->update_exclusive_image($upload_id, $start, $end);
			}
			$models = $this->contributor_model->get_image_models($package_files[$i]['upload_id']);
			if(count($models) > 0) {
				for($m=0; count($models)>$m ; $m++) {
					$image_id  = $package_files[$i]['upload_id'];
					$amount = $package_files[$i]['product_cost'];
					$email = $models[$m]['model_email'];
					$email = trim($email);
					$image = $package_files[$i]['file_thumbnail'];
					//$this->notify_model_purchase($email,$image_id,$amount,$image);
				}
			}

			
		}

		$this->create_zip($order_id,$package_files);
	}
	public function create_zip($order_id , $package_files) {
		ini_set("allow_url_fopen", 'On');
		$this->load->helper(array('form', 'url'));
		$this->load->library('image_lib');
		$reference = $order_id;
		$zipname = 'suraimages_package_'.$reference.'.zip';
		$zip = new ZipArchive;
		$zip -> open($zipname, ZipArchive:: CREATE | ZipArchive:: OVERWRITE);
		
		for($i=0; $i < count($package_files); $i++) {
			
			$file_url = $package_files[$i]['file_url'];
			
			
			if($package_files[$i]['file_license'] == 'Right Managed'){

				$url = $file_url;
				$ch = curl_init();
				curl_setopt ($ch, CURLOPT_URL, $url);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
				$contents = curl_exec($ch);
				$zip->addFromString(basename($file_url), $contents);	
				
			} else {
				$size = $package_files[$i]['product_size'];
				$pathinfo = pathinfo($file_url);
				if($size == 'Large'){
						$url = $file_url;
						$ch = curl_init();
						curl_setopt ($ch, CURLOPT_URL, $url);
						curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
						curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
						$contents = curl_exec($ch);
						$zip->addFromString(basename($file_url), $contents);	
					
				} else {
					$config2['image_library'] = 'gd2';
		 	  	 	$config2['source_image'] = "./assets/uploads/".$pathinfo['filename'].".".$pathinfo['extension'];
	                $config2['new_image'] = './assets/downloads/';
		            $config2['maintain_ratio'] = TRUE;
	                $config2['create_thumb'] = TRUE;
	                $config2['thumb_marker'] = '_download';
	                
	                if($size == 'Medium'){
	                	$config2['width'] = round($package_files[$i]['file_width']/2);
	                	$config2['height'] = round($package_files[$i]['file_height']/2);
	                 } else {
	                 	$config2['width'] = round($package_files[$i]['file_width']/3);
	                 	$config2['height'] = round($package_files[$i]['file_height']/3);
	                 }
	                $this->image_lib->initialize($config2);
	                if ( !$this->image_lib->resize()) {
	            
	            		echo $this->image_lib->display_errors();
	          	
	          		} else {
						$this->image_lib->clear();
		            	$thumbnail_path = base_url().'/assets/downloads/'. $pathinfo['filename'] . "_download." . $pathinfo['extension'];
		            	  $url = $thumbnail_path;
				$ch = curl_init();
				curl_setopt ($ch, CURLOPT_URL, $url);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
				$contents = curl_exec($ch);
				$zip->addFromString(basename($thumbnail_path), $contents);	
		            }
            	}
			}
			
		}
		$zip->close();
		$this->download($zipname);
	}
	public function download($file) {
		$this->load->helper(array('form', 'url'));
		$file = base_url().$file;
		header('Location:'.$file);
	}

	public function pay_pesapal() {
		$this->load->library('session');
		$user_cart = $this->input->post("user_cart");
		$user_cart = json_decode(base64_decode($user_cart) , true);
		$data['user_session']=$this->session->all_userdata();
		if($user_cart == NULL && isset($data['user_session']['logged_in'])) {
			$data['user_details'] = $this->fetch_user_details();
			$member_id = $data['user_details'][0]['user_id'];
			$user_cart = $this->member_model->get_user_cart($member_id);
			
		}


		$this->load->helper(array('form', 'url'));
		$this->load->file('checkout/OAuth.php');
		//pesapal params -
		$token = $params = NULL;

		// sandbox credentials

		$consumer_key = 'qrzxxvlzP8+SBD2tojveiB7fOhi6SCTK';//Register a merchant account on
		$consumer_secret = 'Sp9PIs7pURtJnJg3iDHKNC8PSYk=';
		
		
		// live credentials
		/*
		$consumer_key = '05lbwlrtbaK4TKK3+hdYlphWYLt1ImGG';//Register a merchant account on
		$consumer_secret = 'kfrsak44JrZU4fVx+T8jaGp+ZXc=';
		*/

		$signature_method = new OAuthSignatureMethod_HMAC_SHA1();
		
		$iframelink = 'https://demo.pesapal.com/api/PostPesapalDirectOrderV4';
		//$iframelink = 'https://www.pesapal.com/API/PostPesapalDirectOrderV4';

		$amount = $user_cart[0]['order_cost'];
		$amount = number_format($amount, 2, '.', '');//format amount to 2 decimal places
		$desc = 'Sura Images Order '.$user_cart[0]['order_id'].' Payment Request';
		$type = 'MERCHANT'; //default value = MERCHANT
		$reference = $user_cart[0]['order_id'];//unique order id of the transaction, generated by merchant
		$first_name = $user_cart[0]['firstname'];
		$last_name = $user_cart[0]['middlename'];
		$email = $data['user_details'][0]['email'];
		$phonenumber = $user_cart[0]['telnumber'];//ONE of email or phonenumber is required
		$currency = 'USD';
		$callback_url = base_url().'/index.php/member/pesapal_res'; //redirect url, the page that will handle the response from pesapal.
		$post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"" . $amount . "\" Currency=\"" . $currency . "\" Description=\"" . $desc . "\" Type=\"" . $type . "\" Reference=\"" . $reference . "\" FirstName=\"" . $first_name . "\" LastName=\"" . $last_name . "\" Email=\"" . $email . "\" PhoneNumber=\"" . $phonenumber . "\" xmlns=\"http://www.pesapal.com\" />";
        $post_xml = htmlspecialchars($post_xml);
		$consumer = new OAuthConsumer($consumer_key, $consumer_secret);

		//post transaction to pesapal
		$data['iframe_src'] = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);
		$data['iframe_src']->set_parameter("oauth_callback", $callback_url);
		$data['iframe_src']->set_parameter("pesapal_request_data", $post_xml);
		$data['iframe_src']->sign_request($signature_method, $consumer, $token);

		//display pesapal - iframe and pass iframe_src

		$this->index($data);
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

	/*
	public function notify_model_purchase($email,$image_id,$amount,$image) {
		        $this->load->helper(array('form', 'url'));
		        $cart_items = "
				 <table>
				 	<thead>
				 		<tr>
					 		<th>
					 			
					 		</th>
					 		<th>
					 		</th>
					 		<th>
					 			Amount
					 		</th>
					 	</tr>
				 	</thead>
				 	<tbody>
				 
			          <tr>
			            <td class='image_thumb'>
			              <img src='".$image."' alt='' height='100px'>
			            </td>
			            <td class='image_desc'>
			              	The image of image id  ".$image_id." that you appear in has been purchased. Contact your photographer for payment
			            </td>
			            <td class='image_cost'>
			              <strong> Amount : </strong>
			              $ ".$amount."
			            </td>
			          </tr>" ;	
				 $cart_footer = "
				  	</tbody>
				  	</table>
				  "	;		
				  $cart_items = $cart_items . $cart_footer;		      
				 
			       $html = "<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
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
						    <img src='".base_url('assets/admin/img/sura_dark.png')."' alt=''>
						  </div>
						  <div class='address'>
						      Duplex Lower Hill <br/>
						      Upper Hill Rd <br/>
						      Suite 20, Upper Hill
						  </div>
						  <div class='address'>
						      P.O Box 38540-00100 <br/>
						      GPO, Nairobi, Kenya <br/>
						      +254 20 242 9588
						  </div>
						  <div class='phone'>
						      www.suraimages.com
						      info@suraimages.com
						  </div>
						  <div style='clear: both'></div>
						</container>

						<container class='body-drip'>

						  
						  <row>
						    <div class='quote_head'>
						      <h3 class='text-center' style='text-align:center'>	Subject: Sale(s) notification
                              </h3>
						    </div>
						  </row>

						 
						  <row>
						    <columns>
						      <p class='text-center'> 
						          <div class='float-left'>
						            <p>
						            <strong>Dear </strong> ".$email." </br>
						            The following are the sales you have made in the last one day. 
						            </p>
						            <p>
						          </div>
						            
						          <div class='float-right'>
						           <strong>Date: </strong> ".date('d/m/Y')."
						          </div>
						          <div style='clear: both'></div>
						          <br/>
						          <hr/>
						          ".$cart_items."
						          <row>
						            <div class='float-right'>
						                <strong>Total Amount : </strong>$".$amount."
						            </div>
						          </row>
						          <div style='clear: both'></div>
						          <hr/>
						          
						          <row class='footer'>
						              <hr/>
						              <strong>Disclaimer: </strong>This is a system generated email.
						          </row>
						</container>"; 
			     $this->initializemail();
			     $this->load->helper('url');
			     $this->load->library('email');
			     $this->email->from('support@suraimages.com', 'SuraImages Support');
			     $this->email->to($email); 
			     $this->email->subject('Sale(s) notification');
			     $this->email->message(''.$html);
			     $this->email->send();
	}
	
	
	
	public function send_quote_email($email, $id, $user_cart ) {
         $this->load->library('Pdf');

		 $user_cart = json_decode(base64_decode($user_cart) , true);
	  
	  	 $cart_items = "
		 <table>
		 	<thead>
		 		<tr>
			 		<th>
			 			Image
			 		</th>
			 		<th>
			 			Image Description
			 		</th>
			 		<th>
			 			Image Cost
			 		</th>
			 	</tr>
		 	</thead>
		 	<tbody>
		 ";
		 $added_items = false;
		 $total_cost = 0;
		 for ($c = 0 ; $c < count($user_cart) ; $c++ ) {
			 $check = $this->input->post("check_".$user_cart[$c]['product_id']);
			 if($check == 'on'){
			 	 $total_cost = $total_cost + $user_cart[$c]['product_cost'];
			 	 $cart_items = $cart_items . "
			 			          <tr>
			 			            <td class='image_thumb'>
			 			              <img src='".$user_cart[$c]['file_thumbnail']."' alt='' height='100px'>
			 			            </td>
			 			            <td class='image_desc'>
			 			              ".$user_cart[$c]['file_name']."
			 			            </td>
			 			            <td class='image_cost'>
			 			              <strong> Amount : </strong>
			 			              $ ".$user_cart[$c]['product_cost']."
			 			            </td>
			 			          </tr>
			 			          " ;	
				$added_items = true;
			 }
			 
		 } 
		 if($added_items == false){
		 	 for ($c = 0 ; $c < count($user_cart) ; $c++ ) {
		 	 	 $total_cost = $total_cost + $user_cart[$c]['product_cost'];
			 	 $cart_items = $cart_items . "
			 			          <tr>
			 			            <td class='image_thumb'>
			 			              <img src='".$user_cart[$c]['file_thumbnail']."' alt='' height='100px'>
			 			            </td>
			 			            <td class='image_desc'>
			 			              ".$user_cart[$c]['file_name']."
			 			            </td>
			 			            <td class='image_cost'>
			 			              <strong> Amount : </strong>
			 			              $ ".$user_cart[$c]['product_cost']."
			 			            </td>
			 			          </tr>
			 			          " ;	
			 
		 	 } 
		 }
		  $cart_footer = "
		  	</tbody>
		  	</table>
		  "	;		
		  $cart_items = $cart_items . $cart_footer;		      
		 $this->load->helper(array('form', 'url'));
	     $html = "
	     		<head>
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
				    <img src='".base_url('assets/admin/img/sura_dark.png')."' alt=''>
				  </div>
				  <div class='address'>
				      Duplex Lower Hill <br/>
				      Upper Hill Rd <br/>
				      Suite 20, Upper Hill
				  </div>
				  <div class='address'>
				      P.O Box 38540-00100 <br/>
				      GPO, Nairobi, Kenya <br/>
				      +254 20 242 9588
				  </div>
				  <div class='phone'>
				      www.suraimages.com
				      info@suraimages.com
				  </div>
				  <div style='clear: both'></div>
				</container>

				<container class='body-drip'>

				  
				  <row>
				    <div class='quote_head'>
				      <h3 class='text-center' style='text-align:center'> Quotation for license(s) </h3>
				    </div>
				  </row>

				 
				  <row>
				    <columns>
				      <p class='text-center'> 
				          <div class='float-left'>
				            <p>
				            <strong>Attention:</strong> ".$user_cart[0]['firstname']." ".$user_cart[0]['middlename']." </br>
				            </p>
				            <p>
				            <strong>Phone No:</strong> ".$user_cart[0]['telnumber']." </br>
				            </p>
				            <p>
				            <strong>Email:</strong> ".$user_cart[0]['email']." </br>
				            </p>
				            <p>
				            <strong>Currency:</strong> USD </br>
				            </p>
				          </div>
				            
				          <div class='float-right'>
				           <strong>Date: </strong> ".date('d/m/Y')."
				          </div>
				          <div style='clear: both'></div>
				          <br/>
				          <hr/>
				          ".$cart_items."
				          <row>
				            <div class='float-right'>
				                <strong>Total Amount : </strong>$".$total_cost."
				            </div>
				          </row>
				          <div style='clear: both'></div>
				          <hr/>
				          
				          <row class='footer'>
				              <hr/>
				              <strong>Disclaimer: </strong>This is a system generated quote that doesn't require a stamp.
				          </row>
				</container>";
	
		  $newFile  = 'qoute'.$user_cart[0]['member_id'].'.pdf';
		   $obj = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		   $obj->SetSubject('SuraImages license Quote'); // set document information
		   $obj->AddPage(); // add a page
		   $obj->SetFont('helvetica', '', 6);
		   $obj->writeHTML("".$html, true, false, false, false, '');
		   $obj->Output($newFile,'F');

		  
	     $this->initializemail();
	     $this->load->helper('url');
	     $this->load->library('email');
	     $this->email->from('support@suraimages.com', 'SuraImages Support');
	     $this->email->to($email); 
	     $this->email->subject('SuraImages license Quote');
	     $this->email->message(''.$html);
	     $this->email->attach($newFile);
 
	     
	     if($this->email->send()){
	     	 $data['success'] = 'true';
	     	 $data['qoutesuccess'] = 'true';
	         $data['message'] = $this->email->print_debugger();
	         $this->index($data);
	     }else{
	     	$data['success'] = 'false';
	     	$data['qoutesuccess'] = 'false';
	     	$data['message'] = $this->email->print_debugger();
	     	$this->index($data);
	     }
		
	 }
	*/
	public function send_quote() {
		$this->load->helper(array('form', 'url'));	
		$email = $this->input->post("qoute_email");
		$member_id = $this->input->post("qoute_id");
		$user_cart = $this->input->post("qoute_cart");
		$this->send_quote_email($email, $member_id, $user_cart);
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
        
        $this->load->view('member/header', $data);

        if ($this->form_validation->run() === FALSE) {
	    		$data['success'] = FALSE;
	    		$data['message'] =  'Validation error';
	    		$this->load->view('member/index', $data);
	    } else {
    			$this->user_model->update_account_details($data['user_session']['user_meta']['0']['id']);
    			$data['success'] = TRUE;
    			$data['message'] =  'Account details updated';
    			$data['user_details'] = $this->fetch_user_details();
    			$data['code'] = array_search($data['user_details']['0']['country'], $this->countrycodes()); // returns 'US'
				$this->load->view('member/index', $data);
	    }
	    $this->load->view('member/footer');
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
               $this->load->view('member/header', $data);
               $this->load->view('member/index', $data);
               $this->load->view('member/footer', $data); 
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

	public function fetch_user_details() {
   		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
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
