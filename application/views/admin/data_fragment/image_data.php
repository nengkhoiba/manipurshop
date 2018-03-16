     <?php 
                                       		
                                       		
                                       		$sql="SELECT
												ID, 
												Image_Url
												FROM Item_Image
												WHERE isActive =1 
												AND Item_id=$ItemID";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       			<div class="col-sm-6 col-md-3">
												    <div class="thumbnail">
												      <img src="<?php echo base_url();?><?php echo $result['Image_Url']; ?>" alt="image">
												      
												        <a href="#" onclick="removeItemImage('<?php echo $result['ID']; ?>')" class="btn btn-xs btn-danger" role="button">Remove</a>
												      
												    </div>
										  		</div>
                                          	<?php
                                       			}
                                       		}
                                       ?>