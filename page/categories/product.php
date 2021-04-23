        <?php
            $link = "index.php?page=categories";
                            
            if ($_GET['id'] == "Essentials"){ 
                                
                $link = $link ."&id=". $_GET['id'] ."";
                                
            }else if ($_GET['id2'] != ""){  
                                
                $link = $link ."&id2=". $_GET['id2'] ."";
                                
            }else if ($_GET['id3'] != ""){  
        	                    
        	   $link = $link ."&id3=". $_GET['id3'] ."";
        	                    
            }else if ($_GET['id4'] != ""){  
        	                    
        	   $link = $link ."&id4=". $_GET['id4'] ."";
        	                    
        	}else{ 
        					    
        	    $link = $link ."&id=". $_GET['id'] ."";
        					    
        	}
        	
        	//if ($_GET['hal'] != ""){
        	    //$link = $link ."&hal=". $_GET['hal'] ."";
        	//}
        	
        	//if ($_GET['hal'] != ""){ $link = $link ."&hal=". $_GET['hal'] .""; }
        	if ($_GET['tampil'] != ""){ $link_select1 = $link ."&tampil=". $_GET['tampil'] .""; } else { $link_select1 = $link; }
        	if ($_GET['sort'] != ""){ $link_select2 = $link ."&sort=". $_GET['sort'] .""; } else { $link_select2 = $link; }
        ?>
            <?php if ($_GET['id4'] != "new_arrivals") { ?>
			<div class="sort-grid">
				<div class="sorting">
					<h6>Sort By</h6>
					<select id="country1" onchange="location = this.value;" class="frm-field required sect">
					    <?php $link_select = $link_select1; ?>
					    <option value="<?php echo $link_select; ?>" <?php if($_GET['sort']=="") echo"selected='selected'"; ?> >Default</option>
					    
					    <?php $link_select = $link_select1 ."&sort=naz"; ?>
						<option value="<?php echo $link_select; ?>" <?php if($_GET['sort']=="naz") echo"selected='selected'"; ?> >Name(A - Z)</option>
						
						<?php $link_select = $link_select1 ."&sort=nza"; ?>
						<option value="<?php echo $link_select; ?>" <?php if($_GET['sort']=="nza") echo"selected='selected'"; ?> >Name(Z - A)</option>
						
						<?php $link_select = $link_select1 ."&sort=phl"; ?>
						<option value="<?php echo $link_select; ?>" <?php if($_GET['sort']=="phl") echo"selected='selected'"; ?> >Price(High - Low)</option>	
						
						<?php $link_select = $link_select1 ."&sort=plh"; ?>
						<option value="<?php echo $link_select; ?>" <?php if($_GET['sort']=="plh") echo"selected='selected'"; ?> >Price(Low - High)</option>
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="sorting">
					<h6>Showing</h6>
					<select id="country2" onchange="location = this.value;" class="frm-field required sect">
					    <?php $link_select = $link_select2 ."&tampil=6"; ?>
						<option value="<?php echo $link_select; ?>" <?php if($_GET['tampil']=="6") echo"selected='selected'"; ?> >6</option>
						
						<?php $link_select = $link_select2 ."&tampil=9"; ?>
						<option value="<?php echo $link_select; ?>" <?php if($_GET['tampil']=="9") echo"selected='selected'"; ?> >9</option>
						
						<?php $link_select = $link_select2 ."&tampil=12"; ?>
						<option value="<?php echo $link_select; ?>" <?php if($_GET['tampil']=="12") echo"selected='selected'"; ?> >12</option>	
						
						<?php $link_select = $link_select2 ."&tampil=21"; ?>
						<option value="<?php echo $link_select; ?>" <?php if($_GET['tampil']=="21") echo"selected='selected'"; ?> >21</option>							
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php } ?>
			
					<?php
					
					    $halaman = 6; //data tampil perhalaman
					    if ($_GET['tampil'] != ""){
					        $halaman = $_GET['tampil'];
					    }
					
					    if (($data_header['id_sp_produk'] == "") && ($_GET['tampil'] == "")){
					        $halaman = "12";
					    }
				    
					    
                        $page = isset($_GET['hal'])? (int)$_GET["hal"]:1;
                        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                        
                        //$query = mysql_query("select * from tb_masjid LIMIT $mulai, $halaman");
						$count = 0;
	                    
	                   	if ($_GET['id'] == "Essentials"){ 
	                   	    
							$sql = "SELECT *
							        FROM produk 
		                    		WHERE id_sp_produk IN (SELECT id_sp_produk FROM kategori_sp_produk WHERE id_k_produk = 'K003') AND status='Aktif' ";
		                    		
		                    $sql_count = "SELECT count(*) as jml
        							      FROM produk
        							      WHERE id_sp_produk IN (SELECT id_sp_produk FROM kategori_sp_produk WHERE id_k_produk = 'K003') AND status='Aktif' ";
        							      
	                   	}else if ($_GET['id2'] != ""){  
	                   	    
	                   	    $sql = "SELECT *
							        FROM produk 
		                    		WHERE md5(id_warna) IN ('". $_GET['id2'] ."', md5('all')) AND status='Aktif' ";
		                    		
		                    $sql_count = "SELECT count(*) as jml
        							      FROM produk
        							      WHERE md5(id_warna) IN ('". $_GET['id2'] ."', md5('all')) AND status='Aktif' ";
		                    		
	                   	}else if ($_GET['id3'] != ""){  
	                   	    
	                   	    $sql = "SELECT *
							        FROM produk 
		                    		WHERE nama_produk like '%". $_GET['id3'] ."%' AND status='Aktif' ";
		                    		
		                    $sql_count = "SELECT count(*) as jml
        							      FROM produk
        							      WHERE nama_produk like '%". $_GET['id3'] ."%' AND status='Aktif' ";
        							      
	                   	}else if ($_GET['id4'] == "new_arrivals"){  
	                   	    
	                   	    $sql = "SELECT *
							        FROM produk WHERE status='Aktif' ";
		                    		
		                    $sql_count = "SELECT count(*) as jml
        							      FROM produk WHERE status='Aktif' ";
    		                    		  
	                   	}else if ($_GET['id4'] == "promo"){  
	                   	    
	                   	    $sql = "SELECT *
							        FROM produk 
							         WHERE harga_diskon > 0 AND status='Aktif' ";
		                    		
		                    $sql_count = "SELECT count(*) as jml
        							      FROM produk
        							       WHERE harga_diskon > 0 AND status='Aktif' ";
        							       
	                   	}else if ($_GET['id4'] == "esspromo"){  
	                   	    
	                   	    $sql = "SELECT p.*
							        FROM produk p INNER JOIN kategori_sp_produk ksp ON p.id_sp_produk = ksp.id_sp_produk
							         WHERE p.harga_diskon > 0 AND p.status='Aktif' AND ksp.id_k_produk = 'K004' ";
		                    		
		                    $sql_count = "SELECT count(p.*) as jml
        							      FROM produk p INNER JOIN kategori_sp_produk ksp ON p.id_sp_produk = ksp.id_sp_produk
        							       WHERE harga_diskon > 0 AND status='Aktif' AND ksp.id_k_produk = 'K004' ";
        							       
	                   	}else if ($_GET['id4'] == "terlaris"){  
	                   	    
	                   	    $sql = "SELECT (SELECT sum(qty) 
	                   	                    FROM `d_penjualan_dll` 
	                   	                    WHERE d_penjualan_dll.id_produk = produk.id_produk), 
	                   	                    produk.* 
	                   	            FROM produk 
	                   	            WHERE status='Aktif' ORDER By 1 DESC ";
		                    		
		                    $sql_count = "SELECT count(*) as jml
        							      FROM produk
        							       WHERE status='Aktif' ";
    		                    		  
						}else{ 
						    
							if ($data_header['id_sp_produk'] == ""){
						        
						        $sql = "SELECT *
    							        FROM produk 
    		                    		WHERE status='Aktif' ";	
    		                    		
    		                    $sql_count = "SELECT count(*) as jml
            							      FROM produk 
        		                    		  WHERE status='Aktif'";
        		                    		  
						    }else{
						        
    							$sql = "SELECT *
    							        FROM produk 
    		                    		WHERE id_sp_produk = '". $data_header['id_sp_produk'] ."' AND status='Aktif' ";	
    		                    		
    		                    $sql_count = "SELECT count(*) as jml
            							      FROM produk 
        		                    		  WHERE id_sp_produk = '". $data_header['id_sp_produk'] ."' AND status='Aktif'";
        		                    		  
						    }
						}
						
						if ($_GET['id4'] != "new_arrivals") {
						    
    						if ($_GET['sort'] == "naz"){ 
    						    
    						    $sql = $sql. " ORDER BY nama_produk ASC ";
    						    
    						}else if ($_GET['sort'] == "nza"){ 
    						    
    						    $sql = $sql. " ORDER BY nama_produk DESC ";
    						    
    						}else if ($_GET['sort'] == "phl"){ 
    						    
    						    $sql = $sql. " ORDER BY harga_produk DESC ";
    						    
    						}else if ($_GET['sort'] == "plh"){ 
    						    
    						    $sql = $sql. " ORDER BY harga_produk ASC ";
    						    
    						}
						
						}else{
						    $sql = $sql. " ORDER BY id_produk DESC ";
						}
						
						    $sql = $sql. "LIMIT $mulai, $halaman";
						    
                        //echo $sql;
	                    foreach($db->selectALL($sql) as $data_produk){
	                    	$count = $count + 1;
	                    	$enkrip = md5($data_produk['id_produk']);
	                ?>
	                
							<div class="col-md-4 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="images/produk/<?php echo $data_produk['gambar_1']; ?>" alt="" class="">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="index.php?page=product-categories&id=<?php echo $enkrip; ?>" class="link-product-add-cart"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
											</div>
										</div>
										<?php if ($_GET['id4'] == "new_arrivals"){ ?>
										    <span class="product-new-top">Produk Baru</span>
										<?php } else if ($data_produk['harga_diskon'] > 0){ ?>
										    <span class="product-new-top">Promo</span>
										<?php } ?>
									</div>
									<div class="item-info-product ">
										<h5>
										    <a href="index.php?page=product-categories&id=<?php echo $enkrip; ?>">
										        <?php if (strlen($data_produk['nama_produk']) < 22) { ?>
										            <div id="nama_produk"><?php echo $data_produk['nama_produk']; ?></div>
										        <?php }else{ ?>
										            <div id="nama_produk"><?php echo substr($data_produk['nama_produk'],0,22); ?><font color="grey"><?php echo substr($data_produk['nama_produk'],22,3); ?></font></div>
										        <?php } ?>
										    </a>
										</h5>
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

					<?php if ($count == 0) { ?>
						data yang anda cari tidak ditemukan.
					<?php } ?>

			<div class="clearfix"></div>
			
			<?php if ($_GET['id4'] != "new_arrivals") { ?>
			<div align="right">
        		<ul class="pagination">
        			<?php 
        			/*
                        $halaman = 10; //batasan halaman
                        $page = isset($_GET['hal'])? (int)$_GET["hal"]:1;
                        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                        
                        //$query = mysql_query("select * from tb_masjid LIMIT $mulai, $halaman");
                    */
                        
                        //$sql_count = "SELECT count(*) as jml FROM produk";
        				$data = $db->selectOne($sql_count);
                        $total = $data['jml'];
                        
                        $pages = ceil($total/$halaman); 
                        
                        //echo $total. "<br>";
                        //echo $halaman. "<br>";
                        //echo $pages. "<br>";
                    
                        if ($_GET['tampil'] != ""){
                    	    $link = $link ."&tampil=". $_GET['tampil'] ."";
                    	}
                    	
                    	if ($_GET['sort'] != ""){
                    	    $link = $link ."&sort=". $_GET['sort'] ."";
                    	}
        	
                        for ($i=1; $i<=$pages ; $i++){
        					
        					$link_i = $link ."&hal=". $i ."";
                    ?>
                            <li <?php if($_GET['hal'] == $i ){ echo "class='active'"; } ?> ><a href="<?php echo $link_i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
            <div class="clearfix"></div>