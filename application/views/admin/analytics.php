 <style>
      #map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
    </style>
<?php $this->load->view('admin/global/header.php');?>

<div  class="container">
<br>
	<div class="Compose-Message">               
			                	<div class="panel panel-info">
				                    <div class="panel-heading">
				                       ITEM DETAILS
				                    </div>
				                    <div class="panel-body">
				                     <div class="row">
				                     <div class="container">
				                     	<div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Category</span>
										  <select id="searchCategory" name="searchCategory" class="form-control" style="width:97%;"  aria-describedby="sizing-addon1">
										  <option value="0">--Select--</option>
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
										  <select id="searchBrand" name="searchBrand" style="width:97%;" class="form-control" aria-describedby="sizing-addon1">
										  <option value="0">--Select--</option>										  	
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
										<div class="input-group form-group input-group-sm ">
										  <span class="input-group-addon" id="sizing-addon1">Date From</span>
										  <input class="form-control" id="dateFrom" name="dateFrom" style="width:97%;" type="date" value="2018-03-28" id="dateOrder" name="dateOrder">										
										</div>
										<div class="input-group form-group input-group-sm ">
										  <span class="input-group-addon" id="sizing-addon1">Till Date</span>
										  <input class="form-control" id="tillDate" name="tillDate" style="width:97%;" type="date" value="2018-03-28" id="dateOrder" name="dateOrder">										
										</div>
				                     
										<div class="form-group">
					              		 <a style="cursor:pointer;margin-right:33;" onclick="serchOrderLocation()" id="serchOrderLocation"  class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-tags"> </span>&nbsp;Search </a>
				                     	</div>
				                     	</div>
				                     	</div>
				                     	<br>
				                     	<div class="row">
				                     	<div class="container">
				                     <div class="table-responsive" id ="OrderLocationContainer">
				                     
			                            </div>
			                            </div>
				                    </div>
				                    </div>
			                  
			                </div>
			  			</div>
<br>
<hr>
	<div class="container-fluid">
		<div id="map">
		
		</div>
		<br>
		
	</div>
</div><br>
<?php $this->load->view('admin/global/footer.php');?>
<script>
$(document).ready (function(){
	  $('#analytics').addClass('menu-top-active');
	
	 // $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){("#success-alert").slideUp(500);});
});
	function initMap() {
	    var uluru = {lat: -25.363, lng: 131.044};
	    var map = new google.maps.Map(document.getElementById('map'), {
	        zoom: 4,
	        center: uluru
	      });
	       var marker = new google.maps.Marker({
	       position: uluru, 
           map: map
	       });
	     }

    function serchOrderLocation(){
        var url = '<?php echo base_url();?>admin/data_controller/searchLocation?category='+document.getElementById('searchCategory').value+'&brand='+document.getElementById('searchBrand').value+'&date='+document.getElementById('dateOrder').value;
  	    callServiceToFetchData(url,searchOrderReply);
  	  }

    
  	  function searchOrderReply(response){
  		 
  	  }
  	
   
</script>
	    <script async defer
	    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBt2ZapL8lBxMTVHGD4JCvryxQ5wtQQCY&callback=initMap">
	    </script>