<?php $this->load->view('admin/global/header.php');?>
<div class="content-wrapper">
<div class="container">
	<div id="msgbox">
	</div>
</div>
        <div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="Compose-Message">               
			                	<div class="panel panel-info">
				                    <div class="panel-heading">
				                        ADVERTISEMENT DETAILS 
				                    </div>
				                    <div class="panel-body">
				                     <div class="row">
				                     	<div class="input-group form-group input-group-sm" style="margin-left: 15px;margin-right: 15px;">
										  <span class="input-group-addon" id="sizing-addon1">Title</span>
										  <input id="adsTitle"  name="adsTitle" type="text" class="form-control" placeholder="Title" aria-describedby="sizing-addon1">
											<input id="adsID" name="adsID" type="hidden" >
										</div>
										<div class="input-group form-group input-group-sm " style="margin-left: 15px;margin-right: 15px;">
										  <span class="input-group-addon" id="sizing-addon1">Description</span>
										  <input id="adsDescription"  name="adsDescription" type="text" class="form-control" placeholder="Description" aria-describedby="sizing-addon1">
										</div>
										<div class="input-group form-group input-group-sm " style="margin-left: 15px;margin-right: 15px;">
										  <span class="input-group-addon" id="sizing-addon1">Link</span>
										  <input id="adsLink"  name="adsLink" type="text" class="form-control" placeholder="Description" aria-describedby="sizing-addon1">
										</div>
				                    </div>
				            			<a style="cursor:pointer" onclick="adsDetailsSave()" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-tags"> </span>&nbsp;Save To Drafts </a>                   
				            </div>
			  			</div>
 		<div class="Compose-Message">               
			                	<div class="panel panel-info">
				                    <div class="panel-heading">
				                        ADVERTISEMENT IMAGES 
				                    </div>
				                    <div class="panel-body">
				                     <div class="row">
				                     <div class="form-group">
				                     <div class="container-fluid">
				                     
					              		 <a style="cursor:pointer"  id="uploadfile" class="btn btn-sm btn-success pull-left">UPLOAD IMAGE</a>
				                     </div>
				                     	</div>
				                     </div>
				                     <div id="imageContainer" class="row">
										  
									
				                    </div>
				                    <div class="row">
				                    <div id="adsImagesContainer" style="display: none" class="container" >
									            <input type="file" name="file" id="file">
									            <div class="upload-area"  id="uploadfile">
									            </div>
									        </div>
				                    </div></div>
				                    
			                  
			                </div>
			  			</div>
			  			<a style="cursor:pointer"   onclick="adsPublish()"class="btn btn-info pull-right">Publish Ads </a>  					    
			 </div>
 </div>
			
				<div class="col-md-6">
					<div id="adsListContainer">
						<?php $this->load->view('admin/data_fragment/ads');?>
					</div>
				</div>			
			</div>
			
 		</div>		
 </div>
