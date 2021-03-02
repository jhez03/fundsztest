<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Placement extends Front_Controller {

	
	var $data;

	public function index()
	{

		if(!empty(juego_id()))
		{
			$lang = 1;

			if($lang == 1)
			{
				$lang_name = 'en';
			}

			$user_id = juego_id();

			$data['USER_L_P'] 	=	FS::Common()->getTableData(USER_L_P)->result();

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

			$data['users'] 		=	FS::Common()->getTableData(USERS, array('id' => $user_id))->row();

			$level_value = $data['users']->current_level;

			$level	=	FS::Common()->getTableData(USER_L_P, '', '', '', '', '', '',$level_value, '')->result();

			$level_no = array_column($level, 'level_no');

			$color_code = array_column($level, 'color_code');
			$user_cid = $data['users']->contract_id;
			
			$data['partners'] 				=	FS::db()->query("select  *
			from    (select  current_level as number,contract_id,affiliate_id from tfunds_trfdznreaseuer ORDER BY contract_id ASC) products_sorted,
			        (select @pv := $user_cid) initialisation
			where   find_in_set(affiliate_id, @pv)
			and     length(@pv := concat(@pv, ',', contract_id))")->result_array();


			

			$data['ref_url']	=	$ref_url;

			$data['title']		=	"Placement Page";

			$data['action']		=	"placement";

			$data['section']	=	"placement";

			$user_id 			=	FS::session()->userdata('con_u_id');

			

			$coin_id 			=	$data['users']->contract_id;

			$data['sponsor_id']	=	$data['users']->sponsor_id;
			if($data['sponsor_id']!=0)
			{
				$data['sponsor'] 		=	FS::Common()->getTableData(USERS, array('contract_id' => $data['sponsor_id']))->row();
			}

			 
			$this->cview(strtolower(CI_MODEL).'/placement', $data);
		}
		else
		{
			front_redirect(base_url());
		}
	}
	public function setSponsor($value='')
	{
		if(!empty(juego_id()))
		{
		$userid=juego_id();
		$insertData['sponsor_id']	= 	\FS::input()->post('value');
		update_data(USERS,$insertData,array('id'=>$userid));
		echo "1";
		exit;
		}
		else
		{
			front_redirect(base_url());
		}
	}

	
}

