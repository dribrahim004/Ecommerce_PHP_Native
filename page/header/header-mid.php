		<!-- header-bot -->
		<br>
		<div class="col-md-2 logo-w3">
				<h1><a href="index.php"><img src="images/logo/logo_soka.png" alt=" " /></a></h1>
		</div>
		<!-- header-bot -->
		<div class="col-md-3 header-middle search-agileinfo">
			<form action="index.php" method="get">
			        <input type="hidden" name="page" value="categories">
					<input type="search" name="id3" placeholder="Cari produk..." required="">
					<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>

		<div class=" wthreecartaits wthreecartaits2 cart cart ">
		    
		    <?php session_start(); if ($_SESSION['hak_login']=="done") { ?> 
    			<?php
    				$link = "";
    				if ($_SESSION['enkrip'] != ""){
    					$link = "index.php?page=cart&id=". $_SESSION['enkrip'] ."";
    				}
    				
    				$db = new database(0);
            		$sql = "SELECT sum(dp.qty) as all_qty
                            FROM po INNER JOIN d_po dp ON po.id_po = dp.id_po
                            WHERE md5(po.id_member) = '". $_SESSION['enkrip'] ."' AND po.status_po = 'pemesanan'"; 
            		$data_troli = $db->selectOne($sql);
            		$qty_troli = $data_troli['all_qty'];
            		if ($qty_troli < 1){
            		    $qty_troli = 0;
            		}
    			?>
    			<button class="w3view-cart " type="submit" name="submit" value="" onclick="window.location='<?php echo $link; ?>'">
    				<i class="fa fa-cart-arrow-down" aria-hidden="true"><span class="badge badge-important rw-number-notification" ><div id="jml_troli"><?php echo $qty_troli; ?></div></span></i>
    			</button>
    		
    			
			<?php } else { ?>
			
    			<a href="#" data-toggle="modal" data-target="#myModal">
    			    <button class="w3view-cart " type="button" >
    				    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
    			    </button>
    			</a>
    			
    		<?php } ?>
		</div>

		<div class="clearfix"></div>