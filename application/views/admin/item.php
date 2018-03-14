	<?php $this->load->view('admin/global/header.php')?>
   
    <div class="content-wrapper">
        <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Item</h4>
                </div>

            </div>
            <div class="row">
            <ul class="nav nav-tabs">
				<li class="active">
	        		<a href="#1" data-toggle="tab">Item master</a>
				</li>
				<li>
					<a href="#2" data-toggle="tab">Item List</a>
				</li>
			</ul>

			<div class="tab-content ">
			<br>
			  <div class="tab-pane active" id="1">
			  	                  
				               
		                     <div class="Compose-Message">               
			                	<div class="panel panel-warning">
				                    <div class="panel-heading">
				                       ITEM INFO
				                    </div>
				                    <div class="panel-body">
				                     
				                       <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Item Category</span>
										  <select id="itemCategory" name="itemCategory" class="form-control"  aria-describedby="sizing-addon1">
										  	<?php 
                                       		$sql="SELECT ID, Code,Description,Added_on FROM Category WHERE isActive=1";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?><option value="<?php echo $result['ID'];?>"><?php echo $result['Description'];?></option>
                                       				<?php
                                       			}
                                       		}
                                       ?>
										  </select>
										</div>
										  <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Item Brand</span>
										  <select id="itemBrand" name="itemBrand" class="form-control" aria-describedby="sizing-addon1">
										  	<?php 
                                       		$sql="SELECT ID, Code,Description,Added_on FROM Brand WHERE isActive=1";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?><option value="<?php echo $result['ID'];?>"><?php echo $result['Description'];?></option>
                                       				<?php
                                       			}
                                       		}
                                       ?>
										  </select>
										</div>
					                     <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Item Name</span>
										  <input id="itemName" name="itemName" type="text" class="form-control" placeholder="Item" aria-describedby="sizing-addon1">
										</div>
										 <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Item Description</span>
										  <input id="itemDesc" name="itemDesc" type="text" class="form-control" placeholder="Item Description" aria-describedby="sizing-addon1">
										</div>
										<div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Item Stock</span>
										  <input id="itemStock" name="itemStock" type="text" class="form-control" placeholder="Item Stock" aria-describedby="sizing-addon1">
										</div>
					                     <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Delivery Time</span>
										  <input id="itemDelivery" name="itemDelivery" type="text" class="form-control" placeholder="In Hours" aria-describedby="sizing-addon1">
										</div>
					              		 <a href="#" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-tags"> </span>&nbsp;Save To Drafts </a>                   
				                     
				                    </div>
			                    <div class="panel-footer text-muted">
			                        <strong>Note : </strong>Please fill this first
			                    </div>
			                </div>
			  			</div>
			  			    <div class="Compose-Message">               
			                	<div class="panel panel-info">
				                    <div class="panel-heading">
				                       ITEM PRICE
				                    </div>
				                    <div class="panel-body">
				                     <div class="row">
				                     <div class="container">
					                     <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Item Price</span>
										  <input id="itemPrice" name="itemPrice" type="text" class="form-control" placeholder="Price" aria-describedby="sizing-addon1">
										</div>
										<div class="form-group">
					              		 <a href="#" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-tags"> </span>&nbsp;Save To Drafts </a>
				                     	</div>
				                     	</div>
				                     	</div>
				                     	<br>
				                     	<div class="row">
				                     	<div class="container">
				                     <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>
                                            <td>#01</td>
                                            <td>
                                                <label class="label label-info">300 USD </label>
                                            </td>
			                                <td> <a href="#"  class="btn btn-xs btn-success"  >Enable</a> </td>
                                            <td><i style="cursor: pointer;" class="fa fa-edit" ></i></td>
			                                <td><i style="cursor: pointer" class="fa fa-remove"></i></td>
                                        </tr>
                           
                                    </tbody>
                                </table>
                            </div>
                            </div>
				                    </div>
				                    </div>
			                  
			                </div>
			  			</div>
			  			<div class="Compose-Message">               
			                	<div class="panel panel-info">
				                    <div class="panel-heading">
				                       ITEM DETAILS
				                    </div>
				                    <div class="panel-body">
				                     <div class="row">
				                     <div class="container">
				                     	<div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Title</span>
										  <input id="itemDetailTitle" name="itemDetailTitle" type="text" class="form-control" placeholder="Title" aria-describedby="sizing-addon1">
										</div>
										<div class="input-group form-group input-group-sm ">
										  <span class="input-group-addon" id="sizing-addon1">Description</span>
										  <input id="itemDetailDescription" name="itemDetailDescription" type="text" class="form-control" placeholder="Description" aria-describedby="sizing-addon1">
										</div>
				                     
										<div class="form-group">
					              		 <a href="#" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-tags"> </span>&nbsp;Save To Drafts </a>
				                     	</div>
				                     	</div>
				                     	</div>
				                     	<br>
				                     	<div class="row">
				                     	<div class="container">
				                     <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
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
                                       
                                        <tr>
                                            <td>#01</td>
                                            <td>
                                                Color
                                            </td>
			                                <td> Black,Green,Blue </td>
                                            <td><i style="cursor: pointer;" class="fa fa-edit" ></i></td>
			                                <td><i style="cursor: pointer" class="fa fa-remove"></i></td>
                                        </tr>
                           
                                    </tbody>
                                </table>
                            </div>
                            </div>
				                    </div>
				                    </div>
			                  
			                </div>
			  			</div>
			  			<div class="Compose-Message">               
			                	<div class="panel panel-info">
				                    <div class="panel-heading">
				                       ITEM IMAGES
				                    </div>
				                    <div class="panel-body">
				                     <div class="row">
				                     <div class="container">
				                     	<div class="form-group">
					              		 <a href="#" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-image"> </span>&nbsp;Upload Photo</a>
				                     	</div>
				                     	</div>
				                     	</div>
				                     	<br>
				                     <div class="row">
										  <div class="col-sm-6 col-md-3">
										    <div class="thumbnail">
										      <img src="<?php echo base_url();?>assets/images/shop/product7.jpg" alt="image">
										      
										        <a href="#" class="btn btn-xs btn-danger" role="button">Remove</a>
										      
										    </div>
										  </div>
										   <div class="col-sm-6 col-md-3">
										    <div class="thumbnail">
										      <img src="<?php echo base_url();?>assets/images/shop/product8.jpg" alt="image">
										      
										        <a href="#" class="btn btn-xs btn-danger" role="button">Remove</a>
										      
										    </div>
										  </div>
										   <div class="col-sm-6 col-md-3">
										    <div class="thumbnail">
										      <img src="<?php echo base_url();?>assets/images/shop/product9.jpg" alt="image">
										      
										        <a href="#" class="btn btn-xs btn-danger" role="button">Remove</a>
										      
										    </div>
										  </div>
										   <div class="col-sm-6 col-md-3">
										    <div class="thumbnail">
										      <img src="<?php echo base_url();?>assets/images/shop/product10.jpg" alt="image">
										      
										        <a href="#" class="btn btn-xs btn-danger" role="button">Remove</a>
										      
										    </div>
										  </div>
										  
									
				                    </div>
				                    </div>
			                  
			                </div>
			  			</div>
			  			<a href="#" class="btn btn-info pull-right">Publish Item </a>  
					  
			 </div>
			 
				<div class="tab-pane" id="2">
         			<div class="col-md-6">
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           Item Master Information 
                                <div class="pull-right" >
                                    <div class="dropdown">
									  <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
									    <span class="glyphicon glyphicon-cog"></span>
									    <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Refresh</a></li>
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Logout</a></li>
									  </ul>
									</div>
                                </div>
                            </div>
                            <!-- start data shipping -->
                            
                             <div class="table-responsive">
                               <div id="data_container">
                               
                               </div>
                            </div>
                            
                            <!-- end data shipping -->
                            
                            
                            <div class="panel-body">
                               
                                <ul >
                                   
                                     <li>
                                            <a href="#">
                                     <span class="glyphicon glyphicon-align-left text-success" ></span> 
                                                  Lorem ipsum dolor sit amet ipsum dolor sit amet
                                                 <span class="label label-warning" > Just now </span>
                                            </a>
                                    </li>
                                     <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-info-sign text-danger" ></span>  
                                          Lorem ipsum dolor sit amet ipsum dolor sit amet
                                          <span class="label label-info" > 2 min chat</span>
                                            </a>
                                    </li>
                                     <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                                          Lorem ipsum dolor sit amet ipsum dolor sit amet
                                          <span class="label label-success" >GO ! </span>
                                            </a>
                                    </li>
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-edit  text-danger" ></span>  
                                          Lorem ipsum dolor sit amet ipsum dolor sit amet
                                          <span class="label label-success" >Let's have it </span>
                                            </a>
                                    </li>
                                   </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-default btn-block"> <i class="glyphicon glyphicon-repeat"></i> Just A Small Footer Button</a>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="text-center alert alert-warning">
                        <a href="#" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                        <a href="#" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Google</a>
                        <a href="#" class="btn btn-social btn-twitter">
                            <i class="fa fa-twitter"></i>&nbsp; Twitter </a>
                        <a href="#" class="btn btn-social btn-linkedin">
                            <i class="fa fa-linkedin"></i>&nbsp; Linkedin </a>
                    </div>
                     
                    <hr />
                   
                </div>
				</div>
      
			</div>
            
            
                
           
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php $this->load->view('admin/global/footer.php')?>
  
 <script>

  $(document).ready (function(){
	  $('#item').addClass('menu-top-active');
	  search();
	  $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){("#success-alert").slideUp(500);
		});
  });
  
  
  function search()
  {

  	var url = "<?php echo site_url('admin/data_controller/load_shipping');?>";
  	var xmlHttp = GetXmlHttpObject();
  	if (xmlHttp != null) {
  		try {
  			xmlHttp.onreadystatechange=function() {
  			if(xmlHttp.readyState == 4) {
  				if(xmlHttp.responseText != null){
  					
  					document.getElementById('data_container').innerHTML = xmlHttp.responseText;
  					$('#shipping_data').DataTable({
  				        dom: 'Bfrtip',
  				        buttons: [
  				            'csv', 'pdf', 'print'
  				        ]
  				    });
  				}else{
  					alert("Error");
  				}
  			}
  		}
  		xmlHttp.open("GET", url, true);
  		xmlHttp.send(null);
  	}
  	catch(error) {}
  	}
  	}
	function edit(id,name)
	{
		document.getElementById('txtRoleName').value=name;
		document.getElementById('postType').value=id;
		
	}
	function remove(id){

		if(confirm("Confirm Delete?")){
	  	var url = "<?php echo site_url('data_controller/delete_shipping?id=');?>"+id;
	  	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){

		  				search();	
	  				
	  				}else{
	  					alert("Error");
	  				}
	  			}
	  		}
	  		xmlHttp.open("GET", url, true);
	  		xmlHttp.send(null);
	  	}
	  	catch(error) {}
	  	}
		}
	}
  </script>
