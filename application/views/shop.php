<?php $this->load->view('data/global_header.php');?>

	<section id="advertisement">
		<div class="container">
			<?php 	$this->load->view('data/global_nav.php');?>
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
			<div class="col-sm-3">
			</div>
				
				<div class="col-sm-9 padding-right">
					<?php $queue = $q;
					$data['q']=$queue;
					$this->load->view('data/searchResult_data',$data);?>
				</div>
			</div>
		</div>
	</section>
	
	<?php $this->load->view('data/global_footer.php');?>