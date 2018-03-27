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
	public function cart(){
		if($this->session->userdata('LOGIN')){
			$data['UserID'] = $this->session->userdata('ID');
			$this->load->view('cart.php',$data);
		}
		else{
			redirect('login');
		}
	}
	public function checkout(){
		if($this->session->userdata('LOGIN')){
			$userID = $this->session->userdata('ID');
			$sql = "SELECT `ID`, `name`, `data` FROM `application_setting` WHERE ID=1";
			$query = $this->db->query($sql);
			if($query){
				while($result = mysql_fetch_array($query->result_id)){
					$minimum =$result['data'];
				}
				$sql1 ="SELECT SUM(Net_Charge) AS TotalNet FROM `Cart` WHERE  `Added_by`='$userID' ";
				$query1 = $this->db->query($sql1);
				if($query1){
					$netCharge=0;
					while($result1 = mysql_fetch_array($query1->result_id)){
						$netCharge = $result1['TotalNet'];
					}
					if($netCharge >= $minimum){
						$data['UserID'] = $this->session->userdata('ID');
						$this->load->view('checkout.php',$data);
					}
					else{
						$this->session->set_userdata('status',"Cart Must be a minimum of Rs. "."$minimum");
						redirect('home/cart');
					}
				}
			}
			
		}
		else {
			redirect('login');
		}
	}
	public function shop()
	{
		$this->load->view('shop.php');
	}
}

	