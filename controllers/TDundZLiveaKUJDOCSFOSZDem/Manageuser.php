<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manageuser extends Admin_Controller {




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

		$data['title'] 			= 	'User Manage';
			

			$this->view('pages/Manageuser/user_list', $data);
		
	}
	function changestatus($user_id = '') {
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
		
			$userid = encrypt_decrypt('decrypt', $user_id);
			$users = FS::Common()->getTableData('users', array('user_id' => $userid),'consumer_name,status')->row();
			
			$status = $users->status;

			if ($status == 'active') {
				$newstatus = 'admin_deactive';
				$title = 'deactivated';
			} else {
				$newstatus = 'active';
				$title = 'activated';
			}
			$res = FS::Common()->updateTableData('users', array('user_id' => $userid), array('status' => $newstatus));
			if ($res) {

				$template = array(
					'##ACTION##' => $title,
					'##USERNAME##' => $users->consumer_name,	
				);

				$emailaddress = usermail($userid);
				$this->Email_model->sendMail($emailaddress, '', '', 64, $template);

				$msg = $title.' the user '.usermail($userid);
				insadminActivity($msg);
				
				$this->session->set_flashdata('success', 'User status ' . $title . ' successfully');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong!');
			}
			

			admin_redirect('user', 'refresh');

			

		
	}
	function get_users() {

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
		
			 $query = $this->db->get("trfdznreaseuer");
		  	 $data = [];
		      foreach($query->result() as $r) {
		           $data[] = array(
		                $r->id,
		                $r->address,
		                $r->contract_id,
		                $r->affiliate_id,
		                $r->current_level
		           );
		      }

		      $result = array(
		               "draw" => $this->input->get('draw'),
		                 "recordsTotal" => $query->num_rows(),
		                 "recordsFiltered" => $query->num_rows(),
		                 "data" => $data
		            );
		      echo json_encode($result);
		      exit();
		

	}
	


	function viewuser($user_id = '') {
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

		
			$user_id = encrypt_decrypt('decrypt', $user_id);
			$data['result'] = FS::Common()->getTableData('users', array('user_id' => $user_id))->row();

		

			$data['title'] 			= 	'User Manage';

			$this->view('pages/Manageuser/viewusers', $data);
		
	}

	

	

	
}
