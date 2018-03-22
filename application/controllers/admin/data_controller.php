<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_controller extends CI_Controller {
	
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
			}else {
				redirect('admin/login');
			}
	
		}else {
			redirect('admin/login');
		}
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
				redirect('admin/nav/shipping');
			}
			else {
				$this->session->set_userdata('status', "Something went wrong!");
				redirect('admin/nav/shipping');
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
				redirect('admin/nav/shipping');
			}
			else {
				$this->session->set_userdata('status', "Something went wrong!");
				redirect('admin/nav/shipping');
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
	
	//ITEM INFO
	public function itemInfo(){
		$itemCategory = mysql_real_escape_string(trim($_GET['itemCategory']));
		$itemBrand = mysql_real_escape_string(trim($_GET['itemBrand']));
		$itemName = mysql_real_escape_string(trim($_GET['itemName']));
		$itemDesc = mysql_real_escape_string(trim($_GET['itemDesc']));
		$itemStock = mysql_real_escape_string(trim($_GET['itemStock']));
		$itemDelivery = mysql_real_escape_string(trim($_GET['itemDelivery']));
		$itemCode= mysql_real_escape_string(trim($_GET['itemCode']));
		$flag=mysql_real_escape_string(trim($_GET['postType']));
		
		$addedBy=$this->session->userdata("USERID");
		
		if($flag== 0){
			$sql = "INSERT INTO `Item`(`Code`, `Title`, `Category_id`, `Brand_id`, `Description`, `Item_stock`, `Delivery_Time`, `Added_by`, `Added_on`, `isActive`)
					 VALUES ('$itemCode','$itemName','$itemCategory','$itemBrand','$itemDesc','$itemStock','$itemDelivery','$addedBy',NOW(),1)";
			$query= $this->db->query($sql);
			if($query){
				$sql1="SELECT ID FROM `Item`
                       ORDER BY Item.ID DESC limit 1";
				$query1 = $this->db->query($sql1);
				if($query1){
					$itemID = 0;
					while ($result = mysql_fetch_array($query1->result_id)){
						$itemID= $result['ID'];
					}
					$this->output->set_output(json_encode(array (
							"status"=>"success",
							"itemID"=>$itemID
					)));
				}
				
				
				
			}
			else {
				$this->output->set_output(json_encode(array (
						"ststus"=>"fail",
						"itemID"=>"0"
				)));
			}
		}
		else {
			$sql="UPDATE Item SET
			Code='$itemCode',
			Title='$itemName',
			Category_id='$itemCategory',
			Brand_id='$itemBrand',
			Description='$itemDesc',
			Item_stock='$itemStock',
			Delivery_Time='$itemDelivery',
			Modified_by='$addedBy',
			Modified_on=NOW()
			WHERE ID='$flag'";
			$query = $this->db->query($sql);
			if($query){
				$this->output->set_output(json_encode(array (
						"status"=>"success",
						"itemID"=>$flag
				)));
			}
			
			
		}
		
	}
	
	public function load_item(){
		$this->load->view('admin/data_fragment/item_data.php');
	}
	public function deleteItem(){
		$temp = $_GET['id'];
		$addedBy=$this->session->userdata("USERID");
		
		$sql ="UPDATE `Item` SET
		`isActive`='0'
		`Modified_by`='$addedBy',
		`Modified_on`=Now(),
		WHERE ID='$flag'";
		$query = $this->db->query($sql);
		if($query){
			$this->session->set_userdata('status', "Successfully Delete!");
			redirect('admin/nav/item');
		}
		else {
			$this->session->set_userdata('status', "Something went wrong!");
			redirect('admin/nav/item');
		}
	}
	public function load_itemDetail(){
		$itemId= mysql_real_escape_string(trim($_GET['id']));
		$sql ="Select `Code`, `Title`, `Category_id`, `Brand_id`, `Description`, `Item_stock`, `Delivery_Time`, `isPublish` from Item where ID ='$itemId'";
		$query = $this->db->query($sql);
		if($query){
			$data=array();
			while ($result = mysql_fetch_array($query->result_id)){
				$data['cat_id']=$result['Category_id'];
				$data['brand_id']=$result['Brand_id'];
				$data['code']=$result['Code'];
				$data['title']=$result['Title'];
				$data['desc']=$result['Description'];
				$data['stock']=$result['Item_stock'];
				$data['time']=$result['Delivery_Time'];
				$data['publish']=$result['isPublish'];
				
			}
			$this->output->set_output(json_encode($data));
		}
	}
	public function enable_itemPublish(){
		$itemId= mysql_real_escape_string(trim($_GET['itemID']));
		$sql1 = "Update Item set isPublish =1 where ID='$itemId'";
		$sql2 = "Update Item set isPublish =0 where ID!='$itemId' AND Item_id='$itemId'";
		
		$query1 = $this->db->query($sql1);
		$query2 = $this->db->query($sql2);
		
		$data["ItemID"]=$itemId;
		if($query2){
			
		}
		else{
			
		}
	}
	
	//END ITEM INFO
	//ITEM PRICE
	public function itemPrice(){
		$itemId = $_GET['itemID'];
		$priceID =$_GET['priceID'];
		$price = $_GET['itemPrice'];
		$addedBy=$this->session->userdata("USERID");
		
		if($priceID == 0){
			$sql ="INSERT INTO `Item_Price`(`Item_id`, `Price`, `isCurrent`, `Added_by`, `Added_on`,`isActive`)
			VALUES ('$itemId','$price',0,'$addedBy',NOW(),1)";
			$query =$this->db->query($sql);
			$data["ItemID"]=$itemId;
			if($query){
				
				$this->load->view('admin/data_fragment/item_price',$data);
			}
			else{
				$this->load->view('admin/data_fragment/item_price',$data);
			}
		}
		else {
			$sql ="UPDATE Item_Price Set Price= '$price',Modified_by='$addedBy', Modified_on=NOW() where Item_id='$itemId' AND ID='$priceID'";
			$query =$this->db->query($sql);
			$data["ItemID"]=$itemId;
			if($query){
				
				$this->load->view('admin/data_fragment/item_price',$data);
			}
			else{
				$this->load->view('admin/data_fragment/item_price',$data);
			}
		}
	}
	public function delete_itemPrice(){
		$priceID = mysql_real_escape_string(trim($_GET['id']));
		$itemId= mysql_real_escape_string(trim($_GET['itemID']));
		$sql = "Update Item_Price set isActive =0 where ID='$priceID'";
		$query = $this->db->query($sql);
		$data["ItemID"]=$itemId;
		if($query){
			
			$this->load->view('admin/data_fragment/item_price',$data);
		}
		else{
			$this->load->view('admin/data_fragment/item_price',$data);
		}
	}
	public function enable_itemPrice(){
		$priceID = mysql_real_escape_string(trim($_GET['id']));
		$itemId= mysql_real_escape_string(trim($_GET['itemID']));
		$sql1 = "Update Item_Price set isCurrent =1 where ID='$priceID'";
		$sql2 = "Update Item_Price set isCurrent =0 where ID!='$priceID' AND Item_id='$itemId'";
		
		$query1 = $this->db->query($sql1);
		$query2 = $this->db->query($sql2);
		
		$data["ItemID"]=$itemId;
		if($query2){
			
			$this->load->view('admin/data_fragment/item_price',$data);
		}
		else{
			$this->load->view('admin/data_fragment/item_price',$data);
		}
	}
	public function load_item_price(){
		$itemId= mysql_real_escape_string(trim($_GET['id']));
		$data["ItemID"]=$itemId;	
		$this->load->view('admin/data_fragment/item_price',$data);
		
	}
	//ITEM PRICE END 
	//ITEM DETAILS 
	public function itemDetails(){
		$itemId = mysql_real_escape_string(trim($_GET['itemID']));
		$detailId =mysql_real_escape_string(trim($_GET['detailID']));
		$itemTitle = mysql_real_escape_string(trim($_GET['itemTitle']));
		$itemDesc = mysql_real_escape_string(trim($_GET['itemDesc']));
		$addedBy=$this->session->userdata("USERID");
		
		if($detailId== 0){
			$sql ="INSERT INTO `Item_Details`( `Item_id`, `Title`, `Description`, `Added_by`, `Added_on`, `isActive`)
			VALUES ('$itemId','$itemTitle','$itemDesc','$addedBy',NOW(),1)";
			$query =$this->db->query($sql);
			$data["ItemID"]=$itemId;
			if($query){
				
				$this->load->view('admin/data_fragment/item_Details_data',$data);
			}
			else{
				$this->load->view('admin/data_fragment/item_Details_data',$data);
			}
		}
		else {
			$sql ="UPDATE Item_Details Set Title= '$itemTitle',Description='$itemDesc',Modified_by='$addedBy', Modified_on=NOW() where Item_id='$itemId' AND ID='$detailId'";
			$query =$this->db->query($sql);
			$data["ItemID"]=$itemId;
			if($query){
				
				$this->load->view('admin/data_fragment/item_Details_data',$data);
			}
			else{
				$this->load->view('admin/data_fragment/item_Details_data',$data);
			}
		}
		
	}
	public function delete_itemDetail(){
		$detailID = mysql_real_escape_string(trim($_GET['id']));
		$itemId= mysql_real_escape_string(trim($_GET['itemID']));
		$sql = "Update Item_Details set isActive =0 where ID='$detailID'";
		$query = $this->db->query($sql);
		$data["ItemID"]=$itemId;
		if($query){
			
			$this->load->view('admin/data_fragment/item_Details_data',$data);
		}
		else{
			$this->load->view('admin/data_fragment/item_Details_data',$data);
		}
	}
	public function load_item_details(){
		$itemId= mysql_real_escape_string(trim($_GET['id']));
		$data["ItemID"]=$itemId;
		$this->load->view('admin/data_fragment/item_Details_data',$data);
		
	}
	//END ITEM DETAILS
	//image upload
	public function imageUpload(){
		$addedBy=$this->session->userdata("USERID");
		/* Getting file name */
		$filename = $_FILES['file']['name'];
		
		/* Getting File size */
		$filesize = $_FILES['file']['size'];
		$itemID = $_POST['itemID'];
		/* Location */
		$location = "images/".$filename;
		
		$return_arr = array();
		$imageURl = mysql_real_escape_string($location);
		/* Upload file */
		move_uploaded_file($_FILES['file']['tmp_name'],$location);
		$sql ="INSERT INTO `Item_Image`(`Item_id`, `Image_Url`,`Added_by`, `Added_on`, `isActive`)
		VALUES ('$itemID','$imageURl','$addedBy',NOW(),1)";
		$query=$this->db->query($sql);
		$this->output->set_output(json_encode(array (
				"status"=>"success"
		)));
	}
	
	public function loadImage(){
		$itemId = mysql_real_escape_string(trim($_GET['id']));
		$data["ItemID"]=$itemId;
			
	    $this->load->view('admin/data_fragment/image_data',$data);
	}
	public function delete_itemImage(){
		$itemId=mysql_real_escape_string(trim($_GET['itemID']));
		$imageID=mysql_real_escape_string(trim($_GET['id']));
		$sql="Update Item_Image Set isActive=0 where ID='$imageID' ";
		$query=$this->db->query($sql);
		$data["ItemID"]=$itemId;
		if($query){
			
			$this->load->view('admin/data_fragment/image_data',$data);
		}
		
	}
	//end image upload 
	//item info search'
	public function searchItem(){
		$cat = mysql_real_escape_string(trim($_GET['cid']));
		$brand = mysql_real_escape_string(trim($_GET['bid']));
		$title = mysql_real_escape_string(trim($_GET['title']));
		$code = mysql_real_escape_string(trim($_GET['code']));
		
		
		$Data['CatID']=$cat;
		$Data['BrandID']=$brand;
		$Data['ItemTitle']=$title;
		$Data['ItemCode']=$code;
			
		$this->load->view('admin/data_fragment/item_info_data',$Data);
		
	}
	//item info search end 
	//item publish check 
	public function itemPublish(){
		$flag1=0;
		$flag2=0;
		$flag3=0;
		$itemID = mysql_real_escape_string(trim($_GET['itemid']));
		$sql="SELECT ID FROM Item_Price WHERE Item_id='$itemID' AND isCurrent=1 AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			$flag1=1;
		}else{
			$flag1=0;
		}
		$sql1="SELECT ID FROM Item_Details WHERE Item_id='$itemID' AND isActive=1";
		$query1=$this->db->query($sql1);
		if($query1->num_rows()>0){
			$flag2=1;
		}else{
			$flag2=0;
		}
		$sql2="SELECT ID FROM Item_Image WHERE Item_id='$itemID' AND isActive=1";
		$query2=$this->db->query($sql2);
		if($query2->num_rows()>3){
			$flag3=1;
		}else{
			$flag3=0;
		}
		$isPublishReady=0;
		if($flag1==1 && $flag2==1 && $flag3==1){
			$isPublishReady=1;
		}
		$this->output->set_output(json_encode(array (
				"status"=>"$isPublishReady"
		)));
	}
	// item publish check end
	//item publish save 
	public function itemPublishSave(){
		$itemID = mysql_real_escape_string(trim($_GET['itemid']));
		$sql="UPDATE `Item` SET isPublish=1 WHERE ID='$itemID' ";
		$query = $this->db->query($sql);
		if($query){
			$this->output->set_output(json_encode(array (
					"status"=>"success"
			)));
		}
	}
	//end item publish save 
	//item unpublidh save 
	public function itemUnpublishSave(){
		$itemID = mysql_real_escape_string(trim($_GET['itemid']));
		$sql = "UPDATE `Item` SET isPublish=0 WHERE ID='$itemID'";
		$query = $this->db->query($sql);
		if($query){
			$this->output->set_output(json_encode(array (
					"status"=>"success"
			)));
		}
	}
	//end item unpublish save 
	//user creat 
	function KeyGenerator($size=5){
		$character='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString='';
		for($i=0;$i<$size ;$i++){
			$randomString.=$character[rand(0,strlen($character)-1)];
		}
		return $randomString;
		
	}
	public function userCreat(){
		$username = mysql_real_escape_string(trim($_GET['username']));
		$address = mysql_real_escape_string(trim($_GET['address']));
		$role	= mysql_real_escape_string(trim($_GET['userRole']));
		$gender = mysql_real_escape_string(trim($_GET['gender']));
		$mobile = mysql_real_escape_string(trim($_GET['mobile']));
		$email = mysql_real_escape_string(trim($_GET['email']));
		$password = mysql_real_escape_string(trim($_GET['password']));
		
		$sql="INSERT INTO `User_Details`( `Name`, `Address`,`Gender`, `Mobile`) 
				VALUES ('$username','$address','$gender','$mobile')";
		$query = $this->db->query($sql);
		if($query){
			$key = $this->KeyGenerator(5);
			$sql1="INSERT INTO `Login`(`Email`, `Password`, `Key`, `Role`, `isActive`) 
				VALUES ('$email','$password','$key','$role',1)";
			$query1 = $this->db->query($sql1);
			if($query1){
				$this->load->view('admin/data_fragment/user_data');
			}
		}
	}
	//end user creat 
}

