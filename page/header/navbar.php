<div class="container navbar-margin">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">

				  	<li class="menu__item dropdown">
					   			<a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">What's New <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
								    <!-- <li><a href="https://drive.google.com/file/d/1bhlw2fe4l-Q_M4yl74i0ZYxBkQHp4kIo/view" target="_blank">Katalog Produk</a></li> -->
								    <li><a href="https://drive.google.com/file/d/1NSVYehoRPpPnrDuP9a4qqGpVudfpi4cN/view" target="_blank">Katalog Produk</a></li>
									<li><a href="index.php?page=categories&id4=new_arrivals">Produk Terbaru</a></li>
									<li><a href="index.php?page=categories&id4=promo">Promo Produk</a></li>
									<li><a href="index.php?page=categories&id4=terlaris">Produk Terlaris</a></li>
								<!--
									<li><a href="http://soka.co.id/index.php?page=blog" target="_blank">News</a></li>
									<li><a href="index.php?page=distribution">Distributor Kami</a></li>
								-->
								</ul>
					</li>
					
				<?php
                    $db = new database(0);
                    $sql = "SELECT * FROM kategori_produk ORDER BY id_k_produk ASC";
                    foreach($db->selectALL($sql) as $data){

                    	$sql = "SELECT * FROM gambar_menu
                                WHERE id_k_produk = '". $data['id_k_produk'] ."'";
                        $data_gambar = $db->selectOne($sql);

                    	//if ($data['id_k_produk'] == "K003"){
                ?>
                        <!--
		                	<li class="dropdown menu__item">
								<a href="index.php?page=categories&id=Essentials" class="menu__link" role="button" aria-haspopup="true" aria-expanded="false">Soka Essentials</a>
							</li>
                        -->
                        
						<?php //} else { ?>					

					<li class="menu__item dropdown">
					   			<a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $data['nama_k_produk']; ?> <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									
								<?php
				                    $db = new database(0);
				                    $sql = "SELECT * FROM kategori_sp_produk WHERE id_k_produk = '". $data['id_k_produk'] ."' AND id_sp_produk IN (SELECT DISTINCT id_sp_produk FROM produk WHERE status = 'Aktif') ORDER BY nama_sp_produk ASC";
				                    foreach($db->selectALL($sql) as $data_submenu){
				                    	$enkrip = md5($data_submenu['id_sp_produk']);
				                ?>
									    <li><a href="index.php?page=categories&id=<?php echo $enkrip; ?>"><?php echo $data_submenu['nama_sp_produk']; ?></a></li>
								<?php } ?>
										
							</ul>
					</li>
                
				<?php } //} ?>
				
				    <!--
				    <li class="dropdown menu__item">
						<a href="index.php?page=tertarikjadidistributor" class="menu__link" role="button" aria-haspopup="true" aria-expanded="false">?</a>
					</li>
					-->
				            
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			
		</div>
		<div class="clearfix"></div>
	</div>
	
    <style>.button-wa {
                position:fixed;
                bottom:20px;
                right:20px;
                z-index:99999;
            }
    </style>
    <a target="_blank" class="button-wa" href="https://api.whatsapp.com/send?phone=6282240027798&amp;text=Halo, saya mau pesan Soka Socks ke%20%3A%20%0A Nama%20%3A%20%0A No Hp%20%3A%20%0A Alamat ( jalan, no, RT, RW)%20%3A%20%0A Kelurahan, Kecamatan%20%3A%20%0A Kota/Kab%20%3A%20%0A Kode Pos%20%3A%20%0A Orderan (nama produk, warna, jumlah):" title="">
        <img style="width:150px;" src="images/whatapp_chat.png" />
    </a>