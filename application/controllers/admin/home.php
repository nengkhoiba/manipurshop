<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/home.php');
	}
	public function brand()
	{
		$this->load->view('admin/brand.php');
	}
	
	

}

	