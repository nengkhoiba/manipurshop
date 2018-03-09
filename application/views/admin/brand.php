	<?php $this->load->view('admin/global/header.php')?>
   
    <div class="content-wrapper">
        <div class="container">
           
           
            <div class="row">
                <div class="col-md-6">
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           Brand Information 
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
                         
                            
                            
                            <div class="panel-body">
                               
                                  <!-- start data shipping -->
                            
		                             <div class="table-responsive">
		                               <div id="data_container">
		                               
		                               </div>
		                            </div>
                            
                            	<!-- end data shipping -->
                               
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
                     <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ref. No.</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Delivery On </th>
                                            <th># #</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>
                                            <td># 2501</td>
                                            <td>01/22/2015 </td>
                                            <td>
                                                <label class="label label-info">300 USD </label>
                                            </td>
                                            <td>
                                                <label class="label label-success">Delivered</label></td>
                                            <td>01/25/2015</td>
                                             <td> <a href="#"  class="btn btn-xs btn-danger"  >View</a> </td>
                                        </tr>
                                        <tr>
                                            <td># 15091</td>
                                            <td>12/12/2014 </td>
                                            <td>
                                                <label class="label label-danger">7000 USD </label>
                                            </td>
                                            <td>
                                                <label class="label label-warning">Shipped</label></td>
                                            <td>N/A</td>
                                             <td> <a href="#"  class="btn btn-xs btn-success"  >View</a> </td>
                                        </tr>
                                        <tr>
                                            <td># 11291</td>
                                            <td>12/03/2014 </td>
                                            <td>
                                                <label class="label label-warning">7000 USD </label>
                                            </td>
                                            <td>
                                                <label class="label label-success">Delivered</label></td>
                                            <td>01/23/2015</td>
                                             <td> <a href="#"  class="btn btn-xs btn-primary"  >View</a> </td>
                                        </tr>
                                        <tr>
                                            <td># 1808</td>
                                            <td>11/10/2014 </td>
                                            <td>
                                                <label class="label label-success">2000 USD </label>
                                            </td>
                                            <td>
                                                <label class="label label-info">Returned</label></td>
                                            <td>N/A</td>
                                             <td> <a href="#"  class="btn btn-xs btn-danger"  >View</a> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                </div>
                <div class="col-md-6">
                     <div class="Compose-Message">               
                <div class="panel panel-success">
                    <div class="panel-heading">
                       Insert Brand Info
                    </div>
                    <div class="panel-body">  
                    
                      <?php echo form_open('admin/data_controller/brand');?>
	                      <label>Code:</label>
	                      <input type="hidden" name="postType" id="postType"/>
	                      <input type="text" name="code" id="code" class="form-control" />
	                      <label>Description:</label>
	                      <input type="text" name="description" id="description" class="form-control" />
	                      <label>Added-By:</label>
	                      <input type="text" name="added_by" id="added_by" class="form-control" />
	                      <hr/>
	                      <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-tags"></span>  Save </a>
	                      <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-tags"></span>  Save </a>
						  <input type="submit" value="SaveButton"/>                   
                   
                      <?php echo form_close();?>
                      
                    </div>
                    <div class="panel-footer text-muted">
                        <strong>Note : </strong>Please note that we track all messages so don't send any spams.
                    </div>
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
	  $('#brand').addClass('menu-top-active');
	  search();
	  $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){("#success-alert").slideUp(500);
		});
  });
  
  
  function search()
  {

  	var url = "<?php echo site_url('admin/data_controller/load_brand');?>";
  	var xmlHttp = GetXmlHttpObject();
  	if (xmlHttp != null) {
  		try {
  			xmlHttp.onreadystatechange=function() {
  			if(xmlHttp.readyState == 4) {
  				if(xmlHttp.responseText != null){
  					
  					document.getElementById('data_container').innerHTML = xmlHttp.responseText;
  					$('#brand_data').DataTable({
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
