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
	<th>Print Detail</th>
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
				<td><a onClick="popupOrder('<?php echo $result['ID'];?>')" ><i style="cursor: pointer" class="fa fa-print" ></i></a></td>
			</tr>
			
	<?php }
	}
	?> 
	
	                                    </tbody>
	                                </table>
	                                
	                                
	                                <!-- Modal -->
									  <div class="modal fade" id="myOrderModal" role="dialog">
									    <div class="modal-dialog modal-lg">
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title">Order Details</h4>
									        </div>
									        <div id="orderContainer" class="modal-body">
									        
									        </div>
									        <div class="modal-footer">
									          <button onclick="printOrder()" type="button" class="btn btn-default" data-dismiss="modal">Print</button>
									          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									        </div>
									      </div>
									    </div>
									  </div>
</div>
<?php $this->load->view('admin/global/footer.php')?>
 <script>
 $(document).ready (function(){
	  $('#order').addClass('menu-top-active');
 });

 //print order

 function printOrder(){
	 $("#orderContainer").printThis({
		  debug: false,               // show the iframe for debugging
		  importCSS: true,            // import page CSS
		  importStyle: false,         // import style tags
		  printContainer: true,       // grab outer container as well as the contents of the selector
		  loadCSS: "path/to/my.css",  // path to additional css file - use an array [] for multiple
		  pageTitle: "",              // add title to print page
		  removeInline: false,        // remove all inline styles from print elements
		  printDelay: 333,            // variable print delay
		  header: null,               // prefix to html
		  footer: null,               // postfix to html
		  base: false ,               // preserve the BASE tag, or accept a string for the URL
		  formValues: true,           // preserve input/form values
		  canvas: false,              // copy canvas elements (experimental)
		  doctypeString: "...",       // enter a different doctype for older markup
		  removeScripts: false,       // remove script tags from print content
		  copyTagClasses: false       // copy classes from the html & body tag
		});
}

 //end print order
 var orderStatus = 0;
 function orderConfirm(id){
	 orderStatus=4;
	 var url = "<?php echo base_url();?>admin/data_controller/orderStatusSet?orderID="+id+"&status="+orderStatus;
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

function popupOrder(id){
	 var url = "<?php echo base_url();?>admin/data_controller/orderPrint?orderPrintId="+id;
	 var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){
	  					$('#loading').hide();
	  					document.getElementById('orderContainer').innerHTML = xmlHttp.responseText;
	  					$('#myOrderModal').modal("show");
	  				
	  				}else{
	  					alert("Error");
	  				}
	  			}
	  		}
	  		xmlHttp.open("GET", url, true);
	  		xmlHttp.send(null);
	  	}
	  	catch(error) {}
	  	}}

 </script>