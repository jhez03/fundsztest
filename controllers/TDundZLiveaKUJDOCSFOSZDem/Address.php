<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends Admin_Controller {

	

	public function index()
	{
		echo "Gfgf";
	}



	function addressmanage() 
	{

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

			$data['title'] 			= 	'Address Manage';

			$data['address'] 	=	FS::Common()->getTableData(ADDRESS)->result();
						
			$this->view('pages/Address/addressmanage', $data);
		
	}


	// Edit page
	function editaddress($id='') {

		user_access();

		$user_view = $this->config->item('user_view');

		if(!in_array('10',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}

		// Is logged in
		$sessionvar = $this->session->userdata('loggedadmin');

		if (!$sessionvar) {
			admin_url_redirect('', 'refresh');
		}
		// Is valid
		$add_id = insep_decode($id);
		if ($id == '') {
			FS::session()->set_flashdata('error', 'Invalid request');
			admin_redirect('address', 'refresh');

		}
		$isValid = FS::Common()->getTableData(ADDRESS, array('id' => $add_id));
		if ($isValid->num_rows() == 0) {
			FS::session()->set_flashdata('error', 'Unable to find this page');
			admin_redirect('address', 'refresh');

		}
		// Form validation
		$this->form_validation->set_rules('heading', 'heading', 'required|xss_clean');
		$this->form_validation->set_rules('address_name', 'address_name', 'required');
	

		if ($this->input->post()) {
			if ($this->form_validation->run()) {
				$updateData = array();
				$heading = $this->input->post('heading');
				$address_name = $this->input->post('address_name');
			

				$updateData['heading'] = $heading;
				$updateData['address_name'] = encrypt_decrypt('encrypt', $address_name);
		
				$condition = array('id' => $add_id);
				
				$update = FS::Common()->updateTableData(ADDRESS, $condition, $updateData);
				if ($update) {
					FS::session()->set_flashdata('success', 'Address has been updated successfully!');
					admin_redirect('address', 'refresh');
				} else {
					FS::session()->set_flashdata('error', 'Unable to update this Address');
					admin_redirect('editaddress/' . $id, 'refresh');
				}

			} else {
				FS::session()->set_flashdata('error', 'Unable to update this Address');
				admin_redirect('editaddress/' . $id, 'refresh');
			}

		}
			$data['action'] 		= 	base_url() . 'editaddress';
			
			$data['title'] 			= 	'Edit Address';

			$data['address'] 	=	FS::Common()->getTableData(ADDRESS, array('id' => $add_id))->row();

			$data['lang'] 	=	FS::Common()->getTableData(LANG)->result();		

			$this->view('pages/Address/editaddress', $data);
	}
}
