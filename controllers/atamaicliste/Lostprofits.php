<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lostprofits extends Front_Controller {

	

	public function index()
	{
		if(!empty(juego_id()))
		{	

			$lang = 1;

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
			
			$data['title']		=	"Loss Profit Page";

			$data['action']		=	"lostprofits";

			$this->cview(strtolower(CI_MODEL).'/lostprofits', $data);
		
		}
		else
		{
			front_redirect(base_url());
		}
	}
}

