<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contributor extends CI_Controller {
	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
       $this->load->model('contributor_model');
   	}
	public function index()
	{
		$this->load->helper(array('form', 'url'));	
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		//var_dump($data['user_session']);
		
	if (isset($data['user_session']['logged_in'])) {
		
		if(strlen($data['user_session']['user_meta']['0']['email']) > 0 ){
			$data['user_details'] = $this->fetch_user_details();
			$id = $data['user_details'][0]['user_id'];
			$data['payment_details'] = $this->fetch_payment_details();
			$data['contributor_images'] = $this->contributor_model->get_contributor_images($id);
			
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

	public function update_id() {
		 
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
		 $idfile = 'idfile' ;
		 if ($this->upload->do_upload($idfile)) {
		      $this->load->library('session');
		      $data['success'] = TRUE;
		      $data['message'] = 'Upload successfull';
		      $id = $data['user_session']['user_meta']['0']['id'];
		      $this->user_model->update_user_idfile($id);
		      $this->index();
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
	public function upload_contributor_images() {
		 
		 $this->load->library('session');
		 $data['user_session']=$this->session->all_userdata();;
		 $this->load->helper(array('form', 'url'));
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
		 	       $id = $data['user_session']['user_meta']['0']['id'];
		           $this->contributor_model->upload_contributor_images($id, $_FILES['trialfiles']['name'], $_FILES['trialfiles']['size']);
		           $success = 1;
         	    }
		    $i++;
		}
		if($success === 1){
			$this->user_model->update_edit_status($id,TRUE);
			$this->user_model->update_upload_status($id,FALSE);
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
	    		$file_id = $_POST['file_id'][$i];
	    		$file_name = $_POST['file_name'][$i];
	    		$file_keywords = $_POST['file_keywords'][$i];
	    		$file_price_large = $_POST['file_price_large'][$i];
	    		$file_price_medium =$_POST['file_price_medium'][$i];
	    		$file_price_small =$_POST['file_price_small'][$i];
	    		// $file_category = $_POST['file_category'][$i];
	    		$file_type = $_POST['file_type'][$i];
	    		$file_subtype = $_POST['file_subtype'][$i];
	    		$file_orientation = $_POST['file_orientation'][$i];
	    		$file_people = $_POST['file_people'][$i];
	    		$file_shoot = $_POST['file_shoot'][$i];
				$this->contributor_model->edit_contributor_images( $file_id,
					$file_name,$file_keywords,$file_price_large,$file_price_medium,$file_price_small,$file_type,$file_subtype,
					$file_orientation,$file_people,$file_shoot );	
	    		$i++;
	    		$success = 1;
	    	}
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
			$this->contributor_model->add_contributor_model($id);
			echo 1;
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

