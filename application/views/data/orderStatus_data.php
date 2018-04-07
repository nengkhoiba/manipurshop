<table class="table table-hover">
	<thead>
    <tr>
      <th scope="col">Order No.</th>
      
    </tr>
  </thead>
  <tbody>
<?php
$userID = $this->session->userdata('ID');
$sql = "SELECT oh.ID, oh.Order_No as Number, oh.Qty as QTy, oh.Item_id as Item_id, oh.Item_price as Price, oh.Order_status, oh.Shipping_charge, oh.Total_amount, oh.Added_by, oh.Added_on, 
		Item.Title as Title,
		(SELECT Image_Url FROM Item_Image WHERE Item_id=oh.Item_id AND isActive=1 LIMIT 1) AS ImageUrl,
		Brand.Description as brandName,
		Item.Description As detailsTitle,
		os.Description as Status
		FROM Order_Header oh 
		LEFT JOIN Item Item ON Item.ID = oh.Item_id 
		LEFT JOIN Brand Brand ON Brand.ID = oh.Item_id
		LEFT JOIN Order_Status os ON os.ID= oh.Order_status
		WHERE oh.Added_by='$userID'
		AND oh.isActive=1";
$query = $this->db->query($sql);
if($query){
	while ($result = mysql_fetch_array($query->result_id)){
		?>
		<tr>
      <th scope="row"><?php echo $result['Number'];?></th>
      <td><a><img style="width: 100px" onclick="itemClick('<?php echo $result['Item_id'];?>')" src="<?php  echo base_url();?><?php echo $result['ImageUrl'];?>" alt=""></a></td>
      <td> <?php echo $result['brandName']; echo"<br>"; echo $result['Title']; echo "<br>";echo $result['QTy']; echo "<br>"; echo "₹. ".$result['Price'];?></td>
      <td><?php echo $result['Status'];?></td>
		<?php       $total = $result['Total_amount'] + $result['Shipping_charge'];?>
      <td><?php echo"Item Price ₹. ".$result['Total_amount']; echo"<br>"; echo "Shipping Charge ₹. ".$result['Shipping_charge']; echo"<br>"; echo "Total ₹. ".$total."/-"?></td>
    </tr>
		<?php 
	}
}
?>
   
  </tbody>
</table>
