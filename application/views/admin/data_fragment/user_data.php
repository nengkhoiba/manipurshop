<table  id="item_info_data" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Username</th>
<th>Email</th>
<th>Mobile</th>
<th>Role</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php


$sql="SELECT Login.ID, Name, Address,Mobile,Login.Email,UR.Description AS Role FROM User_Details UD
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
			                                        	
			                                        	<td><i style="cursor: pointer;" class="fa fa-edit" onclick="loadItem('<?php echo $result['ID']; ?>')" ></i></td>
			                                        	<td><i style="cursor: pointer" onclick="removeItemMaster('<?php echo $result['ID']; ?>')" class="fa fa-remove"></i></td>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>