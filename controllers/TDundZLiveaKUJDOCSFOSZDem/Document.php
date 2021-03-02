<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends Admin_Controller {

	

	public function index()
	{
		echo "Gfgf";
	}


	function docmanage() 
	{

		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}

		user_access();

		$user_view = $this->config->item('user_view');


		if(!in_array('15',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}

			$data['title'] 			= 	'Document Manage';

			$data['doc'] 	=	FS::Common()->getTableData(DOC)->result();
						
			$this->view('pages/Document/docmanage', $data);
		
	}


	// Edit page
	function docemail($id='') {

		user_access();

		$user_view = $this->config->item('user_view');

		if(!in_array('15',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}

		// Is logged in
		$sessionvar = $this->session->userdata('loggedadmin');

		if (!$sessionvar) {
			admin_url_redirect('', 'refresh');
		}
		// Is valid
		$doc_id = insep_decode($id);
		if ($id == '') {
			FS::session()->set_flashdata('error', 'Invalid request');
			admin_redirect('document', 'refresh');

		}
		$isValid = FS::Common()->getTableData(DOC, array('id' => $doc_id));
		if ($isValid->num_rows() == 0) {
			FS::session()->set_flashdata('error', 'Unable to find this page');
			admin_redirect('document', 'refresh');

		}
		// Form validation
		$this->form_validation->set_rules('title', 'title', 'required|xss_clean');
		$this->form_validation->set_rules('language', 'language', 'required|xss_clean');

		if ($this->input->post()) {
			if ($this->form_validation->run()) {
				$updateData = array();

				$new_name = time();
				$config['upload_path'] = 'assets/img/site/document';
				$config['allowed_types'] = 'pdf';
				$ext = pathinfo($_FILES['doc']['name'], PATHINFO_EXTENSION);
				$config['file_name'] = $new_name . '.' . $ext;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($_FILES["doc"]["name"] != '') {
					if (!$this->upload->do_upload('doc')) {

						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error', $error['error']);
						admin_redirect('document', 'refresh');

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
							$this->image_lib->clear();
							$updateData['document'] = $d['file_name'];
						}
					}
				}

				$title = $this->input->post('title');				
				$language = $this->input->post('language');

				$updateData['title'] = $title;
				$updateData['language'] = $language;
				$condition = array('id' => $doc_id);
				
				$update = FS::Common()->updateTableData(DOC, $condition, $updateData);
				if ($update) {
					FS::session()->set_flashdata('success', 'Document has been updated successfully!');
					admin_redirect('document', 'refresh');
				} else {
					FS::session()->set_flashdata('error', 'Unable to update this Document');
					admin_redirect('docedit/' . $id, 'refresh');
				}

			} else {
				FS::session()->set_flashdata('error', 'Unable to update this Document');
				admin_redirect('docedit/' . $id, 'refresh');
			}

		}
			$data['action'] 		= 	base_url() . 'docedit';
			
			$data['title'] 			= 	'Edit Document';

			$data['doc'] 	=	FS::Common()->getTableData(DOC, array('id' => $doc_id))->row();

			$data['lang'] 	=	FS::Common()->getTableData(LANG)->result();		

			$this->view('pages/Document/editdoc', $data);
	}
}
