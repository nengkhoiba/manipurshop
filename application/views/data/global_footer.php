	<div id="loading" class="loading-svg">
	<img style="width:70px" src="<?php echo base_url();?>assets/images/loading.svg">
	</div>
	 <div id="msgbox" class="col-md-12">
                    
                </div>
	<footer id="footer"><!--Footer-->
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<?php 
                                       		$sql="SELECT ID, Code,Description,Added_on FROM Category WHERE isActive=1 LIMIT 5";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       					
															<li><a href="#"><?php echo $result['Description']; ?></a></li>
														
                                       				<?php
                                       			}
                                       		}
                                       ?>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Murolen</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Murolen</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2018 Murolen. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" >Nengkhoiba</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	<script>
	function addToCart(id){
			  //run form validation
			
			  if(document.getElementById('qty').value.trim()==""){				
		        return;
			 }
				 if(id==""){
						return;
					 }
				 else{
				 document.getElementById('msgbox').innerHTML="";
				 }
			  var url = '<?php echo base_url();?>product_data/addToCart?qty='+document.getElementById('qty').value+'&prodID='+id;
			  callServiceToFetchData(url,addToCartReply);
		}



function addToCartReply(response){
var sqlresponse = JSON.parse(response);
	  if(sqlresponse.status === "success"){		  
		  popupmsg("Successfully Added!");
	  }
	  if(sqlresponse.status === "add_fail"){
		  	popupmsg("Something went wrong!");
		  
	  }
	  if(sqlresponse.status === "login_first"){
		  window.open("<?php echo base_url();?>login","_self");  
		  }
	  
	  if(sqlresponse.status === "already_added"){
		  	popupmsg("Item Already Exist!");
	  }
}
function popupmsg(message){
	var msg="<div class='msgbox alert alert-danger ' >"+
	   message+"</div>";
     document.getElementById('msgbox').innerHTML=msg;
     $(".msgbox").fadeTo(1500, 500).slideUp(500, function(){(".msgbox").slideUp(500);});
}
function itemSearch(){
	  var url = '<?php echo base_url();?>product_data/itemSearch?searchValue='+document.getElementById('itemSearch').value;
	  callServiceToFetchData(url,searchItemReply);	
}
function searchItemReply(response){
	var sqlresponse = JSON.parse(response);
		  if(sqlresponse.status === "success"){		  
			  popupmsg("Successfully Added!");
		  }
		  if(sqlresponse.status === "fail"){
			  popupmsg("Item not found!");
		  }
	}
	</script>

  
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/price-range.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <script src="<?php echo base_url();?>assets/js/service.js"></script>
    
</body>
</html>