	<?php $this->load->view('admin/global/header.php')?>
   
    <div class="content-wrapper">
        <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Item</h4>
                </div>

            </div>
            <div class="row">
             <div id="msgbox" class="col-md-12">
                    
                </div>
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
										  <span class="input-group-addon" id="sizing-addon1">Item Code</span>
										  <input id="itemCode" name="itemCode" type="text" class="form-control" placeholder="Item Code" aria-describedby="sizing-addon1">
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
					              		 <a href="#" onclick="iteminfoSave()" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-tags"> </span>&nbsp;Save To Drafts </a>                   
				                     		
				                     		<!-- GIF SAVING  -->
				                     		<div id="SavingGIF" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;">
				                     		<img src='<?php echo base_url();?>adminassets/img/animated_save_icon.gif' width="64" height="64" />
				                     		<br>SAVING...
				                     		</div>
				                     		<!-- GIF SAVING -->
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
										  <input disabled id="itemPrice" name="itemPrice" type="text" class="form-control" placeholder="Price" aria-describedby="sizing-addon1">
										  <input disabled id="priceID" name="priceID" type="hidden" class="form-control">
										</div>
										<div class="form-group">
					              		 <a href="#"  onclick="itempriceSave()" disabled id="itemPriceSection" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-tags"> </span>&nbsp;Save To Drafts </a>
				                     	</div>
				                     	</div>
				                     	</div>
				                     	<br>
				                     	<div class="row">
				                     	<div class="container">
				                     <div id='itemPriceContainer' class="table-responsive">
                               
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
										  <input id="itemDetailTitle" disabled name="itemDetailTitle" type="text" class="form-control" placeholder="Title" aria-describedby="sizing-addon1">
										</div>
										<div class="input-group form-group input-group-sm ">
										  <span class="input-group-addon" id="sizing-addon1">Description</span>
										  <input id="itemDetailDescription" disabled name="itemDetailDescription" type="text" class="form-control" placeholder="Description" aria-describedby="sizing-addon1">
										</div>
				                     
										<div class="form-group">
					              		 <a href="#" disabled onclick="itemDetailSave()" id="itemDetailsSection" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-tags"> </span>&nbsp;Save To Drafts </a>
				                     	</div>
				                     	</div>
				                     	</div>
				                     	<br>
				                     	<div class="row">
				                     	<div class="container">
				                     <div class="table-responsive" id ="itemDetailDataContainer">
				                     
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
				                     <div class="form-group">
				                     <div class="container">
					              		 <a href="#" disabled id="uploadfile" class="btn btn-sm btn-success pull-left">UPLOAD IMAGE</a>
				                     </div>
				                     	</div>
				                     </div>
				                     <div id="imageContainer" class="row">
										  
									
				                    </div>
				                    <div class="row">
				                    <div id="imageUploadContainer" style="display: none" class="container" >
									            <input type="file" name="file" id="file">
									            <div class="upload-area"  id="uploadfile">
									            </div>
									        </div>
				                    </div></div>
				                    
			                  
			                </div>
			  			</div>
			  			<a href="#" disabled id="publishItem"class="btn btn-info pull-right">Publish Item </a>  
					  
			 </div>
			 
				<div class="tab-pane" id="2"  >
         			<div id="itemListContainer" class="col-md-12">
                      
                   <?php $this->load->view('admin/data_fragment/item_info_data');?>
                    </div>
				</div>
      
			</div>
            
            
                
           
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php $this->load->view('admin/global/footer.php')?>
  
 <script>
var ITEM_ID=0;

  $(document).ready (function(){
	  $('#item').addClass('menu-top-active');
	
	 // $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){("#success-alert").slideUp(500);});
  });

