<script type='text/javascript'>(function(p,r,i,s,m) {var a = 'v2';s = r.createElement('script');m = r.getElementsByTagName('body')[0].appendChild(s);s.src = 'https://prismapp-files.s3.amazonaws.com/widget/prism.js?' + a.toString(); s.async = true;s.onload = function() {p.Shamu = new Prism('fc4b0915-f99b-44b9-91ce-18e131cb4ed4');Shamu.display();}})(window, document);</script>

	<!-- header -->

	<?php 

		if ($page == "shipping" || $page == "metode-payment" || $page == "payment"){

	?>



		<!-- header-bot -->

		<div class="header-bot">

			<div class="header-bot_inner_wthreeinfo_header_mid">

				<?php include('page/header/header-mid-2.php'); ?>

			</div>

		</div>

		<!-- //header-bot -->



	<?php }else{ ?>

	

		<div class="header-top">

			<?php include('page/header/header-top.php'); ?>

		</div>

		

		<!-- //header -->

		<!-- header-bot -->

		<div class="header-bot">

			<div class="header-bot_inner_wthreeinfo_header_mid">

				<?php include('page/header/header-mid.php'); ?>

			</div>

		</div>

		<!-- //header-bot -->

		<!-- banner -->

		<div class="ban-top">

			<?php include('page/header/navbar.php'); ?>

		</div>

		<!-- //banner-top -->

	<?php } ?>



	<?php 

		if($page =="register-sukses"){

			include('page/account/register_sukses.php');

		}else if($page =="verifikasi"){

			include('page/account/verifikasi.php');



        }else if($page =="lupa_password"){

			include('page/account/lupa_password.php');

		}else if($page =="lupa-password-sukses"){

			include('page/account/lupa_pass_sukses.php');

		}else if($page =="form-lupa-password"){

			include('page/account/form_lupa_pass.php');

		}else if($page =="form-lupa-password-sukses"){

			include('page/account/form_lupa_pass_sukses.php');
        
        
        
		}else if($page == "new_arrivals"){

			include('page/categories/categories.php');

		}else if($page == "categories"){

			include('page/categories/categories.php');

		}else if($page == "product-categories"){

			include('page/categories/product-view.php');

			

		}else if($page == "cart"){

			include('page/checkout/cart.php');

		}else if($page == "shipping"){

			include('page/checkout/shipping.php');

		}else if($page == "metode-payment"){

			include('page/checkout/metode-payment.php');

		}else if($page == "payment"){

			include('page/checkout/payment.php');

		}else if($page == "confirm-payment"){

			include('page/checkout/confirm-payment.php');
			
		}else if($page == "confirm-payment-berhasil"){

			include('page/checkout/confirm-payment-berhasil.php');



		}else if($page == "account"){

			include('page/account/account.php');

		}else if($page == "profile"){

			include('page/account/account.php');

		}else if($page == "address"){

			include('page/account/account.php');

		}else if($page == "new_address"){

			include('page/account/account.php');
		
		}else if($page == "edit_address"){
			include('page/account/account.php');
		}
		
		
		else if($page == "transaksi"){
			include('page/account/account.php');
		}
		else if($page == "detail-transaksi"){
			include('page/account/account.php');
		}
		else if($page == "wishlist"){
			include('page/account/account.php');
		}
		
		
		else if($page == "about"){
			include('page/about/about.php');
		}
		else if($page == "store"){
			include('page/about/store.php');
		}
		else if($page == "distribution"){
			include('page/about/distribution.php');
		}
		else if($page == "privacy-policy"){
			include('page/about/privacy-policy.php');
		}
		else if($page == "terms-conditions"){
			include('page/about/terms-conditions.php');
		}
		else if($page == "contact"){
			include('page/about/contact.php');
		}
		
		
		else if($page == "how-to-order"){
			include('page/help/how-to-order.php');
		}
		else if($page == "payment-guide"){
			include('page/help/payment-guide.php');
		}
		else if($page == "return-page"){
			include('page/help/return-page.php');
		}
		else if($page == "form-return"){
			include('page/help/form-return.php');
		}
		else if($page == "form-return-berhasil"){
			include('page/help/form-return-berhasil.php');
		}
		
		
		else if($page == "testimonial"){
			include('page/dll/testimonial.php');
		}
		else if($page == "tertarikjadidistributor"){
			include('page/dll/tertarikjadidistributor.php');
		}
		
		
		else{
			include('page/master/home.php');
		}

 	?>



	<?php if ($page == "product-categories"){ ?>

        <!-- Modal Popup Troli-->

        <div class="modal fade" id="myModals_cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-lg">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="myModalLabel">Produk baru telah ditambahkan ke Keranjang anda</h4>

                   	</div>

                    <div class="modal-body">

                        <div class="preview_troli"></div>

                    </div>

                    <div class="modal-footer">

                    	<!--

                        <button type="button" class="btn btn-default" data-dismiss="modal">Lanjutkan Belanja</button>

                        <button type="button" class="btn btn-default" onclick="window.location='index.php?page=cart&id=<?php //echo md5($_SESSION['id_member']); ?>'">Lihat Keranjang</button>

                        <button type="button" class="btn btn-default" onclick="window.location='index.php?page=shipping&id=<?php //echo md5($_SESSION['id_member']); ?>'">Lanjut ke Pembayaran</button>

                        -->

                    </div>

                </div>

            </div>

        </div>

    <?php } ?>	

        <div class="modal fade" id="myModals_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-lg">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                   	</div>

                    <div class="modal-body">
                        <center>
                            <img src="images/error_web.jpg" height="90%" width="95%">
                        </center>
                    </div>

                    <div class="modal-footer">

                    </div>

                </div>

            </div>

        </div>

 	<?php if ($page == "shipping" || $page == "metode-payment" || $page == "payment"){  }else{ ?>

		<!-- footer -->

		<div class="footer">

			<?php include('page/footer/footer.php'); ?>

		</div>

		<!-- //footer -->

	<?php } ?>	
	
	
	
	






