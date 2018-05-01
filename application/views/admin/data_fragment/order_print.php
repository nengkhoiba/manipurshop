<style>
		.vl {
		    border-left: 1px solid black;
		    height: 500px;
		}
	</style>
<?php $id = $ordPrintId;
	$sql="SELECT oh.Order_No as Ord_No, oh.Qty as Qty, oh.Item_id, oh.Item_price as Item_price, oh.Name as Name, oh.Address as Address, oh.State as State, oh.City as City, oh.Pincode as Pincode, oh.Mobile as Mobile, oh.Order_status, oh.Shipping_charge, oh.Total_amount as Total_amount , oh.Added_by, oh.Added_on,
Item.Title as title
		 FROM Order_Header oh
         LEFT JOIN Item Item ON Item.ID = oh.Item_id
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
					<p>
						<u><h3>Product Details</h3></u>
					</p>
					<label>Product Name:</label><p><?php echo $result['title'];?></p>
					<label>Quantity:</label><p><?php echo $result['Qty'];?></p>
					<label>Price:</label><p><?php echo $result['Item_price'];?></p>
					<label>Shipping charge</label><p></p><hr>
					<label>Total Amount</label><p><?php echo $result['Total_amount'];?></p>
					<hr>
					</div>
					<div class="col-md-6 vl">
					<u><h3>Customer Detali:</h3></u>
					<br>
					<label>Name:</label><p><?php echo $result['Name'];?></p><br>
					<label>Address:</label><p><?php  echo $result['Address'];?></p>
					<p><?php  echo $result['State'];?></p>
					<p><?php  echo $result['City'];?></p>
					<p><?php  echo $result['Pincode'];?></p>
					<p><?php  echo $result['Mobile'];?></p>
					</div>
				</div>
			</div>
			
			
			
			<?php 		
		}
	}
?>
