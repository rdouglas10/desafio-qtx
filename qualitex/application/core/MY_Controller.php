<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	/**
	 * '*' all user
	 * '@' logged in user
	 * 'Elaborador' for elaborador
	 * 'Aprovador' for aprovador group
	 * 'Cliente' for cliente group
	 * @var string
	 */
	protected $access = "*";

	public function __construct()
	{
		parent::__construct();

		$this->login_check();
	}

	public function login_check()
	{
		if ($this->access != "*") 
		{
			// here we check the role of the user
			if (! $this->permission_check()) {
				die("<h4>Access Denied</h4><br /><a href='../'>Click aqui para voltar</a>");
			} 

			// if user try to access logged in page
			// check does he/she has logged in
			// if not, redirect to login page
			if (! $this->session->userdata("logged_in")) {
				redirect("auth");
			}
		}
	}

	public function permission_check()
	{ 	//print_r($this->session);die();
		// $this->session->unset_userdata("logged_in");
		// $this->session->sess_destroy();
		// redirect("auth");
		// print_r($this->access); 
		if ($this->access == "@") {
			// echo "if";die();
			return true;
		}
		else
		{	
			// echo "else";
			$access = is_array($this->access) ? 
				$this->access :
				explode(",", $this->access);
				// print_r($this->access);
				// print_r($this->session->userdata); 
				// echo "sdsds". $this->session->userdata("role");
				
			if (in_array($this->session->userdata("role"), array_map("trim", $access)) ) {
				// echo "else if";die();
				return true;
			}

			return false;
		}
	}

}