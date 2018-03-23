
<?php 
						$sql = "SELECT Cart.ID AS ID , Cart.Item_id AS ItemID, Cart.Qty AS Quality, Cart.Charge AS Charge, Cart.Net_Charge AS Net_Charge, Cart.Added_on AS Time,
								(SELECT Image_Url FROM Item_Image WHERE Item_id=Cart.Item_id AND isActive=1 LIMIT 1) AS ImageUrl,
								Item.Description as Description, Item.Title AS Title
								FROM Cart Cart 
								LEFT JOIN Item Item ON Item.ID = Cart.Item_id
								WHERE Cart.Added_by='$UserId'";
						$query = $this->db->query($sql);
						if($query->num_rows()>0){
						
								?>



		<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image"></td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php 	while ($result = mysql_fetch_array($query->result_id)){?>
						<tr>
							<td class="text-center" >
								<a><img style="width: 100px" src="<?php  echo base_url();?><?php echo $result['ImageUrl'];?>" alt=""></a>
							</td>
							<td>
								<h4><a href="<?php echo base_url();?>product?id=<?php echo $result['ItemID'];?>"><?php echo $result['Title'];?></a></h4>
								<p>Web ID: <?php echo $result['ItemID'];?></p>
							</td>
							<td >
								<p>&#8377; <?php echo $result['Net_Charge']?></p>
							</td>
							<td class="">
								<div class="">
								
									<input style="width:40px;" type="number" name="quantity" value="1" autocomplete="off" size="2">
								
								</div>
							</td>
							<td class="">
								<p class="">&#8377; <?php echo $result['Net_Charge']?></p>
							</td>
							<td>
								<a style="cursor: pointer" onclick="removeCart('<?php echo $result['ID']; ?>')" class="cart_quantity_delete" ><i class="fa fa-times"></i></a>
							</td>
						</tr>

					
						<?php }?>
					</tbody>
				</table>
				<?php }else{
					?>
					YOUR CART IS EMPTY
					<?php 
					
				}?>