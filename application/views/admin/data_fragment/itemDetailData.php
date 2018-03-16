 
 <table  id="itemDetail_data" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       		
                                       		
                                       		$sql="SELECT `ID`, `Item_id`, `Title`, `Description`, FROM `Item_Details` WHERE Item_id = ";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       				
                                       				 <tr>
			                                        	<td><?php echo $result['ID']; ?></td>
			                                        	<td><?php echo $result['Code']; ?></td>
			                                        	<td><?php echo $result['Description']; ?></td>
			                                        	<td><?php echo $result['Added_on']; ?></td>
			                                        	<td><i style="cursor: pointer;" class="fa fa-edit" onclick="edit('<?php echo $result['ID'];?>','<?php echo $result['Title'];?>','<?php echo $result['Description'];?>')" ></i></td>
			                                        	<td><i style="cursor: pointer" onclick="remove('<?php echo $result['ID']; ?>')" class="fa fa-remove"></i></td>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>