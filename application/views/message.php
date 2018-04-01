<?php $this->load->view('data/global_header.php');?>
	<div class="container">
	<div class="col-sm-6 col-sm-offset-3">
    <div id="content">
      		<?php 
     		if($this->session->userdata('orderStat')!=null){
     		
     			$msg=$this->session->userdata('orderStat');
     			if($msg=="success"){
     			?>
     			 <div class="notify successbox">
			        <h1>Success!</h1>
			        <span class="alerticon"><img src="<?php echo base_url();?>assets/images/check.png" alt="checkmark" /></span>
			        <p>Thanks so much for your message. We check e-mail frequently and will try our best to respond to your inquiry.</p>
			      </div>
     			<?php 
     			$this->session->set_userdata('orderStat', null);
     			}else{
     				?>
     				     			 <div class="notify errorbox">
								        <h1>Warning!</h1>
								        <span class="alerticon"><img src="<?php echo base_url();?>assets/images/error.png" alt="error" /></span>
								        <p>You did not set the proper return e-mail address. Please fill out the fields and then submit the form.</p>
								      </div>
     				     			<?php 
     				     			$this->session->set_userdata('orderStat', null);
     				
     			}
     		}else{
     			redirect("home");
     		}
     		?>
      
    </div><!-- @end #content -->
  </div><!-- @end #w -->
  <br>
	</div>
		<?php $this->load->view('data/global_footer.php');?>
	