//ITEM INFO 
  function iteminfoSave() {
	  ///insert loading animation here
			$(document.getElementById('SavingGIF')).ajaxStart(function(){
			 // Show image container
			 $("#SavingGIF").show();
			});
			$(document.getElementById('SavingGIF')).ajaxComplete(function(){
			 // Hide image container
			 $("#SavingGIF").hide();
			});
	  //run form validation
	  
	  if(document.getElementById('itemCode').value.trim()==""){

		var msg="<div class='alert alert-danger'>"+
        "Please enter Item Code!</div>";
        document.getElementById('msgbox').innerHTML=msg;
        return;
	 }
	  else if(document.getElementById('itemName').value.trim()==""){
	  	var msg="<div class='alert alert-danger'>"+
        "Please enter Item Name!</div>";
        document.getElementById('msgbox').innerHTML=msg;
        return;
		  }
	  else if(document.getElementById('itemDesc').value.trim()==""){
	  		var msg="<div class='alert alert-danger'>"+
		        "Please enter Item Description!</div>";
		        document.getElementById('msgbox').innerHTML=msg;
		        return;
	  }
	  else if (document.getElementById('itemStock').value.trim()==""){
		
		var msg="<div class='alert alert-danger'>"+
        "Please enter Item Stock!</div>";
        document.getElementById('msgbox').innerHTML=msg;
        return;  	 
	  }
	   else if (document.getElementById('itemDelivery').value.trim()==""){
		  
		  var msg="<div class='alert alert-danger'>"+
        "Please enter Item Delivery!</div>";
        document.getElementById('msgbox').innerHTML=msg;
        return;	 
	  }
		 else{
		 document.getElementById('msgbox').innerHTML="";
		 }
	  //end form validation
	  
	  var url = '<?php echo base_url();?>admin/data_controller/itemInfo?itemCode='+document.getElementById('itemCode').value+'&itemCategory='+document.getElementById('itemCategory').value+'&itemBrand='+document.getElementById('itemBrand').value+'&itemName='+document.getElementById('itemName').value+'&itemDesc='+document.getElementById('itemDesc').value+'&itemStock='+document.getElementById('itemStock').value+'&itemDelivery='+document.getElementById('itemDelivery').value+'&postType='+ITEM_ID;
	  callServiceToFetchData(url,itemInfosaveReply);
	  }

  
	  function itemInfosaveReply(response){
	  var sqlresponse = JSON.parse(response);
		  if(sqlresponse.status === "success"){
		  	//stop animation
			  	  ITEM_ID=sqlresponse.itemID;
			  var msg="<div class='alert alert-success'>"+
		        "Item details save! </div>";
		        document.getElementById('msgbox').innerHTML=msg;
		  	//enable the other sections here
			  	//$('#itemPrice').attr.remove("disabled");
			  	enableControl();
		  }
		  if(sqlresponse.status === "fali"){
		  	//stop animation
			  	  ITEM_ID=sqlresponse.itemID;
			  var msg="<div class='alert alert-success'>"+
		        "Something went wrong! </div>";
		        document.getElementById('msgbox').innerHTML=msg;
			  
		  }
	  }

	  function load_item_info(){
		  var url = '<?php echo base_url();?>admin/data_controller/load_itemDetail?id='+ITEM_ID;
		  callServiceToFetchData(url,itemDetaiLoadRelpy);
	  }
	  function itemDetaiLoadRelpy(response){
		  var sqlresponse = JSON.parse(response);
			  
				     document.getElementById('itemCategory').value=sqlresponse.cat_id;
				     document.getElementById('itemBrand').value=sqlresponse.brand_id;
				     document.getElementById('itemCode').value=sqlresponse.code;
				     document.getElementById('itemName').value=sqlresponse.title;
				     document.getElementById('itemDesc').value=sqlresponse.desc;
				     document.getElementById('itemStock').value=sqlresponse.stock;
				     document.getElementById('itemDelivery').value=sqlresponse.time;
		  }

//ITEM INFO END 

