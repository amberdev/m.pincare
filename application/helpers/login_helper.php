<?php

 function login($provider)
	{ 
		$CI=&get_instance();
		// $CI->load->model('usermodel');
		log_message('debug', "controllers.HAuth.login($provider) called");

		try
		{
			log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');
			$CI->load->library('HybridAuthLib');

			if ($CI->hybridauthlib->providerEnabled($provider))
			{
			
				log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
				$service = $CI->hybridauthlib->authenticate($provider);

				if ($service->isUserConnected())
				{
					log_message('debug', 'controller.HAuth.login: user authenticated.');

					$user_profile = $service->getUserProfile();
					$user_contacts=$service->getUserContacts();
					
               				//echo "<pre>";
               				//echo "from helper";
					//print_r($user_profile);die;
                   			// $user_contacts=$service->getUserContacts();
					//$CI->usermodel->SaveUsers($service->getUserProfile());
					
					log_message('info', 'controllers.HAuth.login: user profile:'.PHP_EOL.print_r($user_profile, TRUE));

					$data[] = $user_profile;
					$data[] = $user_contacts;
					return $data;
					//$CI->load->view('hauth/done',$data);
				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				echo "asfasdfadsf";die;
				log_message('error', 'controllers.HAuth.login: This provider is not enabled ('.$provider.')');
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
				case 0 : $error = 'Unspecified error.'; break;
				case 1 : $error = 'Hybriauth configuration error.'; break;
				case 2 : $error = 'Provider not properly configured.'; break;
				case 3 : $error = 'Unknown or disabled provider.'; break;
				case 4 : $error = 'Missing provider application credentials.'; break;
				case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				         //redirect();
				         if (isset($service))
				         {
				         	log_message('debug', 'controllers.HAuth.login: logging out from service.');
				         	$service->logout();
				         }
				         show_error('User has cancelled the authentication or the provider refused the connection.');
				         break;
				case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				         break;
				case 7 : $error = 'User not connected to the provider.';
				         break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			log_message('error', 'controllers.HAuth.login: '.$error);
			show_error('Error authenticating user.');
		}
	}

?>
