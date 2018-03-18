<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['msg']="0";
		$this->load->view('admin/login',$data);
	}
	public function verify()
	{
				
		$this->load->model('admin/m_login', 'validate');
		
		

		$this->load->library('form_validation');
			
		$this->form_validation->set_rules('Email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('Password', 'Password ', 'required');
	
		
			
		if ($this->form_validation->run() == FALSE)
		{
			   $data['msg']="Please enter valid Email and Password!";
		       $this->load->view('admin/login',$data);
		}
		else
		{
			$loginId=$_POST['Email'];
			$pass=$_POST['Password'];
			$result = $this->validate->validate($loginId,$pass);
				
				if(sizeof($result) == 1){
					
					$role=$result[0]->ROLE;
					$ids=$result[0]->ID;
					$name=$result[0]->NAME;
					
					$this->session->set_userdata('loginStatus', true);
					$this->session->set_userdata('role', $role);
					$this->session->set_userdata('USERID', $ids);
					$this->session->set_userdata('email', $loginId);
					$this->session->set_userdata('name', $name);
					redirect('admin/nav');
				
				}else{
					$data['msg']="Incorrect Email or Password!";
					$this->load->view('admin/login',$data);
				}
					
		
		}
		
		
		
		
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_userdata('role', "LOGOUT");
		$this->session->set_userdata('loginStatus', false);
		redirect('admin/nav');
	}
	
	

}

	