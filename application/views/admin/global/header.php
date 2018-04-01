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
    <link href="<?php echo base_url();?>adminassets/datetimepicker.css" rel="stylesheet">
    <!-- FONT AWESOME ICONS  -->
    <link href="<?php echo base_url();?>adminassets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url();?>adminassets/css/style.css" rel="stylesheet" />
    	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
   
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
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="<?php echo base_url();?>adminassets/img/64-64.jpg" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $this->session->userdata('name')?></h4>
                                        <h5 class="media-heading"><?php echo $this->session->userdata('email')?></h4>
                                        <h5 class="media-heading"><?php echo $this->session->userdata('role')?></h5>
                                      

                                    </div>
                                </div>
                                
                                <hr />
                              <a href="<?php echo base_url();?>admin/login/logout" class="btn btn-danger btn-xs">Logout</a>

                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a id="das" href="<?php echo base_url();?>admin/nav">Dashboard</a></li>
                            <li><a id="cat" href="<?php echo base_url();?>admin/nav/category">Category</a></li>
                            <li><a id="brand" href="<?php echo base_url();?>admin/nav/brand">Brand</a></li>
                            <li><a id="shipping" href="<?php echo base_url();?>admin/nav/shipping">Pincode</a></li>
                            <li><a id="item" href="<?php echo base_url();?>admin/nav/item">Item</a></li>
                             <li><a id="order" href="<?php echo base_url();?>admin/nav/order">Order</a></li>
                            <li><a id="analytics" href="<?php echo base_url();?>admin/nav/analytics">Analytics</a></li>
                            <li><a id="advertise" href="<?php echo base_url();?>admin/nav/advertise">Advertise</a></li>
                              <li><a id="user" href="<?php echo base_url();?>admin/nav/user">User</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->