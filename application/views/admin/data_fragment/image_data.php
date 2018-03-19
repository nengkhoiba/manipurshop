     <?php 
                                       		
                                       		
                                       		$sql="SELECT img.ID,img.Image_Url, Item.isPublish as isPublish
													FROM Item_Image img
													LEFT JOIN Item Item ON Item.ID = img.Item_id
													WHERE img.isActive =1 
													AND Item_id=$ItemID";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       			<div class="col-sm-6 col-md-3">
												    <div class="thumbnail">
												      <img src="<?php echo base_url();?><?php echo $result['Image_Url']; ?>" alt="image">
												      <?php if($result['isPublish']==1) {
												      	
												      }else{?>
												      
												        <a  style="cursor: pointer;" onclick="removeItemImage('<?php echo $result['ID']; ?>')" class="btn btn-xs btn-danger" role="button">Remove</a>
												      <?php }?>
												    </div>
										  		</div>
                                          	<?php
                                       			}
                                       		}
                                       ?>