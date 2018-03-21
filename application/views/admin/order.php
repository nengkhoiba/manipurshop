<?php $this->load->view('admin/global/header.php')?>
<div class="container">
	<br>
	<table  class="table table-striped table-bordered table-hover">
	<thead>
	<tr>
	<th>ID</th>
	<th>Order No.</th>
	<th>Quality</th>
	<th>Item</th>
	<th>Item Price</th>
	<th>Name</th>
	<th>Address</th>
	<th>State</th>
	<th>City</th>
	<th>Pincode</th>
	<th>Mobile</th>
	<th>Order Status</th>
	<th>Shipping Charge</th>
	<th>Total Amount</th>
	<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT `ID`, `Order_No`, `Qty`, `Item_id`, `Item_price`, `Name`, `Address`, `State`, `City`, `Pincode`, `Mobile`, `Order_status`, `Shipping_charge`, `Total_amount` FROM `Order_Header` 
			WHERE isActive=1 ORDER BY ID DESC";
	$query = $this->db->query($sql);
	if($query){
		while ($result = mysql_fetch_array($query->result_id)){
			?>
			<tr>
				<td><?php echo $result['ID'];?></td>
				<td><?php echo $result['Order_No'];?></td>
				<td><?php echo $result['Qty'];?></td>
				<td><?php echo $result['Item_id'];?></td>
				<td><?php echo $result['Item_price'];?></td>
				<td><?php echo $result['Name'];?></td>
				<td><?php echo $result['Address'];?></td>
				<td><?php echo $result['State'];?></td>
				<td><?php echo $result['City'];?></td>
				<td><?php echo $result['Pincode'];?></td>
				<td><?php echo $result['Mobile'];?></td>
				<?php if($result['Order_status'] == 1){ ?>	
				<td> <a  class="label label-info" >Undelivered</a> </td>
				<?php } else{ ?>
					<td> <a  class="label label-success" >Delivered</a> </td>
				<?php }
				?>
				<td><?php echo $result['Shipping_charge'];?></td>
				<td><a class="label label-success"><?php echo $result['Total_amount'];?></a></td>
				<td><i style="cursor: pointer" class="fa fa-remove"></i></td>
				
			</tr>
			
	<?php }
	}
	?> 
	
	                                    </tbody>
	                                </table>
</div>
<?php $this->load->view('admin/global/footer.php')?>