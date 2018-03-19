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
			$key = $this->KeyGenerator(10);
			$sql="INSERT INTO `Customer_login`( `Email`, `Name`,`Password`, `Key`, `isActive`) 
					VALUES ('$userEmail','$userName','$userPass','$key',0)";
			$query = $this->db->query($sql);
			if($query){
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
			}
			
			
		}
		
		
		
		
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_userdata('ID', "0");
		$this->session->set_userdata('LOGIN', false);
		redirect('home');
	}
	

}

	