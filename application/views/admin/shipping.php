<?php $this->load->view('admin/global/header.php'); ?>
	<div class="content-wrapper">
        <div class="container">
         <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Shipping</h4>
                </div>

            </div>
 			<div class="row">
                <div class="col-md-12">
                    <div class="col-sm-12">
			     		<?php 
			     		if($this->session->userdata('status')!=null){
			     		
			     			$msg=$this->session->userdata('status');
			     			?>
			     			<div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo $msg;?>
							</div>
			     			<?php 
			     			$this->session->set_userdata('status', null);
			     		}
			     		?>
                </div>
        </div>
 			<div class="row">
                <div class="col-md-6">
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           			Shipping Information 
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
                            <div class="table-responsive">
                               <div id="data_container">
                               </div>
		                    </div>  
                            </div>
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="col-md-6">
                     <div class="Compose-Message">               
                <div class="panel panel-success">
                    <div class="panel-heading">
                       Insert Shipping Info
                    </div>
                    <div class="panel-body">  
                    
                      <?php echo form_open('admin/data_controller/shipping');?>
                     
	                      <label>Pincode:</label>
	                      <input type="hidden" name="postType" id="postType"/>
	                      <input required type="text" name="pincode" id="pincode" class="form-control" />
	                      <label>Time:</label>
	                      <input required type="text" name="time" id="time" class="form-control" />
	                      <label>Amount:</label>
	                      <input required type="text" name="rate" id="rate" class="form-control" />
	                      <hr/>
						  <input class="btn btn-success" type="submit" value="Save"/>                   
                      
                      <?php echo form_close();?>
                      
                    </div>
                    <div class="panel-footer text-muted">
                        <strong>Note : </strong>This is the Shipping master
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
	  $('#cat').addClass('menu-top-active');
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
	function edit(id,pincode,time,rate)
	{
		document.getElementById('time').value=time;
		document.getElementById('rate').value=rate;
		document.getElementById('pincode').value=pincode;
		document.getElementById('postType').value=id;
		
	}
	function remove(id){

		if(confirm("Confirm Delete?")){
	  	var url = "<?php echo site_url('admin/data_controller/deleteShipping?id=');?>"+id;
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
      