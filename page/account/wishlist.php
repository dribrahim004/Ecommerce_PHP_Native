				    <?php	 
				        
                    	include('lib/class/stokbarang.php');
                    						
				        $sql = "SELECT w.*, p.*
				                FROM wishlist w INNER JOIN produk p ON w.id_produk=p.id_produk
				                WHERE md5(w.id_member) = '". $_SESSION['enkrip'] ."'";
					    foreach($db->selectALL($sql) as $data_produk){
	                    	$count = $count + 1;
	                    	$enkrip = md5($data_produk['id_produk']);
	                ?>
					        
					        <div class="col-md-4 product-men produk-wishlist">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="images/produk/<?php echo $data_produk['gambar_1']; ?>" alt="" class="">
										
										<a href="aksi.php?module=wishlist&act=hapus&id=<?php echo $_SESSION['enkrip']; ?>&id2=<?php echo $enkrip; ?>"><span class="product-new-top" alt="Hapus Wishlist">X</span></a>
										
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="index.php?page=product-categories&id=<?php echo $enkrip; ?>" class="link-product-add-cart"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
											</div>
										</div>
									</div>
									<div class="item-info-product ">
										<h4>
										    <a href="index.php?page=product-categories&id=<?php echo $enkrip; ?>">
										        <?php if (strlen($data_produk['nama_produk']) < 22) { ?>
										            <div id="nama_produk"><?php echo $data_produk['nama_produk']; ?></div>
										        <?php }else{ ?>
										            <div id="nama_produk"><?php echo substr($data_produk['nama_produk'],0,22); ?><font color="blue"><?php echo substr($data_produk['nama_produk'],22,3); ?></font></div>
										        <?php } ?>
										    </a>
										</h4>
										<div class="info-product-price">
										    
											<?php if ( ($data_produk['harga_diskon'] > 0) ) { ?>
												<span id="harga" class="item_price">Rp.<?php echo number_format($data_produk['harga_diskon'],0,',','.'); ?></span>
												<del>Rp.<?php echo number_format($data_produk['harga_produk'],0,',','.'); ?></del>
											<?php } else { ?>
												<span id="harga" class="item_price">Rp.<?php echo number_format($data_produk['harga_produk'],0,',','.'); ?></span>
											<?php } ?>
											
										</div>								
									</div>
								</div>
					        </div>
				    <?php } ?>