<table  id="item_info_data" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>ID</th>
<th>Username</th>
<th>Email</th>
<th>Password</th>
<th>Role</th>
<th>Gender</th>
<th>Address</th>
<th>Mobile</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php


$sql="SELECT l.ID, l.Email, l.Password, l.Key, l.Role, 
		FROM Login l 	
		WHEREl.isActive=1 ";
$query = $this->db->query($sql);
if($query){
	while ($result = mysql_fetch_array($query->result_id)){
		?>
                                       				
                                       				 <tr  >
			                                        	<td><?php echo $result['l.ID']; ?></td>
			                                        	<td><?php echo $result['']; ?></td>
			                                        	<td><?php echo $result['']; ?></td>
			                                        	<td><?php echo $result[''];?></td>
			                                        	<td><?php echo $result[''];?></td>
			                                        	<td><a  class="label label-warning" ><?php echo $result[''];?></a></td>
			                                        	<td><?php echo $result['']; ?></td>
			                                        	<?php if($result['']==0){?>
						                                <td> <a  class="label label-info" >Male</a> </td>
						                                <?php }else{?>
						                                <td> <a   class="label label-success"  >Female</a> </td>
						                                <?php }?>
			                                        	<td><i style="cursor: pointer;" class="fa fa-edit" onclick="loadItem('<?php echo $result['ID']; ?>','<?php echo $result['isPublish']?>')" ></i></td>
			                                        	<td><i style="cursor: pointer" onclick="removeItemMaster('<?php echo $result['ID']; ?>')" class="fa fa-remove"></i></td>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>