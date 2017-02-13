<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tapme extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('usermodel');
		$this->load->helper('url');
		session_start();
		if(!isset($_SESSION['user']['fb_id']) && !isset($_SESSION['user']['unique_id']) && !isset($_SESSION['user']['username']) && !isset($_SESSION['user']['email']))
		{
			redirect('welcome');
		}
	}
	public function index()
	{
		$this->load->view('tapme');
	}

	public function outlets()
	{
		$fb_data='https://graph.facebook.com/search?type=place&center=28.628454,77.376945&distance=500&access_token=EAADUw5iRRFgBAP6Lt2yf6asi4dZBwna75ZA7ytVZAs8BPZBPp43J8ZBILocpcC1JuwuDM1DJDdkNY18ZB051ZAtw78Luf0juDjmIqQW8nXF5riRCYVAX033oHI8CZCdd2U46IPDKgAKT89TdwkcaUhklfCFNWiTUiotXxKH26Szp4O7rv8Cn3UJlG8D5u4KyIX2yIdA31DqrDeVq7sgfpSjZCO2OnON0iumEZD';

		$fb_data=file_get_contents($fb_data);
		$fb_data=json_decode($fb_data,true);
		
		for($i=0;$i<count($fb_data['data']);$i++)
        {
             
            $rest_details[]=$fb_data['data'][$i]['id'];
        }

		$outlets['data_outlets']=$this->usermodel->get_outlets($rest_details);		
		$this->load->view('outlets',$outlets);
	}

	public function error()
	{
		$this->load->view('error');
	}

}