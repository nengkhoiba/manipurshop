<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('USERID', "1");
	}
	//SHIPPING
	public function shipping()
	{
		$flag= mysql_real_escape_string(trim($_POST["postType"]));
		$pincode = mysql_real_escape_string(trim($_POST["pincode"]));
		$time = mysql_real_escape_string(trim($_POST["time"]));
		$rate = mysql_real_escape_string(trim($_POST["rate"]));
		$added_by = $this->session->userdata("USERID");
		
		if( $flag == null){
			
			$sql = "INSERT INTO `Shipping`(`Pincode`, `Time`, `Rate`, `Added_by`, `Added_on`,`isActive`) 
					VALUES ('$pincode','$time','$rate','$added_by',NOW(),1)";
			$query = $this->db->query($sql);
			if( $query){
				$this->session->set_userdata('status', "Successfully Save!");
				redirect('admin/nav');
			}
			else {
				$this->session->set_userdata('status', "Something went wrong!");
				redirect('admin/nav');
			}
		}
		else {
			$sql = "UPDATE `Shipping` SET 
					`Pincode`='$pincode',
					`Time`='$time',
					`Rate`='$rate',
					`Modified_by`='$added_by',
					`Modified_on`=NOW()
					WHERE ID='$flag' AND isActive=1";
			$query= $this->db->query($sql);
			if($query){
				$this->session->set_userdata('status', "Successfully Update!");
				redirect('admin/nav');
			}
			else {
				$this->session->set_userdata('status', "Something went wrong!");
				redirect('admin/nav');
			}
		}
	}
	public function load_shipping()
	{
		$this->load->view('admin/data_fragment/shipping_data.php');
	}
	
	public function deleteShipping()
	{
		$temp=$_GET['id'];
		$addedBy=$this->session->userdata("USERID");
		$sql="UPDATE Shipping SET
		isActive='0',
		Modified_by='$addedBy',
		Modified_on=NOW()
		WHERE
		ID ='$temp'";
		$query=$this->db->query($sql);
		if($query)
		{
			$this->session->set_userdata('status',"Succesfully Deleted!");
		}
		else {
			$this->session->set_userdata('status', "Something went wrong!");
		}
	}
	//END SHIPPING
	
	//BRAND 
	public function brand(){
		
		$flag=mysql_real_escape_string(trim($_POST['postType']));
		$code=mysql_real_escape_string(trim($_POST['code']));
		$description = mysql_real_escape_string(trim($_POST['description']));
		$added_by = $this->session->userdata("USERID");
		if($flag== null){
			
			$sql = "INSERT INTO `Brand`(`Code`, `Description`, `Added_by`, `Added_on`,  `isActive`) 
			VALUES ('$code','$description','$added_by',NOW(),1)";
			
			$query = $this->db->query($sql);
			if($query){
				$this->session->set_userdata('status', "Successfully Save!");
				redirect('admin/nav/brand');
			}else{
				$this->session->set_userdata('status', "Something went wrong!");
				redirect('admin/nav/brand');
			}
		}
		else {
			$sql = "UPDATE `Brand` SET 
				`Code`='$code',
				`Description`='$description',
				`Modified_by`='$added_by',
				`Modified_on`=NOW()
				WHERE ID='$flag' AND isActive='1'";
			$query = $this->db->query($sql);
			if($query){
				$this->session->set_userdata('status', "Successfully Updated!");
				redirect('admin/nav/brand');
			}
			else {
				$this->session->set_userdata('status', "Something went wrong!");
				redirect('admin/nav/brand');
			}
		}
		
	}
	
	public function load_brand(){
		$this->load->view('admin/data_fragment/brand_data.php');
	}
	public function deleteBrand()
	{
		$temp=$_GET['id'];
		$addedBy=$this->session->userdata("USERID");
		$sql="UPDATE Brand SET
		isActive='0',
		Modified_by='$addedBy',
		Modified_on=NOW()
		WHERE
		ID ='$temp'";
		$query=$this->db->query($sql);
		if($query)
		{
			$this->session->set_userdata('status',"Succesfully Deleted!");
		}
		else {
			$this->session->set_userdata('status', "Something went wrong!");
		}
	}
	//END BRAND
	
	//CATEGORY
	public function category(){

		$flag=mysql_real_escape_string(trim($_POST['postType']));
		$code=mysql_real_escape_string(trim($_POST['code']));
		$description=mysql_real_escape_string(trim($_POST['description']));
		$addedBy=$this->session->userdata("USERID");
		
		if($flag== null){
				
			$sql = "INSERT INTO `Category`(`Code`, `Description`, `Added_by`, `Added_on`,  `isActive`)
			VALUES ('$code','$description','$addedBy',NOW(),1)";	
			$query = $this->db->query($sql);
			if($query){
				$this->session->set_userdata('status', "Successfully Save!");
                redirect('admin/nav/category');
			}else{
				$this->session->set_userdata('status', "Something went wrong!");
				redirect('admin/nav/category');
			}
		}else{
			$sql = "UPDATE Category SET 
			Code='$code',
			Description='$description',
			Modified_by='$addedBy',
		    Modified_on=NOW()
			WHERE ID='$flag' 
			AND isActive=1 
			";
			$query = $this->db->query($sql);
			if($query){
				$this->session->set_userdata('status', "Successfully Updated!");
				redirect('admin/nav/category');
			}else{
				$this->session->set_userdata('status', "Something went wrong!");
				redirect('admin/nav/category');
			}
		}
	}
	public function load_category(){
		$this->load->view('admin/data_fragment/category_data.php');
	}
	public function deleteCategory()
	{
		$temp=$_GET['id'];
		$addedBy=$this->session->userdata("USERID");
		$sql="UPDATE Category SET
		isActive='0', 
		Modified_by='$addedBy',
		Modified_on=NOW()
		WHERE
		ID ='$temp'";
		$query=$this->db->query($sql);
		if($query)
		{
			$this->session->set_userdata('status',"Succesfully Deleted!");
		}
		else {
			$this->session->set_userdata('status', "Something went wrong!");
		}
	}
	//END CATEGORY
	
	
}

