<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends Front_Controller {

	

	public function index()
	{
		
		if(!empty(juego_id()))
		{
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
			
			$data['title']		=	"Message Page";

			$data['action']		=	"message";

			$this->cview(strtolower(CI_MODEL).'/message', $data);

		}
		else
		{
			front_redirect(base_url());
		}
	}

	    public function add_message()

	    {
	    	
		    if(!empty(juego_id()))
			{
				$lang = 1;

			$this->form_validation->set_rules('message', 'message', 'required|xss_clean');
			
			

			if ($this->input->post()) {
				if ($this->form_validation->run()) {
					
					
					$insertData['content'] = $this->input->post('message');				
					$insertData['sender'] = FS::session()->userdata('con_u_id');
					$insertData['createdAt'] = strtotime("now");
					$insertData['dateCreated'] = date('Y-m-d H:i:s');

					
					$insert = FS::Common()->insertTableData(MESSAGE, $insertData);
					if ($insert) {
						
						
						
						trigger_socket($insert,'userChat');

						echo "1";
					
					} else {
						echo "0";
					
					}
				}
				else 
				{
						echo "0";
					
				}

			}
			
		}
		else
		{
				echo "0";
		}

	    }


		    function get_messages()

		    {

		        
		    	
		        $query = FS::Common()->getTableData(MESSAGE)->result();
		        

		        

		        echo json_encode($query);

		    }


		    function get_message()

		    {

		        
		    	
		        $query = FS::Common()->getTableData(MESSAGE,'', '', '', '', '', '0','1', array('dateCreated', 'DESC'))->result();
		        

		        

		        echo json_encode($query);

		    }

	}

