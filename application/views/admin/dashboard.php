<?php $this->load->view('admin/global/header.php'); ?>
	<div class="content-wrapper">
        <div class="container">
         <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>
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
        <?php $this->load->view('admin/global/dashboard.php'); ?>
 			
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php $this->load->view('admin/global/footer.php')?>
  
 <script>

  $(document).ready (function(){
	  $('#das').addClass('menu-top-active');
	  //search();
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
	function edit(id,code,description)
	{
		document.getElementById('description').value=description;
		document.getElementById('code').value=code;
		document.getElementById('postType').value=id;
		
	}
	function remove(id){

		if(confirm("Confirm Delete?")){
	  	var url = "<?php echo site_url('admin/data_controller/deleteBrand?id=');?>"+id;
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
     