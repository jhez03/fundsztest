<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Front_Controller {

	
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
			$notify1			=	FS::Common()->getTableData('notifications', array('userid' => juego_id(),'plan'=>1),'notification')->row();
			$notify2			=	FS::Common()->getTableData('notifications', array('userid' => juego_id(),'plan'=>2),'notification')->row();


			if(!$notify1)
			{
				FS::Common()->insertTableData('notifications', array('userid' => juego_id(),'plan'=>1));
			}


			if(!$notify2)
			{
				FS::Common()->insertTableData('notifications', array('userid' => juego_id(),'plan'=>2));
			}

			$data['notify1']			=	FS::Common()->getTableData('notifications', array('userid' => juego_id(),'plan'=>1),'notification')->row();
			$data['notify2']			=	FS::Common()->getTableData('notifications', array('userid' => juego_id(),'plan'=>1),'notification')->row();



		    $ref_url 			= 	base_url().$lang_name.'/refer/'.$ref_code->contract_id; 

			$data['ref_url']	=	$ref_url;

			$data['title']		=	"Dashboard Page";

			$data['action']		=	"dashboard";

			$data['section']	=	"dashboard";

			$user_id 			=	FS::session()->userdata('con_u_id');

			

			$coin_id 			=	$data['users']->contract_id;

			if(!empty($coin_id))
			{

			$count 				=	FS::db()->query("select  COUNT(*) as total_partner
from    (select contract_id,affiliate_id from tfunds_trfdznreaseuer ORDER BY contract_id ASC) products_sorted,
        (select @pv := $coin_id) initialisation
where   find_in_set(affiliate_id, @pv)
and     length(@pv := concat(@pv, ',', contract_id))")->row()->total_partner;

			}
			$data['news'] 	=	FS::Common()->getTableData('tfunds_news',array('id'=>'1'))->row();
 			if(!empty($count))
			{
				$data['partners']	=	$count;
			}
			else
			{
				$data['partners']	=	0;	
			}
			 
			$this->cview(strtolower(CI_MODEL).'/dashboard', $data);
		}
		else
		{
			front_redirect(base_url());
		}
	}

	public function get_count_partner(){

		$user_id 		=	FS::session()->userdata('con_u_id');

        $this->db->select('contract_id');
        $this->db->from(USERS);
        $this->db->where('affiliate_id', $user_id);

        $parent = $this->db->get();
        
        $categories = $parent->result_array();

        $this->data += count($categories);

        $i=0;
  
        $count_array = array();

        foreach($categories as $key=>$p_cat){

            $array_count = $this->get_count_sub_partner($p_cat['contract_id']);
            
            $i++;
        }
        return $this->data;
    }

    public function get_count_sub_partner($id){

        $this->db->select('contract_id');
        $this->db->from(USERS);
        $this->db->where('affiliate_id', $id);

        $child = $this->db->get();
        $categories = $child->result_array();

        $this->data +=count($categories);
 
        $i=0;
        foreach($categories as $key=>$p_cat){

            $categories[$i]['children'] 	= 	$this->get_count_sub_partner($p_cat['contract_id']);
             $i++;
        }
        return count($categories);       
    }

	function display_children($parent, $level) {

		$result 	=	get_data(USERS,array('affiliate_id'=>$parent),'contract_id')->result_array();
		 
		$count 		=	0;

		if(!empty($result))
		{
			foreach ($result as $key => $value) {

				extract($value);
				
				$var 	= 	str_repeat(' ',$level).$contract_id."\n";

				$count += 1 +$this->display_children($contract_id, $level_test+1);
			}
		}

		return $count;
	} 

	public function level_test()
	{

		$user_id = juego_id();

		$users	=	FS::Common()->getTableData(USERS, array('id' => $user_id),'current_level,total_level')->row();
		$current_level = $users->current_level;
		$total_level = $users->total_level;

		$c_level = $current_level + 1 ;
		$t_level = $total_level .','.$c_level;
 
		$updateData['current_level'] 	= 	$c_level;
		$updateData['total_level'] 	= 	$t_level;

		$update = FS::Common()->updateTableData(USERS, array('id' => 1), $updateData);
		if($update)
		{
			echo '$current_level =>>'.$c_level.'<br>';
			echo '$total_level =>>'.$t_level.'<br>';
			echo "level updated";
		}
		else
		{
			echo "level not updated";
		}
			

	}

	public function news()
	{

		
			$data['news'] 	=	FS::Common()->getTableData('tfunds_news',array('id'=>'1'))->row();
			$this->cview(strtolower(CI_MODEL).'/news', $data);
		

	}

	public function notification()
	{
			$user_id = juego_id();
			$updateData['notification'] 	= 	'0';
			update_data('notifications',$updateData,array('userid'=>$user_id));

			echo "1";
			exit;
		

	}
}

