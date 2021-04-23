	<center>
	<div class="container-mid">
	
<!--
		<div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
			<a href="#">
			   <div class="bb-left-agileits-w3layouts-inner grid">
					<figure class="effect-roxy">
							<img src="images/banner_home/bb1.jpg" alt=" " class="img-responsive" />
							
							<figcaption>
								<h3><span>S</span>ale </h3>
								<p>Upto 55%</p>
							</figcaption>			
						
						</figure>
			    </div>
			</a>
		</div>
			
		<div class="col-md-7 bb-grids bb-middle-agileits-w3layouts">
		      <a href="#">
		       <div class="bb-middle-agileits-w3layouts grid">
			           <figure class="effect-roxy">
							<img src="images/banner_home/bottom3.jpg" alt=" " class="img-responsive" />
						
							<figcaption>
								<h3><span>S</span>ale </h3>
								<p>Upto 55%</p>
							</figcaption>			
				
						</figure>
		        </div>
				</a>
				<a href="#">
		      <div class="bb-middle-agileits-w3layouts forth grid">
						<figure class="effect-roxy">
							<img src="images/banner_home/bottom4.jpg" alt=" " class="img-responsive">
						
							<figcaption>
								<h3><span>S</span>ale </h3>
								<p>Upto 65%</p>
							</figcaption>		
						
						</figure>
					</div>
					</a>
	-->
	
	
	                                <div class="inner_w3l_agile_grids img-mid2">
                                                   
                                                
                                            <ul class="list-inline">
                                                <?php
                                                    $i=0;
                                        			$sql = "SELECT * FROM home_promo WHERE status = 'Aktif' ORDER BY id_home_promo ASC";
                                        
                                        			foreach($db->selectALL($sql) as $data_home_promo){ 
                                        	    ?>
    												<li data-target="#" data-slide-to="<?php echo $i; ?>" >
    												    <a href="<?php echo $data_home_promo['link_gambar']; ?>" <?php if ($data_home_promo['tipe_link'] == "newtab") { echo "target='_blank'"; } ?> >
    													    <img src="images/banner_mid/<?php echo $data_home_promo['gambar']; ?>" class="img-responsive" alt="Slide 1">
    													    <div class="caption" align="center">
                                                                <b><?php echo $data_home_promo['nama_home_promo']; ?></b>
                                                            </div>
                                                        </a>
    												</li>
    											<?php $i++; } ?>
									  		</ul>
									</div>
		<div class="clearfix"></div>

	</div>
	
	</center>