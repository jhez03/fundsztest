<?php
 class Emodelo extends CI_Model 
 {
	function __construct() {
		parent::__construct();
	} 	
	
	function stuur_pos($to = '', $from_email = '', $from_name = '', $email_template = '', $special_vars = array(), $cc = '', $bcc = '', $type = 'html',$too='' ) 
	{
	
	 	$this->load->library(array('email'));
		$e_pos			=	FS::db()->where('id', 1)->get(SITE)->row(); 
		$admindetails 	=	FS::db()->where('id', 1)->get(AD)->row();	
		$gasheerh 		=	insep_decode($e_pos->gasheerh);
		$hawep 			=	insep_decode($e_pos->hawep);
		$gebruikeru 	=	insep_decode($e_pos->gebruikeru);
		$slaagp 		=	$e_pos->slaagp;


		$special_vars['###COPYRIGHT###']	=	$e_pos->copy_right_text;
		$special_vars['###SITENAME###']		=	$e_pos->site_name;
			
		if($from_email == '')
			$from_email = encrypt_decrypt('decrypt',$admindetails->email_id);
		if($from_name == '')
			$from_name = $admindetails->admin_name;
		$em	=	'em'; $il	=	'ail';
		$em	=	$em.$il;
		$this->$em->clear();
		$pro	=	'pro';	$tocol	=	'tocol'; $tp		=	'tp';	
		$ms		=	'sm';	$pt		=	'tp_';	
		$ho		=	'ho'; 	$st		=	'st';   
		$op		=	'po'; 	$tr		=	'rt'; 
		$su		=	'us';	$re		=	'er'; 	
		$ap		=	'pa'; 	$ss		=	'ss';
		$ma		=	'ma'; 	$ty		=	'iltype';
		$ch		=	'char'; $se		=	'set';
		$tf		=	'ut'; 	$f8		=	'f-8';
		$lf		=	'cr'; 	$cr		=	'lf';
		$li		=	'new'; 	$ne		=	'line';
		$pr		=	'pri'; 	$or		=	'ori';	$yt	=	'ty';
		$posc	=	array(
							$pro.$tocol 	=> $ms.$tp,
							$ms.$pt.$ho.$st => $gasheerh,
							$ms.$pt.$op.$tr => $hawep,
							$ms.$pt.$su.$re => trim($gebruikeru),
							$ms.$pt.$ap.$ss => trim($slaagp),
							$ma.$ty => $type,
							$ch.$se => $tf.$f8
						);
		$posc[$lf.$cr] 		=	"\r\n";
		$posc[$li.$ne]		=	"\r\n";
		$posc[$pr.$or.$yt]	=	1;

		
		$this->$em->initialize($posc);

		$this->email->set_newline("\r\n");  

		if ( ! empty($gasheerh) && ! empty($hawep) && ! empty($gebruikeru) && ! empty($slaagp)) 
		{ 
			
			if(is_numeric($email_template)	)	
			$emailTemplate = FS::db()->where('id', $email_template)->get(ET);
			else
			$emailTemplate = FS::db()->where('title', $email_template)->get(ET);
		
			if ($emailTemplate->num_rows() > 0) 
			{
				$emailTemplate = $emailTemplate->row();

				$subject = strtr($emailTemplate->subject, $special_vars);
	
				$message = strtr($emailTemplate->template, $special_vars);
			
 				if($to !='')
				{
					$this->$em->to($to);
				}
				
				if($too!='')
				{
					$this->$em->too($too);
				}
        		
				
        		$this->$em->from($gebruikeru);
				
				if ($cc != '') 
				{
					$this->$em->cc($cc);
				}
				
				if ($bcc != '') 
				{	
					$this->$em->bcc($bccc);
				}
				
  				$this->$em->subject($subject);
				
  				$this->$em->message($message);
			
				if ( ! $this->$em->send()) 
				{ 
					echo show_error($this->$em->print_debugger());
					die;
					$this->$em->clear();

					return false;
				} 
				else 
				{ 
					return true;
					echo show_error($this->$em->print_debugger());
					die;
				} 
				return true;

			} 
			else 
			{
				exit(lang('EMNC'));
			}	 
		} 
		else 
		{ 
			exit(lang('SMNC'));
		}
	}
}