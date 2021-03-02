<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FAQ extends Admin_Controller {

	

	public function index()
	{
		echo "Gfgf";
	}


	function faqmanage() 
	{
		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}

		user_access();

		$user_view = $this->config->item('user_view');


		if(!in_array('5',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}

			$data['title'] 			= 	'FAQ Manage';

			$data['faq'] 	=	FS::Common()->getTableData(FAQ, '', '', '', '', '', '','', array('id', 'DESC'))->result();

			$this->view('pages/FAQ/faqmanage', $data);
		
	}

function view_ticket_detail($id)
{
		if(!$this->input->post("post_ticket_reply"))
		{
			$fetchdata=FS::Common()->get_ticketdetail($id);
			if($fetchdata)
			{
				
				$data['result'] = FS::Common()->get_ticketdetail($id);
				$data['detailview']="detailview";
				$this->view('pages/FAQ/admin_ticket',$data);
			}
		}
		else
		{
			$this->form_validation->set_rules('message', 'messgae', 'required');
			if ($this->form_validation->run() != FALSE)
			{
					if(FS::Common()->reply_to_ticket($id))
					{
						     $where1 = "id=".$id;;
							 $data1=array('status'=>'replied');
							$this->db->where("id",$id);
							$res = $this->db->update('liateZdItSrOoZpIpSuOs',$data1);
							$this->session->set_flashdata('success', "Successfully Replied");
							 redirect('/support','referesh');
					}
			}
			else
			{

				unset($_POST);
				$this->view_ticket_detail($id);
			}
		}
}

function delete_ticket($id)
{
$res = $this->db->delete('liateZdItSrOoZpIpSuOs',array('id'=>$id));
if($res)
{
$this->session->set_flashdata('success', "Ticket has been deleted");
redirect('/support','referesh');
}
}


	function supportmanage($stat="") 
	{
		if(empty(admin_id())) 
		{
			admin_url_redirect('', 'refresh');
		}
		user_access();
		$user_view = $this->config->item('user_view');


		$data['view']="View";
		if($stat !='')
		$wre="AND status='$stat'";
		else
		$wre='';

		$where1 = "parent_id IS NULL $wre";
		$arrorder = array('id'=>'desc');
		$data['result'] = $this->db->query("select * from tfunds_liateZdItSrOoZpIpSuOs where $where1")->result();
	

			$this->view('pages/FAQ/supportmanage', $data);
		
	}


	// Edit page
	function editfaq($id='') {

		user_access();

		$user_view = $this->config->item('user_view');

		if(!in_array('5',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}

		// Is logged in
		$sessionvar = $this->session->userdata('loggedadmin');

		if (!$sessionvar) {
			admin_url_redirect('', 'refresh');
		}
		// Is valid
		$faq_id = insep_decode($id);
		if ($id == '') {
			FS::session()->set_flashdata('error', 'Invalid request');
			admin_redirect('faq', 'refresh');

		}
		$isValid = FS::Common()->getTableData(FAQ, array('id' => $faq_id));
		if ($isValid->num_rows() == 0) {
			FS::session()->set_flashdata('error', 'Unable to find this page');
			admin_redirect('faq', 'refresh');

		}
		// Form validation
		$this->form_validation->set_rules('question', 'question', 'required|xss_clean');
		$this->form_validation->set_rules('answer', 'answer', 'required');
		$this->form_validation->set_rules('status', 'status', 'required|xss_clean');
		$this->form_validation->set_rules('language', 'language', 'required|xss_clean');

		if ($this->input->post()) {
			if ($this->form_validation->run()) {
				$updateData = array();
				$question = $this->input->post('question');
				$answer = $this->input->post('answer');
				$status = $this->input->post('status');
				$language = $this->input->post('language');
				$updateData['question'] = $question;
				$updateData['answer'] = $answer;
				$updateData['status'] = $status;
				$updateData['language'] = $language;
				$condition = array('id' => $faq_id);
				
				$update = FS::Common()->updateTableData(FAQ, $condition, $updateData);
				if ($update) {
					FS::session()->set_flashdata('success', 'FAQ has been updated successfully!');
					admin_redirect('faq', 'refresh');
				} else {
					FS::session()->set_flashdata('error', 'Unable to update this FAQ');
					admin_redirect('faqedit/' . $id, 'refresh');
				}

			} else {
				FS::session()->set_flashdata('error', 'Unable to update this FAQ');
				admin_redirect('faqedit/' . $id, 'refresh');
			}

		}
			$data['action'] 		= 	base_url() . 'editfaq';
			
			$data['title'] 			= 	'Edit FAQ';

			$data['mode'] 			= 	'Edit';

			$data['faq'] 	=	FS::Common()->getTableData(FAQ, array('id' => $faq_id))->row();
			$data['lang'] 	=	FS::Common()->getTableData(LANG)->result();
			
			$this->view('pages/FAQ/editfaq', $data);
	}



	function deletefaq($id) {

		user_access();

		$user_view = $this->config->item('user_view');

		if(!in_array('5',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}

		// Is logged in
		$sessionvar = $this->session->userdata('loggedadmin');

		if (!$sessionvar) {
			admin_url_redirect('', 'refresh');
		}
		// Is valid
		$faq_id = insep_decode($id);

		if ($id == '') {
			$this->session->set_flashdata('error', 'Invalid request');
			admin_redirect('faq', 'refresh');
		}
		$isValid = FS::Common()->getTableData(FAQ, array('id' => $faq_id))->num_rows();
		if ($isValid > 0) {
			// Check is valid
			$condition = array('id' => $faq_id);
			$delete = FS::Common()->deleteTableData(FAQ, $condition);
			
			if ($delete) {
				// True // Delete success
				FS::session()->set_flashdata('success', 'Faq deleted successfully');
				admin_redirect('faq', 'refresh');
			} else {
				//False
				FS::session()->set_flashdata('error', 'Problem occure with faq deletion');
					admin_redirect('faq', 'refresh');
			}
		} else {
			FS::session()->set_flashdata('error', 'Unable to find this page');
			admin_redirect('faq', 'refresh');
		}
	}


	function addfaq() {

		user_access();

		$user_view = $this->config->item('user_view');

		if(!in_array('5',$user_view))
		{
			admin_redirect('sitesettings', 'refresh');
		}

		// Is logged in
		$sessionvar = $this->session->userdata('loggedadmin');

		if (!$sessionvar) {
			admin_url_redirect('', 'refresh');
		}
		// Form validation
		$this->form_validation->set_rules('addquestion', 'question', 'required|xss_clean');
		$this->form_validation->set_rules('addanswer', 'answer', 'required');
		$this->form_validation->set_rules('addstatus', 'status', 'required|xss_clean');
		$this->form_validation->set_rules('addlanguage', 'addlanguage', 'required|xss_clean');

		if ($this->input->post()) {
			if ($this->form_validation->run()) {
				$insertData = array();
				
				$insertData['question'] = $this->input->post('addquestion');				
				$insertData['answer'] = $this->input->post('addanswer');
				$insertData['status'] = $this->input->post('addstatus');
				$insertData['language'] = $this->input->post('addlanguage');
				
				$insert = FS::Common()->insertTableData(FAQ, $insertData);
				if ($insert) {
					FS::session()->set_flashdata('success', 'FAQ has been added successfully!');
				admin_redirect('faq', 'refresh');
				} else {
					FS::session()->set_flashdata('error', 'Unable to add the new FAQ !');
				admin_redirect('faq', 'refresh');
				}

			} else {
				FS::session()->set_flashdata('error', 'Some data are missing!');
				admin_redirect('faq', 'refresh');
			}

		}
		$data['action'] 		= 	base_url() . 'addfaq';
			
		$data['title'] 			= 	'Add FAQ';

		$data['mode'] 			= 	'Add';

		$data['lang'] 	=	FS::Common()->getTableData(LANG)->result();

		$this->view('pages/FAQ/editfaq', $data);

	}
}
