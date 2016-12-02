<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
       $this->load->model('admin_model');
       $this->load->model('contributor_model');
       $this->load->model('main_model');
       $this->load->model('member_model');
   	}
	public function index()
	{	
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
			$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		$this->load->view('non_member/header' , $data);
		$this->load->view('non_member/index');
		$this->load->view('non_member/footer');
	}
	public function about()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
			$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		$this->load->view('non_member/header');
		$this->load->view('non_member/header_min', $data);
		$this->load->view('non_member/about', $data);
		$this->load->view('non_member/footer');	
	}
	public function terms()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
			$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		$this->load->view('non_member/header');
		$this->load->view('non_member/header_min', $data);
		$this->load->view('non_member/terms', $data);
		$this->load->view('non_member/footer');	
	}
	public function contact()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
			$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		$this->load->view('non_member/header');
		$this->load->view('non_member/header_min', $data);
		$this->load->view('non_member/contact', $data);
		$this->load->view('non_member/footer');	
	}
	public function resources()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
			$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			$data['resources'] = $this->main_model->get_all_resources();
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		$this->load->view('non_member/header');
		$this->load->view('non_member/header_min', $data);
		$this->load->view('non_member/resources', $data);
		$this->load->view('non_member/footer');	
	}
	public function faqs()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
			$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		$this->load->view('non_member/header');
		$this->load->view('non_member/header_min', $data);
		$this->load->view('non_member/faqs', $data);
		$this->load->view('non_member/footer');	
	}
	public function blog()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
			$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		$this->load->view('non_member/header');
		$this->load->view('non_member/header_min', $data);
		$this->load->view('non_member/blog', $data);
		$this->load->view('non_member/footer');	
	}
	public function start_search() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		$search_term = $this->input->post('search_term');
		$search_cat = $this->input->post('search_cat');
		$this->search($search_term);
	
	}
	public function optimize_search($search_term = NULL) {
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
				$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		
		
		$license_type = $this->input->post('license_type');
		$image_type = $this->input->post('image_type');
		$orientation = $this->input->post('orientation');
		$people = $this->input->post('people');
		$category = $this->input->post('category');
		$contributor = $this->input->post('contributor');
		$data['managed_pricing'] = $this->admin_model->get_rm_pricing();
		$data['rr_pricing'] = $this->admin_model->get_rr_pricing();
		$data['rf_pricing'] = $this->admin_model->get_rf_pricing();
		$data['ex_pricing'] = $this->admin_model->get_ex_pricing();
		$data['search_term'] = $search_term; 
		$data['contributors'] =$this->admin_model->get_excontributor_users();
		
		$data['all_results'] = $this->main_model->optimize_all_uploads($search_term,
			$license_type,$image_type,$orientation,$people,$category,$contributor);
		
		for($f = 0; $f < count($data['all_results']); $f++){
				$file_id = $data['all_results'][$f]['upload_id'];
				$same_shoot = $data['all_results'][$f]['file_same_shoot_code'];
				$releases= $this->contributor_model->get_image_releases($file_id);
				if($same_shoot !== NULL && strlen($same_shoot)>0){
					$same_shoots= $this->main_model->get_same_shoots($same_shoot);
				} else {
					$same_shoots = '';
				}
				$data['all_results'][$f]['releases']=$releases;
				$data['all_results'][$f]['same_shoots']=$same_shoots;
			}
		$this->load->view('non_member/header');
		$this->load->view('non_member/header_min', $data);
		$this->load->view('non_member/results', $data);
		$this->load->view('non_member/footer_min');
		$this->load->view('non_member/footer');
		
	}
	public function search($search_term = NULL)
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
				$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		$data['search_term'] = $search_term; 
		$data['all_results'] = $this->main_model->search_all_uploads($search_term);
		$data['managed_pricing'] = $this->admin_model->get_rm_pricing();
		$data['rr_pricing'] = $this->admin_model->get_rr_pricing();
		$data['rf_pricing'] = $this->admin_model->get_rf_pricing();
		$data['ex_pricing'] = $this->admin_model->get_ex_pricing();
		$data['contributors'] =$this->admin_model->get_excontributor_users();
		for($f = 0; $f < count($data['all_results']); $f++){
				$file_id = $data['all_results'][$f]['upload_id'];
				$same_shoot = $data['all_results'][$f]['file_same_shoot_code'];
				$releases= $this->contributor_model->get_image_releases($file_id);
				if($same_shoot !== NULL && strlen($same_shoot)>0){
					$same_shoots= $this->main_model->get_same_shoots($same_shoot);
				} else {
					$same_shoots = '';
				}
				$data['all_results'][$f]['releases']=$releases;
				$data['all_results'][$f]['same_shoots']=$same_shoots;
			}
		$this->load->view('non_member/header');
		$this->load->view('non_member/header_min', $data);
		$this->load->view('non_member/results', $data);
		$this->load->view('non_member/footer_min');
		$this->load->view('non_member/footer');
	}
	public function similar_images($upload_id = NULL)
	{
		$this->load->helper(array('form', 'url')); 
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
				$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		
		
		$data['all_results'] = $this->main_model->get_similar_images($upload_id);
		$data['contributors'] =$this->admin_model->get_excontributor_users();
		$data['managed_pricing'] = $this->admin_model->get_rm_pricing();
		$data['rr_pricing'] = $this->admin_model->get_rr_pricing();
		$data['rf_pricing'] = $this->admin_model->get_rf_pricing();
		$data['ex_pricing'] = $this->admin_model->get_ex_pricing();
		
		for($f = 0; $f < count($data['all_results']); $f++){
				$file_id = $data['all_results'][$f]['upload_id'];
				$same_shoot = $data['all_results'][$f]['file_same_shoot_code'];
				$releases= $this->contributor_model->get_image_releases($file_id);
				if($same_shoot !== NULL && strlen($same_shoot)>0){
					$same_shoots= $this->main_model->get_same_shoots($same_shoot);
				} else {
					$same_shoots = '';
				}
				$data['all_results'][$f]['releases']=$releases;
				$data['all_results'][$f]['same_shoots']=$same_shoots;
			}
		$this->load->view('non_member/header');
		$this->load->view('non_member/header_min', $data);
		$this->load->view('non_member/shoot', $data);
		$this->load->view('non_member/footer_min');
		$this->load->view('non_member/footer');
	}

	public function shoot($same_shoot,$search_term = NULL)
	{
		$data['search_term'] = $search_term; 
		$this->load->helper(array('form', 'url')); 
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
				$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		
		$data['all_results'] = $this->main_model->get_same_shoots($same_shoot);
		$data['managed_pricing'] = $this->admin_model->get_rm_pricing();
		$data['rr_pricing'] = $this->admin_model->get_rr_pricing();
		$data['rf_pricing'] = $this->admin_model->get_rf_pricing();
		$data['ex_pricing'] = $this->admin_model->get_ex_pricing();
		$data['contributors'] =$this->admin_model->get_excontributor_users();
		for($f = 0; $f < count($data['all_results']); $f++){
				$file_id = $data['all_results'][$f]['upload_id'];
				$same_shoot = $data['all_results'][$f]['file_same_shoot_code'];
				$releases= $this->contributor_model->get_image_releases($file_id);
				if($same_shoot !== NULL && strlen($same_shoot)>0){
					$same_shoots= $this->main_model->get_same_shoots($same_shoot);
				} else {
					$same_shoots = '';
				}
				$data['all_results'][$f]['releases']=$releases;
				$data['all_results'][$f]['same_shoots']=$same_shoots;
			}
		$this->load->view('non_member/header');
		$this->load->view('non_member/header_min',$data);
		$this->load->view('non_member/shoot', $data);
		$this->load->view('non_member/footer_min');
		$this->load->view('non_member/footer');
	}
	public function details($upload_id)
	{
		$this->load->helper(array('form', 'url')); 
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
				$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		
		$data['all_results'] = $this->main_model->get_single_upload($upload_id);
		$data['contributors'] =$this->admin_model->get_excontributor_users();
		$data['managed_pricing'] = $this->admin_model->get_rm_pricing();
		$data['rr_pricing'] = $this->admin_model->get_rr_pricing();
		$data['rf_pricing'] = $this->admin_model->get_rf_pricing();
		$data['ex_pricing'] = $this->admin_model->get_ex_pricing();
		
		$license_type = '';

		for($f = 0; $f < count($data['all_results']); $f++){
				$file_id = $data['all_results'][$f]['upload_id'];
				$same_shoot = $data['all_results'][$f]['file_same_shoot_code'];
				$releases= $this->contributor_model->get_image_releases($file_id);
				if($same_shoot !== NULL && strlen($same_shoot)>0){
					$same_shoots= $this->main_model->get_same_shoots($same_shoot);
				} else {
					$same_shoots = '';
				}
				if($file_id == $upload_id){
					$license_type = $data['all_results'][$f]['file_license'];
				}
				$data['all_results'][$f]['releases']=$releases;
				$data['all_results'][$f]['same_shoots']=$same_shoots;
			}
		if($license_type == 'Royalty Free'){
			
			$this->load->view('non_member/header' , $data);
			$this->load->view('non_member/details', $data);
			$this->load->view('non_member/footer');

		} else {
			$this->load->view('non_member/header' , $data);
			$this->load->view('non_member/details_managed', $data);
			$this->load->view('non_member/footer');
		}
		
	}
	public function image_add_to_cart() {
		$this->load->helper(array('form', 'url'));	
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
				$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
		$data['success'] = '' ;
		$data['cart_session']['product_id'] = $this->input->post('upload_id');
		$data['cart_session']['product_type'] = "image";
		$data['cart_session']['product_size'] = $this->input->post('file_quality');
		$data['cart_session']['product_duration'] = $this->input->post('file_duration');
		$data['cart_session']['product_cost'] = $this->input->post('file_price');
		$data['cart_session']['product_license'] = $this->input->post('file_license');
		$data['cart_session']['current_url'] = $this->input->post('current_url');
		$data['cart_session']['exclusive_duration'] = $this->input->post('exclusive_duration');
		$data['cart_session']['add_to_cart'] = TRUE;
		$data['cart_session']['cart_redirect'] = FALSE;	

		if (!isset($data['user_session']['logged_in'])) {
			$data['cart_session']['cart_redirect'] = TRUE;
		}
		
		$this->session->set_userdata($data['cart_session']);

		if (isset($data['user_session']['logged_in'])) {
			
			if($data['user_session']['user_meta'][0]['account'] !== 'admin' ){
				$this->complete_add_to_cart();
				echo 1;
			} else {
				echo 2;
			} 
				
		} else {
			echo 3;
		}
		

	}

	public function complete_add_to_cart(){
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		$user_session = $data['user_session'];
			
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
				$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_new_cart($member_id);
			if (count($data['user_cart']) > 0) {
				$order_id = $data['user_cart'][0]['order_id'];
				$data['cart_items'] = $this->member_model->get_cart_items($order_id);	
			}
		}
	
		$account = $data['user_session']['user_meta'][0]['account'];
		// change account to member
		if($account == 'contributor') {
			$this->user_model->update_user_login($user_session['user_meta']['0']['email'], 'member');
		}
		// get user cart
		if (count($data['user_cart']) > 0) {

			$user_cart = $data['user_cart'];
		} else {
			
			$user_cart = $this->member_model->get_new_cart($member_id);
		}
		$user_session = $data['user_session'];
		$product_cost = $user_session['product_cost'];
		$product_id = $user_session['product_id'];
		$product_type = $user_session['product_type'];
		$product_size = $user_session['product_size'];
		$product_duration = $user_session['product_duration'];
		$product_license = $user_session['product_license'];
		$exclusive_duration = $user_session['exclusive_duration'];

		$redirect_url = $user_session['current_url'];

		if(count($user_cart) < 1 ) {
			$this->member_model->create_new_order($member_id,$product_cost);		
			$user_cart = $this->member_model->get_new_cart($member_id);
		}
		$order_id = $user_cart[0]['order_id'];
		$cart_items = $this->member_model->get_cart_items($order_id);
			
		if(count($cart_items) < 1){
			// items empty just add
			$this->member_model->add_cart_item($order_id,$product_id,$product_type,$product_size,$product_duration,$product_cost,$product_license,$exclusive_duration);
			$this->member_model->update_order_cost($order_id,$product_cost);			
		} else {
			$exists = FALSE;
			for($i = 0 ; $i < count($cart_items); $i++ ) {
				if($cart_items[$i]['product_id'] == $product_id ) {
					$this->member_model->replace_cart_item($order_id,$product_id,$product_type,$product_size,$product_duration,$product_cost,$product_license,$exclusive_duration,$cart_items[$i]['item_id']);
					// update order_cost
					$order_cost = $user_cart[0]['order_cost'] - $cart_items[$i]['product_cost'];
					$order_cost = $order_cost +  $product_cost;
					$exists = TRUE;
				}
			}

			if($exists == FALSE ) {
				$this->member_model->add_cart_item($order_id,$product_id,$product_type,$product_size,$product_duration,$product_cost,$product_license,$exclusive_duration);	
				$order_cost = $user_cart[0]['order_cost'] + $product_cost;
					
			}
			// update order cost
			$this->member_model->update_order_cost($order_id,$order_cost);
		}

		
		$cart_items = $this->member_model->get_cart_items($order_id);



		if ( $user_session['cart_redirect'] == TRUE ){
			$data['cart_session']['cart_redirect'] = FALSE;
			$data['cart_session']['add_to_cart'] = FALSE;
			$this->session->set_userdata($data['cart_session']);
			header('Location:'.$redirect_url);	
		} else {
			echo count($cart_items)."-";
			$data['cart_session']['cart_redirect'] = FALSE;
			$data['cart_session']['add_to_cart'] = FALSE;
			$this->session->set_userdata($data['cart_session']);
						
		}
	}
	public function remove_cart_item ($item_id,$item_cost,$order_id) {
		$this->load->library('session');
		$data['user_session']=$this->session->all_userdata();
		
		if(isset($data['user_session']['logged_in'])) {
			$data['user_details'] = 
				$this->user_model->get_user_details($data['user_session']['user_meta']['0']['email']);
			$member_id = $data['user_details'][0]['user_id'];
			$data['user_cart'] = $this->member_model->get_user_cart($member_id);
			$order_id = $data['user_cart'][0]['order_id'];
			$data['cart_items'] = $this->member_model->get_cart_items($order_id);
		}
		
		$this->member_model->remove_cart_item($item_id);
		$user_cart = $this->member_model->get_user_cart($member_id);
		$order_cost = $user_cart[0]['order_cost'] - $item_cost;
		$this->member_model->update_order_cost($order_id,$order_cost);
		echo 1;
	}
}
