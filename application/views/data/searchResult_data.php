<?php
$queue = $q;

$sql="SELECT
Item.ID
,Item.Title
,IP.Price
,(SELECT Image_Url FROM Item_Image WHERE Item_id=Item.ID AND isActive=1 LIMIT 1) AS ImageUrl
FROM Item Item
LEFT JOIN Item_Price IP ON IP.Item_id=Item.ID
AND IP.isCurrent=1

WHERE Item.Title LIKE '%$queue%' 
AND Item.isActive=1
AND Item.isPublish=1
ORDER BY Item.ID DESC ";
$query = $this->db->query($sql);
if($query){
	while ($result = mysql_fetch_array($query->result_id)){
		?>
                        <div style="cursor: pointer;" class="col-sm-4" >
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img onclick="itemClick('<?php echo $result['ID']; ?>')" src="<?php echo base_url();?><?php echo $result['ImageUrl']; ?>" alt="" />
										<h2>₹ <?php echo $result['Price']; ?></h2>
										<p><?php echo $result['Title']; ?></p>
										<a onclick="addToCart(<?php echo $result['ID']?>)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
								
							</div>
						</div>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>

                 