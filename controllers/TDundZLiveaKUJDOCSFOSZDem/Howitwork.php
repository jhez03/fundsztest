<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Howitwork extends Admin_Controller {

	

	public function index()
	{
		echo "Gfgf";
	}


	function howitworks() 
	{

		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}

		user_access();

		$user_view = $this->config->item('user_view');


		if(!in_array('9',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}

			$data['title'] 			= 	'CMS Manage';

			$data['work'] 	=	FS::Common()->getTableData(HOW_WORK, '', '', '', '', '', '','', array('id', 'DESC'))->result();				
			
			$this->view('pages/Howitworks/workmanage', $data);
		
	}


	// Edit page
	function edithowitwork($id='') {


		user_access();

		$user_view = $this->config->item('user_view');

		if(!in_array('9',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}

		// Is logged in
		$sessionvar = $this->session->userdata('loggedadmin');

		if (!$sessionvar) {
			admin_url_redirect('', 'refresh');
		}
		// Is valid
		$work_id = insep_decode($id);
		if ($id == '') {
			FS::session()->set_flashdata('error', 'Invalid request');
			admin_redirect('howitwork', 'refresh');

		}
		$isValid = FS::Common()->getTableData(HOW_WORK, array('id' => $work_id));
		if ($isValid->num_rows() == 0) {
			FS::session()->set_flashdata('error', 'Unable to find this page');
			admin_redirect('howitwork', 'refresh');

		}
		// Form validation
		$this->form_validation->set_rules('heading', 'heading', 'required|xss_clean');
		$this->form_validation->set_rules('content', 'content', 'required');
		$this->form_validation->set_rules('language', 'language', 'required|xss_clean');
		
		if ($this->input->post()) {
			if ($this->form_validation->run()) {

				$updateData = array();
				$heading = $this->input->post('heading');
				$content = $this->input->post('content');
				$language = $this->input->post('language');
				$updateData['heading'] = $heading;
				$updateData['content'] = $content;
				$updateData['language'] = $language;
				$condition = array('id' => $work_id);
				
				
				$update = FS::Common()->updateTableData(HOW_WORK, $condition, $updateData);
				if ($update) {
					FS::session()->set_flashdata('success', 'How everything Work has been updated successfully!');
					admin_redirect('howitwork', 'refresh');
				} else {
					FS::session()->set_flashdata('error', 'Unable to update this How everything Work');
					admin_redirect('howitworkedit/' . $id, 'refresh');
				}

			} else {
				FS::session()->set_flashdata('error', 'Unable to update this How everything Work');
				admin_redirect('howitworkedit/' . $id, 'refresh');
			}

		}
			$data['action'] 		= 	base_url() . 'howitworkedit';
			
			$data['title'] 			= 	'Edit Work';

			$data['howwork'] 	=	FS::Common()->getTableData(HOW_WORK, array('id' => $work_id))->row();

			$data['lang'] 	=	FS::Common()->getTableData(LANG)->result();

			$this->view('pages/Howitworks/editwork', $data);
	}
}
