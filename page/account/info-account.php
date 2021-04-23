					<?php
                    	$db = new database(1);
                    	$sql = "SELECT * FROM member WHERE md5(id_member) ='". $_SESSION['enkrip'] ."'";
                    	$dataP = $db->selectOne($sql);
                    ?>
					<h5><span>Hai, Selamat Datang <?php echo $dataP['nama_lengkap']; ?></span></h5>

						<div class="sort-grid">
							<div class="col-md-6 sidebar-right">
								
									
									
										<h4 class="black-w3ls"><a href="index.php?page=profile">Personal Data</a></h4>
										<div class="info-product-price">
											Informasi personal data 
											
										</div>
										
																			
								<hr>
								
							</div>

							<div class="col-md-6">
								
									
									
										<h4 class="black-w3ls"><a href="index.php?page=transaksi">Daftar Belanja</a></h4>
										<div class="info-product-price">
											Cek status pembelian 
											
										</div>
										
																			
								<hr>
								
							</div>

							<div class="col-md-6 ">
								
									
									
										<h4 class="black-w3ls"><a href="index.php?page=address">Alamat</a></h4>
										<div class="info-product-price">
											Kelola pengiriman pembelian barang
											
										</div>
										
										<hr>									
								
								
							</div>

							<div class="col-md-6 ">
								
									
									
										<h4 class="black-w3ls"><a href="index.php?page=wishlist">Favorit Saya</a></h4>
										<div class="info-product-price">
											Produk - produk favoritmu
											
										</div>
										
																			
								<hr>
								
							</div>
						
				
								<div class="clearfix"></div>
							
						
						</div>