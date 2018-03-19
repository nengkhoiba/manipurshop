 
 <table  id="item_price_data" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 
                                       		
                                       		
												$sql="SELECT  IP.ID,IP.Price,IP.isCurrent 
												FROM Item_Price IP 
												LEFT JOIN Item Item ON Item.ID = IP.Item_id
												WHERE IP.isActive =1 
												AND IP.Item_id=$ItemID";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       			
                                            <td><?php echo $result['ID']; ?></td>
                                            <td>
                                                <label class="label label-info"><?php echo $result['Price']; ?> INR </label>
                                            </td>
                                            <?php if($result['isCurrent']==0){?>
			                                <td> <a  style="cursor: pointer;" onclick="enablePrice('<?php echo $result['ID']; ?>')"  class="btn btn-xs btn-success"  >Enable</a> </td>
			                                <?php }else{?>
			                                <td> <a  style="cursor: pointer;"  class="btn btn-xs btn-danger" disabled >Active</a> </td>
			                                <?php }?>
			                                <td><i style="cursor: pointer;" class="fa fa-edit" onclick="editItemPrice('<?php echo $result['Price'];?>','<?php echo $result['ID'];?>')" ></i></td>
			                                
			                                <?php if($result['isCurrent']==1){?>
			                                <td></td>  </tr>
			                                <?php }
			                                else {?>
			                                <td><i style="cursor: pointer" onclick="removeItemPrice('<?php echo $result['ID']; ?>')" class="fa fa-remove"></i></td>
			                                         </tr> 
                                          
                                       				<?php
                                       				}
                                       			}
                                       		}
                                       ?>
                                        
                           
                                    </tbody>
                                </table>