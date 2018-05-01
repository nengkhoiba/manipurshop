<?php
class Search_model extends CI_Model{
    
	function __construct(){
		parent::__construct();
	}
	
	function get_product_list($end, $start,$param,$cat,$brand,$price)
	{
		
		
		$sql="SELECT
		Item.ID
		,Item.Title
        ,Item.Description
		,IP.Price
		,(SELECT Image_Url FROM Item_Image WHERE Item_id=Item.ID AND isActive=1 LIMIT 1) AS ImageUrl
		FROM Item Item
		LEFT JOIN Item_Price IP ON IP.Item_id=Item.ID
		AND IP.isCurrent=1
        AND IP.isActive=1
        AND IP.Price BETWEEN 0 AND 9000
        LEFT JOIN Category Category ON Category.ID=Item.Category_id
        LEFT JOIN Brand Brand ON Brand.ID=Item.Brand_id
		
		WHERE 
	    Item.isActive=1
		AND Item.isPublish=1
       
		AND Item.Title like CASE WHEN '$param'='' THEN Item.Title ELSE '%".$param."%' END 
		AND Item.Category_id = CASE WHEN '$cat'='' THEN Item.Category_id ELSE '$cat' END 
		AND Item.Brand_id = CASE WHEN '$brand'='' THEN Item.Brand_id ELSE '$brand' END 
        LIMIT   $start,$end
		";
		
		$query = $this->db->query($sql);
        return $query->result();
	}
	function searchproduct($param,$cat,$brand,$price)
	{
		$sql="SELECT
		Item.ID
		,Item.Title
		,Item.Description
		,IP.Price
		,(SELECT Image_Url FROM Item_Image WHERE Item_id=Item.ID AND isActive=1 LIMIT 1) AS ImageUrl
		FROM Item Item
		LEFT JOIN Item_Price IP ON IP.Item_id=Item.ID
		AND IP.isCurrent=1
		AND IP.isActive=1
		AND IP.Price BETWEEN 0 AND 9000
		LEFT JOIN Category Category ON Category.ID=Item.Category_id
		LEFT JOIN Brand Brand ON Brand.ID=Item.Brand_id
		
		WHERE
		Item.isActive=1
		AND Item.isPublish=1
		AND Item.Title like CASE WHEN '$param'='' THEN Item.Title ELSE '%".$param."%' END 
		AND Item.Category_id = CASE WHEN '$cat'='' THEN Item.Category_id ELSE '$cat' END 
		AND Item.Brand_id = CASE WHEN '$brand'='' THEN Item.Brand_id ELSE '$brand' END 
		";
	
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	
}