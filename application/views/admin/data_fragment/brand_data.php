 
 <table  id="brand_data" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ref. No.</th>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Added-By</th>
                                            <th>Added-On</th>
                                            <th>Edit</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       		
                                       		
                                       		$sql="SELECT `ID`, `Code`, `Description`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive` FROM `Brand` WHERE isActive =1 ";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       				
                                       				 <tr>
			                                        	<td><?php echo $result['ID']; ?></td>
			                                        	<td><?php echo $result['Code']; ?></td>
			                                        	<td><?php echo $result['Description']; ?></td>
			                                        	<td><?php echo $result['Added_by']; ?></td>
			                                        	<td><?php echo $result['Added_on']; ?></td>
			                                        	<td><i style="cursor: pointer;" class="fa fa-edit" onclick="edit('<?php echo $result['ID'];?>','<?php echo $result['Code'];?>')" ></i></td>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>