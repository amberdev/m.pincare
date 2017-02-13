<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('usermodel');
		$this->load->helper('url');
		session_start();
		if(isset($_SESSION['user']['fb_id']) && isset($_SESSION['user']['unique_id']) && isset($_SESSION['user']['username']) && isset($_SESSION['user']['email']))
		{
			redirect('tapme');
		}
	}
	public function index()
	{
		$this->load->view('index');
	}

	public function home()
	{
		
	}

	 

	public function login()
	{
		
		if(isset($_SESSION['user']['fb_id']) && isset($_SESSION['user']['unique_id']) && isset($_SESSION['user']['username']) && isset($_SESSION['user']['email']))
		{
			redirect('tapme');
		}
		else
		{
			ini_set('display_error',1);
			$this->load->helper('login_helper');
			$userInfo=login('Facebook');

			//echo "<pre>";
			//print_r($userInfo);die;

			if(!empty($userInfo))
			{
						
				$result=$this->usermodel->SaveUsers($userInfo);
				if(!empty($result))
				{
					$_SESSION['user']['fb_id']=$result[0]['fb_id'];
					$_SESSION['user']['unique_id']=$result[0]['id'];
					$_SESSION['user']['username']=$result[0]['displayName'];
					$_SESSION['user']['email']=$result[0]['email'];
					redirect('tapme');
				}

			}
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

	public function logout()
	{
		$this->load->library('HybridAuthLib');

		$this->hybridauthlib->logoutAllProviders();
		unset($_SESSION['user']['fb_id']);
		unset($_SESSION['user']['unique_id']);
		unset($_SESSION['user']['username']);
		unset($_SESSION['user']['email']);
		unset($_SESSION);	
		redirect('welcome/home');
	}

	public function save_other_user_detail()
	{
		
		$email=$_GET['email'];
		$phone=$_GET['phone'];
		$address=$_GET['address'];
		$country=$_GET['country'];
		$city=$_GET['city'];
		$zip=$_GET['zip'];
		if($email=='' || $phone=='' || $address=='' || $country=='' || $city=='' || $zip=='')
		{
			echo "bad";
		}
		else
		{
			$data=array('email'=>$email,'phone'=>$phone,'address'=>$address,'country'=>$country,'city'=>$city,'zip'=>$zip);
			$this->usermodel->update_user_details($_SESSION['user']['fb_id'],$data);
			echo "ok";
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
