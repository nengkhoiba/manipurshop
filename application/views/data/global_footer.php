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
								<li><a href="<?php echo base_url();?>home/contact">Contact Us</a></li>
								<li><a href="<?php echo base_url();?>home/orderStatus">Order Status</a></li>
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
								<li><a href="<?php echo base_url();?>home/termandcondition">Terms & Condition</a></li>
								<li><a href="<?php echo base_url();?>home/privacypolicy">Privecy Policy</a></li>
								<li><a href="<?php echo base_url();?>home/refundpolicy">Refund Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Murolen</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?php echo base_url();?>home/companyinfo">Company Information</a></li>
								<li><a href="<?php echo base_url();?>home/storelocation">Store Location</a></li>
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
	var selectedCategory="<?php if(ISSET($_GET['c'])){echo $_GET['c'];}?>";
	var selectedBrand="<?php if(ISSET($_GET['b'])){echo $_GET['b'];}?>";
	var selectedPrice="<?php if(ISSET($_GET['p'])){echo $_GET['p'];}?>";
	function addcat(val){
		selectedCategory=val;
		itemSearchBtn();
		}
	function addBrand(val){
		selectedBrand=val;
		itemSearchBtn();
		alert(document.getElementsByName('priceRange').getAttribute(''));
	}	
	function addPrice(val){
		selectedPrice=val;
		itemSearchBtn();
	}

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
function itemSearchBtn(){
	
	  var url = '<?php echo base_url();?>home/search?q='+document.getElementById('itemSearch').value+'&c='+selectedCategory+'&b='+selectedBrand+'&p='+selectedPrice+'&per_page=1';
	  window.open(url,'_self');
}
function itemClick(id){
	window.open("<?php echo base_url();?>home/product?id="+id);
	}
function addToCart(id){
	
	  var url = '<?php echo base_url();?>product_data/addToCart?qty=1&prodID='+id;
	  callServiceToFetchData(url,addToCartReply);
}
function runScript(e) {
    if (e.keyCode == 13) {
    	itemSearchBtn();
        return false;
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