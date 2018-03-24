<?php
class m_login extends CI_Model{
    
	function __construct(){
		parent::__construct();
	}
	
function validate($loginId,$password)
	{
		$sql = "SELECT 
Login.ID,
User_Role.Code AS ROLE,
User_Details.Name AS NAME

FROM Login Login
LEFT JOIN User_Details User_Details On User_Details.ID=Login.ID
LEFT JOIN User_Role User_Role ON User_Role.ID=Login.Role

WHERE 

Login.Email='$loginId'
AND Login.Password='$password'
AND Login.isActive=1
AND Login.Status=1";
	
		$query = $this->db->query($sql);
	
		return $query->result();
	}

}