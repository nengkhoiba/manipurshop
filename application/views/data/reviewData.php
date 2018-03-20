<?php
$sql="SELECT IR.ID, 
		IR.Item_id,
		IR.Rating,
		IR.Review, 
		CL.Name,
		DATE(IR.Added_on) AS AddedDate,
		TIME(IR.Added_on) AS AddedTime
		
		
		FROM Item_review IR
		LEFT JOIN Customer_login CL ON CL.ID=IR.Added_by
		WHERE IR.Item_id='$itemID'
		AND IR.isActive=1
        ORDER BY IR.ID DESC
";
		$query = $this->db->query($sql);
		if($query->num_rows>0){
		
			while ($result = mysql_fetch_array($query->result_id)){
				?>
		
								
									<ul>
										<li><a href=""><i class="fa fa-user"></i><?php echo $result['Name'];?></a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><?php echo $result['AddedTime'];?></a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i><?php echo $result['AddedDate'];?></a></li>
										<li><a href=""><i class="fa fa-star"></i><?php echo $result['Rating'];?>/5</a></li>
									</ul>
									<p><?php echo $result['Review'];?></p>
									<hr>
								
		
		<?php }
		}?>