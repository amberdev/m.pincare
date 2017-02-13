<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Story extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('usermodel');
		$this->load->helper('url');
		session_start();
		// if(!isset($_SESSION['user']['fb_id']) && !isset($_SESSION['user']['unique_id']) && !isset($_SESSION['user']['username']) && !isset($_SESSION['user']['email']))
		// {
		// 	redirect('welcome');
		// }
	}
	public function index()
	{
		$place_id=base64_decode($this->uri->segment(3));
		$outlets_id=base64_decode($this->uri->segment(4));
		
		if(isset($place_id) && is_numeric($place_id) && isset($outlets_id) && is_numeric($outlets_id))
		{
			$story['place_id']=$place_id;
			$story['outlet_id']=$outlets_id;
		}

		$story['data_story']=$this->usermodel->get_story();
		$this->load->view('story',$story);
	}
}
