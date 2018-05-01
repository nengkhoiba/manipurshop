<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nav extends CI_Controller {

	function __construct() {
		parent::__construct();
		if($this->session->userdata('loginStatus'))
		{
			if($this->session->userdata('role') == "ADMIN"){
					
	
				}else {
					redirect('admin/login');
				}
	
			}else {
					redirect('admin/login');
				}
	
	
	}
	
	function index(){
	if($this->session->userdata('loginStatus'))
		{
			if($this->session->userdata('role') == "ADMIN"){
					
				$this->load->view('admin/dashboard.php');
				}else {
					redirect('admin/login');
				}
	
			}else {
					redirect('admin/login');
				}
	}
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
	public function order(){
		$this->load->view('admin/order');
	}
	public function user(){
		$this->load->view('admin/usermaster');
	}
	public function analytics(){
		$this->load->view('admin/analytics');
	}
	public function advertise(){
		$this->load->view('admin/advertise');
	}
	public function ads(){
		$this->load->view('admin/ads');
	}
	/*public function orderPopup(){
		$this->load->view('admin/data/order_print');
	}*/
}

	