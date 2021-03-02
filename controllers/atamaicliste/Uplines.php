<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uplines extends Front_Controller {

	

	public function index()
	{
		
		if(!empty(juego_id()))
		{


			$lang = 1;

			$user_id = juego_id();

			$data['address'] 	=	FS::Common()->getTableData(ADDRESS, array('language' => $lang,'id' => 1))->row();


			$siteSettings	=	FS::Common()->getTableData(SITE, array('id' => 1),'site_mode,live_eth_url,demo_eth_url')->row();

			$sitemode = $siteSettings->site_mode;

			if($sitemode == '1')
			{
				$data['add_url'] = $siteSettings->live_eth_url;
			}
			else if($sitemode == '2')
			{
				$data['add_url'] = $siteSettings->demo_eth_url;
			}
			else
			{
				$data['add_url'] = '';
			}


			$user_data		=	FS::Common()->getTableData(USERS, array('id' => $user_id),'user_uplines')->row()->user_uplines;

		

			$upline_data 				=   unserialize($user_data); 
			
			$data['title']		        =	"Uplines Page";

			$data['action']		        =	"uplines";

			$data['upline_data']		=	$upline_data;

			$this->cview(strtolower(CI_MODEL).'/uplines', $data);
		}
		else
		{
			front_redirect(base_url());
		}
	}
}

