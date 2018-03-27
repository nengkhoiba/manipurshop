<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_data extends CI_Controller {
	

	public function addReview(){
		
		if($this->session->userdata("LOGIN")){
			
			$review = mysql_real_escape_string(trim($_GET['review']));
			$rate = mysql_real_escape_string(trim($_GET['rate']));
			$itemID = mysql_real_escape_string(trim($_GET['item_id']));
			$userId=$this->session->userdata("ID");
			$sql="INSERT INTO `Item_review`(`Item_id`, `Rating`, `Review`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive`) 
					VALUES ('$itemID','$rate','$review','$userId',NOW(),'$userId',NOW(),1)";
			$query = $this->db->query($sql);
			if($query){
				$data['itemID']=$itemID;
				$this->load->view('data/reviewData',$data);
			}

		}
		
	}
	//add_to_cart 
	public function addToCart(){
		if($this->session->userdata("LOGIN")){
			$qty = mysql_real_escape_string(trim($_GET['qty']));
			$prodID = mysql_real_escape_string(trim($_GET['prodID']));
			$userID=$this->session->userdata('ID');
			$sql2 = "SELECT Item_id FROM Cart WHERE Item_id='$prodID'";
			$query2 =$this->db->query($sql2);
			if($query2->num_rows()<1){
				
				$sql = "SELECT  Item_id, Price
				FROM Item_Price
				WHERE Item_id='$prodID'
				AND isCurrent=1
				AND isActive=1";
				$query = $this->db->query($sql);
				if($query){
					while ($result = mysql_fetch_array($query->result_id)){
						$itemPrice = $result['Price'];
					}
					$totalCharge = ($itemPrice* $qty) ;
					$sql1 = "INSERT INTO `Cart`(`Item_id`, `Qty`, `Charge`, `Net_Charge`, `Added_by`, `Added_on`, `isActive`)
					VALUES ('$prodID','$qty','$itemPrice','$totalCharge',$userID,NOW(),1 )";
					$query1 = $this->db->query($sql1);
					if($query1){
						$this->output->set_output(json_encode(array (
								"status"=>"success"
						)));
					}
					else {
						$this->output->set_output(json_encode(array (
								"status"=>"add_fail"
						)));
					}
				}
				
			}
			else {
				$this->output->set_output(json_encode(array (
						"status"=>"already_added"
				)));
			}
		}
		else{
			$this->output->set_output(json_encode(array (
					"status"=>"login_first"
			)));
		}
	}
	//end add_to_cart
	//delete from cart
	public function deleteFromCart(){
		$cartID = mysql_real_escape_string(trim($_GET['id']));
		
		if($this->session->userdata("LOGIN")){
			$userID=$this->session->userdata('ID');
			$sql = "DELETE FROM Cart WHERE ID='$cartID'";
			$data['UserId'] = $userID; 
			$query = $this->db->query($sql);
			
			if($query){
				$this->load->view('data/cart_data',$data);
			}
		}
		else{
			
		}
	}
	public function updateCart(){
		$cartID = mysql_real_escape_string(trim($_GET['id']));
		$qty = mysql_real_escape_string(trim($_GET['qty']));
		if($this->session->userdata("LOGIN")){
			$userID=$this->session->userdata('ID');
			if($qty<1){
				$qty=1;
			}
			
			$sql = "UPDATE Cart SET Cart.Qty='$qty',
					Cart.Charge=(SELECT Price FROM Item_Price WHERE Item_id=Cart.Item_id AND isCurrent=1),
					Cart.Net_Charge=(SELECT Price FROM Item_Price WHERE Item_id=Cart.Item_id AND isCurrent=1)*$qty
					
					 WHERE Cart.ID='$cartID'
					";
			$data['UserId'] = $userID;
			$query = $this->db->query($sql);
				
			if($query){
				$this->load->view('data/cart_data',$data);
			}
		}
		else{
				
		}
	}
	//end delete from cart
	//shipping details
	public function shippingDetails(){
		if($this->session->userdata("LOGIN")){
			$name = mysql_real_escape_string(trim($_GET['name']));
			$address = mysql_real_escape_string(trim($_GET['address']));
			$state = mysql_real_escape_string(trim($_GET['state']));
			$city = mysql_real_escape_string(trim($_GET['city']));
			$pincode = mysql_real_escape_string(trim($_GET['pincode']));
			$mobile = mysql_real_escape_string(trim($_GET['mobile']));
			$userID = $this->session->userdata('ID');
			$data['UserID'] = $userID;
			$sql = "INSERT INTO `Shipping_Details`(`Name`, `Address`, `State`, `City`, `Pincode`, `Mobile`, `Added_by`, `Added_on`,`isActive`)
					 VALUES ('$name','$address','$state','$city','$pincode','$mobile','$userID',NOW(),1)";
			$query = $this->db->query($sql);
			if($query){
				$this->load->view('data/checkout_data',$data);
			}
		}
		else{
			redirect('login');
		}
		
	}
	//end shipping details 
	//select Shipping
	public function selectShipping(){
		if($this->session->userdata("LOGIN")){
			$shippingID = mysql_real_escape_string(trim($_GET['id']));
			$sql = "SELECT Name, Address, State, City, Pincode, Mobile
					 FROM Shipping_Details` 
					WHERE ID ='$shippingID' 
					AND isActive=1";
			$query = $this->db->query($sql);
			if($query){
				while ($result = mysql_fetch_array($query->result_id)){
					$pincode = $result['Pincode'];
				}
				$sql1 ="SELECT Pincode,Time,Rate 
						FROM Shipping 
						 WHERE Pincode = '$pincode' 
						AND isActive=1";
				$query1 = $this->db->query($sql1);
				if($query1->num_rows()>0){
					while($result1 = mysql_fetch_array($query1->result_id)){
						$time = $result1['Time'];
						$rate = $result1['Rate'];
					}
				}
				else{
					
				}
			}
			
		}
	}
	//end select shipping

	//shipping order details
	public function selectShippingOrderDetails(){
		if($this->session->userdata('LOGIN')){
			$userID = $this->session->userdata('ID');
			$shippingID = mysql_real_escape_string(trim($_GET['id']));
			$sql="SELECT Name, Address, State, City, Pincode, Mobile,isActive
			FROM Shipping_Details
			WHERE ID='$shippingID'";
			$query=$this->db->query($sql);
			if($query){
				while($result = mysql_fetch_array($query->result_id)){
					$name = $result['Name'];
					$address =$result['Address'];
					$state = $result['State'];
					$city = $result['City'];
					$pincode =$result['Pincode'];
					$mobile= $result['Mobile'];
					$orderNo="";
					$sql1="SELECT CONCAT(CAST('ODR' AS CHAR),YEAR(NOW()),CASE WHEN COUNT(*)=0 THEN 1 ELSE COUNT(*) END) AS OrderNo FROM Order_Header WHERE YEAR(Added_on)=YEAR(NOW())";
					$query1=$this->db->query($sql1);
					if($query1){
						while($result1 = mysql_fetch_array($query1->result_id)){
							$orderNo=$result1['OrderNo'];
						}
					}
					
				}
				$sql2 = "SELECT `ID`, `Item_id`, `Qty`, `Charge`, `Net_Charge` 
						FROM `Cart` 
						WHERE Added_by='$userID'
						AND isActive = 1";
				$query2 = $this->db->query($sql2);
				if($query2){
					while($result2 = mysql_fetch_array($query2->result_id)){
						$itemID = $result2['Item_id'];
						$qty = $result2['Qty'];
						$charge = $result2['Charge'];
						$netCharge =$result2['Net_Charge'];
					}
					$sql3="SELECT `Pincode`, `Time`, `Rate` FROM `Shipping` WHERE isActive=1 AND Pincode='$pincode'";
					$query3 = $this->db->query($sql3);
					if($query3){
						while ($result3 = mysql_fetch_array($query3->result_id)){
							$rate = $result3['Rate'];
							$time = $result3['Time'];
						}
					}
				}
				$sql4="INSERT INTO `Order_Header`(`Order_No`, `Qty`, `Item_id`, `Item_price`, `Name`, `Address`, `State`, `City`, `Pincode`, `Mobile`, `Order_status`, `Shipping_charge`, `Total_amount`, `Added_by`, `Added_on`, `isActive`) 
						VALUES ('$orderNo','$qty','$itemID','$charge','$name','$address','$state','$city','$pincode','$mobile','','$rate','$netCharge','$userID',NOW(),1)";
			}
		}
	}
	//end order shipping details

	//search item 
	public function itemSearch(){
		$searchValue= mysql_real_escape_string(trim($_GET['searchValue']));
		$sql = "SELECT Item.ID AS ID, Item.Code AS Code, Item.Title AS Title, Item.Category_id AS CategoryID, Item.Brand_id AS BrandID, Item.Description AS Description,
				Brand.Description AS Brand_Name,
                Category.Description AS Category_Name
				FROM Item Item 
                LEFT JOIN Brand Brand ON Brand.ID = Item.Brand_id
                LEFT JOIN Category Category ON Category.ID = Item.Category_id
				WHERE Item.isActive=1
				AND Item.isPublish
				AND ";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			$data=array();
			while ($result = mysql_fetch_array($query->result_id)){
				$data['id']=$result['ID'];
				$data['code']=$result['Code'];
				$data['title']=$result['Title'];
				$data['categoryId']=$result['CategoryID'];
				$data['brandId']=$result['BrandID'];
				$data['description']=$result['Description'];
				$data['brandName']=$result['Brand_Name'];
				$data['categoryName']=$result['Category_Name'];
			}
			$this->output->set_output(json_encode($data));
		}
		else{
			$this->output->set_output(json_encode(array(
					"status"=> "fail"
			)));
		}
	}
	//end search item

}