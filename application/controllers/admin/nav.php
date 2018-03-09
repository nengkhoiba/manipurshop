<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nav extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/home.php');
	}
	public function brand()
	{
		$this->load->view('admin/brand.php');
	}
	
	public function category(){
		$this->load->view('admin/category');
	}

}

	