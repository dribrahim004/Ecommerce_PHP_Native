	
	<?php 
		$db = new database(0);
		$sql = "SELECT ksp.*, kp.nama_k_produk, kp.id_k_produk
                FROM kategori_sp_produk ksp INNER JOIN kategori_produk kp ON kp.id_k_produk = ksp.id_k_produk
                WHERE md5(id_sp_produk) = '". $_GET['id'] ."'";
		$data_header = $db->selectOne($sql);
	?>
	<!-- /banner_bottom_agile_info -->
	<div class="page-head_agile_info_w3l">
	    
	    <?php 
    	    $sql = "SELECT *
                    FROM gambar_menu
                    WHERE id_k_produk = '". $data_header['id_k_produk'] ."'";
    		$data_banner = $db->selectOne($sql);
    		
    		if ($data_banner['gambar_1'] != ""){
		?>
		
	            <img src="images/banner_kategori/<?php echo $data_banner['gambar_1']; ?>">
	   <?php } else { ?>
	   
    	   <?php 
        	    $sql = "SELECT *
                        FROM gambar_menu
                        WHERE id_k_produk = 'ot'";
        		$data_banner = $db->selectOne($sql);
        		
        		if ($data_banner['gambar_1'] != ""){
    		?>
    		
    		    <img src="images/banner_kategori/<?php echo $data_banner['gambar_1']; ?>">
    	   
    	   <?php } ?>
	   
	   <?php } ?>
	    
		<div class="container">
			<!--<h3>SOKA<span>Original</span></h3>-->
			
				<!--/w3_short-->
				<div class="services-breadcrumb">
					<div class="agile_inner_breadcrumb">
						<ul class="w3_short">
						<?php if ($_GET['id'] == "Essentials"){ ?>
							<li><a href="index.php">Home</a><i>|</i></li><li>Soka Essentials</li>
						<?php }else if ($_GET['id2'] != ""){ ?>
						<?php }else if ($_GET['id3'] != ""){ ?>
						<?php }else if ($_GET['id4'] != ""){ ?>
						<?php }else{ if ($data_header['id_sp_produk'] == ""){?>
						       <?php }else{ ?>
            							<li><a href="index.php">Home</a><i>|</i></li><li><?php echo $data_header['nama_k_produk']; ?></li>
            							<li><i>|</i><?php echo $data_header['nama_sp_produk']; ?></li>
						<?php } } ?>
						</ul>
					</div>
				</div>
	   			<!--//w3_short-->
		</div>
	</div>

	<!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
		<div class="container margin-categories">
	         <!-- mens -->
			<div class="col-md-3 products-left">
				<?php include('page/categories/sidebar.php'); ?>
				<div class="clearfix"></div>
			</div>

			<div class="col-md-9 products-right">
				<?php include('page/categories/product.php'); ?>
				<div class="clearfix"></div>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>	
	<!-- //mens -->