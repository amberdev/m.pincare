<?php 
class not_found extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
    } 

    public function index() 
    { 
        $this->output->set_status_header('404'); 
        if(isset($_SESSION['user']['unique_id']))
        {
            
            $result['user_details']=$this->usermodel->get_user_by_id($_SESSION['user']['unique_id']);
                    
        }
        $this->load->view('404_page',@$result);
    } 
} 
?> 