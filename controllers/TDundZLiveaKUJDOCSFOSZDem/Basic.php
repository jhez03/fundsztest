<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basic extends Admin_Controller {

	


 
  

	public function index()
	{
		if(!empty(admin_id())) 
		{
			admin_redirect('sitesettings', 'refresh');
		}
		
		

		  if (!isset($_SERVER['PHP_AUTH_USER']) || (isset($_SERVER['PHP_AUTH_USER']) && ($_SERVER['PHP_AUTH_USER'] != "!@##TOraUSLive%#@%^" || $_SERVER['PHP_AUTH_PW'] != "!@#$%LiveTORAUs%^%^"))) {
		   header('WWW-Authenticate: Basic realm=" Auth"');
		   header('HTTP/1.0 401 Unauthorized');
		   echo 'Authentication Failed';exit;
		  }



	


		$data['title']		=	"Login Page";

		$this->basicview('basic/login', $data);
	}

	function t_f_a()
	{
		if(!empty(admin_id())) 
		{
											admin_redirect('sitesettings', 'refresh');
		}
		if ($this->input->post('tfacode')) {
			
							$code = $this->input->post('tfacode');
							
							$result = FS::Common()->getTableData(SITE, array('id' => 1))->row();
							$secret = $result->secret;
							require_once 'GoogleAuthenticator.php';
							$ga     = new PHPGangsta_GoogleAuthenticator();		
							$validCode = $ga->verifyCode($secret, $code, $discrepancy = 2);
							

							
							
							$aid =  $this->session->userdata('tloggedadmin');

							$email 			= 	$this->session->userdata('email');

							$password 		= 	$this->session->userdata('pass');

							

							$patterncode 	= 	$this->session->userdata('pattern');

							$remember 	    = 	$this->session->userdata('remember');
							
							if ($validCode == 1 && $aid==1) 
							{
								
									$login 			=	FS::Common()->getTableData(AD, array('email_id' => encrypt_decrypt('encrypt', $email), 'password' => encrypt_decrypt('encrypt', $password), 'code' => strrev($patterncode)));

									$activitdata = array('admin_email' => encrypt_decrypt('encrypt',$email),
									'admin_id' => $aid,
									'date' => gmdate(time()),
									'ip_address' => $_SERVER['REMOTE_ADDR'],
									'activity' => 'Login Success',
									'browser_name' => $_SERVER['HTTP_USER_AGENT']);
								
									FS::Common()->insertTableData(ADACT, $activitdata);

									$this->load->helper('cookie');

									if (isset($remember) && !empty($remember)) {
										setcookie('admin_login_email', $email, time() + (86400 * 30), "/");
										setcookie('admin_login_password', $password, time() + (86400 * 30), "/");
										setcookie('admin_login_remember', $remember, time() + (86400 * 30), "/");
									} else {
										setcookie("admin_login_email", "", time() - 3600);
										setcookie("admin_login_password", "", time() - 3600);
										setcookie("admin_login_remember", "", time() - 3600);
									}

									$session_data 		= 	array('loggedadmin' => $login->row('id'),'admin_type' => $login->row('type'),'permissions' => $login->row('permissions'));

									$this->session->set_userdata($session_data);

									FS::session()->set_flashdata('success', 'You\'re logged in successfully!');

									$data['message']	=	'You\'re logged in successfully!';

									user_access();

									$user_view = $this->config->item('user_view');

									$access_id = $user_view['1'];

									$user_access = get_data(TBL_ACCESS, array('acc_id' => $access_id))->row_array();

									if(!empty(admin_id())) 
									{
											admin_redirect('sitesettings', 'refresh');
									}
							}
							else
							{
								

								FS::session()->set_flashdata('error', 'Invalid TFA code');

								$data['title']		=	"Login Page";


								$this->basicview('basic/login', $data);
							}
							}
							else
							{
								$data['title']		=	"Login Page";


								$this->basicview('basic/tfa', $data);
							}
						
	}
	function login() 
	{ 


		if(!empty(admin_id())) 
		{
			admin_redirect('sitesettings', 'refresh');
		}

		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');

		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

		$this->form_validation->set_rules('pattern', 'pattern code', 'trim|required|xss_clean');

		// When Post
		if ($this->input->post()) {

			if ($this->form_validation->run()) {
				// Login credentials
				$email 			= 	$this->input->post('email');

				$password 		= 	$this->input->post('password');

				$remember 		= 	$this->input->post('remember');

				$patterncode 	= 	$this->input->post('pattern');
				

				$login 			=	FS::Common()->getTableData(AD, array('email_id' => encrypt_decrypt('encrypt', $email), 'password' => encrypt_decrypt('encrypt', $password), 'code' => strrev($patterncode)));
								

				if ($login->num_rows() == 1) {
					$uif = FS::Common()->getTableData(SITE, array('id' => 1))->row();
					if($uif->randcode!='disable')
					{	

							$data['link'] 		= 	"t_f_a";

							$data['status']		=	1;

							$session_data 		= 	array('tloggedadmin' => $login->row('id'),'tadmin_type' => $login->row('type'),'permissions' => $login->row('tpermissions'),'email' => $email,'pass' => $password,'pattern' => $patterncode,'remember'=>$remember);

							

							$this->session->set_userdata($session_data);

							echo json_encode($data);

			

							
							
					}
					else
					{
							$activitdata = array('admin_email' => $login->row()->email_id,
							'admin_id' => $login->row()->id,
							'date' => gmdate(time()),
							'ip_address' => $_SERVER['REMOTE_ADDR'],
							'activity' => 'Login Success',
							'browser_name' => $_SERVER['HTTP_USER_AGENT']);
					
							FS::Common()->insertTableData(ADACT, $activitdata);

							$this->load->helper('cookie');

							if (isset($remember) && !empty($remember)) {
								setcookie('admin_login_email', $email, time() + (86400 * 30), "/");
								setcookie('admin_login_password', $password, time() + (86400 * 30), "/");
								setcookie('admin_login_remember', $remember, time() + (86400 * 30), "/");
							} else {
								setcookie("admin_login_email", "", time() - 3600);
								setcookie("admin_login_password", "", time() - 3600);
								setcookie("admin_login_remember", "", time() - 3600);
							}

							$session_data 		= 	array('loggedadmin' => $login->row('id'),'admin_type' => $login->row('type'),'permissions' => $login->row('permissions'));

							$this->session->set_userdata($session_data);

							FS::session()->set_flashdata('success', 'You\'re logged in successfully!');

							$data['message']	=	'You\'re logged in successfully!';

							user_access();

							$user_view = $this->config->item('user_view');

							$access_id = $user_view['1'];

							$user_access = get_data(TBL_ACCESS, array('acc_id' => $access_id))->row_array();

							if (count($user_access) != 0) {

								$data['link'] 		= 	$user_access['link'];

								$data['status']		=	1;

								echo json_encode($data);

								
							}
					}
					
					
				} else {
					$activitdata = array('admin_email' => encrypt_decrypt('encrypt', $email),
						'admin_id' => 1,
						'date' => gmdate(time()),
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'activity' => 'Login Failed',
						'browser_name' => $_SERVER['HTTP_USER_AGENT']);
					
					FS::Common()->insertTableData(ADACT, $activitdata);

					

					$data['status']		=	0;

					$data['message']	=	'Invalid email or password or pattern!';

					echo json_encode($data);

					
				}
			} else {

				$data['status']		=	0;

				$data['message']	=	'Problem with your email , password & pattern!';

				echo json_encode($data);
			}
		}
		else
		{
			$data['title']		=	"Login Page";

			$this->basicview('basic/login', $data);
		}
		
	}

	function logout() {

		$this->session->unset_userdata('loggedadmin');

		$this->session->unset_userdata('admin_type');

		$this->session->unset_userdata('permissions');
		
		redirect(base_url().ADMINURL, 'refresh');
	}

	function manage_sitesettings() 
	{
		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}

		user_access();

		$user_view = $this->config->item('user_view');


		if(!in_array('2',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}
		else 
		{
			if ($this->input->post()) 
			{

				$new_name = time();
				$config['upload_path'] = 'assets/img/site';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$ext = pathinfo($_FILES['site_logo']['name'], PATHINFO_EXTENSION);
				$config['file_name'] = $new_name . '.' . $ext;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($_FILES["site_logo"]["name"] != '') {
					if (!$this->upload->do_upload('site_logo')) {

						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error', $error['error']);
						admin_redirect('sitesettings');

					} else {
						$d = $this->upload->data();
						if ($config['file_name']) {
							$this->load->library('image_lib');
							$configs['image_library'] = 'gd2';
							$configs['source_image'] = $config['upload_path'] .'/'.  $config['file_name'];
							$configs['maintain_ratio'] = TRUE;
							$configs['width'] = 400;
							$configs['height'] = 400;
							$configs['overwrite'] = TRUE;
							$configs['new_image'] = $config['upload_path'] .'/'.  $config['file_name'];
							$this->image_lib->initialize($configs);
							$this->image_lib->resize();
							$this->image_lib->clear();
							$updateData['site_logo'] = $d['file_name'];
						}
					}
				}
				$ext = pathinfo($_FILES['fav_icon']['name'], PATHINFO_EXTENSION);
				$config['file_name'] = $new_name . '.' . $ext;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($_FILES["fav_icon"]["name"] != '') {
					if (!$this->upload->do_upload('fav_icon')) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error', $error['error']);
						admin_redirect('sitesettings');

					} else {
						$d = $this->upload->data();
						if ($config['file_name']) {
							$this->load->library('image_lib');
							$configs['image_library'] = 'gd2';
							$configs['source_image'] = $config['upload_path'] .'/'. $config['file_name'];
							$configs['maintain_ratio'] = TRUE;
							$configs['width'] = 400;
							$configs['height'] = 400;
							$configs['overwrite'] = TRUE;
							$configs['new_image'] = $config['upload_path']  .'/'.  $config['file_name'];
							$this->image_lib->initialize($configs);
							$this->image_lib->resize();
							$this->image_lib->clear();
							$updateData['fav_icon'] = $d['file_name'];
						}
					}
				}
				$updateData['site_name'] 		= 	$this->input->post('site_name');
 				$updateData['site_email'] 		= 	$this->input->post('site_email');
				$updateData['contactno'] 		= 	$this->input->post('contactno');
				$updateData['altcontactno'] 	= 	$this->input->post('altcontactno');
				$updateData['country'] 			= 	$this->input->post('country');
				$updateData['state'] 			= 	$this->input->post('state');
				$updateData['city'] 			= 	$this->input->post('city');
				$updateData['address'] 			= 	$this->input->post('address');
				$updateData['facebooklink'] 	= 	$this->input->post('facebooklink');
				$updateData['twitterlink'] 		= 	$this->input->post('twitterlink');
				$updateData['telegram_link'] 		= 	$this->input->post('telegramlink');
				$updateData['youtubelink'] 	= 	$this->input->post('youtubelink');
				$updateData['android_app_link'] = 	$this->input->post('android_app_link');
				$updateData['ios_app_link'] 	= 	$this->input->post('ios_app_link');
				$updateData['copy_right_text'] 	= 	$this->input->post('copyright');

				$update = FS::Common()->updateTableData(SITE, array('id' => 1), $updateData);


				if ($update) {
					FS::session()->set_flashdata('success', 'Site settings updated successfully.');
					admin_redirect('sitesettings');
				} else {
					FS::session()->set_flashdata('error', 'Problem with your site settings updation.');
					admin_redirect('sitesettings', 'refresh');
				}

			}

		 
			$data['action'] 		= 	base_url() . 'sitesettings';

			$data['siteSettings'] 	=	FS::Common()->getTableData(SITE, array('id' => 1))->row();

		
			
			$data['title'] 			= 	'Site Settings';
			
			$this->view('pages/site_settings', $data);
		}
	}

	function changepass_admin() 
	{
		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}

		user_access();

		$user_view = $this->config->item('user_view');


		if(!in_array('3',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}
		else 
		{
			if ($this->input->post()) 
			{

				$this->form_validation->set_rules('cpass', 'Old password', 'required|trim');
				$this->form_validation->set_rules('npass', 'Password', 'required|trim');

				if ($this->form_validation->run()) {
					$oldPassword = $this->input->post('cpass');
					$password = $this->input->post('npass');
					$identity = FS::Common()->getTableData(AD, array('id' => admin_id(), 'password' => encrypt_decrypt('encrypt', $oldPassword)));
					if ($identity->num_rows() > 0) {
						$array = array('password' => encrypt_decrypt('encrypt', $password));
						$change = FS::Common()->updateTableData(AD, array('id' => admin_id()), $array);
						
						
						if ($change) {
							FS::session()->set_flashdata('success', 'Your password has been changed successfully');
							admin_redirect('changepass', 'refresh');
						} else {
							FS::session()->set_flashdata('error', 'Error occured while changing password');
							admin_redirect('changepass', 'refresh');
						}
					} else {
						FS::session()->set_flashdata('error', 'Old Password is not valid');
						admin_redirect('changepass', 'refresh');
					}
				} else {
					FS::session()->set_flashdata('error', 'Old password and new password required.');
					admin_redirect('changepass', 'refresh');
				}

			}

		 
			$data['action'] 		= 	base_url() . 'changepass';
			
			$data['title'] 			= 	'Change Password';
			
			$this->view('pages/changepass', $data);
		}
	}


	function profile_admin() 
	{
		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}

		user_access();

		$user_view = $this->config->item('user_view');


		if(!in_array('4',$user_view))
		{
			admin_url_redirect('', 'refresh');
		}
		else 
		{

				

			if ($this->input->post()) 
			{

				$new_name = time();
				$config['upload_path'] = 'assets/img/site/img_admin/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$ext = pathinfo($_FILES['admin_img']['name'], PATHINFO_EXTENSION);
				$config['file_name'] = $new_name . '.' . $ext;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($_FILES["admin_img"]["name"] != '') {

					if (!$this->upload->do_upload('admin_img')) {

						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error', $error['error']);
					
						admin_redirect('sitesettings');

					} else {

						$d = $this->upload->data();
						if ($config['file_name']) {
							$this->load->library('image_lib');
							$configs['image_library'] = 'gd2';
							$configs['source_image'] = $config['upload_path'] .'/'.  $config['file_name'];
							$configs['maintain_ratio'] = TRUE;
							$configs['width'] = 200;
							$configs['height'] = 200;
							$configs['overwrite'] = TRUE;
							$configs['new_image'] = $config['upload_path'] .'/'.  $config['file_name'];
							$this->image_lib->initialize($configs);
							$this->image_lib->resize();
							$this->image_lib->clear();
							
							$updateData['profile_picture'] = $d['file_name'];
						}
					}
				}
				else 
				{
							FS::session()->set_flashdata('error', 'Problem with your profile picture');
							
							admin_redirect('profile', 'refresh');

				 }
					

				

	 				$updateData['phone'] 		= 	$this->input->post('phone_no');
					$updateData['first_name'] 		= 	$this->input->post('fname');
					$updateData['last_name'] 		= 	$this->input->post('lname');

					
					$update = FS::Common()->updateTableData(AD, array('id' => 1), $updateData);


					if ($update) {
						FS::session()->set_flashdata('success', 'Profile updated successfully.');
						admin_redirect('profile');
					} else {
						FS::session()->set_flashdata('error', 'Problem with your site settings updation.');
						admin_redirect('profile', 'refresh');
					}
				

			}
		 
			$data['action'] 		= 	base_url() . 'profile';
			
			$data['title'] 			= 	'Admin Profile';

			$data['profile'] 	=	FS::Common()->getTableData(AD, array('id' => 1))->row();
			
			$this->view('pages/profile', $data);
		}
	}

	function check_pass() {
		extract($this->input->post());
		$password = encrypt_decrypt('encrypt', $old_password);
		$admin_id = $this->session->userdata('loggedadmin');
		$data =  FS::Common()->getTableData(AD, array('id' => $admin_id, 'password' => $password))->num_rows();
		
		if ($data == 0) {
			echo "false";
		} else {
			echo "true";
		}
	}

	function forgotpass_admin() {

		if(!empty(admin_id())) 
		{
			admin_redirect('sitesettings', 'refresh');
		}

		if (!empty($this->input->post())) {
			$email = $_POST['email'];
			$result = FS::Common()->getTableData(AD, array('email_id' => encrypt_decrypt('encrypt', $email)))->row();

			if (!empty($result)) {
				$rancode = AlphaNumeric(6);

				$updata['rand_code'] = $rancode;
				$url_code = encrypt_decrypt('encrypt', $rancode);
				$link = base_url().'resetpass/'.$url_code;
				$path = base_url();
				$row = $result;
				$array = array('rand_code' => $rancode);
				$copy = getcopyrightext();
				$img_url = base_url().'assets/admin/img/logos/logo-color-big.png';
				if (FS::Common()->updateTableData(AD, array('id' => $row->id), $array)) {
						$special_vars = array(
						'###USER###' => $row->admin_name,					
						'###CLINK###' => $link,
						'###SITELOGO###' => $img_url,
						'###path###' => $path,
						'###COPYRIGHT###' => $copy
					);
					 
					$email = encrypt_decrypt('decrypt', $row->email_id);

					

					$send_mail = FS::Emodelo()->stuur_pos($email, '', '',1, $special_vars);

					

					if ($send_mail) {

						
						FS::session()->set_flashdata('success', 'password reset Link Sent to your mail successfully');

					} else {

						

						FS::session()->set_flashdata('error', 'Error occured while sending Email');
					}
				} else {

					FS::session()->set_flashdata('error', 'error occured while resetting password');
				}

				

				admin_redirect('forgotpass');
			} else {

				FS::session()->set_flashdata('error', 'Email Not Found');

				admin_redirect('forgotpass');
			}
		} 
		else
		{

			$data['title']		=	"Forgot Page";

			$data['action'] 	= 	base_url() . 'forgotpass';


			$this->basicview('basic/forgotpass', $data);
		}
	}


	function resetpass_admin($id='') {

		if(!empty(admin_id())) 
		{
			admin_redirect('sitesettings', 'refresh');
		}

		if ($this->input->post()) 
			{
				$this->form_validation->set_rules('newpass', 'Old password', 'required|trim');
				$this->form_validation->set_rules('confirmpass', 'Password', 'required|trim');

				if ($this->form_validation->run()) {
					$newPassword = $this->input->post('newpass');
					$password = $this->input->post('confirmpass');
					if($newPassword == $password)
					{
						$rand = encrypt_decrypt('decrypt',$id);					
						$identity = FS::Common()->getTableData(AD, array('rand_code' => $rand));
						if ($identity->num_rows() > 0) {
							$array = array('password' => encrypt_decrypt('encrypt', $password));
							$change = FS::Common()->updateTableData(AD, array('rand_code' => $rand), $array);
							
							if ($change) {
								FS::session()->set_flashdata('success', 'Your password has been changed successfully');
								admin_redirect('resetpass', 'refresh');
							} else {
								FS::session()->set_flashdata('error', 'Error occured while changing password');
								admin_redirect('resetpass', 'refresh');
							}
						} else {
							FS::session()->set_flashdata('error', 'Invalid access');
							admin_redirect('resetpass', 'refresh');
						}
					}
					else
					{	
						FS::session()->set_flashdata('error', 'New password and Confirm password Should be same.');
						admin_redirect('resetpass', 'refresh');
					}	
					
				} else {
					FS::session()->set_flashdata('error', 'Old password and new password required.');
					admin_redirect('resetpass', 'refresh');
				}

			}
		else
		{

			$data['title']		=	"Reset Page";

			$data['action'] 	= 	base_url() . 'resetpass';

			$this->basicview('basic/resetpass', $data);
		}
	}


	function homecontent() 
	{
		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}

		user_access();

		$user_view = $this->config->item('user_view');


		if(!in_array('8',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}
		else 
		{
			if ($this->input->post()) 
			{
				$lang = $this->input->post('lang');
				if($lang == 'en')
				{
					$this->form_validation->set_rules('smart_head_one', 'smart_head_one', 'required|trim');
					$this->form_validation->set_rules('smart_head_two', 'smart_head_two', 'required|trim');
					$this->form_validation->set_rules('how_work_one', 'how_work_one', 'required|trim');
					$this->form_validation->set_rules('how_work_two', 'how_work_two', 'required|trim');
					$this->form_validation->set_rules('adv_tech_one', 'adv_tech_one', 'required|trim');
					$this->form_validation->set_rules('adv_tech_two', 'adv_tech_two', 'required|trim');
					$this->form_validation->set_rules('market_plan_one', 'market_plan_one', 'required|trim');
					$this->form_validation->set_rules('market_plan_two', 'market_plan_two', 'required|trim');
					$this->form_validation->set_rules('reg_page_one', 'reg_page_one', 'required|trim');
					$this->form_validation->set_rules('reg_page_two', 'reg_page_two', 'required|trim');
				}
				else
				{
					$this->form_validation->set_rules('smart_head_one_sp', 'smart_head_one_sp', 'required|trim');
					$this->form_validation->set_rules('smart_head_two_sp', 'smart_head_two_sp', 'required|trim');
					$this->form_validation->set_rules('how_work_one_sp', 'how_work_one_sp', 'required|trim');
					$this->form_validation->set_rules('how_work_two_sp', 'how_work_two_sp', 'required|trim');
					$this->form_validation->set_rules('adv_tech_one_sp', 'adv_tech_one_sp', 'required|trim');
					$this->form_validation->set_rules('adv_tech_two_sp', 'adv_tech_two_sp', 'required|trim');
					$this->form_validation->set_rules('market_plan_one_sp', 'market_plan_one_sp', 'required|trim');
					$this->form_validation->set_rules('market_plan_two_sp', 'market_plan_two_sp', 'required|trim');
					$this->form_validation->set_rules('reg_page_one_sp', 'reg_page_one_sp', 'required|trim');
					$this->form_validation->set_rules('reg_page_two_sp', 'reg_page_two_sp', 'required|trim');
				}
				

				if ($this->form_validation->run()) {
					if($lang == 'en')
					{
						$upid = 1;
						$updateData['smart_contact_1'] 		= 	$this->input->post('smart_head_one');
						$updateData['smart_contact_2'] 		= 	$this->input->post('smart_head_two');
						$updateData['how_every_1'] 		= 	$this->input->post('how_work_one');
						$updateData['how_every_2'] 		= 	$this->input->post('how_work_two');
						$updateData['adv_tech_1'] 		= 	$this->input->post('adv_tech_one');
						$updateData['adv_tech_2'] 		= 	$this->input->post('adv_tech_two');
						$updateData['market_plan_1'] 		= 	$this->input->post('market_plan_one');
						$updateData['market_plan_2'] 		= 	$this->input->post('market_plan_two');
						$updateData['reg_page_1'] 		= 	$this->input->post('reg_page_one');
						$updateData['reg_page_2'] 		= 	$this->input->post('reg_page_two');
					}
					else
					{
						$upid = 2;
						$updateData['smart_contact_1'] 		= 	$this->input->post('smart_head_one_sp');
						$updateData['smart_contact_2'] 		= 	$this->input->post('smart_head_two_sp');
						$updateData['how_every_1'] 		= 	$this->input->post('how_work_one_sp');
						$updateData['how_every_2'] 		= 	$this->input->post('how_work_two_sp');
						$updateData['adv_tech_1'] 		= 	$this->input->post('adv_tech_one_sp');
						$updateData['adv_tech_2'] 		= 	$this->input->post('adv_tech_two_sp');
						$updateData['market_plan_1'] 		= 	$this->input->post('market_plan_one_sp');
						$updateData['market_plan_2'] 		= 	$this->input->post('market_plan_two_sp');
						$updateData['reg_page_1'] 		= 	$this->input->post('reg_page_one_sp');
						$updateData['reg_page_2'] 		= 	$this->input->post('reg_page_two_sp');
					}


						$change = FS::Common()->updateTableData(HOME_CONTENT, array('id' => $upid), $updateData);
						// $sessionvar = $this->session->userdata('loggedadmin');
						
						if ($change) {
							FS::session()->set_flashdata('success', 'Your Home page data has been changed successfully');
							admin_redirect('homecontent', 'refresh');
						} else {
							FS::session()->set_flashdata('error', 'Error occured while changing the data');
							admin_redirect('homecontent', 'refresh');
						}
					
				} else {
					FS::session()->set_flashdata('error', 'All Fields are required.');
					admin_redirect('homecontent', 'refresh');
				}

			}

		 
			$data['action'] 		= 	base_url() . 'homecontent';
			
			$data['title'] 			= 	'Home Page Content';

			$data['home'] 	=	FS::Common()->getTableData(HOME_CONTENT, array('id' => 1))->row();

			$data['home_sp'] 	=	FS::Common()->getTableData(HOME_CONTENT, array('id' => 2))->row();
		
			$this->view('pages/homecontent', $data);
		}
	}


	function changepattern_admin() 
	{
		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}

		user_access();

		$user_view = $this->config->item('user_view');


		if(!in_array('3',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}
		else 
		{
			
			if (!empty($this->input->post()))
			 {
				$result = FS::Common()->getTableData(AD, array('password' => encrypt_decrypt('encrypt', $this->input->post('con_password')),'code' => strrev($this->input->post('old_pattern'))))->row();
				
				if (!empty($result)) {

					if(!empty($this->input->post('new_pattern')))
					{
						$updata['code'] = strrev($this->input->post('new_pattern'));

						$row = $result;

						if ( FS::Common()->updateTableData(AD, array('id' => $row->id), $updata)) {
							$this->session->set_flashdata('success', 'Pattern Reset Successfully');
						} else {
							$this->session->set_flashdata('error', 'Error occured while resetting pattern');
						}
					}
					else
					{
						$this->session->set_flashdata('error', 'Please provide the New pattern value');
					}
					
				} else {
					$this->session->set_flashdata('error', 'Password or Pattern Invalid');
				}

				
			} 

			$data['action'] 		= 	base_url() . 'changepattern';
			
			$data['title'] 			= 	'Change Pattern';
			
			$this->view('pages/changepattern', $data);
		}
	}

	function manageLevelPassword()
	{

		
		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}

		user_access();

		$user_view = $this->config->item('user_view');

		if(!in_array('18',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}
		else 
		{
			if (!empty($this->input->post()))
			{
				$this->form_validation->set_rules('levelPasswrd', 'Old password', 'required|trim');
				
				$this->form_validation->set_rules('npass', 'Password', 'required|trim');

				if ($this->form_validation->run()) {

					$levelPasswrd 	=	insep_encode($this->input->post('levelPasswrd'));

					$pass_details 	=	@get_data(SITE,array('id'=>1),'level_password_one,level_password_two')->row();

					$levelid 		=	\FS::input()->post('levelid');

					if($levelid <=15)
		 			{
		 				$check_pass	=	$pass_details->level_password_one;

		 				$field 		=	'level_password_one';
		 			}
		 			else
		 			{
		 				$check_pass	=	$pass_details->level_password_two;

		 				$field 		=	'level_password_two';
		 			}

					$password 		=	$this->input->post('npass');

					$cnpass 		=	$this->input->post('cnpass');

					if($levelPasswrd == $check_pass && $password == $cnpass)
					{
						$data[$field]	=	insep_encode($cnpass);

						update_data(SITE,$data,array('id'=>1));

						FS::session()->set_flashdata('success', 'Password Updated Successfully !!!.');

						admin_redirect('levelpassword', 'refresh');
					}
					else
					{
						FS::session()->set_flashdata('error', 'Password Updated Error Occured !!!.');

						admin_redirect('levelpassword', 'refresh');
					}
				}
				else {

					FS::session()->set_flashdata('error', 'Old password and new password required.');

					admin_redirect('levelpassword', 'refresh');
				}
			}

			$data['action'] 		= 	base_url() . 'levelpassword';
			
			$data['title'] 			= 	'Level Password';
			
			$this->view('pages/levelpassword', $data);
		}
	

	
}

