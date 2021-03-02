<?php
/**
 * The base controller which is used by the Front and the Admin controllers
 */
class Base_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

		$this->output->set_header("Pragma: no-cache");
		
		$this->load->library(array('user_agent','session','email','form_validation'));

		$this->load->helper(array('url', 'file', 'string', 'form', 'html', 'language', 'security', 'security','common'));

		$this->load->model(array('common'));

		$this->load->database();

		require(APPPATH.'config/manifest.php');

		spl_autoload_register(function($class) use ($classes){

			if(isset($classes[$class]))
			{
				include($classes[$class]);
			}
		});

		if (config_item('ssl_support') && (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off'))
		{
			$CI =& get_instance();

			$CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);

			redirect($CI->uri->uri_string());
		}
	}
}//end Base_Controller

class Front_Controller extends Base_Controller
{
	function __construct(){
		
		parent::__construct();

		

		$this->load->library(array('user_agent'));
		$this->load->helper(array('date'));

		
	}
	
	
	function view($view, $vars = array(), $string=false)
	{
		if($string)
		{
			/*$result	 = $this->load->view(strtolower(CI_MODEL).'/common/header', $vars, true);
			$result	.= $this->load->view($view, $vars, true);
			$result	.= $this->load->view(strtolower(CI_MODEL).'/common/footer', $vars, true);
			
			return $result;*/
			//$this->load->view(strtolower(CI_MODEL).'/common/header', $vars);
			$this->load->view($view, $vars);
			//$this->load->view(strtolower(CI_MODEL).'/common/footer', $vars);
		}
		else
		{
			$this->load->view(strtolower(CI_MODEL).'/common/header', $vars);
			$this->load->view($view, $vars);
			$this->load->view(strtolower(CI_MODEL).'/common/footer', $vars);
		}
	}

	function bview($view, $vars = array(), $string=false)
	{
		if($string)
		{
			$result	 = $this->load->view(strtolower(CI_MODEL).'/common/login_header', $vars, true);
			$result	.= $this->load->view($view, $vars, true);
			$result	.= $this->load->view(strtolower(CI_MODEL).'/common/login_footer', $vars, true);
			
			return $result;
		}
		else
		{
			$this->load->view(strtolower(CI_MODEL).'/common/login_header', $vars);
			$this->load->view($view, $vars);
			$this->load->view(strtolower(CI_MODEL).'/common/login_footer', $vars);
		}
	}

	function cview($view, $vars = array(), $string=false)
	{
		if($string)
		{
			$result	 = $this->load->view(strtolower(CI_MODEL).'/common/inner_header', $vars, true);
			//$result	 = $this->load->view(strtolower(CI_MODEL).'/common/sidebar', $vars, true);
			$result	.= $this->load->view($view, $vars, true);
			$result	.= $this->load->view(strtolower(CI_MODEL).'/common/inner_footer', $vars, true);
			
			return $result;
		}
		else
		{
			$this->load->view(strtolower(CI_MODEL).'/common/inner_header', $vars);
			//$this->load->view(strtolower(CI_MODEL).'/common/sidebar', $vars);
			$this->load->view($view, $vars);
			$this->load->view(strtolower(CI_MODEL).'/common/inner_footer', $vars);
		}
	}




	function mview($view, $vars = array(), $string=false)
	{
		if($string)
		{
			$result	 = $this->load->view(strtolower(CI_MODEL).'/profile_header', $vars, true);
			$result	.= $this->load->view($view, $vars, true);
			$result	.= $this->load->view(strtolower(CI_MODEL).'/script', $vars, true);
			
			return $result;
		}
		else
		{
			$this->load->view(strtolower(CI_MODEL).'/profile_header', $vars);
			$this->load->view($view, $vars);
			$this->load->view(strtolower(CI_MODEL).'/script', $vars);
		}
	}
	
	function rview($view, $vars = array(), $string=false)
	{
		if($string)
		{
			$result	 = $this->load->view(strtolower(CI_MODEL).'/cms_header', $vars, true);
			$result	.= $this->load->view($view, $vars, true);
			$result	.= $this->load->view(strtolower(CI_MODEL).'/script', $vars, true);
			return $result;
		}
		else
		{
			$this->load->view(strtolower(CI_MODEL).'/cms_header', $vars);
			$this->load->view($view, $vars);
			$this->load->view(strtolower(CI_MODEL).'/script', $vars);
		}
	}

	
	function sview($view, $vars = array(), $string=false)
	{
		if($string)
		{
			$result	 = $this->load->view(strtolower(CI_MODEL).'/setup_header', $vars, true);
			$result	.= $this->load->view($view, $vars, true);
			$result	.= $this->load->view(strtolower(CI_MODEL).'/setup_footer', $vars, true);
			
			return $result;
		}
		else
		{
			$this->load->view(strtolower(CI_MODEL).'/setup_header', $vars);
			$this->load->view($view, $vars);
			$this->load->view(strtolower(CI_MODEL).'/setup_footer', $vars);
		}
	}
	
	function partial($view, $vars = array(), $string=false)
	{
		if($string)
		{
			return $this->load->view($view, $vars, true);
		}
		else
		{
			$this->load->view($view, $vars);
		}
	}
}

class Admin_Controller extends Base_Controller 
{
	
	private $template;
	
	function __construct()
	{
		parent::__construct();

		if(!empty(admin_id()))
		{
			user_access();
			
			
		}

		$adminattempt = get_data(ADACT, array('ip_address' => $_SERVER['REMOTE_ADDR'],'browser_name'=>$_SERVER['HTTP_USER_AGENT'],'activity'=>'Login Failed'))->num_rows();

		if($adminattempt>5)
		{
			echo '<div style="text-align: center; margin-top:50px; font-family: times new roman; font-size: 25px; color: red;">Your IP Address Block. Contact Administrator !!! </div>';
			die;
		}
	}
	
	function view($view, $vars = array(), $string=false)
	{
		$template	= 'admin';
 
		if($string)
		{
			$result	 = $this->load->view($template.'/common/head', $vars, true);
			$result	 = $this->load->view($template.'/common/sidebar', $vars, true);
			$result	 = $this->load->view($template.'/common/navbar', $vars, true);
			$result	.= $this->load->view($template.'/'.$view, $vars, true);
			$result	.= $this->load->view($template.'/common/footer', $vars, true);
			
			return $result;
		}
		else
		{
			$this->load->view($template.'/common/head', $vars);
			$this->load->view($template.'/common/sidebar', $vars);
			$this->load->view($template.'/common/navbar', $vars);
			$this->load->view($template.'/'.$view, $vars);
			$this->load->view($template.'/common/footer', $vars);
		}
	}

	function basicview($view, $vars = array(), $string=false)
	{
		$template	= 'admin';
 
		if($string)
		{
			$result	 = $this->load->view($template.'/basic/basic_header', $vars, true);
			$result	.= $this->load->view($template.'/'.$view, $vars, true);
			$result	.= $this->load->view($template.'/basic/basic_footer', $vars, true);
			
			return $result;
		}
		else
		{
			$this->load->view($template.'/basic/basic_header', $vars);
			$this->load->view($template.'/'.$view, $vars);
			$this->load->view($template.'/basic/basic_footer', $vars);
		}
	}
	

	function set_template($template)
	{
		$this->template	= $template;
	}

	function partial($view, $vars = array(), $string=false)
	{
		if($string)
		{
			return $this->load->view('admin/'.$view, $vars, true);
		}
		else
		{
			$this->load->view('administrator/'.$view, $vars);
		}
	}
}