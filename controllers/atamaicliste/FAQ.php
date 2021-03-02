<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FAQ extends Front_Controller {

	

	public function index()
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
		
		$data['title']		=	"FAQ Page";

		$data['action']		=	"faq";

		$data['faq'] 	=	FS::Common()->getTableData(FAQ,array('status' => '1','language' => $lang), '', '', '', '', '','', array('id', 'DESC'))->result();

		
	


		$this->cview(strtolower(CI_MODEL).'/faq', $data);
	}
}

