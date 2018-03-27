<?php $this->load->view('data/global_header.php');?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<?php 
     		if($this->session->userdata('status')!=null){
     		
     			$msg=$this->session->userdata('status');
     			?>
     			<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('status', null);
     		}
     		?>
			<div id="cartContainer" class="table-responsive cart_info">
				
				<?php
				$data['UserId']= $UserID;
				$this->load->view('data/cart_data.php',$data);?>
				
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row pull-right">
				
							<a class="btn btn-default check_out" href="<?php echo base_url();?>home/checkout">Check Out</a>
				
			</div>
		</div>
	</section><!--/#do_action-->
<?php $this->load->view('data/global_footer.php');?>
<script>
function removeCart(id){
	  var url = '<?php echo base_url();?>product_data/deleteFromCart?id='+id;
	  $('#loading').show();
	   	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){
	  					$('#loading').hide();
	  					document.getElementById('cartContainer').innerHTML = xmlHttp.responseText;
	  				
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
function qtyCount(id,con,cartID){
	var qty=parseInt(document.getElementById('qty'+id).innerHTML);
	var price=parseFloat(document.getElementById('price'+id).innerHTML);

	   if(con=="add"){
		   qty=qty+1;
		   updateCart(cartID,qty);
		   //document.getElementById('qty'+id).innerHTML=qty;
		   //document.getElementById('Netprice'+id).innerHTML=(qty*price);
		}else{
			if(qty<=1){
				popupmsg("Quantity cannot be less then 1");
				}else{
					qty=qty-1;
					 updateCart(cartID,qty);
					//document.getElementById('qty'+id).innerHTML=qty;
					//document.getElementById('Netprice'+id).innerHTML=(qty*price);
					}
			}
}
function updateCart(id,qty){
	  var url = '<?php echo base_url();?>product_data/updateCart?id='+id+'&qty='+qty;
	  $('#loading').show();
	   	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){
	  					$('#loading').hide();
	  					document.getElementById('cartContainer').innerHTML = xmlHttp.responseText;
	  				
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
		</script>