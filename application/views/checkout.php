<?php $this->load->view('data/global_header.php');?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="row">
				<div class="step-one">
				<h2 class="heading" >Shipping Address</h2>
				<div  class=" col-sm-12" id="shippingContainer">
				<?php $data['UserID']=$UserID;
					$this->load->view('data/checkout_data',$data);?>
				</div>
				
			</div>
			</div>
			

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
								<input type="text" name="nameShipping" id="nameShipping" placeholder="Name">
								<input type="text" name ="addressShipping" id="addressShipping" placeholder="Address">
								<input type="text" name="stateShipping" id="stateShipping" placeholder="State">
								<input type="text" name="cityShipping" id="cityShipping" placeholder="City">
								<input type="text" name="pincodeShipping" id="pincodeShipping" placeholder="Pincode">
								<input type="text" name="mobileShipping" id="mobileShipping" placeholder="Mobile">
							<a class="btn btn-primary" onClick="saveShippingAddress()">Save</a>
							<a class="btn btn-primary" onClick="shippingOrderDetails()" >Continue</a>
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<div id="shippingSelectContainer" style="padding: 10px;color: #6f6d6d;" class="shipping order-message">
							Select your shipping address
							</div>
						
						</div>	
					</div>					
				</div>
			</div>
		</div>
		<br>
		<?php $this->load->view('data/global_footer.php');?>
		<script>
		var shippingId=0;
			function saveShippingAddress(){
				
				  var url = '<?php echo base_url();?>product_data/shippingDetails?name='+document.getElementById('nameShipping').value+'&address='+document.getElementById('addressShipping').value+
				  			'&state='+document.getElementById('stateShipping').value+'&city='+document.getElementById('cityShipping').value+'&pincode='+document.getElementById('pincodeShipping').value+
				  			'&mobile='+document.getElementById('mobileShipping').value+'&userID='+<?php echo $UserID;?>;
				  			
				  			var xmlHttp = GetXmlHttpObject();
						  	if (xmlHttp != null) {
						  		try {
						  			xmlHttp.onreadystatechange=function() {
						  			if(xmlHttp.readyState == 4) {
						  				if(xmlHttp.responseText != null){
						  					$('#loading').hide();
						  					document.getElementById('shippingContainer').innerHTML = xmlHttp.responseText;
						  				
						  				}else{
						  					alert("Error");
						  				}
						  			}
						  		}
						  		xmlHttp.open("GET", url, true);
						  		xmlHttp.send(null);
						  	}
						  	catch(error) {}
						  	}
				}
			function selectShipping(id){
				shippingId=id;
				var url = '<?php echo base_url();?>product_data/selectShipping?id='+id;
	  			
	  			var xmlHttp = GetXmlHttpObject();
			  	if (xmlHttp != null) {
			  		try {
			  			xmlHttp.onreadystatechange=function() {
			  			if(xmlHttp.readyState == 4) {
			  				if(xmlHttp.responseText != null){
			  					$('#loading').hide();
			  					document.getElementById('shippingSelectContainer').innerHTML = xmlHttp.responseText;
			  				
			  				}else{
			  					alert("Error");
			  				}
			  			}
			  		}
			  		xmlHttp.open("GET", url, true);
			  		xmlHttp.send(null);
			  	}
			  	catch(error) {}
			  	}
				
			}

			function shippingOrderDetails(){
				var id = shippingId;
				var url = '<?php echo base_url();?>product_data/selectShippingOrderDetails?id='+id;
				callServiceToFetchData(url,orderReceivedReply);
			}
	  
		  function orderReceivedReply(response){
			  $('#loading').hide();
		  var sqlresponse = JSON.parse(response);
			  if(sqlresponse.status === "success"){
				  	  ITEM_ID=sqlresponse.itemID;
				  	popupmsg("Successfully saved!");
			  }
			 
		  }
				
		</script>