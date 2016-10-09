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
   	}
	public function index()
	{	
		$this->load->helper(array('form', 'url'));
		$this->load->view('non_member/header');
		$this->load->view('non_member/index');
		$this->load->view('non_member/footer');
	}
	public function start_search() {
		$this->load->helper(array('form', 'url'));
		$search_term = $this->input->post('search_term');
		$search_cat = $this->input->post('search_cat');
		$this->search($search_term);
	
	}
	public function optimize_search($search_term = NULL) {
		$this->load->helper(array('form', 'url'));
		$license_type = $this->input->post('license_type');
		$image_type = $this->input->post('image_type');
		$orientation = $this->input->post('orientation');
		$people = $this->input->post('people');
		$category = $this->input->post('category');

		$data['search_term'] = $search_term; 
		$data['all_results'] = $this->main_model->optimize_all_uploads($search_term,
			$license_type,$image_type,$orientation,$people,$category);
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
		$this->load->view('non_member/header_min');
		$this->load->view('non_member/results', $data);
		$this->load->view('non_member/footer_min');
		$this->load->view('non_member/footer');
	
	}
	public function search($search_term = NULL)
	{
		$this->load->helper(array('form', 'url'));
		$data['search_term'] = $search_term; 
		$data['all_results'] = $this->main_model->search_all_uploads($search_term);
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
		$this->load->view('non_member/header_min');
		$this->load->view('non_member/results', $data);
		$this->load->view('non_member/footer_min');
		$this->load->view('non_member/footer');
	}
	public function shoot($same_shoot,$search_term = NULL)
	{
		$data['search_term'] = $search_term; 
		$this->load->helper(array('form', 'url')); 
		$data['all_results'] = $this->main_model->get_same_shoots($same_shoot);
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
		$this->load->view('non_member/header_min');
		$this->load->view('non_member/shoot', $data);
		$this->load->view('non_member/footer_min');
		$this->load->view('non_member/footer');
	}
	public function details($upload_id)
	{
		$this->load->helper('url'); 
		$data['all_results'] = $this->main_model->get_single_upload($upload_id);
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
		$this->load->view('non_member/details', $data);
		$this->load->view('non_member/footer');
	}
}
