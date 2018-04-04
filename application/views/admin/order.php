<?php $this->load->view('admin/global/header.php')?>
<div class="container">
	<div class="container-fluid" id="msqbox">
	</div>
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
				<td> <a class="label label-info" >Confirmed Order?</a> 
					<a class="label label-success">Confirmed</a>
					<a class="label label-danger">Rejected</a>
				</td>
				<?php } if($result['Order_status']== 0){ ?>
					<td> <a  class="label label-success" >Delivered?</a> 
						<a class="label label-primary" onClick="orderConfirm('<?php echo $result['ID'];?>')">Shipment Out For Deliver</a>
						<a class="label label-warning">Unable To Deliver</a>
					</td>
				<?php }
				if ($result['Order_status']== 4){
					?>
					<td><a class="label label-primary">Item Delivered </a> </td>
					<?php 
				}
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
 <script>
 $(document).ready (function(){
	  $('#order').addClass('menu-top-active');
	
	 // $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){("#success-alert").slideUp(500);});
 });

 var orderStatus = 0;
 function orderConfirm(id){
	 orderStatus=4;
	 var url = "<?php echo base_url();?>admin/data_controller/orderStatusSet?orderID="id+"&status="+orderStatus;
	 callServiceToFetchData(url,confirmOrderStatusReply);
 }



 function confirmOrderStatusReply(response){
 var sqlresponse = JSON.parse(response);
	  if(sqlresponse.status === "success"){
		  	popupmsg("Save!");
	  }
	  if(sqlresponse.status === "fali"){
		  	popupmsg("Something went wrong!");
	  }
 }

 function popupmsg(message){
		var msg="<div class='msgbox alert alert-danger ' >"+
		   message+"</div>";
	     document.getElementById('msgbox').innerHTML=msg;
	     $(".msgbox").fadeTo(1500, 500).slideUp(500, function(){(".msgbox").slideUp(500);});
	}
 </script>