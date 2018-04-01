     <?php 
                                       		
                                       		
                                       		$sql="SELECT ID,Image
													FROM Advertise 
													WHERE isActive =1 
													AND ID ='$AdsID' ";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       			<div class="col-sm-6 col-md-3">
												    <div class="thumbnail">
												      <img src="<?php echo base_url();?><?php echo $result['Image']; ?>" alt="image">		 												     
												    </div>
										  		</div>
                                          	<?php
                                       			}
                                       		}
                                       ?>