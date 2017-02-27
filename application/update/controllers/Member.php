<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class member extends CI_Controller {

	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
   	}


	public function index()
	{
		$this->load->helper('url'); 
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$data['success'] ='';	
		$data['user_session']=$this->session->all_userdata();;
		
		if (isset($data['user_session']['logged_in'])) {
			if(strlen($data['user_session']['user_meta']['0']['email']) > 0 ){
				$data['user_details'] = $this->fetch_user_details();
				
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
