<?php $this->load->view('data/global_header.php');?>

	<section>
		<div class="container">
			<div class="row">
			<?php $this->load->view('data/global_nav')?>
				<div id="itemContainer" class="col-sm-9 padding-right">
					<?php
					for ($i = 0; $i < count($productlist); ++$i) { 
							?>
                        <div style="cursor: pointer;" class="col-sm-4" >
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img onclick="itemClick('<?php echo $productlist[$i]->ID; ?>')" src="<?php echo base_url();?><?php echo $productlist[$i]->ImageUrl; ?>" alt="" />
										<h2>₹ <?php echo $productlist[$i]->Price; ?></h2>
										<p><?php echo $productlist[$i]->Title; ?></p>
										<a onclick="addToCart(<?php echo $productlist[$i]->ID;?>)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
								
							</div>
						</div>
                                       				
                                       				<?php
                                       			}
                                       		
                                       ?>
                                      
				</div>
			</div>
			<div class="row">
        <div class="col-md-12 text-center">
            <?php echo $pagination; ?>
        </div>
    </div>
		</div>
	</section>
	
	<?php $this->load->view('data/global_footer.php');?>