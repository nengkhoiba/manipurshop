<?php 
					$sql = "SELECT ID, Name, Address, State, City, Pincode, Mobile,Added_on,Modified_by, Modified_on 
							FROM Shipping_Details 
							WHERE Added_by ='$UserID'
							AND isActive=1";
					$query = $this->db->query($sql);
					if($query){
						while ($result = mysql_fetch_array($query->result_id)){
							?>
							<div class=" col-sm-3 checkout-options" onClick="selectShipping('<?php echo $result['ID'];?>')">
								<h3><?php echo $result['Name'];?></h3>
										<p><?php echo $result['Address'];?><br>
										<?php echo $result['City'];?><br>
										<?php echo $result['State'];?><br>
										<?php echo $result['Pincode']?><br> 
										<?php echo $result['Mobile'];?></p>
										<a href=""><i class="fa fa-times"></i>Remove</a>
							</div>
						
							<?php 	
						}
					}
				?>