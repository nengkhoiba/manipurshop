 
 <table  id="shipping_data" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ref. No.</th>
                                            <th>Pincode</th>
                                            <th>Time</th>
                                            <th>Amount</th>
                                            <th>Added-By</th>
                                            <th>Added-On</th>
                                            <th>Edit</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       		
                                       		
                                       		$sql="SELECT `ID`, `Pincode`, `Time`, `Rate`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`,
												 `isActive` FROM `Shipping` WHERE  
													isActive = 1	 ";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       				
                                       				 <tr>
			                                        	<td><?php echo $result['ID']; ?></td>
			                                        	<td><?php echo $result['Pincode']; ?></td>
			                                        	<td><?php echo $result['Time']; ?></td>
			                                        	<td><?php echo $result['Rate']; ?></td>
			                                        	<td><?php echo $result['Added_by']; ?></td>
			                                        	<td><?php echo $result['Added_on']; ?></td>
			                                        	<td><i style="cursor: pointer;" onclick="edit('<?php echo $result['ID'];?>','<?php echo $result['Pincode'];?>')" class="fa fa-edit"></i></td>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>