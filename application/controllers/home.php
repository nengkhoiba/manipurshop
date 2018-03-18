<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('homepage.php');
	}
	public function product()
	{	$P_id=mysql_real_escape_string(trim($_GET['id']));
	$sql="SELECT ID FROM Item WHERE ID='$P_id' AND isPublish=1 AND isActive=1";
	$query=$this->db->query($sql);
	if($query->num_rows()>0){
		$data['ItemID']=$P_id;
		$this->load->view('product.php',$data);
	}else{
		$this->load->view('error.php');
	}
		
	}
	public function login()
	{
		$this->load->view('login.php');
	}

}

	