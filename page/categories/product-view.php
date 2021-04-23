    <?php 
        function getRealIP()
        {
          if (!empty($_SERVER['HTTP_CLIENT_IP'])) //CHEK IP YANG DISHARE DARI INTERNET  
          {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
          }
          elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) //UNTUK CEK IP DARI PROXY  
          {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
          }
          else
          {
            $ip=$_SERVER['REMOTE_ADDR'];
          }
          return $ip;
        }
        
        $lokasi = $_SERVER['TZ'];
        
		$db = new database(0);
		$sql = "SELECT kp.nama_k_produk, ksp.nama_sp_produk, p.*
                FROM produk p 
                		INNER JOIN kategori_sp_produk ksp ON p.id_sp_produk = ksp.id_sp_produk 
                		INNER JOIN kategori_produk kp ON kp.id_k_produk = ksp.id_k_produk
                WHERE md5(id_produk) = '". $_GET['id'] ."'";
		$data_produk = $db->selectOne($sql);
		
		//$sql = "UPDATE produk SET view = view + 1 WHERE md5(id_produk)='". $_GET['id'] ."'";
		$sql = "INSERT INTO view_produk (tgl_lihat, id_produk, lokasi, ip) VALUES (now(), '". $data_produk['id_produk'] ."','". $lokasi ."','". getRealIP() ."')";
        //echo $sql;
		if ($db->IUD_db($sql)){
			//berhasil
        }else{
            //gagal
		}
	?>

    <!-- /banner_bottom_agile_info -->
	<div class="container">
						<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short_cat">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li ><a href="#"><?php echo $data_produk['nama_k_produk']; ?></a><i>|</i></li>
								<li><?php echo $data_produk['nama_sp_produk']; ?></li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>

	 <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
		<div class="container margin-categories">
		     <div class="col-md-4 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						
						<ul class="slides">
							<li data-thumb="images/produk/<?php echo $data_produk['gambar_2']; ?>">
								<div class="thumb-image"> <img src="images/produk/<?php echo $data_produk['gambar_2']; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						<?php if ($data_produk['gambar_3'] != ""){ ?>
							<li data-thumb="images/produk/<?php echo $data_produk['gambar_3']; ?>">
								<div class="thumb-image"> <img src="images/produk/<?php echo $data_produk['gambar_3']; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>	
					    <?php } ?>
					    
					    <?php if ($data_produk['gambar_4'] != ""){ ?>
							<li data-thumb="images/produk/<?php echo $data_produk['gambar_4']; ?>">
								<div class="thumb-image"> <img src="images/produk/<?php echo $data_produk['gambar_4']; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						<?php } ?>
						</ul>
						<div class="clearfix"></div>
					</div>	
				</div>
			</div>

					<div class="col-md-8 single-right-left simpleCart_shelfItem">
						<h3><?php echo $data_produk['nama_produk']; ?></h3>
						<p>
							<?php if ( ($data_produk['harga_diskon'] > 0) ) { ?>
								<span id="harga" class="item_price">Rp.<?php echo number_format($data_produk['harga_diskon'],0,',','.'); ?></span>
								<del>Rp.<?php echo number_format($data_produk['harga_produk'],0,',','.'); ?></del>
							<?php } else { ?>
								<span id="harga" class="item_price">Rp.<?php echo number_format($data_produk['harga_produk'],0,',','.'); ?></span>
							<?php } ?>
						</p>

						<div>
							<p>Qty : <input id="qty" type="number" value="1" style="width: 50px;"></p>
						</div>

					
						<input id="id_b" type="hidden" value="<?php echo $_GET['id']; ?>">
						
						<?php 
							include('lib/class/stokbarang.php');

							$stok = 0;
                            $stokbarang = new stokbarang("0",$data_produk['id_produk']);
                            $stok = $stokbarang->hitungstok();
                            
							if ($stok > 0){ 
						?>
							
								<p>
									<span>
										<div class="occasion-cart">
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
												<input id="add_cart" type="button" name="add_cart" value="Add to cart" class="button">
											</div>
										</div>
									</span>	
								
							<?php } else { ?>

									<br>*Stok barang tidak tersedia

						<?php } ?>

									<span>
										<div class="occasion-cart-2">
										  	<button type="button" class="btn btn-warning" id="add_wishlist">
		                            			<i class="fa fa-heart" aria-hidden="true"></i> Tambah ke Wishlist
		                        			</button>
		                        		</div>
									</span>	
								</p>

					

					
						
							
						
						
		      		</div>

<div class="container margin-about">
<div class="col-md-12" >
									<div class="banner-menu img-product">
									<ul class="list-inline">
										<?php
											$sql = "SELECT * FROM produk WHERE id_sp_produk = '". $data_produk['id_sp_produk'] ."' AND md5(id_produk) != '". $_GET['id'] ."' AND status='Aktif'";
											if ($data_produk['id_sp_produk'] == "SK048"){
											    $nama = substr($data_produk['nama_produk'],0,8);
											    $sql = "SELECT * FROM produk WHERE nama_produk like '$nama%' AND status='Aktif'";    
											}
											
						                    foreach($db->selectALL($sql) as $data_produk_dll){
						                    	$enkrip = md5($data_produk_dll['id_produk']);
				               				 ?>
											
												<li data-target="#" data-slide-to="0" class="active ">
													<a title="<?php echo $data_produk_dll['nama_produk']; ?>" href="index.php?page=product-categories&id=<?php echo $enkrip; ?>">
													<img src="images/produk/<?php echo $data_produk_dll['gambar_1']; ?>" class="img-thumbnail" alt="Slide 1">
													</a>
												</li>
											  
									  		
									  		<?php } ?>
									</ul>
									</div><!-- banner-menu -->
</div>
</div>
		<div class="clearfix"> </div>
		
		<!-- //new_arrivals --> 
		<div class="responsive_tabs_agileits"> 
				<div id="">
						<ul class="resp-tabs-list">
							<li>Deskripsi</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">
							   <p><h5><?php echo $data_produk['detail_deskripsi']; ?></h5></p>
							</div>
						</div>
						
					</div>
				</div>	
		</div>
	  	<!--/slider_owl-->
	<div class="clearfix"> </div>
	
		<!-- //new_arrivals --> 
	  	<!--/slider_owl-->
	
				        <div class="w3_agile_latest_arrivals produk-troll">
                            <h3 class="wthree_text_info">Produk <span>Lainnya</span></h3>
                            <?php
                                $sql = "SELECT * FROM produk 
                                        WHERE status='Aktif' 
                                        ORDER BY view DESC LIMIT 2";   

                                foreach($db->selectALL($sql) as $data_produk){
                                    $enkrip = md5($data_produk['id_produk']);
                            ?>
                                    <div class="col-md-3 product-men">
                                        <div class="men-pro-item simpleCart_shelfItem">
                                            <div class="men-thumb-item">
                                                <img src="images/produk/<?php echo $data_produk['gambar_1']; ?>" alt="" class="">
                                                <div class="men-cart-pro">
                                                    <div class="inner-men-cart-pro">
                                                        <a href="index.php?page=product-categories&id=<?php echo $enkrip; ?>" class="link-product-add-cart"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                    </div>
                                                </div>
                                                <!-- <span class="product-new-top">New</span> -->
                                            </div>
                                            <div class="item-info-product ">
                                                <h4><a href="index.php?page=product-categories&id=<?php echo $enkrip; ?>"><div id="nama_produk"><?php echo $data_produk['nama_produk']; ?></div></a></h4>
                                                <div class="info-product-price">
                                                    
                                                    <?php if ( ($data_produk['harga_diskon'] > 0) AND ($data_produk['stok_diskon'] > 0) ) { ?>
                                                        <span id="harga" class="item_price">Rp.<?php echo number_format($data_produk['harga_diskon'],0,',','.'); ?></span>
                                                        <del>Rp.<?php echo number_format($data_produk['harga_produk'],0,',','.'); ?></del>
                                                    <?php } else { ?>
                                                        <span id="harga" class="item_price">Rp.<?php echo number_format($data_produk['harga_produk'],0,',','.'); ?></span>
                                                    <?php } ?>
                                                    
                                                </div>
                                            <?php /* if ($data_produk['stok_produk'] > 0) { ?>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                    <input id="add_cart" type="button" name="add_cart" value="Add to cart" class="button">
                                                </div>
                                            <?php } */?>
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
                            
                            <?php
                                $sql = "SELECT * FROM produk 
                                        WHERE status='Aktif' 
                                        ORDER BY view ASC LIMIT 2";   

                                foreach($db->selectALL($sql) as $data_produk){
                                    $enkrip = md5($data_produk['id_produk']);
                            ?>
                                    <div class="col-md-3 product-men">
                                        <div class="men-pro-item simpleCart_shelfItem">
                                            <div class="men-thumb-item">
                                                <img src="images/produk/<?php echo $data_produk['gambar_1']; ?>" alt="" class="">
                                                <div class="men-cart-pro">
                                                    <div class="inner-men-cart-pro">
                                                        <a href="index.php?page=product-categories&id=<?php echo $enkrip; ?>" class="link-product-add-cart"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                    </div>
                                                </div>
                                                <!-- <span class="product-new-top">New</span> -->
                                            </div>
                                            <div class="item-info-product ">
                                                <h4><a href="index.php?page=product-categories&id=<?php echo $enkrip; ?>"><div id="nama_produk"><?php echo $data_produk['nama_produk']; ?></div></a></h4>
                                                <div class="info-product-price">
                                                    
                                                    <?php if ( ($data_produk['harga_diskon'] > 0) AND ($data_produk['stok_diskon'] > 0) ) { ?>
                                                        <span id="harga" class="item_price">Rp.<?php echo number_format($data_produk['harga_diskon'],0,',','.'); ?></span>
                                                        <del>Rp.<?php echo number_format($data_produk['harga_produk'],0,',','.'); ?></del>
                                                    <?php } else { ?>
                                                        <span id="harga" class="item_price">Rp.<?php echo number_format($data_produk['harga_produk'],0,',','.'); ?></span>
                                                    <?php } ?>
                                                    
                                                </div>
                                            <?php /* if ($data_produk['stok_produk'] > 0) { ?>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                    <input id="add_cart" type="button" name="add_cart" value="Add to cart" class="button">
                                                </div>
                                            <?php } */?>
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
                            <div class="clearfix"> </div>
                        </div>
	       </div>
 		
 	</div>
		<!--//single_page-->
