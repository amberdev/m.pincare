<?php

 class Usermodel extends CI_Model
 {

	function __construct()
	{

		parent::__construct();
		$this->load->database();
		
	}


	function SaveUsers($data)
	{
		
		$data_new=$data[0];
		 
		$dataUser['fb_id']=$data_new->identifier;
		$dataUser['photo_url']=$data_new->photoURL;
		$dataUser['full_name']=$data_new->displayName;
		$dataUser['f_name']=$data_new->firstName;
		$dataUser['l_name']=$data_new->lastName;
		$dataUser['email']=$data_new->email;
		$dataUser['phone']=$data_new->phone;
		$dataUser['address']=$data_new->address;
		$dataUser['created_on']=date('Y-m-d h:i:s');
		$dataUser['modified_on']=date('Y-m-d h:i:s');

		$this->db->where('fb_id',$data_new->identifier);
		$q=$this->db->get('tbl_users');
		if($q->num_rows()>0)
		{
			return $q->result_array();
		}
		else
		{
			$this->db->insert('tbl_users',$dataUser);
			//echo $this->db->last_query();die;
			$this->db->where('fb_id',$data_new->identifier);
			$q=$this->db->get('tbl_users');
			return $q->result_array();
			
		}
		
	}

	function get_all_users()
	{
		$q=$this->db->get('tbl_users');
		if($q->num_rows>0)
		{
			return $q->result_array();
		}
	}

	function get_user_by_id($user_id)
	{
		if($user_id!='')
		{
			$this->db->where('id',$user_id);
			$q=$this->db->get('tbl_users');
			if($q->num_rows>0)
			{
				return $q->result_array();	
			}
		}	 
	}


	public function update_user_details($fb_id,$data)
	{
		if($fb_id!='')
		{
			$this->db->where('fb_id',$fb_id);
			$this->db->update('tbl_users',$data);
		}
	}

	public function get_story()
	{
		$this->db->select('*');
		$q=$this->db->get('tbl_story');
		if($q->num_rows()>0)
		{
			return $q->result_array();
		}
	}

	public function get_outlets($place_id)
	{
		$this->db->select('tbl_outlets.id,tbl_outlets.outlet_name,tbl_outlets.address,tbl_outlets.city,tbl_outlets.country,tbl_outlets.zip,tbl_outlets.longitude,tbl_outlets.latitude,tbl_outlets.search_params,tbl_outlets.logo,tbl_pins.checkin_per_day,tbl_pins.amount_checkin,tbl_outlets.place_id');
		$this->db->from('tbl_outlets');
		$this->db->join('tbl_pins', 'tbl_pins.outlet_id=tbl_outlets.id');
		$this->db->where_in('tbl_outlets.place_id',$place_id);
		$q=$this->db->get();
		if($q->num_rows()>0)
		{
			return $q->result_array();
		}
	}
}	

