<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Story extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('usermodel');
		$this->load->helper('url');
		session_start();
		if(isset($_SESSION['user']['fb_id']) && isset($_SESSION['user']['unique_id']) && isset($_SESSION['user']['username']) && isset($_SESSION['user']['email']))
		{
			// redirect('welcome/login');
		}
	}
	public function index()
	{
		$story['data_story']=$this->usermodel->get_story();
		$this->load->view('story',$story);

	}

}