<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('homepage.php');
	}
	public function product()
	{
		$this->load->view('product.php');
	}
	public function error()
	{
		$this->load->view('error.php');
	}

}

	