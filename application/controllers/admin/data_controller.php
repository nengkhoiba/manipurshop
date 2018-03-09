<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('USERID', "1");
	}
	//SHIPPING
	public function shipping()
	{
		$flag=$_POST["postType"];
		$pincode = trim($_POST["pincode"]);
		$time = trim($_POST["time"]);
		$rate = trim($_POST["rate"]);
		$added_by = trim($_POST["added_by"]);
		$added_on = trim($_POST["added_on"]);
		$modified_by = trim($_POST["modified_by"]);
		$modified_on = trim($_POST["modified_on"]);
		$isActve = trim($_POST["ddlActive"]);
		if( $flag == null /*$pincode !=null && $time!=null && $rate!=null && $added_by!=null && $modified_by !=null && $isActve!=null*/){
			
			$sql = "INSERT INTO `Shipping`(`Pincode`, `Time`, `Rate`, `Added_by`, `Added_on`,`isActive`) 
					VALUES ('$pincode','$time','$rate','$added_by',NOW(),'$isActve')";
			$query = $this->db->query($sql);
			if( $query){
				echo "data inserted successfully";
				//$this->load->view('');
				//redirect('admin/login.php');
			}
		}
		else {
			//$sql = "UPDATE `Shipping` SET `ID`=[value-1],`Pincode`=[value-2],`Time`=[value-3],`Rate`=[value-4],`Added_by`=[value-5],`Added_on`=[value-6],`Modified_by`=[value-7],`Modified_on`=[value-8],`isActive`=[value-9] WHERE 1";
		}
		//$this->load->view('admin/home.php');
	}
	public function load_shipping()
	{
		$this->load->view('admin/data_fragment/shipping_data.php');
	}
	
	public function delete_shipping(){
		
	}
	//END SHIPPING
	
	//BRAND 
	public function brand(){
		
		$flag=$_POST['postType'];
		$code=$_POST['code'];
		$description = $_POST['description'];
		if($flag== null){
			
			$sql = "INSERT INTO `Brand`(`Code`, `Description`, `Added_by`, `Added_on`,  `isActive`) 
			VALUES ('$code','$description','$added_by',NOW(),1)";
			
			$query = $this->db->query($sql);
			if($query){
				redirect('');
			}
		}
		
	}
	
	public function load_brand(){
		$this->load->view('admin/data_fragment/brand_data.php');
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
		isActive='0' 
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

