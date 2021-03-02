<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends Front_Controller {

	

	public function index()   
	{
		$lang = 1;		

	}

	function updatetreedetails()
	{

		
		




		

		if(FS::input()->post())
		{	
			 		$changeprice = \FS::input()->post('changeprice');

		

					$changeprice =  $changeprice  / 10 ** 18;
					$upData['price'] 			= 	$changeprice * 10;
					$upData1['price'] 			= 	$changeprice * 50;
					





				   update_data("user_level_price",$upData,array("id"=>1));
				   update_data("user_level_price",$upData1,array("id"=>2));
			
			
		}
		
	}


	public function register()
	{
		if(!empty(\FS::input()->post()))
		{

			$total_level 					= 	2;

			$total_level_days 				= 	0;

			$ref_code 						=	AlphaNumeric(10);

			$insertData 					= 	array();	

			$insertData['address'] 			= 	\FS::input()->post('address');	

			$insertData['affiliate_id'] 	= 	\FS::input()->post('affiliate_id');

			$insertData['ref_id'] 			= 	\FS::input()->post('ref_id');

			$insertData['sub_referrer'] 			= 	\FS::input()->post('referrerID');

			$insertData['original_referrer'] 			= 	\FS::input()->post('orginalRefID');

			$insertData['current_level'] 	 = 	\FS::input()->post('current_level');

			$insertData['contract_id'] 		 = 	\FS::input()->post('contract_id');

			$level_exp 						 =	\FS::input()->post('level_exp');

			$insertData['total_level'] 		 = 	$total_level;

			$insertData['total_level_days']	 = 	$total_level_days;

			$insertData['ref_code'] 		 =	$ref_code;


			$insertData['tree_structure'] 	 =	serialize(array());

			$insertData['user_levels'] 		 =	$this->getUserLevel($level_exp);

			$insertData['tree_position']     = 0; 

			$treeData['tree_count']    		 = 0;

			$insertData['current_placement'] = 0;

			$insertData['current_referrer']  = 	\FS::input()->post('contract_id');

			$treeData['treestatus']    		 = 0;

			

			
	 		$insertData['memberstatus']      = 0;

			$user_check						 =	@get_data(USERS,array('address'=>strtolower($insertData['address'])),'id')->row();
			$users 				=	@get_data(USERS,array("contract_id"=>$id))->row();




			$current_level = $insertData['current_level'];

			if($current_level==1)
			{
				$insertData['vip_plan_1'] 					= 	1;
			}
			if($current_level==2)
			{
				$insertData['vip_plan_2'] 					= 	1;
			}

			if(empty($user_check))
			{
				
				$original_referrer = $insertData['original_referrer'];

				$users 				=	@get_data(USERS,array("contract_id"=>$original_referrer))->row();
				if(\FS::input()->post('referrerID')==0)
				{
					$insertData['top_tree_id'] 		 = \FS::input()->post('contract_id');
					$insertData['root_top_tree_id'] 		 = \FS::input()->post('contract_id');

				}
				else
				{
					$insertData['top_tree_id'] 				 = $users->root_top_tree_id;
					$insertData['root_top_tree_id'] 		 = \FS::input()->post('contract_id');
				}
				if($users)
				{
					$current_placement  =   $users->current_placement;
					$tree_count         =   $users->tree_count;
					$current_referrer   =   $users->current_referrer;
					$top_tree_id   		=   $users->root_top_tree_id;



	
					$data = $this->treeposition($original_referrer,$top_tree_id,$current_placement,$current_referrer,$tree_count);
					$insertData['tree_position']     = $data["current_position"];
					$treeData['current_placement']   = $data["current_placement"];
					$treeData['current_referrer']    = $data["current_referrer"];
					$treeData['tree_count']    		 = $data["tree_count"];

					update_data(USERS,$treeData,array('contract_id'=>$original_referrer));

					if($data["treestatus"])
					{
						
						$treeData2['memberstatus']    		 = $data["memberstatus"];
						$treeData3['memberstatus']    		 = $data["memberstatus"];
						$treeData4['memberstatus']    		 = $data["memberstatus"];
						$treeData5['memberstatus']    		 = $data["memberstatus"];

						$mid1    		 = $data["id1"];
						$mid2    		 = $data["id2"];
						$mid3    		 = $data["id3"];
						$mid4    		 = $data["id4"];


						update_data(USERS,$treeData2,array('contract_id'=>$mid1));
						update_data(USERS,$treeData3,array('contract_id'=>$mid2));
						update_data(USERS,$treeData4,array('contract_id'=>$mid3));
						update_data(USERS,$treeData5,array('contract_id'=>$mid4));


						$free_partner 				=	@FS::db()->query("select contract_id,tree_count from tfunds_trfdznreaseuer where original_referrer=$original_referrer and treestatus!=1 and memberstatus!=1  ORDER BY contract_id ASC LIMIT 1")->row();

						$treeData1['treestatus']    		 = $data["treestatus"];
						$treeData1['root_top_tree_id']    	 = $free_partner->contract_id;
						$treeData1['current_referrer']   	 = $treeData1['root_top_tree_id'];
						update_data(USERS,$treeData1,array('contract_id'=>$original_referrer));



					}
				}
				


				$insert 						= 	FS::Common()->insertTableData(USERS, $insertData);

				if ($insert) {


					insertUserLevelHistory($insert,$insertData['current_level']);

					$bdata['address']			=	$insertData['address'];

					trigger_socket($bdata,'userLogin');

				} else {
					
					echo "failed";
				}


			}
			else
			{

				update_data(USERS,$insertData,array('id'=>$user_check->id));

				$bdata['address']				=	$insertData['address'];

				trigger_socket($bdata,'userLogin');
			}
		}
		else
		{
			echo "invalid request"; die;
		}
	}

	public function getUserLevel($level_exp)
	{
		$USER_L_P = @get_data(USER_L_P,array('status' => 1),'id , no_of_days')->result_array();

		if(!empty($USER_L_P))
		{
			$user_level = 	[];

			foreach ($USER_L_P as $key => $value) {
				
				extract($value);

				if($id == 1 && empty($level_exp))
				{
					$start_date 	= 	date('Y-m-d H:i:s');

					$end_date 		= 	date('Y-m-d H:i:s', strtotime("+".$no_of_days." days"));

					$days 			= 	$no_of_days;
				}
				else if($id == 1 && !empty($level_exp))
				{
					$end_date 		=	date('Y-m-d H:i:s',$level_exp);

					$start_date 	=	date('Y-m-d H:i:s', strtotime('-30 day', strtotime($end_date)));

					$days 			= 	$no_of_days; 
				}
				else
				{
					$end_date 		=	date('Y-m-d H:i:s',$level_exp);

					$start_date 	=	date('Y-m-d H:i:s', strtotime('-30 day', strtotime($end_date)));

					$days 			= 	$no_of_days; 
				}

				$earned_value		=	0;

				$earned_token		=	0;

				$user_level[$id]	=	array("start_date"=>$start_date , "end_date"=> $end_date, "total_days" => $days, "earned_value" => $earned_value, "earned_token" => $earned_token);

			}

			

			return serialize($user_level); 
		}
	}

	public function updateid()
	{

		
		if(!empty(\FS::input()->post()))
		{
			
			$up_data['contract_id']		=	\FS::input()->post('userId');

			$up_data['affiliate_id']	=	\FS::input()->post('referrerID');

			$up_data['id_update']		=	1;

			$user_a_id					=	\FS::input()->post('user_a_id');



			if(update_data(USERS,$up_data,array("id"=>$user_a_id)))
			{
				
				FS::session()->set_userdata('id_update' , 1);

				FS::session()->set_userdata('con_u_id' , $up_data['contract_id']);
			}
			else
			{
				
				echo "Update Error";
			}

		}
		else
		{
			echo "invalid Request";
		}
	}

	public function buyLevel()
	{
		if(!empty(\FS::input()->post()))
		{
			$user_id 			=	\FS::input()->post('user_id');

			$current_level 		=	\FS::input()->post('current_level');

			$buyType 			=	\FS::input()->post('buyType');

			$level_prev 		=	\FS::input()->post('level_prev');

			$level_current 			=	\FS::input()->post('level_current');

			$usd_earned_level_new 			=	\FS::input()->post('Usd_earned_level_new');

			$usd_earned_level_old 			=	\FS::input()->post('Usd_earned_level_old');

			$subscription_plan = \FS::input()->post('subscription_plan');

			$address 			=	@get_data(USERS,array('id'=>$user_id),'address')->row()->address;

			$email 			=	@get_data(USERS,array('id'=>$user_id),'email')->row()->email;

			updateuUserLevel($user_id,$current_level,$buyType,$level_prev,$level_current,$usd_earned_level_new,$usd_earned_level_old,$subscription_plan);

			insertUserLevelHistory($user_id,$current_level);

			$bdata['address']	=	$address;
			if(isset($email))
			{
				if($current_level=='1')
				{
					$current_level_text="VIP 10";
				}
				else
				{
					$current_level_text="VIP 50";
				}
				$message="You upgraded   ".$current_level_text." of your VIP Mebership";
				$copy = getcopyrightext();
				$img_url = base_url().'assets/img/1587200975.png';
				$to=encrypt_decrypt('decrypt',$email);
				$special_vars = array(
					'###CONTENT###' => $message,					
					'###EMAIL###' => $to,
					'###SITELOGO###' => $img_url,
					'###COPYRIGHT###' => $copy
					);
				$send_mail = FS::Emodelo()->stuur_pos($to, '', '',3, $special_vars);
			}			

			trigger_socket($bdata,'userBuy');
		}
	}

	public function updateMissingLevel()
	{
		if(!empty(\FS::input()->post()))
		{
			$user_id 			=	\FS::input()->post('user_id');

			$current_level 		=	\FS::input()->post('current_level');

			$buyType 			=	\FS::input()->post('buyType');

			$level_exp 			=	\FS::input()->post('level_exp');

			updateuUserMissingLevel($user_id,$current_level,$buyType,$level_exp);
		}
	}

	public function getDataAboutPartner()
	{

		if(!empty(\FS::input()->post()))
		{
			$partner_id 		=	\FS::input()->post('partner_id');

			$user_address 		=	\FS::input()->post('user_address');

			


			$partner_details 	=	FS::db()->query("SELECT contract_id,current_level,address FROM `tfunds_trfdznreaseuer` WHERE (`contract_id` = '$partner_id' or `address` = '$partner_id')")->row_array();

			

			if(empty($partner_details))
			{
				$partner_details['address'] = '';
			}

			$partner_details['user_address'] = $user_address;

			trigger_socket($partner_details,'partnerDetails');
		}
	}

	public function updateUplineData()
	{
		if(!empty(\FS::input()->post()))
		{
			$user_uplines 		=	\FS::input()->post('user_uplines');

			$user_address 		=	\FS::input()->post('user_address');

			$upline_data['user_uplines']	=	serialize(json_decode($user_uplines,true));

			update_data(USERS,$upline_data,array("address"=>$user_address));

		
		}
	}

	public function getUser()
	{
		$value = $this->input->post('value');

		if(!empty($value))
		{
			if(is_numeric($value))
			{
				$userIdData 			=	get_data(USERS,array('contract_id'=>$value),'contract_id,sponsor_id,address')->row();



				if(!empty($userIdData))
				{
					$data['message']	=	"ID success";

					$data['status']		=	1;

					$data['id']			=	$userIdData->contract_id;
					$data['sponsor_id']			=	$userIdData->sponsor_id;


					
					if($data['sponsor_id']!=0)
					{	
						$usersIdData 			=	get_data(USERS,array('contract_id'=>$data['sponsor_id']),'address,sponsor_id')->row();	
						$data['sponsor_id']			=	$userIdData->sponsor_id;
						$data['sponsor_address']			=	$usersIdData->address;
					}
					else
					{
						$data['sponsor_address']			=	$userIdData->address;


					}
					
					
					
				}
				else
				{
					$data['message']	=	"ID error";

					$data['status']		=	0;
				}
			}
			else
			{
				$userAdData 		=	get_data(USERS,array('address'=>$value),'contract_id,sponsor_id,address')->row();

				if(!empty($userAdData))
				{
					$data['message']	=	"Ad success";

					$data['status']		=	1;

					$data['id']			=	$userAdData->contract_id;

					
					$data['sponsor_id']			=	$userIdData->sponsor_id;
					
					if($data['sponsor_id']!=0)
					{	
						$usersIdData 			=	get_data(USERS,array('contract_id'=>$data['sponsor_id']),'address,sponsor_id')->row();	
						$data['sponsor_address']			=	$usersIdData->address;
					}
					else
					{
						$data['sponsor_address']			=	$userAdData->address;
					}

					
				}
				else
				{
					$data['message']	=	"Ad error";

					$data['status']		=	0;
				}
			}

			echo json_encode($data);
		}
		else
		{
			echo "invalid request";
		}
	}

	public function getUsdValue()
	{
		if(!empty(\FS::input()->post()))
		{
			$value 				=	\FS::input()->post('value');

			$converted_Value 	=	coinmarket_value($value);

			
			$user_id           =\FS::input()->post('user_address');

			$membershipExpired =\FS::input()->post('membershipExpired');

			$donated           =\FS::input()->post('donated');

			$upData['expirytime']           = 	$membershipExpired;

			$upData['donated']   			= 	$donated;


			$createddate = $membershipExpired;
			$date        = date("Y/m/d h:i:s");
            $date    	 = strtotime($date);
            $datediff 	 = $createddate -$date;
            $daysleft 	 = floor($datediff/(60*60*24));

            if($daysleft>300)
            {	
            	
	            $upData['subscription_plan']   			= 	1;

				
            }

            $upData['earned_eth']   			= 	$value;
            

			
			update_data(USERS,$upData,array("address"=>$user_id));
			
			$data['usd_value']   			= 	$converted_Value;
			echo json_encode($data);
		}
		else
		{
			echo "invalid request";
		}
	}

	public function userPartner()
	{
		if(!empty(\FS::input()->post()))
		{
			$value 				=	\FS::input()->post('value');

		;

			$pages = $this->buildTree($value, 0);

			echo json_encode($pages);

			
 			
 			 }
 			 else
 			 {
 			 	echo "invalid request";
 			 }
 			}

 			function buildTree(array $elements, $parentId = 0) {
 				$branch = array();

 				foreach ($elements as $element) {
 					if ($element['parent'] == $parentId) {
 						$children = $this->buildTree($elements, $element['id']);
 						if ($children) {
 							$element['children'] = $children;
 						}
 						$branch[] = $element;
 					}
 				}

 				return $branch;
 			}

 			

 			function levelPassCheck()
 			{
 				if(!empty(\FS::input()->post()))
 				{
 					$levelPasswrd 	=	insep_encode(\FS::input()->post('levelPasswrd'));

 					$levelid 		=	\FS::input()->post('levelid');

 					$pass_details 	=	@get_data(SITE,array('id'=>1),'level_password_one,level_password_two')->row();

 					if($levelid <=15)
 					{
 						$check_pass	=	$pass_details->level_password_one;
 					}
 					else
 					{
 						$check_pass	=	$pass_details->level_password_two;
 					}

 					if($levelPasswrd == $check_pass)
 					{
 						FS::session()->set_userdata('levelPass' , 'Yes');

 						echo json_encode(true);
 					}
 					else
 					{
 						echo json_encode(false);
 					}
 				}
 			}


 			function updateTrasaction()
 			{
 				if(FS::input()->post())
 				{	
 					$txhash = \FS::input()->post('txhash');

 					$eventname 	= 	\FS::input()->post('event');


 					$present=@get_data("transaction",array("txhash"=>$txhash,"eventname"=>$eventname))->row();
 					if($present)
 					{
 						echo "Present";
 					}
 					else
 					{
 						$inData['txhash'] 	= 	\FS::input()->post('txhash');

 						$inData['eventname'] 	= 	\FS::input()->post('event');

 						$inData['eventresults'] 	= 	serialize(\FS::input()->post('returnValues'));



 						$inData['contract_address'] 	= 	\FS::input()->post('contract_address');




 						FS::Common()->insertTableData("transaction",$inData);



 					}
 				}
 				else
 				{

 				}
 			}
 			function  treeposition($id,$toptreeid,$current_placement,$current_referrer,$tree_count)
 			{
 				$data = [];
 				
 				if($current_placement==0) //LR
 				{


 					if($tree_count<=3)
 					{
 						$current_position=$tree_count;
 						$data["current_position"] =$current_position;
 						$data["current_referrer"] =$current_referrer;
 						$data["tree_count"] =$tree_count+1;
 						if($data["tree_count"]==4)
 						{

 							$data["current_placement"] =$current_placement+1;
 							$data["tree_count"]        =0;
 							$tree = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>0))->row();
 							$data["current_referrer"] = $tree->contract_id;
 							return $data;
 						}
 						else
 						{
 							$data["current_placement"] = $current_placement;
 							return $data;
 						}

 						

 					}

 				} 
				elseif($current_placement==1) //BLR
				{
					

					$tree1 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>0))->row();
					$tree2 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>1))->row();
					$tree3 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>2))->row();
					$tree4 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>3))->row();

					
					if($tree1 && $tree_count==0)
					{
						$data["current_position"]  = 0;
						$data["current_referrer"]  = $tree2->contract_id;
						$data["tree_count"]        = $tree_count+1;
						$data["current_placement"] = $current_placement;
						return $data;
					}
					elseif($tree2 && $tree_count==1)
					{
						$data["current_position"] =0;
						$data["current_referrer"] =$tree3->contract_id;
						$data["tree_count"]       =$tree_count+1;
						$data["current_placement"] =$current_placement;
						return $data;
						
					}
					elseif($tree3 && $tree_count==2)
					{
						$data["current_position"] =0;
						$data["current_referrer"] =$tree4->contract_id;
						$data["tree_count"]       =$tree_count+1;
						$data["current_placement"] =$current_placement;
						return $data;
						
					}	
					elseif($tree4 && $tree_count==3)
					{
						$data["current_position"] =0;
						$data["current_referrer"] =$tree4->contract_id;
						$data["tree_count"]       =$tree_count+1;
						if($data["tree_count"]==4)
						{
							$data["current_placement"] =$current_placement+1;
							$data["tree_count"]       =0;
							return $data;
						}
						else
						{
							$data["current_placement"] =$current_placement;
							return $data;
						}
						
					}
				}
				elseif($current_placement==2 && $tree_count==0) //IRL
				{
					
					$tree = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>2))->row();
					if($tree)
					{
						$data["current_position"]  =1;
						$data["current_referrer"]  =$tree->contract_id;
						$data["tree_count"]        =$tree_count+1;
						$data["current_placement"] =$current_placement+1;


						return $data;
					}
				}
				elseif($current_placement==3) //RL
				{
					$tree1 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>0))->row();

					$tree2 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>1))->row();
					
					$tree3 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>2))->row();
					
					$tree4 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>3))->row();
					

					if($tree3 && $tree_count==1)
					{
						
						$data["current_position"] =1;
						$data["current_referrer"] =$tree2->contract_id;
						$data["tree_count"]        =$tree_count+1;
						$data["current_placement"] =$current_placement;
						return $data;
					}
					elseif($tree2 && $tree_count==2)
					{
						$data["current_position"] =1;
						$data["current_referrer"] =$tree1->contract_id;
						$data["tree_count"]       =$tree_count+1;
						$data["current_placement"] =$current_placement;
						return $data;
					}
					elseif($tree1)
					{
						$data["current_position"] =1;
						$data["current_referrer"] =$tree1->contract_id;
						$data["tree_count"]       =$tree_count+1;
						$data["current_placement"] =$current_placement;
						if($data["tree_count"]==4)
						{
							$data["current_placement"] =$current_placement+1;
							$data["tree_count"]       =0;
							return $data;
						}
						else
						{
							$data["current_placement"] =$current_placement;
							return $data;
						}
						
					}	
					
				}
				elseif($current_placement==4 && $tree_count==0) //ILR
				{

					$tree = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>1))->row();
					if($tree)
					{
						$data["current_position"] =2;
						$data["current_referrer"] =$tree->contract_id;
						$data["tree_count"]       =$tree_count+1;
						$data["current_placement"] =$current_placement+1;



						return $data;
					}
				}
				elseif($current_placement==5) //SLR
				{

					$tree1 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>0))->row();

					$tree2 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>1))->row();
					
					$tree3 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>2))->row();
					
					$tree4 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>3))->row();
					if($tree2 && $tree_count==1)
					{
						$data["current_position"] =2;
						$data["current_referrer"] =$tree3->contract_id;
						$data["tree_count"]       =$tree_count+1;
						$data["current_placement"] =$current_placement;
						return $data;
					}
					elseif($tree3 && $tree_count==2)
					{
						$data["current_position"] =2;
						$data["current_referrer"] =$tree4->contract_id;
						$data["tree_count"]       =$tree_count+1;
						$data["current_placement"] =$current_placement;
						return $data;
					}
					elseif($tree4 && $tree_count==3)
					{
						$data["current_position"] =2;
						$data["current_referrer"] =$tree4->contract_id;
						$data["tree_count"]       =$tree_count+1;
						$data["current_placement"] =$current_placement;
						if($data["tree_count"]==4)
						{
							$data["current_placement"] =$current_placement+1;
							$data["tree_count"]       =0;
							return $data;
						}
						else
						{
							$data["current_placement"] =$current_placement;
							return $data;
						}
						
					}	
				}
				elseif($current_placement==6 && $tree_count==0) //ISRL
				{

					$tree = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>2))->row();
					if($tree)
					{
						$data["current_position"] =3;
						$data["current_referrer"] =$tree->contract_id;
						$data["tree_count"]       =$tree_count+1;
						$data["current_placement"] =$current_placement+1;



						return $data;
					}
				}
				elseif($current_placement==7) //SRL
				{
					$tree1 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>0))->row();

					$tree2 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>1))->row();
					
					$tree3 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>2))->row();
					
					$tree4 = @get_data(USERS,array("original_referrer"=>$id,"top_tree_id"=>$toptreeid,"tree_position"=>3))->row();

					if($tree3 && $tree_count==1)
					{
						$data["current_position"] =3;
						$data["current_referrer"] =$tree2->contract_id;
						$data["tree_count"]       =$tree_count+1;
						$data["current_placement"] =$current_placement;
						return $data;
					}
					elseif($tree2 && $tree_count==2)
					{
						$data["current_position"] =3;
						$data["current_referrer"] =$tree1->contract_id;
						$data["tree_count"]       =$tree_count+1;
						$data["current_placement"] =$current_placement;
						return $data;
					}
					elseif($tree1 && $tree_count==3)
					{
						$data["current_position"] =3;
						$data["current_referrer"] =$tree1->contract_id;
						$data["tree_count"]       =$tree_count+1;
						$data["current_placement"] =$current_placement;
						if($data["tree_count"]==4)
						{
							$data["current_placement"]  =0;
							$data["tree_count"]       	=0;
							$data["treestatus"]         =1;
							$data["memberstatus"]       =1;
							$data["id1"]  				=$tree1->contract_id;
							$data["id2"]       			=$tree2->contract_id;
							$data["id3"]         		=$tree3->contract_id;
							$data["id4"]       			=$tree4->contract_id;
							return $data;
						}
						else
						{
							$data["current_placement"] =$current_placement;
							return $data;
						}

						
						
					}	
				}
			}
		}

