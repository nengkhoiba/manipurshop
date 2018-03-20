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
}