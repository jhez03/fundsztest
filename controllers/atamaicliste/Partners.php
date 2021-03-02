<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends Front_Controller {

	

	var $partnersData = array();

	var $data;
	 
	public function index()
	{
		if(!empty(juego_id()))
		{
			$lang_url     =   FS::uri()->segment(1);
			
			$lang_name = get_data(LANG,array('lang_code'=>$lang_url),'lang_code')->row()->lang_code;

			$data['address'] 	=	FS::Common()->getTableData(ADDRESS)->row();

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

			$ref_code			=	FS::Common()->getTableData(USERS, array('id' => juego_id()),'contract_id,address,current_level')->row();
			
			$ref_url 			= 	base_url().$lang_name.'/refer/'.$ref_code->contract_id; 

			$data['ref_url']	=	$ref_url;
			
			$data['user_address']	=	$ref_code->address;

			$data['title']			=	"Partners Page";

			$data['users']			=	$ref_code;

			$data['action']			=	"partners";

			$data['tree_data']		=	$this->getUserTreeData();

			$this->cview(strtolower(CI_MODEL).'/partners', $data);
		}
		else
		{
			front_redirect(base_url());
		}
	}

	function getUserTreeData()
	{
		$user_id 			=		FS::session()->userdata('con_u_id');

		$main_user			=		@get_data(USERS,array('contract_id'=>$user_id),'CONCAT("ID: " ,contract_id) as name, current_level as number, "null" as parent,"User Info" as levelinfo,contract_id,affiliate_id,id as children')->result_array();

		$data 				=	FS::db()->query("select * from (select CONCAT('ID: ' ,contract_id) as name, current_level as number, 'null' as parent,'User Info' as levelinfo,contract_id,affiliate_id,original_referrer,sub_referrer from tfunds_trfdznreaseuer ORDER BY contract_id ASC) products_sorted, (select @pv := $user_id) initialisation where find_in_set(original_referrer, @pv) and original_referrer=$user_id ORDER BY contract_id ASC")->result_array();

		

		if(!empty($main_user))
		{

			if(!empty($data))
			{
				$data 						=	$this->buildPartnerTree($data,$main_user[0]['contract_id']);

				$main_user[0]['levelinfo'] 	= 	$this->getUserInfo($main_user[0]['contract_id']);

				$main_user[0]['children'] 	= 	$data;

				$final_result 				=	$main_user;
			}
			else
			{
				$main_user[0]['children'] = array();

				$main_user[0]['levelinfo'] 	= 	$this->getUserInfo($main_user[0]['contract_id']);

				$final_result 				=	$main_user;
			}
		}
		else
		{
			$final_result =	array();
		}

		return json_encode($final_result);
	}

	public function get_partner_data(){

		$user_id 		=	FS::session()->userdata('con_u_id');

        $this->db->select('CONCAT("ID: " ,contract_id) as name, current_level as number, "null" as parent,"User Info" as levelinfo,contract_id,affiliate_id');
        $this->db->from(USERS);
        $this->db->where('affiliate_id', $user_id);

        $parent = $this->db->get();
        
        $categories = $parent->result_array();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]['levelinfo'] 	= 	$this->getUserInfo($p_cat['contract_id']);

            $categories[$i]['children'] 	= 	$this->sub_partner($p_cat['contract_id']);

            $i++;
        }
        return $categories;
    }

    public function sub_partner($id){

        $this->db->select('CONCAT("ID: " ,contract_id) as name, current_level as number, "null" as parent,"User Info" as levelinfo,contract_id,affiliate_id');
        $this->db->from(USERS);
        $this->db->where('affiliate_id', $id);

        $child = $this->db->get();
        $categories = $child->result_array();
        $i=0;
        foreach($categories as $p_cat){

        	$categories[$i]['levelinfo'] 	= 	$this->getUserInfo($p_cat['contract_id']);

            $categories[$i]['children'] 	= 	$this->sub_partner($p_cat['contract_id']);

            $i++;
        }
        return $categories;       
    }

    public function getUserInfo($contract_id)
    {
		$value 	=	get_data(USERS,array('contract_id' =>$contract_id),"user_levels,current_level,contract_id,vip_plan_1,vip_plan_2,donated,expirytime")->row_array();

		if(!empty($value))
		{

			$user_levels      	=   unserialize($value['user_levels']);

			$curr_levels      	=   array_slice($user_levels,0,$value['current_level']);

			$user_text 			=	'<pre>ID: '.$value['contract_id'].' \n\n';

			for ($i=0; $i < $value['current_level']; $i++) { 
				
			
                         $createddate = $value['expirytime'];
                         $date=date("Y/m/d h:i:s");
                         $date    = strtotime($date);
                         $datediff = $createddate -$date;
                         $daysleft = floor($datediff/(60*60*24));

                         
           if($i==0 && $value['donated']==1)
            {
            	 $user_text 		=	$user_text."VIP Plan $10".' : '.$daysleft.' d \n';
            }
            else if($i==1 && $value['donated']==2)
           	{
            	$user_text 		=	$user_text."VIP Plan $50".' : '.$daysleft.' d \n';
           	
			}

			}

			return trim($user_text,'\n').'</pre>';

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
    


	function buildPartnerTree(array $elements, $parentId = 0) {
	    
	    $branch = array();

	    foreach ($elements as $key=>$element) {

 	        if ($element['affiliate_id'] == $parentId) {

 	        	$element['levelinfo']	=	$this->getUserInfo($element['contract_id']);

	            $children = $this->buildPartnerTree($elements, $element['contract_id']);

	            if ($children) {

	                $element['children'] = $children;
	            }

	            $branch[] = $element;
	        }
	    }

	    return $branch;
	}

	function getUserLevelInfo()
	{
		$user_id 		=	FS::session()->userdata('con_u_id');

		$query = FS::db()->query('call referrals_hier('.$user_id.')');

		$pro_resutl      = $query->result_array();

		$conn = $this->db->conn_id;
		do {
		    if ($result = mysqli_store_result($conn)) {
		        mysqli_free_result($result);
		    }
		} while (mysqli_more_results($conn) && mysqli_next_result($conn));

		$main_user		=	@get_data(USERS,array('contract_id'=>$user_id),'current_level, contract_id,user_levels,vip_plan_1,vip_plan_2,donated,expirytime')->result_array();


		$final_aray 	  =		array_merge($main_user,$pro_resutl);

		if(!empty($final_aray))
		{
			$user_info_array 	 =	[];

			foreach ($final_aray as $key => $value) {
				
				$user_levels      	=   unserialize($value['user_levels']);

      			$curr_levels      	=   array_slice($user_levels,0,$value['current_level']);

      			$user_text 			=	'<pre>ID: '.$value['contract_id'].' \n\n';

      			for ($i=0; $i < $value['current_level']; $i++) { 
      				
      				$createddate = $value['expirytime'];
                    $date=date("Y/m/d h:i:s");
                    $date    = strtotime($date);
                    $datediff = $createddate -$date;
                    $daysleft = floor($datediff/(60*60*24));

                    if($i==0 && $value['donated']==1)
		            {
		            	 $user_text 		=	$user_text."VIP Plan $10".' : '.$daysleft.' d \n';
		            }
		            else if($i==1 && $value['donated']==2)
		           	{
		            	$user_text 		=	$user_text."VIP Plan $50".' : '.$daysleft.' d \n';
		           	
					}
 
       			}

      			$user_info_array[$key] = trim($user_text,'\n').'</pre>';

			}

			return $user_info_array;
		}

		

      	
	}
}