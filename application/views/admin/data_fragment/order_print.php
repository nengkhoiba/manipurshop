<style>
		.vl {
		    border-left: 1px solid black;
		    height: 500px;
		}
	</style>
<?php $id = $ordPrintId;
	$sql="SELECT oh.Order_No as Ord_No, oh.Qty as Qty, oh.Item_id, oh.Item_price as Item_price, oh.Name as Name, oh.Address as Address, oh.State as State, oh.City as City, oh.Pincode as Pincode, oh.Mobile as Mobile, oh.Order_status, oh.Shipping_charge, oh.Total_amount as Total_amount , oh.Added_by, oh.Added_on,
Item.Title as title, s.Rate as Ship_Charge
		 FROM Order_Header oh
         LEFT JOIN Item Item ON Item.ID = oh.Item_id
         LEFT JOIN Shipping s ON s.Pincode = oh.Pincode
         WHERE oh.ID='$id'
		 AND  oh.isActive='1'
"; 
	$query=$this->db->query($sql);
	if($query){
		while ($result=mysql_fetch_array($query->result_id)){
			?>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<table>
						<thead>
							<th><h3><u>Product Details</u></h3></th>
						</thead>
						<tbody>
							 <tr>
								      <th scope="row">Product Name:</th>
									<td><?php echo $result['title'];?></td>   
								    </tr>
								    <tr>
								      <th scope="row">Quantity:</th>
								      <td><?php echo $result['Qty'];?></td>
								    </tr>
								    <tr>
								    	<th scope="row">Price:</th>
								    	<td><span>₹ </span><?php echo $result['Item_price'];?></td>
								    </tr>
								    <tr>
								    	<th scope="row">Handling Charge:</th>
								    	<td>Rs 300</td>
								    </tr>
								    <tr>
								    	<th scope="row">Shipping Charge:</th>
								    	<td><span>₹ </span><?php echo $result['Ship_Charge'];?></td>
								    </tr>
								    <tr>
								    	<th scope="row">Total Amount:</th>
								    	<td><span>₹ </span><?php echo $result['Ship_Charge']+$result['Total_amount'];?></td>
								    </tr>
						</tbody>
						</table>
					</div>
					<div class="col-md-6 vl">
						<table>
						<thead>
							<th><h3><u>Customer Details</u></h3></th>
						</thead>
						<tbody>
							<tr>
								<th scope="row">Name:</th>
								<td><?php echo $result['Name'];?></td>
							</tr>
							<tr>
								<th>Address:</td>
								<td><?php  echo $result['Address'];?></td>
								<td><?php  echo $result['State'];?></td>
								<td><?php  echo $result['City'];?></td>
								<?php  echo $result['Pincode'];?>
								</td>
							</tr>
							<tr>
								<th scope="row">Mobile:</th>
								<td><?php  echo $result['Mobile'];?></td>
							</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
			
			
			
			<?php 		
		}
	}
?>
