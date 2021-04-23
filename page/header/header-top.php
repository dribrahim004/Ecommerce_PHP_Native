
	<div class="">
		<div class="nav-top">
		<ul>
		   
		<li class="top">  <a href="index.php?page=confirm-payment"><i ></i><b> Konfirmasi Pembayaran  </b></a></li>
							
							<li> <a href="index.php?page=testimonial"><span ></span><b>Testimonial <i></i>|</a></b></li>
							<?php session_start(); if ($_SESSION['hak_login']!="done") { ?>

								<li> <a href="#" data-toggle="modal" data-target="#myModal2"><span ></span><b>Daftar </b></a></li>
								<li> <span ></span><b>  | </b></li>
				                <li> <a href="#" data-toggle="modal" data-target="#myModal"><span ></span><b>Login</b></a></li>
				                
				            <?php } else { ?>

						        <li class="dropdown" >
						          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i ></i> <b>Hai, <?php echo substr($_SESSION['nama_lengkap'],0,14)."..."; ?></b><span class="caret"></span></a>
						          <ul class="dropdown-menu">
						            <li><a href="index.php?page=account">Akun Saya</a></li>
						            <li><a href="index.php?page=wishlist">Barang Favorit </a></li>
						            <li><a href="index.php?page=transaksi">Transaksi Pembelian</a></li>
						            <li><a href="logout.php">Logout </a></li>
						          </ul>
						        </li>
						        
				            <?php } ?>
		</ul>
		</div>
	
	</div>


	<!-- Modal1 -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign<span> In</span></h3>
						<form method="post" action="aksi.php?module=login&act=validasi">
							<div class="styled-input">
								<input type="email" name="email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="password" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<input type="submit" value="Sign In">  <a href="index.php?page=lupa_password"> or Lupa Password </a>
						</form>
						 
						<div class="clearfix"></div>
						<p>Belum punya akun?<a href="#" data-toggle="modal" data-target="#myModal2" > Registrasi Sekarang</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/login/logpc.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal1 -->
<!-- Modal2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Register</h3>
						 <form action="aksi.php?module=register&act=add" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="nama_lengkap" required="">
								<label>Nama Lengkap</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="password" required=""> 
								<label>Password (min. 4 Karakter)</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="password_again" required=""> 
								<label>Konfirmasi Password</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="text" name="nomor_tlp" required=""> 
								<label>Nomor Tlp</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<img  src="lib/captcha/generatecaptcha.php" id='captchaimg' >
							</div> 
							<div class="styled-input">
                        		<input name="captcha" type="text" required=""/>
                        		<label>Masukan Kode di Atas</label>
								<span></span>
							</div> 
							
							<p>Dengan mengklik tombol Registrasi Sekarang, Maka Anda telah menyetujui <a href="index.php?page=terms-conditions">Syarat & Ketentuan</a> dan <a href="index.php?page=privacy-policy"> Kebijakan Privasi</a> dari Kami.</p>
							
							
							<input type="submit" value="Registrasi Sekarang">
						</form>
						  
						<div class="clearfix"></div>
					

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->