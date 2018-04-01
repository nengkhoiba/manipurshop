
 <table  id="" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>URL</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       		
                                       		
                                       		$sql="SELECT `ID`, `Title`, `Description`, `Image`, `url`,`Status` FROM `Advertise` WHERE isActive=1 ";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       				
                                       				 <tr>
			                                        	<td><?php echo $result['ID']; ?></td>
			                                        	<td><?php echo $result['Title']; ?></td>
			                                        	<td><?php echo $result['Description']; ?></td>
			                                        	<td><img style="width: 100px" src="<?php echo base_url();?><?php echo $result['Image']; ?>" alt="image"></td>
			                                        	<td><?php echo $result['url']?></td>
			                                        	<?php if($result['Status']==0){?>
			                                        	<td ><a class="label label-danger">Unpublish</a></td>
			                                        	<?php }else{?>
			                                        	<td ><a class="label label-success"> Publish</a></td>
			                                        	<?php }?>
			                                        	<td><i style="cursor: pointer;" class="fa fa-edit" onclick="editAdsDetails('<?php echo $result['ID'];?>','<?php echo $result['Title'];?>','<?php echo $result['Description'];?>','<?php echo $result['url']?>')" ></i></td>
			                                        	<td><i style="cursor: pointer" onclick="removeAdsDetails('<?php echo $result['ID']; ?>')" class="fa fa-remove"></i></td>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>