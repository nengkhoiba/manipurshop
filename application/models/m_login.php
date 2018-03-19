<?php
class m_login extends CI_Model{
    
	function __construct(){
		parent::__construct();
	}
	
function validate($loginId,$password)
	{
		$sql = "SELECT 
Login.ID,
Login.Email AS Email,
Login.Name AS Name

FROM Customer_login Login
WHERE 

Login.Email='$loginId'
AND Login.Password='$password'
AND Login.isActive=1";
	
		$query = $this->db->query($sql);
	
		return $query->result();
	}

}