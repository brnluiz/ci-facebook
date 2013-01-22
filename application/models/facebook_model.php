<?php
//THANKS FOR DANNY HERRAN: http://www.dannyherran.com/2011/02/facebook-php-sdk-and-codeigniter-for-basic-user-authentication/
class Facebook_model extends CI_Model
{
	function __construct()
	{
		//Preparing land...
		$this->config->load('facebook');	//Edit this config file to change the appId, secret ID, API QUery and permissions
		$config = array(
			'appId' => $this->config->item('fbAppId'),
			'secret' => $this->config->item('fbSecret')
		);
		$this->load->library('Facebook',$config);
	
		//Find the user...
		$user_id = $this->facebook->getUser();
		$query = null;
		if($user_id)
		{
			try
			{
				$query = $this->facebook->api($this->config->item('fbApiQuery'));
			}
			catch(FacebookApiException $e)
			{
				error_log($e);
				$user_id = null;
			}
		}
		//OOH! You find him!? Now interrogate him and get some data
		$fb_data = array(
			'me' => $query,
			'uid' => $user_id,
			'loginUrl' => $this->facebook->getLoginUrl(
				array(
					'scope' => $this->config->item('fbPermission'),
					'redirect_uri' => $this->config->item('fbPostLoginRedirect') //After login, where you want to send your buddy? My case: homepage
					)
				),
			'logoutUrl' => $this->facebook->getLogoutUrl()
			);

		//Save the data in session... for another generations
		$this->session->set_userdata('fb_data', $fb_data);
	}

	//Crap! The user have a lawyer! Goodbye! Destroy all saved data.
	function logout()
	{
		$this->facebook->destroySession();
	}
}