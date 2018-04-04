<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Murolen an E-Commerce platform only for manipur.">
    <meta name="author" content="">
    <title>Home | Murolen</title>
<?php $this->load->view('data/global_header')?>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					
						
						<div class="carousel-inner">
							<?php $this->load->view('data/advertisement.php');?>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<?php $this->load->view('data/global_nav')?>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php $this->load->view('data/featured_item');?>
						
					</div><!--features_items-->
					<?php $this->load->view('data/categoryItem.php');?>
					
					
				</div>
			</div>
		</div>
	</section>
	<?php $this->load->view('data/global_footer');?>
	<script>
	function itemClick(id){
		window.open("<?php echo base_url();?>home/product?id="+id);
		}
	function addToCart(id){
		
		  var url = '<?php echo base_url();?>product_data/addToCart?qty=1&prodID='+id;
		  callServiceToFetchData(url,addToCartReply);
	}
	</script>