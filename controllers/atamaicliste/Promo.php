<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends Front_Controller {

	

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

			$data['presen'] 	=	FS::Common()->getTableData(PRESEN, array('language' => $lang,'status' => 1))->result();

			$data['banner'] 	=	FS::Common()->getTableData(BANNER, array('language' => $lang,'status' => 1))->result();

			$data['video'] 	=	FS::Common()->getTableData(VIDEO, array('language' => $lang,'status' => 1))->result();

			$data['text'] 	=	FS::Common()->getTableData(TEXT, array('language' => $lang,'status' => 1))->result();

		
			
			$data['title']		=	"Promo Page";

			$data['action']		=	"promo";

			$this->cview(strtolower(CI_MODEL).'/promo', $data);

		}
		else
		{
			front_redirect(base_url());
		}
	}
}

