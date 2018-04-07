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
	public function login()
	{
		$this->load->view('login.php');
	}
	public function ordermessage(){
		$this->load->view('message');
	}
	public function shop(){
		$searchValue = mysql_real_escape_string(trim($_GET['q']));
		$category = mysql_real_escape_string(trim($_GET['c']));
		$brand = mysql_real_escape_string(trim($_GET['b']));
		$price = mysql_real_escape_string(trim($_GET['p']));
		if(isset($searchValue)){
			$data['q']=$searchValue;
			$data['c']=$category;
			$data['b']=$brand;
			$data['p']=$price;
			$this->load->view('shop',$data);
		}
		else{
			$data['q']= "";
			$data['c']= "";
			$data['b']= "";
			$data['p']= "";
			$this->load->view('shop',$data);
		}
	}
	public function contact(){
		$this->load->view('contact');
	}
	public function orderStatus(){
		if($this->session->userdata('LOGIN')){
			$this->load->view('orderstatus.php');
		}
		else{
			redirect('login');
		}
	}
	public function termandcondition(){
		$this->load->view('term_and_conditions.php');
	}
	public function privacypolicy(){
		$this->load->view('privacy_policy.php');
	}
	public function refundpolicy(){
		$this->load->view('refund_policy.php');
	}
	public function companyinfo(){
		$this->load->view('company_information.php');
	}
	public function storelocation(){
		$this->load->view('store_location.php');
	}
}

	