//ITEM PRICE
function enableControl(){
	$('#itemPrice').removeAttr("disabled");
  	$('#itemDetailTitle').removeAttr("disabled");
  	$('#itemPriceSection').removeAttr("disabled");
  	$('#itemDetailDescription').removeAttr("disabled");
  	$('#itemDetailsSection').removeAttr("disabled");
  	$('#uploadPhoto').removeAttr("disabled");
  	$('#uploadfile').removeAttr("disabled");
}
 function itempriceSave() {
	  //run form validation
	  
	  if(document.getElementById('itemPrice').value.trim()==""){

		var msg="<div class='alert alert-danger'>"+
        "Please enter Item Code!</div>";
        document.getElementById('msgbox').innerHTML=msg;
        return;
	 }
		 else{
		 document.getElementById('msgbox').innerHTML="";
		 }
	  //end form validation
	  
	  var url = '<?php echo base_url();?>admin/data_controller/itemPrice?itemPrice='+document.getElementById('itemPrice').value+'&itemID='+ITEM_ID+'&priceID='+document.getElementById('priceID').value;
	  	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){
	  					
	  					document.getElementById('itemPriceContainer').innerHTML = xmlHttp.responseText;
	  					document.getElementById('itemPrice').value="";
	  					document.getElementById('priceID').value="";
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
function  editItemPrice(price,id){
	document.getElementById('itemPrice').value=price;
	document.getElementById('priceID').value=id;
	
}

function removeItemPrice(id){

	if(confirm("Confirm Delete?")){
  	var url = "<?php echo site_url('admin/data_controller/delete_itemPrice?id=');?>"+id+"&itemID="+ITEM_ID;
  	var xmlHttp = GetXmlHttpObject();
  	if (xmlHttp != null) {
  		try {
  			xmlHttp.onreadystatechange=function() {
  			if(xmlHttp.readyState == 4) {
  				if(xmlHttp.responseText != null){

  					document.getElementById('itemPriceContainer').innerHTML = xmlHttp.responseText;
  				
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
	  
function enablePrice(id){

  	var url = "<?php echo site_url('admin/data_controller/enable_itemPrice?id=');?>"+id+"&itemID="+ITEM_ID;
  	var xmlHttp = GetXmlHttpObject();
  	if (xmlHttp != null) {
  		try {
  			xmlHttp.onreadystatechange=function() {
  			if(xmlHttp.readyState == 4) {
  				if(xmlHttp.responseText != null){

  					document.getElementById('itemPriceContainer').innerHTML = xmlHttp.responseText;
  				
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


//ITEM PRICE END   
  
//ITEM DETAILS
function itemDetailSave() {
	  //run form validation
	  
	  if(document.getElementById('itemDetailTitle').value.trim()==""){

		var msg="<div class='alert alert-danger'>"+
        "Please enter Item Title!</div>";
        document.getElementById('msgbox').innerHTML=msg;
        return;
	 }
	 else if(document.getElementById('itemDetailDescription').value.trim()==""){
	 	var msg="<div class='alert alert-danger'>"+
        "Please enter Item Description!</div>";
        document.getElementById('msgbox').innerHTML=msg;
        return;
	 }
		 
		 else{
		 document.getElementById('msgbox').innerHTML="";
		 }
	  //end form validation
	  
	  var url = '<?php echo base_url();?>admin/data_controller/itemDetail?itemDetailTitle='+document.getElementById('itemDetailTitle').value+'&itemDetailDescription='+document.getElementById('itemDetailDescription').value+'&postType='+ITEM_ID;
	  callServiceToFetchData(url,itemDetailSaveRelpy);
	  }

  
	  function itemDetailSaveRelpy(response){
	  var sqlresponse = JSON.parse(response);
		  if(sqlresponse.status === "success"){
		  	//stop animation
			  	  ITEM_ID=sqlresponse.itemID;
			  var msg="<div class='alert alert-success'>"+
		        "Item Detail save! </div>";
		        document.getElementById('itemDetailDataContainer').innerHTML=xmlHttp.responseText;
			  
		  }
		  if(sqlresponse.status === "fail"){
		  	//stop animation
			  	  ITEM_ID=sqlresponse.itemID;
			  var msg="<div class='alert alert-success'>"+
		        "Something went wrong! </div>";
		        document.getElementById('msgbox').innerHTML=msg;
			  
		  }
	  }
//ITEM DETAILS END 
//IMAGE UPLOAD 
$("html").on("dragover", function(e) {
    e.preventDefault();
    e.stopPropagation();
    $("h1").text("Drag here");
 });

 $("html").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });
 $(function() {

	    // preventing page from redirecting
	    $("html").on("dragover", function(e) {
	        e.preventDefault();
	        e.stopPropagation();
	        $("h1").text("Drag here");
	    });

	    $("html").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });

	    // Drag enter
	    $('.upload-area').on('dragenter', function (e) {
	        e.stopPropagation();
	        e.preventDefault();
	        $("h1").text("Drop");
	    });

	    // Drag over
	    $('.upload-area').on('dragover', function (e) {
	        e.stopPropagation();
	        e.preventDefault();
	        $("h1").text("Drop");
	    });

	    // Drop
	    $('.upload-area').on('drop', function (e) {
	        e.stopPropagation();
	        e.preventDefault();

	        $("h1").text("Upload");

	        var file = e.originalEvent.dataTransfer.files;
	        var fd = new FormData();

	        fd.append('file', file[0]);

	        uploadData(fd);
	    });

	    // Open file selector on div click
	    $("#uploadfile").click(function(){
	        $("#file").click();
	    });

	    // file selected
	    $("#file").change(function(){
	        var fd = new FormData();

	        var files = $('#file')[0].files[0];

	        fd.append('file',files);
	        fd.append('itemID',ITEM_ID);

	        uploadData(fd);
	    });
	});

	// Sending AJAX request and upload file
	function uploadData(formdata){

	    $.ajax({
	        url: '<?php echo base_url();?>admin/data_controller/imageUpload',
	        type: 'post',
	        data: formdata,
	        contentType: false,
	        processData: false,
	        dataType: 'json',
	        success: function(response){
	            loadImages();
	        }
	    });
	}

	

	// Bytes conversion
	function convertSize(size) {
	    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
	    if (size == 0) return '0 Byte';
	    var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
	    return Math.round(size / Math.pow(1024, i), 2) + ' ' + sizes[i];
	}

	function loadImages(){
		var url = "<?php echo site_url('admin/data_controller/loadImage?id=');?>"+ITEM_ID;
	  	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){

	  					document.getElementById('imageContainer').innerHTML = xmlHttp.responseText;
	  				
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
	function removeItemImage(id){

		if(confirm("Confirm Delete?")){
	  	var url = "<?php echo site_url('admin/data_controller/delete_itemImage?id=');?>"+id+"&itemID="+ITEM_ID;
	  	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){

	  					document.getElementById('imageContainer').innerHTML = xmlHttp.responseText;
	  				
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
	 function load_item_price(){
			var url = "<?php echo site_url('admin/data_controller/load_item_price?id=');?>"+ITEM_ID;
		  	var xmlHttp = GetXmlHttpObject();
		  	if (xmlHttp != null) {
		  		try {
		  			xmlHttp.onreadystatechange=function() {
		  			if(xmlHttp.readyState == 4) {
		  				if(xmlHttp.responseText != null){

		  					document.getElementById('itemPriceContainer').innerHTML = xmlHttp.responseText;
		  				
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
	function loadItem(id){
		 $('#1').addClass('active');
		 $('#2').removeClass('active');
		 enableControl();
		 ITEM_ID=id;
		 load_item_info();
		 load_item_price();
		 loadImages();
	}
//END IMAGE UPLOAD

  
  </script>
