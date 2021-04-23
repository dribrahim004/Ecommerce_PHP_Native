<!-- /banner_bottom_agile_info -->
	<div class="container">
						<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short_cat">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li >Panduan Pembayaran</li>
								
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>

			 <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
		<div class="container margin-about">
				<div class="col-md-12" align="center">
					<hr>
						<h4 class="black-w3ls">Panduan<span>Pembayaran</span></h4>
				</div>
				<div class="col-md-12" >
				<b>Ketentuan Pembayaran</b><br/><br/>
				Pembayaran dilakukan oleh pembeli dalam jangka waktu yang sudah tertera pada halaman pembayaran, setelah pembayaran dipesan (checkout). Jika dalam jangka waktu tersebut pembeli belum melakukan pembayaran maka transaksi dianggap batal dan barang dikembalikan lagi stoknya ke dalam sistem.<br/><br/>

				Setelah Anda melakukan pembayaran melalui transfer bank, Anda harus mengkonfirmasikan pembayaran melalui halaman konfirmasi pembayaran.<br/><br/>
				Setelah kami menerima pembayaran Anda, kami akan mengkonfirmasi pembayaran tersebut dan status pesanan Anda akan dirubah menjadi "confirm" maksimal 3 jam setelah konfirmasi pembayaran (pada hari kerja).<br/><br/>

				<b>Metode Pembayaran</b><br/><br/>
				Untuk saat ini kami menyediakan metode pembayaran melalui transfer bank.
				</div>
			
			<?php
                $db = new database(0);
                $sql = "SELECT *
                        FROM bank";  
                                                
                foreach($db->selectALL($sql) as $data){
            ?>
				<div class="col-md-3">
				 <img src="images/bank/<?php echo $data['gambar']; ?>" style="width:180px; height: 80px;"><br/>
				   No. Rekening : <?php echo $data['no_rek']; ?><br />
                   A/n : <?php echo $data['atas_nama']; ?>
				</div>
			<?php } ?>	
		</div>
	</div>