<?php $this->load->view('data/global_header.php');?>
<div class="container">
	<div class="row">
		<?php $this->load->view('data/orderStatus_data.php');?>
	</div>
</div>
<?php $this->load->view('data/global_footer.php')?>
<script>
function itemClick(id){
	window.open("<?php echo base_url();?>home/product?id="+id);
	}
</script>