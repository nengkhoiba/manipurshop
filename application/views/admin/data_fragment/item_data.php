 
 <table  id="item_data" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Title</th>
                                            <th>Brand ID</th>
                                            <th>Category ID</th>
                                            <th>Description</th>
                                            <th>Added-On</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       		
                                       		
                                       		$sql="SELECT `ID`, `Code`, `Title`, `Category_id`, `Brand_id`, `Description`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive` FROM `Item`WHERE isActive =1 ";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       				
                                       				 <tr>
			                                        	<td><?php echo $result['ID']; ?></td>
			                                        	<td><?php echo $result['Code']; ?></td>
			                                        	<td><?php echo $result['Title']?></td>
			                                        	<td><?php echo $result['Brand_id']?></td>
			                                        	<td><?php echo $result['Category_id']?></td>
			                                        	<td><?php echo $result['Description']; ?></td>
			                                        	<td><?php echo $result['Added_on']; ?></td>
			                                        	<td><i style="cursor: pointer;" class="fa fa-edit" onclick="edit('<?php echo $result['ID'];?>','<?php echo $result['Code'];?>','<?php echo $result['Title'];?>','<?php echo $result['Category_id'];?>','<?php echo $result['Brand_id']?>','<?php echo $result['Description'];?>')" ></i></td>
			                                        	<td><i style="cursor: pointer" onclick="remove('<?php echo $result['ID']; ?>')" class="fa fa-remove"></i></td>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>