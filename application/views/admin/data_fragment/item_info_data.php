<table  id="item_info_data" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>ID</th>
<th>Code</th>
<th>Title</th>
<th>Category</th>
<th>Brand</th>
<th>Added-On</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php


$sql="SELECT Item.ID AS ID,Item.Code AS Code,Item.Description as Description ,Item.item_Stock as Stock,Item.Added_on as Add_On ,
c.Description as Category_Name,b.Description as Brand_Name
FROM Item Item
LEFT JOIN Category c ON c.ID=Item.Category_id 
LEFT JOIN Brand b ON b.ID=Item.Brand_id 
WHERE Item.isActive=1 ";
$query = $this->db->query($sql);
if($query){
	while ($result = mysql_fetch_array($query->result_id)){
		?>
                                       				
                                       				 <tr  >
			                                        	<td><?php echo $result['ID']; ?></td>
			                                        	<td><?php echo $result['Code']; ?></td>
			                                        	<td><?php echo $result['Description']; ?></td>
			                                        	<td><?php echo $result['Category_Name'];?></td>
			                                        	<td><?php echo $result['Brand_Name'];?></td>
			                                        	<td><?php echo $result['Add_On']; ?></td>
			                                        	<td><i style="cursor: pointer;" class="fa fa-edit" onclick="loadItem('<?php echo $result['ID']; ?>')" ></i></td>
			                                        	<td><i style="cursor: pointer" onclick="removeItemMaster('<?php echo $result['ID']; ?>')" class="fa fa-remove"></i></td>
			                                        </tr>
                                       				
                                       				<?php
                                       			}
                                       		}
                                       ?>
                                        
                                       
                                    </tbody>
                                </table>