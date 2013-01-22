<?php
//THANKS FOR DANNY HERRAN: http://www.dannyherran.com/2011/02/facebook-php-sdk-and-codeigniter-for-basic-user-authentication/
class Home extends CI_Controller
{
	//LOAD THE MODEL BEFORE ANYTHING (aka: _construct)! DON'T BE STUPID!
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Facebook_model');
	}

	function index()
	{
		$fb_data = $this->session->userdata('fb_data');

		//OH NO! THE USER IS NOT LOGGED! Open the login form
		if((!$fb_data['uid']) || (!$fb_data['me']))
		{			
			$data = array(
				'fb_data' => $fb_data
				);
			$this->load->view('login', $data);
			//or you can redirect him, with the following command:
			//redirect('auth');
		}
		//Ok, he is logged... Show his data
		else
		{
			$data = array(
				'fb_data' => $fb_data
				);
			$this->load->view('home', $data);
		}
	}
	
	//Crap! The user have a lawyer! Goodbye! Destroy all saved data.
	function logout()
	{
		$this->Facebook_model->logout();
		$this->session->sess_destroy();
		redirect('');
	}
}