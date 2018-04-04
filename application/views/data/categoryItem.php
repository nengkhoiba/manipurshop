<?php 

$sql="SELECT ID,Description FROM Category WHERE isActive=1 LIMIT 6";
$query = $this->db->query($sql);
$flag=0;
?>

<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
							<?php if($query){
								while ($result = mysql_fetch_array($query->result_id)){
								if ($flag==0){
									$flag=1;
									?>
									<li class="active"><a href="#<?php echo $result['ID'];?>" data-toggle="tab"><?php echo $result['Description'];?></a></li>
									<?php 
								}else{
									?>
									<li ><a href="#<?php echo $result['ID'];?>" data-toggle="tab"><?php echo $result['Description'];?></a></li>
									<?php 
								}
								}
								}?>
								
							</ul>
						</div>
						<div class="tab-content">
						<?php $sql1="SELECT ID,Description FROM Category WHERE isActive=1 LIMIT 6";
							$query1 = $this->db->query($sql1);
							$flag1=0;
							if($query1){
								while ($result1 = mysql_fetch_array($query1->result_id)){
								
								?>
							<div class="tab-pane fade <?php if($flag1==0){echo "active";}?> in" id="<?php echo $result1['ID'] ?>" >
							
							<?php
							$flag1=1;
						$cat_id=$result1['ID'];
						$sql2="SELECT
						Item.ID
						,Item.Title
						,IP.Price
						,(SELECT Image_Url FROM Item_Image WHERE Item_id=Item.ID AND isActive=1 LIMIT 1) AS ImageUrl
						FROM Item Item
						LEFT JOIN Item_Price IP ON IP.Item_id=Item.ID
						AND IP.isCurrent=1
						
						WHERE Item.isActive=1
						AND Item.isPublish=1
						AND Item.Category_id='$cat_id'
						ORDER BY Item.ID DESC
						LIMIT 4";
						$query2 = $this->db->query($sql2);
						if($query2){
							while ($result2 = mysql_fetch_array($query2->result_id)){
								?>
                        <div style="cursor: pointer;" class="col-sm-3" >
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img onclick="itemClick('<?php echo $result2['ID']; ?>')" src="<?php echo base_url();?><?php echo $result2['ImageUrl']; ?>" alt="" />
										<h2>₹ <?php echo $result2['Price']; ?></h2>
										<p><?php echo $result2['Title']; ?></p>
										<a onclick="addToCart(<?php echo $result2['ID']?>)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
								
							</div>
						</div>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
							
								
								
							</div>
							<?php }
								}?>
							
							</div>
						</div>
					</div><!--/category-tab-->
					