<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Murolen an E-Commerce platform only for manipur.">
    <meta name="author" content="">
    <title>Home | Login</title>
<?php $this->load->view('data/global_header')?>
	<?php 
     		if($this->session->userdata('msg')!=null){
     		
     			$msg=$this->session->userdata('msg');
     			?>
     			<div  id="success-alert" style="margin-left: 150px; margin-right: 150px;"class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('msg', null);
     		}
     		?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<?php echo form_open('login/verify');?>
							<input type="email" name="email" id="email" placeholder="Email" />
							<input type="password" name="password" id="password" placeholder="Password" />
							<button type="submit" class="btn btn-default">Login</button>
						<?php echo form_close();?>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<?php echo form_open('login/signUpUser');?>
							<input type="text" name="userName" id="userName" placeholder="Name"/>
							<input type="email" name="userEmail" id="userEmail" placeholder="Email Address"/>
							<input type="password" name="userPass" id="userPass" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						<?php echo form_close();?>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	<?php $this->load->view('data/global_footer');?>
	<script >
	$(document).ready (function(){
		  
		  search();
		  $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){("#success-alert").slideUp(500);
			});
	  });
	  
	</script>