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
		$page = mysql_real_escape_string(trim($_GET['per_page']));
		if(isset($searchValue)){
			$data['q']=$searchValue;
			$data['c']=$category;
			$data['b']=$brand;
			$data['p']=$price;
			$data['per_page']=$page;
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
	public function search(){
		$this->load->library('pagination');
		$this->load->model('search_model','database');
		
		$param=$_GET['q'];
		$cat=$_GET['c'];
		$brand=$_GET['b'];
		$price=$_GET['p'];
		$page=$_GET['per_page'];
		if($_GET['per_page']=="")$page=1;
		 
		$end=$page*3;
		$start=$end-3;
		
		$result = $this->database->searchproduct($end,$start,$param,$cat,$brand,$price);
		 
		$search ="?q=".$param."&c=".$cat."&b=".$brand."&p="+$price+"&per_page="+$page;
		
		 
		$config['base_url'] = site_url('home/search'.$search);
		$config['total_rows'] = sizeof($result);
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['per_page'] = "3";
		$config["uri_segment"] = 3;
    	$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = 3;
		
		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		//call the model function
		$data['productlist'] = $this->database->get_product_list($end, $start,$param,$cat,$brand,$price);
		
		$data['pagination'] = $this->pagination->create_links();
		
		//load theview
		$this->load->view('shop',$data);
				}
	public function faq(){
		$this->load->view('faq.php');
	}
	public function mail(){
		$this->load->view('mail_sent_order_receive.html');
	}
}

	