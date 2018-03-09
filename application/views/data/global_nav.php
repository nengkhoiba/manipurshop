<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
	   								<?php 
                                       		$sql="SELECT ID, Code,Description,Added_on FROM Category WHERE isActive=1";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
                                       					<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title"><a href="#"><?php echo $result['Description']; ?></a></h4>
														</div>
													</div>
                                       				<?php
                                       			}
                                       		}
                                       ?>
						
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								<?php 
                                       		$sql="SELECT ID, Code,Description,Added_on FROM Brand WHERE isActive=1";
                                       		$query = $this->db->query($sql);
                                       		if($query){
                                       			while ($result = mysql_fetch_array($query->result_id)){
                                       				?>
													<li><a href="#"> <span class="pull-right">(50)</span><?php echo $result['Description']; ?></a></li>
                                       				<?php
                                       			}
                                       		}
                                       ?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>