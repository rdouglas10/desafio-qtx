<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for Cliente group only
 */
class Cliente extends MY_Controller {	

	protected $access = "Cliente";

	public function index()
	{
		$this->load->view("header");
		$this->load->view("navbar");
		$this->load->view("cliente");
		$this->load->view("footer");
	}

}