<table  id="item_info_data" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>ID</th>
<th>Code</th>
<th>Title</th>
<th>Category</th>
<th>Brand</th>
<th>Stock</th>
<th>Delivery Time</th>
<th>Handling Charge</th>
<th>Added-On</th>
<th>Is Publish</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php


$sql="SELECT Item.ID AS ID,Item.Code AS Code,Item.Title as Title ,Item.item_Stock as Stock,Item.Delivery_Time as DiliveryTime,Item.Handling_Charge as HandlingCharge ,Item.isPublish as isPublish,Item.Added_on as Add_On ,
c.Description as Category_Name,b.Description as Brand_Name
FROM Item Item
LEFT JOIN Category c ON c.ID=Item.Category_id 
LEFT JOIN Brand b ON b.ID=Item.Brand_id 
WHERE Item.isActive=1
AND Item.Category_id = CASE WHEN $CatID=0 THEN Item.Category_id ELSE $CatID END
AND Item.Brand_id = CASE WHEN $BrandID =0 THEN Item.Brand_id ELSE $BrandID END
AND Item.Code like CASE WHEN '$ItemCode'='' THEN Item.Code ELSE '%$ItemCode%' END
AND Item.Title = CASE  WHEN '$ItemTitle'='' THEN Item.Title ELSE '%$ItemTitle%' END 
ORDER BY Item.ID DESC ";
$query = $this->db->query($sql);
if($query){
	while ($result = mysql_fetch_array($query->result_id)){
		?>
                                       				
                                       				 <tr  >
			                                        	<td><?php echo $result['ID']; ?></td>
			                                        	<td><?php echo $result['Code']; ?></td>
			                                        	<td><?php echo $result['Title']; ?></td>
			                                        	<td><?php echo $result['Category_Name'];?></td>
			                                        	<td><?php echo $result['Brand_Name'];?></td>
			                                        	<td><a  class="label label-warning" ><?php echo $result['Stock'];?></a></td>
			                                        	<td><?php echo $result['DiliveryTime'];?></td>
			                                        	<td><?php echo $result['HandlingCharge']?></td>
			                                        	<td><?php echo $result['Add_On']; ?></td>
			                                        	<?php if($result['isPublish']==0){?>
						                                <td> <a  class="label label-info" >Unpublish</a> </td>
						                                <?php }else{?>
						                                <td> <a   class="label label-success"  >Publish</a> </td>
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