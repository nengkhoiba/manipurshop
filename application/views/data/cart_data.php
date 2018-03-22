<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
						<?php 
						$sql = "SELECT Cart.ID AS ID , Cart.Item_id AS ItemID, Cart.Qty AS Quality, Cart.Charge AS Charge, Cart.Net_Charge AS Net_Charge, Cart.Added_on AS Time,
								(SELECT Image_Url FROM Item_Image WHERE Item_id=Cart.Item_id AND isActive=1 LIMIT 1) AS ImageUrl,
								Item.Description as Description, Item.Title AS Title
								FROM Cart Cart 
								LEFT JOIN Item Item ON Item.ID = Cart.Item_id
								WHERE Cart.Added_by='$UserId'";
						$query = $this->db->query($sql);
						if($query){
							while ($result = mysql_fetch_array($query->result_id)){
								?>
								<tr>
									<td class="cart_product">
										<a href=""><img src="<?php  echo base_url();?><?php echo $result['ImageUrl'];?>" alt=""></a>
									</td>
									<td class="cart_description">
										<h4><a href=""><?php echo $result['Description'];?></a></h4>
										<p ><?php echo $result['Title'];?></p>
										<p><?php echo $result['ItemID'];?></p>
									</td>
									<td class="cart_price">
										<span>INR<?php echo $result['Charge']?></span>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<input class="cart_quantity_input"  style="width:55px;" type="number" name="quantity" value="<?php echo $result['Quality'];?>" autocomplete="off" size="1">
										</div>
									</td>
									<td class="cart_total">
										<span class="cart_total_price">INR<?php echo $result['Net_Charge']?></span>
									</td>
									<td class="cart_delete">
			                           
							<i style="cursor: pointer" onclick="removeCart('<?php echo $result['ID']; ?>')" class="cart_quantity_delete fa fa-times"></i>
									
								</tr>
								<?php
							}
						}
						?>
						
					</tbody>
</table>
<script>
	function removeCart(id){
		  var url = '<?php echo base_url();?>product_data/deleteFromCart?id='+id;
		  callServiceToFetchData(url,removeToCartReply);
	}
	function removeToCartReply(response){
		var sqlresponse = JSON.parse(response);
			  if(sqlresponse.status === "success"){		  
				  popupmsg("Successfully Removed!");
			  }
			  if(sqlresponse.status === "login_first"){		  
				  popupmsg("Something went wrong!");
			  }
		}
			
</script>