<?php $this->load->view('admin/global/footer.php');?>
<script>
var AdsID=0;
$(document).ready (function(){
	  $('#advertise').addClass('menu-top-active');
	
	 // $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){("#success-alert").slideUp(500);});
});
function adsDetailsSave() {
	  
	  //run form validation
	  
	  if(document.getElementById('adsTitle').value.trim()==""){
		  popupmsg("Please enter Advertisement Title!");
		        return;
	  }
	  else if (document.getElementById('adsDescription').value.trim()==""){
		  popupmsg("Please enter Advertisement Description!");
      return;  	 
	  }
	  //end form validation
	  $('#loading').show();
	  var link=encodeURIComponent(document.getElementById('adsLink').value);
	  var url = '<?php echo base_url();?>admin/data_controller/adsDetailsSave?adsTit='+document.getElementById('adsTitle').value+'&adsDesc='+document.getElementById('adsDescription').value+'&link='+link+'&adsID='+document.getElementById('adsID').value;
	  callServiceToFetchData(url,adsDetailsSaveReply);
	  }


	  function adsDetailsSaveReply(response){
		  $('#loading').hide();
	  var sqlresponse = JSON.parse(response);
		  if(sqlresponse.status === "success"){
		  	//stop animation
			  	  AdsID=sqlresponse.adsID;
			  	  
			  	popupmsg("Successfully saved!");
			  	loadAds();
		  }
		  if(sqlresponse.status === "fali"){
			  	  AdsID=sqlresponse.adsID;
			  	popupmsg("Something went wrong!");
			  	loadAds();
		  }
	  }
	  function loadAds(){
		  $('#loading').show();
			
		  	var url = "<?php echo site_url('admin/data_controller/loadAdsList');?>";
		  	var xmlHttp = GetXmlHttpObject();
		  	if (xmlHttp != null) {
		  		try {
		  			xmlHttp.onreadystatechange=function() {
		  			if(xmlHttp.readyState == 4) {
		  				if(xmlHttp.responseText != null){
		  					$('#loading').hide();
		  					document.getElementById('adsListContainer').innerHTML = xmlHttp.responseText;
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
	        fd.append('adsID',AdsID);

	        uploadData(fd);
	    });
	});

	// Sending AJAX request and upload file
	function uploadData(formdata){
		$('#loading').show();
	    $.ajax({
	        url: '<?php echo base_url();?>admin/data_controller/imageAdsUpload',
	        type: 'post',
	        data: formdata,
	        contentType: false,
	        processData: false,
	        dataType: 'json',
	        success: function(response){
	            loadAdsImages();
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

	function loadAdsImages(){
		$('#loading').show();
		var url = "<?php echo site_url('admin/data_controller/loadAdsImage?id=');?>"+AdsID;
	  	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){
	  					$('#loading').hide();
	  					document.getElementById('imageContainer').innerHTML = xmlHttp.responseText;
	  					loadAds();
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
	function removeAdsDetails(id){
		$('#loading').show();
		if(confirm("Confirm Delete?")){
	  	var url = "<?php echo site_url('admin/data_controller/deleteAdsDetail?id=');?>"+id;
	  	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){
	  					$('#loading').hide();
	  					document.getElementById('adsListContainer').innerHTML = xmlHttp.responseText;
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
	function adsPublish(){
		var url = '<?php echo base_url();?>admin/data_controller/adsPublishSave?adsID='+AdsID;
		  callServiceToFetchData(url,adsPublishSaveReply);	
	}
	  function adsPublishSaveReply(response){
		  $('#loading').hide();
	  var sqlresponse = JSON.parse(response);
		  if(sqlresponse.status === "success"){
			  	popupmsg("Successfully Publish The Advertisment!");
			  	loadAds();
		  }
		  if(sqlresponse.status === "fali"){
			  	popupmsg("Something went wrong!");
			  	loadAds();
		  }
	  }
	  function adsPublishFromTable(id){
			var url = '<?php echo base_url();?>admin/data_controller/adsPublishTableSave?id='+id;
			  callServiceToFetchData(url,adsPublishTableSaveReply);	
		}
		  function adsPublishTableSaveReply(response){
			  $('#loading').hide();
		  var sqlresponse = JSON.parse(response);
			  if(sqlresponse.status === "success"){
				  	popupmsg("Successfully Publish The Advertisment!");
				  	loadAds();
			  }
			  if(sqlresponse.status === "fali"){
				  	popupmsg("Something went wrong!");
				  	loadAds();
			  }
		  }
		  function adsUnPublishFromTable(id){
				var url = '<?php echo base_url();?>admin/data_controller/adsUnPublishTableSave?id='+id;
				  callServiceToFetchData(url,adsUnPublishTableSaveReply);	
			}
			  function adsUnPublishTableSaveReply(response){
				  $('#loading').hide();
			  var sqlresponse = JSON.parse(response);
				  if(sqlresponse.status === "success"){
					  	popupmsg("Successfully Unpublish The Advertisment!");
					  	loadAds();
				  }
				  if(sqlresponse.status === "fali"){
					  	popupmsg("Something went wrong!");
					  	loadAds();
				  }
			  }
	function popupmsg(message){
		var msg="<div class='msgbox alert alert-danger ' >"+
		   message+"</div>";
	     document.getElementById('msgbox').innerHTML=msg;
	     $(".msgbox").fadeTo(1500, 500).slideUp(500, function(){(".msgbox").slideUp(500);});
	}
	function  editAdsDetails(id,title,desc,url){
		AdsID=id;
		document.getElementById('adsID').value=id;
		document.getElementById('adsTitle').value=title;
		document.getElementById('adsDescription').value=desc;
		document.getElementById('adsLink').value=url;
		loadAdsImages();
		
	}
</script>
									