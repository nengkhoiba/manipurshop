<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nav extends CI_Controller {

	public function shipping()
	{
		$this->load->view('admin/shipping.php');
	}
	public function brand()
	{
		$this->load->view('admin/brand.php');
	}
	
	public function category(){
		$this->load->view('admin/category');
	}

	public function item()
	{
		$this->load->view('admin/item.php');
	}
}

	