<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function KeyGenerator($size=5){
		$character='Abcdjhaksdflj67i1253b12ly1283bk12h38';
		$randomString='';
		for($i=0;$i<$size ;$i++){
			$randomString.=$character[rand(0,strlen($character)-1)];
		}
		return $randomString;
		
	}
	public function signUpUser(){
		$userName = mysql_real_escape_string(trim($_POST['userName']));
		$userEmail = mysql_real_escape_string(trim($_POST['userEmail']));
		$userPass = mysql_real_escape_string(trim($_POST['userPass']));
		
		$sql="SELECT * from Customer_login WHERE Email ='$userEmail'";
		$query =$this->db->query($sql);
		if($query->num_rows()>0){
			$this->session->set_userdata('msg','Email already exist!');
		}
		else {
			$key = $this->KeyGenerator(30);
			
			
			$sql="INSERT INTO `Customer_login`( `Email`, `Name`,`Password`, `Key`, `isActive`) 
					VALUES ('$userEmail','$userName','$userPass','$key',0)";
			$query = $this->db->query($sql);
			if($query){
				
				$this->load->library('email');
				$this->email->from('no-reply@murolen.com','no-reply@murolen.com');
				
				$this->email->to($userEmail);
				$this->email->subject('Confirm Email');
				
				$url=base_url()."login/activate?email=".$userEmail."&key=".$key;
				$logo=base_url()."assets/images/home/logo.png";
				$data['url']=$url;
				$data['logo']=$logo;
				$msg = $this->load->view('emailtemplate/confirmation_email',$data,TRUE);
				$this->email->message($msg);
				$this->email->set_mailtype("html");
				$this->email->send();
				
				$this->session->set_userdata('msg','Successfully Created!');
				redirect('login');
			}
		}
	}
	
	public function verify()
	{
		
		$this->load->model('m_login', 'validate');
		
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password ', 'required');
		
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_userdata('msg','Enter valid Email and Password!');
			redirect('login');
		}
		else
		{
			$loginId=$_POST['email'];
			$pass=$_POST['password'];
			$result = $this->validate->validate($loginId,$pass);
			
			if(sizeof($result) == 1){
				
				$email=$result[0]->Email;
				$ids=$result[0]->ID;
				$name=$result[0]->Name;
				
				$this->session->set_userdata('LOGIN', true);
				$this->session->set_userdata('ID', $ids);
				$this->session->set_userdata('USEREMAIL', $loginId);
				$this->session->set_userdata('USERNAME', $name);
				redirect('home');
				
				
			}else{
				$this->session->set_userdata('msg','Incorrect Email or Password!');
				redirect('login');
			}
			
			
		}
		
		
		
		
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_userdata('ID', "0");
		$this->session->set_userdata('LOGIN', false);
		redirect('home');
	}
	
	public function activate(){
		$email = mysql_real_escape_string(trim($_GET['email']));
		$key = mysql_real_escape_string(trim($_GET['key']));
		
		$sql="SELECT ID FROM Customer_login WHERE Customer_login.Email='$email' AND Customer_login.Key='$key' ";
		$flag=$this->db->query($sql);
		if($flag->num_rows()>0){
			$sql1="UPDATE Customer_login SET isActive=1
			       WHERE Customer_login.Email='$email' AND Customer_login.Key='$key'";
			 $query=$this->db->query($sql1);
			 if($query){
			 	$data["msg"]="Your account is activated!";
			 	$this->load->view("welcome",$data);
			 }else{
			 	$data["msg"]="Something went wrong is your account activation please try again.";
			 	$this->load->view("welcome",$data);
			 }
					
		}else{
			$data["msg"]="Account activation failed. Incorrect key.";
			$this->load->view("welcome",$data);
		}
		
		
	}
	

}

	