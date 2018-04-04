<?php

$flag=0;
$sql="SELECT `ID`, `Title`, `Description`, `Image`, `url` FROM `Advertise` WHERE `Status`=1 AND `isActive`=1";
$query = $this->db->query($sql);
if($query){
	while ($result = mysql_fetch_array($query->result_id)){
		if($flag==0){
			$flag=1;
		
		?>
						<div class="item active">
								<div class="col-sm-6">
									<h1><span>M</span>UROLEN</h1>
									<h2><?php echo $result['Title'];?></h2>
									<p><?php echo $result['Description'];?></p>
									<a href="<?php echo $result['url'];?>" class="btn btn-default get">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url();?><?php echo $result['Image'];?>" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
							
							<?php
							
	}else{
		
		?>
		<div class="item">
								<div class="col-sm-6">
									<h1><span>M</span>UROLEN</h1>
									<h2><?php echo $result['Title'];?></h2>
									<p><?php echo $result['Description'];?></p>
									<a href="<?php echo $result['url'];?>" class="btn btn-default get">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url();?><?php echo $result['Image'];?>" class="girl img-responsive" alt="" />
									
								</div>
							</div>
		<?php 
	}}
	}?>