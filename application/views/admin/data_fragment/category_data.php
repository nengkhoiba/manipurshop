 
 <table  id="category_data" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ref. No.</th>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       		
                                       		
                                       		$sql="SELECT `ID`, `Code`, `Description`, `Added_on`, `Added_by`, `Modified_by`, `Modified_on`, `isActive` FROM `Category` WHERE 1	 ";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       				
                                       				 <tr>
			                                        	<td><?php echo $result['ID']; ?></td>
			                                        	<td><?php echo $result['Code']; ?></td>
			                                        	<td><?php echo $result['Description']; ?></td>
			                                        	
			                                        	<td><i style="cursor: pointer;" onclick="edit()" class="fa fa-edit"></i></td>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>