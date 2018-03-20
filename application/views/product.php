<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Murolen an E-Commerce platform only for manipur.">
    <meta name="author" content="">
    <title>Home | Murolen</title>
<?php $this->load->view('data/global_header')?>
	
	<section>
		<div class="container">
			<div class="row">
				<?php $this->load->view('data/global_nav')?>
				<?php $sql="SELECT 
Item.ID,				
Item.Title,
Item.Description,
Item.Item_stock,
Item.Delivery_Time,
B.Description AS Brand,
IP.Price,
(SELECT Image_Url FROM Item_Image WHERE Item_id=Item.ID AND isActive=1 LIMIT 1) AS ImageUrl,
(SELECT (SUM(Rating)/count(ID)) FROM `Item_review` WHERE Item_id=Item.ID) rating,
(SELECT Count(Rating) FROM `Item_review` WHERE Item_id=Item.ID) rateCount
FROM Item Item
LEFT JOIN Brand B ON B.ID=Item.Brand_id
LEFT JOIN Item_Price IP ON IP.Item_id=Item.ID
AND IP.isCurrent=1
WHERE Item.isActive=1
AND Item.isPublish=1
AND Item.ID='$ItemID'";
$query = $this->db->query($sql);
if($query){
	while ($result = mysql_fetch_array($query->result_id)){
?>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo base_url();?><?php echo $result['ImageUrl']; ?>" alt="" />
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
										<div class="item active">
									<?php $sql1="SELECT Image_Url FROM Item_Image WHERE Item_id='$ItemID' AND isActive=1";
									$query1 = $this->db->query($sql1);
									if($query){
										while ($image = mysql_fetch_array($query1->result_id)){
									?>
																	   
									  <a href=""><img src="<?php echo base_url();?><?php echo $image['Image_Url']; ?>" alt=""></a>
																	
									<?php }}?>
								</div>
									</div>	
									 
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $result['Title']; ?></h2>
								<p>Web ID: <?php echo $result['ID'];?></p>
								<span>
									<span>₹<?php echo $result['Price']; ?></span>
									<label>Quantity:</label>
									<input type="text" value="1" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> <?php echo $result['Item_stock'];?> In Stock</p>
								<p><b>Delivery:</b> <?php echo $result['Delivery_Time'];?> hrs After Order</p>
								<p><b>Brand:</b> <?php echo $result['Brand'];?></p>
								<p><b>Rating: <i class="fa fa-star"></i></b> <?php echo $result['rating'];?>/5(<?php echo $result['rateCount'];?>)</p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li ><a href="#details" data-toggle="tab">Details</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade " id="details" >
								 <table  id="item_details_data" class="table table-striped table-bordered table-hover">
                                 
                                    <tbody>
                                       <?php 
                                       		
                                       		
                                       		$sql="SELECT ide.ID, ide.Item_id, ide.Title, ide.Description ,Item.isPublish as isPublish
												FROM Item_Details ide
												LEFT JOIN Item Item ON Item.ID = ide.Item_id
												WHERE ide.isActive=1 
												AND ide.Item_id=$ItemID";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       				
                                       				 <tr>
			                                        	<td><?php echo $result['Title']; ?></td>
			                                        	<td><?php echo $result['Description']; ?></td>
			                                        	
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>
							</div>
							
							
							
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
								<ul >
								<li id="reviewData">
								<?php
								$data['itemID']=$ItemID;
								$this->load->view('data/reviewData',$data);?>
								</li>
								</ul>
									
									<p><b>Write Your Review</b></p>
									
										<textarea id="reviewText" placeholder="Review"></textarea>
											<div class="stars">
											    <input value="5" class="star star-5" id="star-5" type="radio" name="star"/>
											    <label class="star star-5" for="star-5"></label>
											    <input value="4" class="star star-4" id="star-4" type="radio" name="star"/>
											    <label class="star star-4" for="star-4"></label>
											    <input value="3"  class="star star-3" id="star-3" type="radio" name="star"/>
											    <label class="star star-3" for="star-3"></label>
											    <input value="2" class="star star-2" id="star-2" type="radio" name="star"/>
											    <label  class="star star-2" for="star-2"></label>
											    <input value="1" class="star star-1" id="star-1" type="radio" name="star"/>
											    <label class="star star-1" for="star-1"></label>
											</div>
										<button type="button" onclick="submitReview()" class="btn btn-default pull-right">
											Submit
										</button>
							
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					<?php }
	}?>
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">	
									<?php $this->load->view('data/recomended_item');?>
							
							</div>
									
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	<?php $this->load->view('data/global_footer');?>
	<script type="text/javascript">
	<?php if($this->session->userdata("LOGIN")){?>
	var rate="0";
	var ITEM_ID="<?php echo $ItemID;?>"	
	function submitReview() {
		
		  //run form validation
		  if(document.getElementById('reviewText').value.trim()==""){

			  popupmsg("Please write some review first!");
	        return;
		 }
		  else if(rate=="0"){
			  popupmsg("Please give your rating.");
			  return;
		  }	 
			 else{
			 document.getElementById('msgbox').innerHTML="";
			 
			 }
		  //end form validation
		  
		  $('#loading').show();
		  var url = '<?php echo base_url();?>product_data/addReview?review='+document.getElementById('reviewText').value+'&rate='+rate+"&item_id="+ITEM_ID;
		  	var xmlHttp = GetXmlHttpObject();
		  	if (xmlHttp != null) {
		  		try {
		  			xmlHttp.onreadystatechange=function() {
		  			if(xmlHttp.readyState == 4) {
		  				if(xmlHttp.responseText != null){
		  					$('#loading').hide();
		  					document.getElementById('reviewData').innerHTML = xmlHttp.responseText;
		  				
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
	 $(':radio').change(function() {
		 rate=this.value;
		});
		
	 function popupmsg(message){
			var msg="<div class='msgbox alert alert-danger ' >"+
			   message+"</div>";
		     document.getElementById('msgbox').innerHTML=msg;
		     $(".msgbox").fadeTo(1500, 500).slideUp(500, function(){(".msgbox").slideUp(500);});
		}
	<?php }else{?>
	function submitReview() {
         window.open("<?php echo base_url();?>login","_self");
		}
	<?php }?>
	</script>
	
	