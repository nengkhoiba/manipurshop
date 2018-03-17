 
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
                                       		
                                       		
                                       		$sql="SELECT `ID`, `Item_id`, `Title`, `Description`
													FROM `Item_Details` 
													WHERE isActive=1 
													AND Item_id=$ItemID";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       				
                                       				 <tr>
			                                        	<td><?php echo $result['ID']; ?></td>
			                                        	<td><?php echo $result['Title']; ?></td>
			                                        	<td><?php echo $result['Description']; ?></td>
			                                        	<td><i style="cursor: pointer;" class="fa fa-edit" onclick="editItemDetail('<?php echo $result['ID'];?>','<?php echo $result['Title'];?>','<?php echo $result['Description'];?>')" ></i></td>
			                                        	<td><i style="cursor: pointer" onclick="removeItemDetail('<?php echo $result['ID']; ?>')" class="fa fa-remove"></i></td>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>
                                