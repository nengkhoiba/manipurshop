<table  id="item_info_data" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Username</th>
<th>Email</th>
<th>Mobile</th>
<th>Role</th>
<th>Status</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php


$sql="SELECT Login.ID AS ID,Login.Status AS Status, Name, Address,Mobile,Login.Email,UR.Description AS Role FROM User_Details UD
LEFT JOIN  Login Login on Login.ID=UD.ID
LEFT JOIN User_Role UR ON UR.ID=Login.Role
WHERE Login.isActive=1
		";
$query = $this->db->query($sql);
if($query){
	while ($result = mysql_fetch_array($query->result_id)){
		?>
                                       				
                                       				 <tr  >
			                                        	<td><?php echo $result['Name']; ?></td>
			                                        	<td><?php echo $result['Email']; ?></td>
			                                        	<td><?php echo $result['Mobile'];?></td>
			                                        	<td><a  class="label label-warning" ><?php echo $result['Role'];?></a></td>
			                                        	<?php if($result['Status']==0){ ?>
			                                           	<td><a  class="label label-info" onclick="enableUser(<?php echo $result['ID'];?>)" >Inactive</a></td>
			                                        	<?php }else{?>
			                                           	<td><a  class="label label-success" onclick="disableUser(<?php echo $result['ID'];?>)" >Active</a></td>	
			                                           	<?php }?>		                                        	
			                                        	<td><i style="cursor: pointer;" class="fa fa-edit" onclick="editUser('<?php echo $result['ID'];?>','<?php echo $result['Name'];?>','<?php echo $result['Email'];?>','<?php echo $result['Mobile'];?>','<?php echo $result['Role'];?>')" ></i></td>
			                                        	<td><i style="cursor: pointer" onclick="removeUser('<?php echo $result['ID']; ?>')" class="fa fa-remove"></i></td>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>