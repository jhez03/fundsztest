<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CMS extends Admin_Controller {

	

	public function index()
	{
		echo "Gfgf";
	}


	function cmsmanage() 
	{

		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}

		user_access();

		$user_view = $this->config->item('user_view');


		if(!in_array('6',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}

			$data['title'] 			= 	'CMS Manage';

			$data['cms'] 	=	FS::Common()->getTableData(CMS, '', '', '', '', '', '','', array('id', 'DESC'))->result();
				
			
			$this->view('pages/CMS/cmsmanage', $data);
		
	}


	// Edit page
	function editcms($id='') {

		user_access();

		$user_view = $this->config->item('user_view');

		if(!in_array('6',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}

		// Is logged in
		$sessionvar = $this->session->userdata('loggedadmin');

		if (!$sessionvar) {
			admin_url_redirect('', 'refresh');
		}
		// Is valid
		$cms_id = insep_decode($id);
		if ($id == '') {
			FS::session()->set_flashdata('error', 'Invalid request');
			admin_redirect('emailtemplate', 'refresh');

		}
		$isValid = FS::Common()->getTableData(CMS, array('id' => $cms_id));
		if ($isValid->num_rows() == 0) {
			FS::session()->set_flashdata('error', 'Unable to find this page');
			admin_redirect('emailtemplate', 'refresh');

		}
		// Form validation
		$this->form_validation->set_rules('heading', 'heading', 'required|xss_clean');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('meta_keyword', 'meta_keyword', 'required|xss_clean');
		$this->form_validation->set_rules('meta_description', 'meta_description', 'required|xss_clean');
		$this->form_validation->set_rules('link', 'link', 'required|xss_clean');
		$this->form_validation->set_rules('content_description', 'content_description', 'required|xss_clean');
		$this->form_validation->set_rules('language', 'language', 'required|xss_clean');
		
		if ($this->input->post()) {

			if ($this->form_validation->run()) {

				$updateData = array();
				$heading = $this->input->post('heading');
				$title = $this->input->post('title');
				$meta_keyword = $this->input->post('meta_keyword');
				$meta_description = $this->input->post('meta_description');
				$link = $this->input->post('link');
				$content_description = $this->input->post('content_description');
				$language = $this->input->post('language');
				$updateData['heading'] = $heading;
				$updateData['title'] = $title;
				$updateData['meta_keywords'] = $meta_keyword;
				$updateData['meta_description'] = $meta_description;
				$updateData['link'] = $link;
				$updateData['content_description'] = $content_description;
				$updateData['language'] = $language;
				$condition = array('id' => $cms_id);
				
				
				$update = FS::Common()->updateTableData(CMS, $condition, $updateData);
				if ($update) {
					FS::session()->set_flashdata('success', 'CMS has been updated successfully!');
					admin_redirect('cms', 'refresh');
				} else {
					FS::session()->set_flashdata('error', 'Unable to update this CMS');
					admin_redirect('cmsedit/' . $id, 'refresh');
				}

			} else {
				FS::session()->set_flashdata('error', 'Unable to update this CMS');
				admin_redirect('cmsedit/' . $id, 'refresh');
			}

		}
			$data['action'] 		= 	base_url() . 'editcms';
			
			$data['title'] 			= 	'Edit CMS';

			$data['cms'] 	=	FS::Common()->getTableData(CMS, array('id' => $cms_id))->row();

			$data['lang'] 	=	FS::Common()->getTableData(LANG)->result();

			$this->view('pages/CMS/editcms', $data);
	}
}
