<!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
		<div class="container margin-account">
	         <!-- mens -->
			<div class="col-md-3 products-left sidebar-account-left">
				<?php include('page/account/sidebar-account.php'); ?>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-9 products-right sidebar-account-right">

							<?php 
								if ($page=="profile"){
									include('page/account/profile.php');
									
								}else if ($page=="address"){
									include('page/account/address.php');
								}else if ($page=="new_address"){
									include('page/account/new_address.php');
								}else if ($page=="edit_address"){
									include('page/account/edit_address.php');
									
								}else if ($page=="transaksi"){
									include('page/account/transaksi.php');
								}else if ($page=="detail-transaksi"){
									include('page/account/detail_transaksi.php');
									
								}else if ($page=="wishlist"){
									include('page/account/wishlist.php');
								}else{
									include('page/account/info-account.php');
								}
							 ?>
			</div>
		

			<div class="clearfix"></div>
		</div>
	</div>	
	