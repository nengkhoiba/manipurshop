<?php $this->load->view('admin/global/header.php');?>
<br>
<div class="container">
	<div class="Compose-Message">               
			                	<div class="panel panel-warning">
				                    <div class="panel-heading">
				                      User Creat
				                    </div>
				                    <div class="panel-body">
				                     
				                       <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Username</span>
										  <input id="username" name="username" type="text" placeholder="Enter Username" class="form-control"  aria-describedby="sizing-addon1">
										  <input id="userID" name="userID" type="hidden">
										</div>
										  <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Address</span>
										  <input id="address" name="address" class="form-control" placeholder="Enter Address"  aria-describedby="sizing-addon1">
										  </div>
										  <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">DOB</span>
										  <input id="dob" name="dob" class="form-control"  aria-describedby="sizing-addon1">
										</div>
					                     <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1"> User Role</span>
										  <select id="userRole" name="userRole" class="form-control" aria-describedby="sizing-addon1">
										  	<option value="0">-- Select --</option>
										  	<?php 
                                       		$sql="SELECT `ID`, `Code`, `Description` FROM `User_Role` WHERE isActive=1";
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
											<span class="input-group-addon" id="sizing-addon1">Gender</span>
											<select id="gender" name="gender" class="form-control" aria-describedby="sizing-addon1">
												<option value="0">--Select--</option>
												<option value="1">Male</option>
												<option value="2">Female</option>
											</select>
										</div>
										 <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Mobile</span>
										  <input id="mobile" name="mobile" type="text" class="form-control" placeholder="Enter Mobile" aria-describedby="sizing-addon1">
										</div>
										 <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Email</span>
										  <input id="email" name="email" type="email" class="form-control" placeholder="Enter Email" aria-describedby="sizing-addon1">
										</div>
										<div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Password</span>
										  <input id="password" name="password" type="password" class="form-control" placeholder="Enter Password" aria-describedby="sizing-addon1">
										</div>
					                     <div class="input-group form-group input-group-sm">
										  <span class="input-group-addon" id="sizing-addon1">Confirm Password</span>
										  <input id="cpassword" name="cpassword" type="password" class="form-control" placeholder="Confirmation Password" aria-describedby="sizing-addon1">
										</div>
										 <div class="input-group form-group input-group-sm">
										 	 <span class="input-group-addon" id="sizing-addon1">DOB</span>
										 	<div class="col-sm-10">
					  							<div class="bfh-datepicker" data-name="date" id="date" data-format="y-m-d"></div>
										 </div>
					              		 <a style="cursor:pointer" onclick="userCreat()" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-tags"> </span>&nbsp;Save</a>                   
				                     		
				                     		<!-- GIF SAVING  -->
				                     		<div id="SavingGIF" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;">
				                     		<img src='<?php echo base_url();?>adminassets/img/animated_save_icon.gif' width="64" height="64" />
				                     		<br>SAVING...
				                     		</div>
				                     		<!-- GIF SAVING -->
				                    </div>
			                    <div class="panel-footer text-muted">
			                        <strong>Note : </strong>Please fill all the blank
			                    </div>
			                </div>
			  			</div>
</div>
<div class="" id="userContainer">
</div>

</div>
<?php $this->load->view('admin/global/footer.php');?>
 <script >

function userCreat() {
	  //run form validation
	
	  if(document.getElementById('username').value.trim()==""){
		
		  popupmsg("Please enter Username!");
      return;
	 }
	  if(document.getElementById('address').value.trim()==""){
			
		  popupmsg("Please enter Address!");
      return;
	 }
	  if(document.getElementById('userRole').value.trim()==""){
			
		  popupmsg("Please Select Role!");
      return;
	 }
	  if(document.getElementById('mobile').value.trim()==""){
			
		  popupmsg("Please enter Mobile!");
      return;
	 }if(document.getElementById('password').value.trim()==""){
			
		  popupmsg("Please enter Password!");
     return;
	 }
	 if(document.getElementById('cpassword').value.trim()==""){
			
		  popupmsg("Please enter Confirmation Password!");
    return;
	 }
	// if(document.getElementById('password').value == document.getElementById('cpassword').value){
			
	//	  popupmsg("Password and Confirmation Password are not equal!");
   //return;
//	 }
		 else{
		// document.getElementById('msgbox').innerHTML="";
		 }
	  //end form validation
	    $('#loading').show();
	  var url = '<?php echo base_url();?>admin/data_controller/userCreat?username='+document.getElementById('username').value+'&address='+document.getElementById('address').value+'&userRole='+document.getElementById('userRole').value+'&mobile='+document.getElementById('mobile').value+'&email='+document.getElementById('email').value+'&gender='+document.getElementById('gender').value+'&password='+document.getElementById('password').value;
	  	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){
	  					$('#loading').hide();
	  					document.getElementById('userContainer').innerHTML = xmlHttp.responseText;
	  					document.getElementById('username').value="";
	  					document.getElementById('address').value="";
	  					document.getElementById('userRole').value="";
	  					document.getElementById('mobile').value="";
	  					document.getElementById('password').value="";
	  					document.getElementById('cpassword').value="";
	  					document.getElementById('gender').value="";
	  					document.getElementById('email').value="";
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

</script>
    