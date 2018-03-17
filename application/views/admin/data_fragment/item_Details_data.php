 
 <table  id="item_details_data" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
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
			                                        	<td><?php echo $result['ID']; ?></td>
			                                        	<td><?php echo $result['Title']; ?></td>
			                                        	<td><?php echo $result['Description']; ?></td>
			                                        	<td><i style="cursor: pointer;" class="fa fa-edit" onclick="editItemDetail('<?php echo $result['ID'];?>','<?php echo $result['Title'];?>','<?php echo $result['Description'];?>')" ></i></td>
			                                        	<?php if($result['isPublish']==1) {
			                                        		?><td></td><?php 
			                                        	} 
			                                        	else{?>
			                                        	
			                                        	<td><i style="cursor: pointer" onclick="removeItemDetail('<?php echo $result['ID']; ?>')" class="fa fa-remove"></i></td>
			                                        <?php }?>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>
                                