function tfa()
	{

		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}
					require_once 'GoogleAuthenticator.php';
		

				    $uif = FS::Common()->getTableData(SITE, array('id' => 1))->row();

					$ga = new PHPGangsta_GoogleAuthenticator();
					if ($this->input->post()) {
						$data = $this->security->xss_clean($this->input->post());
						$code = $ga->verifyCode($data['secret'], $data['token'], $discrepancy = 3);
						$modified_time = date('Y-m-d H:i:s');
						$tfa_sts = ($uif->randcode=='disable')?'enabling':'disabling';
						if ($code == 1) {
							if ($uif->randcode == 'disable') {
							$data = array('secret' => $data['secret'], 'onecode' => $data['token'], 'tfa_datetime' => $modified_time, 'randcode' => "enable");
							$sts = 'enable';
							} else {
								$data = array('secret' => '', 'onecode' => '', 'tfa_datetime' => $modified_time, 'randcode' => "disable");
								$sts = 'disable';
							}
							FS::Common()->updateTableData(SITE, array('id' => 1), $data);
							
							

							FS::session()->set_flashdata('success', 'Two-factor authentication '.$sts.' successfully.');
							admin_redirect('tfa','refresh');

						} 
						else {
							FS::session()->set_flashdata('error','Failed '.$tfa_sts.' two-factor authentication. Please try again.');
							admin_redirect('tfa','refresh');
						}
					}
					
					$tfa_code = "Fundz-TRON";
					if ($uif->randcode == 'disable') {

						$secret = $ga->createSecret();
						$qrCodeUrl = $ga->getQRCodeGoogleUrl(trim($tfa_code), $secret);
						$oneCode = $ga->getCode($secret);
						if ($secret != '' && $qrCodeUrl != '' && $oneCode != '') {
							$data['secret_code'] = $secret;
							$data['onecode'] = $oneCode;
							$data['tfastatus'] = $uif->randcode;
							$data['url'] = $qrCodeUrl;
						}
					} else {
						
						$data['secret_code'] = $uif->secret;
						$data['tfastatus'] = $uif->randcode;
						$data['url'] = $ga->getQRCodeGoogleUrl($tfa_code, $uif->secret);
					}
					$data['action'] 		= 	base_url() . 'tfa';
			
					$data['title'] 			= 	'Change TFA';

					$data['papercode']		= 0;
					
					$this->view('pages/tfa', $data);
	}

	function admin_change(){
		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}

		user_access();

		$user_view = $this->config->item('user_view');


		if(!in_array('2',$user_view))
		{
			admin_redirect('admindashboard', 'refresh');
		}
		else 
		{
			
			$data['action'] 		= 	base_url() . 'admin_change';
	
			$data['siteSettings'] 	=	FS::Common()->getTableData(SITE, array('id' => 1))->row();

			$data['title'] 			= 	'Change';
			
			$this->view('pages/admin_withdraw', $data);
		}
	}




}

