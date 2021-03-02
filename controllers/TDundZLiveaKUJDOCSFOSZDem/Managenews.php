<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managenews extends Admin_Controller {



	public function index()
	{
		echo "Gfgf";
	}


	function newsmanage() 
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
			if ($this->input->post())
			{
					$updateData = array();
						$content1 = $this->input->post('content1');
						$content2 = $this->input->post('content2');
						$content3 = $this->input->post('content3');
						$content4 = $this->input->post('content4');
						$status = $this->input->post('status');

						$updateData['content1'] = $content1;
						$updateData['content2'] = $content2;
						$updateData['content3'] = $content3;
						$updateData['content4'] = $content4;
						$updateData['status'] = $status;
						$condition = array('id' => 1);
						
						$update = FS::Common()->updateTableData('tfunds_news', $condition, $updateData);
						if ($update) {
							FS::session()->set_flashdata('success', 'News has been updated successfully!');
							admin_redirect('news', 'refresh');
						} else {
							FS::session()->set_flashdata('error', 'Unable to update this News');
							admin_redirect('news/' . $id, 'refresh');
						}
					$data['title'] 			= 	'News Manage';

					$data['news'] 	=	FS::Common()->getTableData('tfunds_news',array('id'=>'1'))->row();
								
					$this->view('pages/News/newsmanage', $data);
			}
			else
			{	
			$data['title'] 			= 	'News Manage';

			$data['news'] 	=	FS::Common()->getTableData('tfunds_news',array('id'=>'1'))->row();
						
			$this->view('pages/News/newsmanage', $data);
			}
		
	}


	
	
}
