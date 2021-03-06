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


		if(!empty($data[1]))
		{
			$friends_data=$data[1];
			foreach($friends_data as $frnd)
			{
				$frnd_fb_id=$frnd->identifier;
				$frnd_name=$frnd->displayName;
				$frnd_pic=$frnd->photoURL;

				$this->db->where('user_fb_id',$dataUser['fb_id']);
				$this->db->where('friend_id',$frnd_fb_id);
				$frnd_exists=$this->db->get('tbl_friends');
				// echo $this->db->last_query();die;

				if($frnd_exists->num_rows()==0)
				{
					$data_insert=array('user_fb_id'=>$dataUser['fb_id'],'friend_id'=>$frnd_fb_id,'friend_name'=>$frnd_name,'friend_photo'=>$frnd_pic);
					$this->db->insert('tbl_friends',$data_insert);
				}

			}
		}

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

	public function insert_checkins($data)
	{
		$this->db->insert('tbl_checkins',$data);
	}

	public function trandingpins()
	{

		
		$q=$this->db->query("select count(tbl_checkins.outlet_id)as numer,o.outlet_name, o.logo,o.address   from tbl_checkins 
				inner join tbl_outlets o on(o.id=tbl_checkins.outlet_id)
				group by tbl_checkins.outlet_id order by numer desc");

		if($q->num_rows()>0)
		{
			return $q->result_array();
		}
	}

	public function get_frnds_pins($curr_id)
	{
		if(isset($curr_id))
		{
			$this->db->select('*');
			$this->db->where('user_fb_id',$curr_id);
			$q=$this->db->get('tbl_friends');
			if($q->num_rows()>0)
			{
				$arr=$q->result_array();

				$this->db->where('fb_id',$curr_id);
				$curr_data=$this->db->get('tbl_users');
				$curr_data_arr=$curr_data->result_array();

				$count=count($arr);


				$arr[$count]['friend_id']=$curr_id;	
				$arr[$count]['friend_photo']=$curr_data_arr[0]['photo_url'];
				
				 
				foreach($arr as $return)
				{
					$query="select count(user_fb_id)as numbr from tbl_checkins where user_fb_id=".$return['friend_id']." order by numbr desc";

					$data=$this->db->query($query);
					if($data->num_rows()>0)
					{
						$result=$data->result_array();

						if($result[0]['numbr']!=0)
						{
							$return['count']=$result[0]['numbr'];
							$return_arr[]=$return;
							
						}
					}
				}
				function sortByOrder($a, $b)
				{
				return  $b['count']-$a['count'] ;
				}
				$sorted=usort($return_arr, 'sortByOrder');
				return $return_arr; 
				 
			}
			else
			{
				return false;
			}
		}
	}

}	

