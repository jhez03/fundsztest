<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basic extends Front_Controller {

	

	public function index()
	{ 

		$lang = 1;

		$data['title']		=	"Home";

		$lang_url     =   FS::uri()->segment(1);



		$language=FS::Common()->getTableData(LANG,array('lang_code'=>$lang_url))->row()->id;


		$data['faq'] 	=	FS::Common()->getTableData(FAQ,array('language'=>$language), '', '', '', '', '0','9', array('id', 'DESC'))->result();
	
		$data['doc'] 	=	FS::Common()->getTableData(DOC, array('language' => $lang))->result();

		$data['USER_L_P'] 	=	FS::Common()->getTableData(USER_L_P)->result();

		$data['USER_L_P_F'] 	=	FS::Common()->getTableData(USER_L_P, '', '', '', '', '', '','6', '')->result();

		$data['USER_L_P_L'] 	=	FS::Common()->getTableData(USER_L_P, '', '', '', '', '', '6','7', '')->result();

		$data['work'] 	=	FS::Common()->getTableData(HOW_WORK, array('language' => $language), '', '', '', '', '','', array('id', 'DESC'))->result();

		$data['home_content'] 	=	FS::Common()->getTableData(HOME_CONTENT, array('language' => $lang))->row();

		$data['address'] 	=	FS::Common()->getTableData(ADDRESS, array('language' => $lang,'id' => 1))->row();

		$data['users_count'] 	=	FS::Common()->getTableData(USERS)->num_rows();

		$data['last_users']  = FS::db()->query("SELECT * FROM tfunds_trfdznreaseuer WHERE tfunds_trfdznreaseuer.created_at > DATE_SUB(NOW(), INTERVAL 1 DAY)")->num_rows();

		$eth  = round($data['USER_L_P_F'][0]->price,2); 

		$value = coinmarket_value($eth);
		
		$data['usd_value'] = round($value,2); 


		$eth_value  = round($data['USER_L_P_L'][5]->profit,2); 

		$value_eth = coinmarket_value($eth_value);
		
		$data['usd_value_top'] = round($value_eth,2); 


		$earned_eth = FS::db()->query("SELECT SUM(earned_eth) as earned_eth from `tfunds_trfdznreaseuer`")->row_array();

		$data['earned_eth'] = $earned_eth['earned_eth'];



		$data['is_referrer'] = 0; 


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

		
		


		$this->view(strtolower(CI_MODEL).'/index', $data);
	}


	public function referuser($id='')
	{
 		$lang = 1;

		$data['title']		=	"Login Page";

		
		$data['faq'] 	=	FS::Common()->getTableData(FAQ, '', '', '', '', '', '','9', array('id', 'DESC'))->result();


		$data['doc'] 	=	FS::Common()->getTableData(DOC, array('language' => $lang))->result();

		$data['USER_L_P'] 	=	FS::Common()->getTableData(USER_L_P)->result();

		$data['USER_L_P_F'] 	=	FS::Common()->getTableData(USER_L_P, '', '', '', '', '', '','6', '')->result();

		$data['USER_L_P_L'] 	=	FS::Common()->getTableData(USER_L_P, '', '', '', '', '', '6','7', '')->result();

		$data['work'] 	=	FS::Common()->getTableData(HOW_WORK, array('language' => $lang))->result();

		$data['home_content'] 	=	FS::Common()->getTableData(HOME_CONTENT, array('language' => $lang))->row();

		$data['address'] 	=	FS::Common()->getTableData(ADDRESS, array('language' => $lang,'id' => 1))->row();

		$data['users_count'] 	=	FS::Common()->getTableData(USERS)->num_rows();

		$data['last_users']  = FS::db()->query("SELECT * FROM tfunds_trfdznreaseuer WHERE tfunds_trfdznreaseuer.created_at > DATE_SUB(NOW(), INTERVAL 1 DAY)")->num_rows();

	
		$coin_id = $id; 
		$count 				=	@FS::db()->query("select COUNT(*) as total_partner from (select contract_id,original_referrer from tfunds_trfdznreaseuer ORDER BY contract_id DESC) products_sorted, (select @pv := $coin_id) initialisation where find_in_set(original_referrer, @pv) and length(@pv := concat(@pv, ',', contract_id))")->row()->total_partner;

		
		$eth  = round($data['USER_L_P_F'][0]->price,2); 

		$value = coinmarket_value($eth);
		
		$data['usd_value'] = round($value,2); 

		$data['is_referrer'] = 1; 

		$data['referrer_id'] = $id; 

		$users 				=	@get_data(USERS,array("contract_id"=>$id))->row();
		if($users)
		{
				if($count!=0)
				{
					

					if($users->sponsor_id!=0)
					{
						$users1 				=	@get_data(USERS,array("contract_id"=>$users->sponsor_id))->row();

						$data['referrer_id'] = ($users1->current_referrer) ? $users1->current_referrer: $users->sponsor_id;
						$data['original_referrer_id'] = $users->sponsor_id;

						$data['top_referrer_id'] = $id;



					}
					else
					{
					$data['referrer_id'] = ($users->current_referrer) ? $users->current_referrer: $id ;
					$data['original_referrer_id'] = $id;
					$data['top_referrer_id'] = $id;
					}
				
				}
				else
				{
					
					$data['referrer_id'] = $id; 
					$data['original_referrer_id'] = $id; 
					$data['top_referrer_id'] = $id;

				}

		}	
		else
		{
					$data['referrer_id'] = 0; 
					$data['original_referrer_id'] = 0; 
					$data['top_referrer_id'] = 0;
		}

		
		$eth_value  = round($data['USER_L_P_L'][5]->profit,2); 

		$value_eth = coinmarket_value($eth_value);
		
		$data['usd_value_top'] = round($value_eth,2); 


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


		

		$plan1_price_row = $this->db->query("select price from tfunds_user_level_price where id='1'")->row()->price;

					$plan2_price_row = $this->db->query("select price from tfunds_user_level_price where id='2'")->row()->price;
					$data['plan1_price'] = $plan1_price_row;
					$data['plan2_price'] = $plan2_price_row;


		$this->bview(strtolower(CI_MODEL).'/register', $data);
	}


	public function earnMoney()
	{
		if(!empty(juego_id()))
		{
			redirect(site_url('dashboard'));
		}
		else
		{
			$data['title']		=	"Login";

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

			$this->bview(strtolower(CI_MODEL).'/login', $data);
		}
	}

	public function login($address,$reff_id='')
	{
		if(!empty($address))
		{
			if(!empty(juego_id()))
			{
				redirect(site_url('dashboard'));
			}
			else
			{
				$userAddressDetails 	=	@get_data(USERS,array('address'=>$address , "status"=> 1))->row();

				
				if(!empty($userAddressDetails))
				{
					$reference=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,18);
								$_SESSION['login_key'] = $reference;
					$this->db->where("address",$address);
					$this->db->update("users",array("login_key"=>$reference));

					FS::session()->set_userdata('juego_id' , $userAddressDetails->id);

					FS::session()->set_userdata('id_update' , $userAddressDetails->id_update);

					FS::session()->set_userdata('con_u_id' , $userAddressDetails->contract_id);

					FS::session()->set_userdata('address' , $userAddressDetails->address);

					FS::session()->set_userdata('user_levels' , $userAddressDetails->user_levels);

					FS::session()->set_userdata('curr_level' , $userAddressDetails->current_level);

					FS::session()->set_userdata('login_type' , 'auto');

					redirect(site_url('dashboard'));
				}
				else
				{
					if(!empty($reff_id) && is_numeric($reff_id))
					{

								$data['is_referrer'] = 1; 

									

								$data['original_referrer_id'] = $reff_id; 




								$coin_id = $reff_id; 

								$count 				=	@FS::db()->query("select COUNT(*) as total_partner from (select contract_id,original_referrer from tfunds_trfdznreaseuer ORDER BY contract_id DESC) products_sorted, (select @pv := $coin_id) initialisation where find_in_set(original_referrer, @pv) and length(@pv := concat(@pv, ',', contract_id))")->row()->total_partner;
							

								

								if($count!=0)
								{
									$users 				=	@get_data(USERS,array("contract_id"=>$reff_id))->row();

									if($users->sponsor_id!=0)
									{
										$users1 				=	@get_data(USERS,array("contract_id"=>$users->sponsor_id))->row();

										$data['referrer_id'] = ($users1->current_referrer) ? $users1->current_referrer: $users->sponsor_id;
										$data['original_referrer_id'] = $users->sponsor_id;

										$data['top_referrer_id'] = $reff_id;
									}
									else
									{
									$data['referrer_id'] = ($users->current_referrer) ? $users->current_referrer: $reff_id ;
									$data['original_referrer_id'] = $reff_id;
									$data['top_referrer_id'] = $reff_id;
									}
								
								}
								else
								{
									
									$data['referrer_id'] = $reff_id; 
									$data['original_referrer_id'] = $reff_id; 
									$data['top_referrer_id'] = $reff_id;

								}
					}
					else
					{
						$data['is_referrer'] = 0;
					}

					$data['title']		=	"Login Page";

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

					$plan1_price_row = $this->db->query("select price from tfunds_user_level_price where id='1'")->row()->price;

					$plan2_price_row = $this->db->query("select price from tfunds_user_level_price where id='2'")->row()->price;
					$data['plan1_price'] = $plan1_price_row;
					$data['plan2_price'] = $plan2_price_row;


					$this->bview(strtolower(CI_MODEL).'/register', $data);
				}
			}
			
		}
		else
		{
			front_redirect(base_url());
		}
	}


	public function login_manual()
	{
		 $value = $this->input->post('value');

		if(!empty($value))
		{
			if(!empty(juego_id()))
			{
				redirect(site_url('dashboard'));
			}
			else
			{	
				$where = '(contract_id="'.$value.'" or address = "'.$value.'")';

				


				$userAddressDetails 		=	FS::db()->query("SELECT * FROM `tfunds_trfdznreaseuer` WHERE `contract_id` LIKE '$value' OR `address` LIKE '$value' ")->row();

				


				if(!empty($userAddressDetails))
				{
					$reference=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,18);
								$_SESSION['login_key'] = $reference;
					$this->db->where("address",$value);
					$this->db->or_where("contract_id",$value);
					$this->db->update("users",array("login_key"=>$reference));
					
					FS::session()->set_userdata('juego_id' , $userAddressDetails->id);

					FS::session()->set_userdata('id_update' , $userAddressDetails->id_update);

					FS::session()->set_userdata('con_u_id' , $userAddressDetails->contract_id);

					FS::session()->set_userdata('address' , $userAddressDetails->address);

					FS::session()->set_userdata('user_levels' , $userAddressDetails->user_levels);

					FS::session()->set_userdata('curr_level' , $userAddressDetails->current_level);

					FS::session()->set_userdata('login_type' , 'manual');

					$data['message']	=	"success";

					$data['status']		=	1;
				}
				else
				{
					$data['message']	=	"error";

					$data['status']		=	0;

					$data['id']		=	'2';

					$data['value']		=	$value;
				}

				echo json_encode($data);
			}
		}
		else
		{
			front_redirect(base_url());
		}
	}

	function logout()
	{

		
		FS::session()->unset_userdata('juego_id');

		front_redirect(base_url());
	}

	

	function socketTrigger()
	{
		$bdata['userid']		=	'1';

		trigger_socket($bdata,'socket');
	}


	function coinmarket()
	 {

			
				$to = 'USD';
				$from = 'ETH';
				

				$coinmarketapi	=	FS::Common()->getTableData(SITE, array('id' => '1'))->row()->coinmarketapi;

				if($coinmarketapi)
				{
					$cmc_url = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?CMC_PRO_API_KEY=" . $coinmarketapi . "&symbol=" . $from . "&convert=" . $to;
					
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $cmc_url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					$output = curl_exec($ch);
					curl_close($ch);
					$response = json_decode($output);
				
					if (isset($response->data) && $response->status->credit_count == 1) {

						$preres = $response->data->$from->quote->$to;
						$tocur = $preres->price; 
					

						$updateData['coin_usd_value'] = $tocur;
						$condition = array('id' => '1');
				
				
						$update = FS::Common()->updateTableData(SITE, $condition, $updateData);
						if ($update) {
								echo 'tocur=' . $tocur . "<br>";
								echo '2';
						}
						else
						{	
								echo '0';
						}


					
						
									
						
					}
					else
					{
						echo '0';
					}
				
				}
		
	}

	function del_logs()
    {
    	error_reporting(-1);

		ini_set('display_errors', 1);

    	$path = FCPATH.'assets/socket/logs/pm2/out.log';
		
    	$fh = fopen($path,'w'); // Open and truncate the file

		fclose($fh);

		$paths = FCPATH.'assets/socket/logs/pm2/error.log';

    	$fhs = fopen($paths,'w'); // Open and truncate the file

		fclose($fhs);
    }

    function live_trade_out()
	{
		$this->load->helper('file');
		//echo FCPATH;
	 
		$string = file_get_contents(FCPATH.'assets/socket/logs/pm2/out.log');
		echo '<pre>';
		print_r($string);
		echo '2 ---------------------'.'<br>';
	}

	function live_trade_error()
	{
		$this->load->helper('file');
		
		$string = file_get_contents(FCPATH.'assets/socket/logs/pm2/error.log');
		echo '<pre>';
		print_r($string);
		
		echo '1 ---------------------'.'<br>';
		 
		echo '</pre>'; die;

		$this->load->helper('directory');
		$map = directory_map(FCPATH, FALSE, TRUE);
		echo '<pre>';
		print_r($map);
		echo '</pre>';
	}


	function email()
	{

		if(!empty(juego_id()))
		{
		$data['title']		        =	"Email Update Page";

		$data['action']		        =	"email";
		if(!empty(\FS::input()->post()))
		{
			$id =FS::session()->userdata('juego_id');

			$email = 	\FS::input()->post('value');
				if(!empty($email))
				{
					
					$insertData1['email'] = encrypt_decrypt('encrypt',$email);
					update_data(USERS,$insertData1,array('id'=>$id));
				}
				echo 1;
		}
		else
		{
			$id =FS::session()->userdata('juego_id');
			$data["email"]						=	@get_data(USERS,array('id'=>$id),'email')->row();
			$this->cview(strtolower(CI_MODEL).'/email', $data);
		}
		
	}
	else
	{
			front_redirect(base_url());
	}
	}

	

}

