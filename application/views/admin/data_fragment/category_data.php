 
 <table  id="category_data" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Added On</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       	
                                       		$sql="SELECT ID, Code,Description,Added_on FROM Category WHERE isActive=1";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       				 <tr>
			                                        	<td><?php echo $result['ID']; ?></td>
			                                        	<td><?php echo $result['Code']; ?></td>
			                                        	<td><?php echo $result['Description']; ?></td>
			                                        	<td><?php echo $result['Added_on']; ?></td>
			                                        	<td><i style="cursor: pointer;" onclick="edit('<?php echo $result['ID']; ?>','<?php echo $result['Code']; ?>','<?php echo $result['Description']; ?>')" class="fa fa-edit"></i></td>
			                                        	<td><i style="cursor: pointer" onclick="remove('<?php echo $result['ID']; ?>')" class="fa fa-remove"></i></td>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                    </tbody>
                                </table>