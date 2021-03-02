<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends Front_Controller {



	public function index($id="")
	{
			
	if(!empty(juego_id()))
	{
	$data['support_list']=array_reverse(FS::Common()->support_list());
	if($id == "")
	{
	$support_id=encrypt_decrypt('1',FS::Common()->support_list1());
	}
	else
	{
		$support_id=$id;
	}
	$data['support_category']=FS::Common()->support_category();
	$idd=encrypt_decrypt('2',$support_id);
	$data['idd']=$idd;
	$data['support_view']=FS::Common()->support_view($idd);
	$data['support_messages']=FS::Common()->support_messages($idd);
	$data['support_messages1']=FS::Common()->support_messages1();
	$this->cview(strtolower(CI_MODEL).'/support',$data);
	}
	else
	{
		front_redirect(base_url());
	}
	}

function support_submit()
{
	echo FS::Common()->support_submit();
}
function support_form()
{
	if($this->input->post('message'))
	{
	FS::Common()->reply_to_support();
	echo "success";

	}
	else
	{
		echo "error";
		
	}
}
}