<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends Admin_Controller {




	public function index() {


		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}

		user_access();

		$user_view = $this->config->item('user_view');


		if(!in_array('10',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}
			if ($this->input->post())
			{
					$to=$this->input->post('to');
					$subject=$this->input->post('subject');
					$message=$this->input->post('message');
					
					$times=sizeof($to);
					
					$copy = getcopyrightext();
					$img_url = base_url().'assets/img/1587200975.png';
					for($i=0;$i<$times;$i++) {
						$special_vars = array(
						'###CONTENT###' => $message,	
						'###SUBJECT###' => $subject,				
						'###EMAIL###' => $to[$i],
						'###SITELOGO###' => $img_url,
						'###COPYRIGHT###' => $copy
						);
						$send_mail = FS::Emodelo()->stuur_pos($to[$i], '', '',2, $special_vars);
						 // mail_send($to[$i],$subject,$message);
						 
					}
					 $data['title'] 			= 	'User Manage';
			 		$data['result'] = FS::Common()->getTableData(USERS, '', '', '', '', '', '', '', array('id' => 'desc'))->result();
					FS::session()->set_flashdata('success', 'Newsletter sent successfully!');
					$this->view('pages/Managenewsletter/newsletter', $data);
			}
			else
			{	

			
				

			 $data['title'] 			= 	'User Manage';
			 $data['result'] = FS::Common()->getTableData(USERS, '', '', '', '', '', '', '', array('id' => 'desc'))->result();

			$this->view('pages/Managenewsletter/newsletter', $data);
			}
		
	}

	function sentnewsletter()
	{
		$this->loginCheckadmin();
		$admin_id = $this->session->userdata('admin_id');
		
		$site_details = $this->admin_model->getTableData("site_settings",array("site_id"=>1))->row();
		   		$data['site_details'] = $site_details;
		   		$admin_details = $this->admin_model->getTableData("admin_details",array("admin_id"=>$admin_id,"status"=>"1"))->row();
		   		$data['admin_details'] = $admin_details;
				$data['title']="Newsletter";	
				$data['keywords']="Newsletter";
				$data['description'] = "Newsletter";
				if($this->input->post('submit'))
				{
					
					$to=$this->input->post('to');
					$subject=$this->input->post('subject');
					$message=$this->input->post('message');
					
					$times=sizeof($to);
					
					
					for($i=0;$i<$times;$i++) {
						

						 mail_send($to[$i],$subject,$message);
						 
					}
					




					
					$this->session->set_flashdata('success','Successfully mail sent');
					redirect('siteadmin/newsletter');

				}
				$data['users']=$this->admin_model->getTableData('user_details',array('status'=>1,'user_type'=>3),'email_id','asc')->result();
				$this->view('admin/newsletter',$data);
	}

	

	

	
}
