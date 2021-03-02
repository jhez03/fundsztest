<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	

	public function index()
	{
		if ( empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}
		
		user_access();

		$user_view = $this->config->item('user_view');

		if(!in_array('1',$user_view))
		{
			admin_url_redirect('', 'refresh');
		}
		else
		{
			$data['title']		=	"Dashboard";

			$this->view('pages/dashboard', $data);
		}
	}
}
