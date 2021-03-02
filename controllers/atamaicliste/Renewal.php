<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renewal extends Front_Controller {

	
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

			

		

			$ref_user =	FS::Common()->getTableData(USERS, array('ref_id' => $data['users']->contract_id),'created_at','','','','','','','','created_at')->result();


			$result = array();


			foreach ($ref_user as $val) {
				$date_val = date("d.m.Y",strtotime($val->created_at));
				if (array_key_exists('created_at', $val)) {
					$result[$date_val][] = $val;
				} else {
					$result[""][] = $val;
				}
			}

			
			$date_count = array();
			foreach ($result as $key => $value)
				{
				   $date_count[$key]['data'] = count($value);
				   $date_count[$key]['date'] = $key;
				  
				}


		    $bar_arr = array_column($date_count, 'data');

			$xaxis_arr = array_column($date_count, 'date');

				

			$data_value = range(1,count($level));

			$data['level_value'] = json_encode($level_no);	

			$data['color_value'] = json_encode($color_code);			
			
			$data['data_value'] = json_encode($data_value);

			$data['bar_data'] = json_encode($bar_arr);

			$data['bar_label'] = json_encode($xaxis_arr);
			
 
			$earned_eth   		= 	$data['users']->earned_eth;

			$eth  = number_format($earned_eth,8); 

			$value = coinmarket_value($eth);

			$data['usd_value'] = number_format($value,2); 

			

			$ref_code			=	FS::Common()->getTableData(USERS, array('id' => juego_id()),'contract_id,address')->row();

		    $ref_url 			= 	base_url().$lang_name.'/refer/'.$ref_code->contract_id; 

			$data['ref_url']	=	$ref_url;

			$data['title']		=	"Renewal Page";

			$data['action']		=	"renewal";

			$data['section']	=	"renewal";

			$user_id 			=	FS::session()->userdata('con_u_id');

			

			$coin_id 			=	$data['users']->contract_id;

			 
			$this->cview(strtolower(CI_MODEL).'/renewal', $data);
		}
		else
		{
			front_redirect(base_url());
		}
	}

	
}

