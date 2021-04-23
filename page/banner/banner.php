	
		<div class="carousel-inner" role="listbox">
		<?php
			$count = 1;
			$sql = "SELECT * FROM home_slider WHERE status = 'Aktif' ORDER BY number_tampil ASC LIMIT 5";

			foreach($db->selectALL($sql) as $data_home_slider){

				if ($count == 1){
		?>
					<div class="item active"> 
						<a href="<?php echo $data_home_slider['link_gambar']; ?>" <?php if ($data_home_slider['tipe_link'] == "newtab") { echo "target='_blank'"; } ?> ><img src="images/banner/<?php echo $data_home_slider['gambar']; ?>" alt=""></a>
					</div>

			<?php } else { ?>

					<div class="item item<?php echo $count; ?>"> 
						<a href="<?php echo $data_home_slider['link_gambar']; ?>" <?php if ($data_home_slider['tipe_link'] == "newtab") { echo "target='_blank'"; } ?> ><img src="images/banner/<?php echo $data_home_slider['gambar']; ?>" alt=""></a>
					</div>

		<?php } $count = $count + 1; } ?>

		</div>

		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php for ($i = 0; $i <= $count -2; $i++){ 
				if ($i == 0){ ?>
					<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="active"></li>
				<?php } else { ?>
					<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class=""></li>
			<?php } } ?>
		</ol>

		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->