<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin Murolen</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?php echo base_url();?>adminassets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?php echo base_url();?>adminassets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url();?>adminassets/css/style.css" rel="stylesheet" />
   
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>info@murolen.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+90-897-678-44
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
 <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
             

            </div>

            <div class="left-div pull-right">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                        
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Please Login To Enter </h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                  
                     <h4> Or Login with <strong>Murolen Account  :</strong></h4>
                    <br />
                    <?php echo form_open('admin/login/verify');?>
                       <label>Enter Email ID : </label>
                        <input required name="Email" type="text" class="form-control" />
                        <label>Enter Password :  </label>
                        <input required name="Password" type="password" class="form-control" />
                        <hr />
                        <input type="submit" class="btn btn-info" value="Login">
                        <a href="#" >&nbsp;Forgot Password</a>&nbsp;
                	<?php echo form_close();?>
                </div>
                <div class="col-md-6">
                <?php if($msg==null OR $msg=="0"){}else{?>
                <div class="alert alert-danger">
                        
                         <strong> Message :</strong>
                        <ul>
                            <li>
                                <?php echo $msg;?>
                            </li>
                           
                        </ul>
                       
                    </div>
                    <?php }?>
                    <div class="alert alert-info">
                        Please enter your Murolen E-mail and password to login to admin panel
                        <br />
                         <strong> Note :</strong>
                        <ul>
                            <li>
                                Change password for new user
                            </li>
                            <li>
                                Do not attempt any illigal access
                            </li>
                            <li>
                                Always change password every 3 months
                            </li>
                            <li>
                                Always logout on leaving your work station
                            </li>
                        </ul>
                       
                    </div>
                  
                </div>

            </div>
        </div>
    </div>
  <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2018 Murolen | By : <a href="http://www.murolen.com/" target="_blank">Murolen</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?php echo base_url();?>adminassets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url();?>adminassets/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>adminassets/js/service.js"></script>
</body>
</html>
