        <?php 
            $db = new database(0);
            $sql = "SELECT id_member, email, nama_lengkap FROM member WHERE id_member = (SELECT id_member FROM po WHERE md5(id_po) = '". $_GET['id'] ."' AND status_po = 'metode-pembayaran')";
            //echo $sql;
            $data_member = $db->selectOne($sql);
            
            $sql = "SELECT * FROM po WHERE md5(id_po) = '". $_GET['id'] ."' AND status_po = 'metode-pembayaran'";
            //echo $sql;
            $dataP = $db->selectOne($sql);
            
            $sql = "SELECT * FROM promo_inv ORDER BY id_promo_inv DESC";
            //echo $sql;
            $data_promo_inv = $db->selectOne($sql);
            $gambar_promo_inv = $data_promo_inv['gambar'];
            $link_gambar_promo_inv = $data_promo_inv['link_promo_inv'];
            if ($data_promo_inv['link_promo_inv'] == ""){
                $link_gambar_promo_inv = "http://sokasocks.com/";
            }
            
            $gambar_inv ="<a href='$link_gambar_promo_inv' target='_blank'><img src='http://sokasocks.com/images/inv_promo/$gambar_promo_inv' width='100%'/></a>";
            if ( ($data_promo_inv['gambar'] == "") && ($data_promo_inv['link_promo_inv'] == "") ){
                $gambar_inv = "";
            }
            
            $id_member = $data_member['id_member'];
            $email = $data_member['email'];
			$nama_lengkap = strtoupper($data_member['nama_lengkap']);
			
			$no_pesan = $dataP['no_tagihan'];
			$nama_bank = $dataP['nama_bank'];
			$no_rek_bank = $dataP['no_rek_bank'];
			$atas_nama = $dataP['atas_nama'];
            
            if ( $dataP['sts_email'] <= 0 ) {                        		
            include('lib/class/email/class.phpmailer.php');
			            
		    $message ="
		         <!doctype html>
                 <html xmlns='http://www.w3.org/1999/xhtml'>
                 <head>
                  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                  <meta name='viewport' content='initial-scale=1.0' />
                  <meta name='format-detection' content='telephone=no' />
                  <title></title>
                  <style type='text/css'>
                 	body {
                		width: 100%;
                		margin: 0;
                		padding: 0;
                		-webkit-font-smoothing: antialiased;
                	}
                	@media only screen and (max-width: 600px) {
                		table[class='table-row'] {
                			float: none !important;
                			width: 98% !important;
                			padding-left: 20px !important;
                			padding-right: 20px !important;
                		}
                		table[class='table-row-fixed'] {
                			float: none !important;
                			width: 98% !important;
                		}
                		table[class='table-col'], table[class='table-col-border'] {
                			float: none !important;
                			width: 100% !important;
                			padding-left: 0 !important;
                			padding-right: 0 !important;
                			table-layout: fixed;
                		}
                		td[class='table-col-td'] {
                			width: 100% !important;
                		}
                		table[class='table-col-border'] + table[class='table-col-border'] {
                			padding-top: 12px;
                			margin-top: 12px;
                			border-top: 1px solid #E8E8E8;
                		}
                		table[class='table-col'] + table[class='table-col'] {
                			margin-top: 15px;
                		}
                		td[class='table-row-td'] {
                			padding-left: 0 !important;
                			padding-right: 0 !important;
                		}
                		table[class='navbar-row'] , td[class='navbar-row-td'] {
                			width: 100% !important;
                		}
                		img {
                			max-width: 100% !important;
                			display: inline !important;
                		}
                		img[class='pull-right'] {
                			float: right;
                			margin-left: 11px;
                            max-width: 125px !important;
                			padding-bottom: 0 !important;
                		}
                		img[class='pull-left'] {
                			float: left;
                			margin-right: 11px;
                			max-width: 125px !important;
                			padding-bottom: 0 !important;
                		}
                		table[class='table-space'], table[class='header-row'] {
                			float: none !important;
                			width: 98% !important;
                		}
                		td[class='header-row-td'] {
                			width: 100% !important;
                		}
                	}
                	@media only screen and (max-width: 480px) {
                		table[class='table-row'] {
                			padding-left: 16px !important;
                			padding-right: 16px !important;
                		}
                	}
                	@media only screen and (max-width: 320px) {
                		table[class='table-row'] {
                			padding-left: 12px !important;
                			padding-right: 12px !important;
                		}
                	}
                	@media only screen and (max-width: 600px) {
                		td[class='table-td-wrap'] {
                			width: 100% !important;
                		}
                	}
                  </style>
                 </head>
                 <body style='font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;' bgcolor='#113D68' leftmargin='0' topmargin='0' marginheight='0' marginwidth='0'>
                 <table width='100%' height='100%' bgcolor='#113D68' cellspacing='0' cellpadding='0' border='0'>
                 <tr><td width='100%' align='center' valign='top' bgcolor='#113D68' style='background-color:#113D68; min-height: 200px;'>
                <table><tr><td class='table-td-wrap' align='center' width='600'><table class='table-row' style='table-layout: auto; padding-right: 24px; padding-left: 24px; width: 580px; background-color: transparent;' bgcolor='transparent' width='580' cellspacing='0' cellpadding='0' border='0'><tbody><tr height='50px' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; height: 50px; background-color: transparent;'>
                   <td class='table-row-td' style='height: 50px; padding-right: 16px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; vertical-align: middle;' valign='middle' align='left'>
                     
                   </td>
                 
                   <td class='table-row-td' style='height: 50px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; text-align: right; vertical-align: middle;' align='right' valign='middle'>
                     
                   </td>
                </tr></tbody></table>
                
                
                <table class='table-space' height='16' style='height: 16px; font-size: 0px; line-height: 0; width: 580px; background-color: #ffffff;' width='580' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='16' style='height: 16px; width: 580px; background-color: #ffffff;' width='580' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                
                <table class='table-row' width='580' bgcolor='#FFFFFF' style='table-layout: fixed; background-color: #ffffff;' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-row-td' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 24px; padding-right: 24px;' valign='top' align='left'>
                 <table class='table-col' align='left' width='532' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td class='table-col-td' width='532' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;' valign='top' align='left'>	
                	<div style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;'>
                		<!--<img src='http://placehold.it/530x270' style='border: 0px none #444444; vertical-align: middle; display: block; padding-bottom: 9px;' hspace='0' vspace='0' border='0'> -->
                	</div>
                 </td></tr></tbody></table>
                </td></tr></tbody></table>
                
                <table class='table-row' width='580' bgcolor='#FFFFFF' style='table-layout: fixed; background-color: #ffffff;' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-row-td' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;' valign='top' align='left'>
                   <table class='table-col' align='left' width='508' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td class='table-col-td' width='508' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;' valign='top' align='left'>
                	 <table class='header-row' width='508' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td class='header-row-td' width='508' style='font-size: 17px; margin: 0px; font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; padding-bottom: 10px; padding-top: 15px;' valign='top' align='left'>
                
                	 	<img src='http://sokasocks.com/images/logo/logo_soka.png' width='20%'/><br>
                	 	<hr color='#e94724'>
                	 	Nomor Pemesanan : $no_pesan
                
                	 </td></tr></tbody></table>
                	 <div style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px;'>
                
                	 	Dear $nama_lengkap,<br><br>
                
                		Terima kasih telah berbelanja di Sokasocks.com.<br><br>
                
                		Pembayaran dapat dilakukan melalui ATM atau Internet Banking, Melalui Rekening <b>$nama_bank</b> dengan <b>No Rekening $no_rek_bank</b> atas nama <b>$atas_nama</b>. Mohon lakukan pembayaran dalam jangka waktu kurang dari 24 jam. Jika tidak pesanan Anda akan dibatalkan.<br><br>
                
                		Setelah pembayaran anda berhasil, anda akan menerima email konfirmasi dengan rincian informasi pada pesanan anda berikut dengan estimasi tanggal pengiriman.<br><br>
                
                		<table width='100%' border='0'>
                			<tr>
                				<td>Nama Produk</td>
                				<td>Qty</td> 
                				<td>Harga</td>
                				<td>Total</td>
                			</tr>
                			<tr>
                				<td colspan='4'><hr color='black'></td>
                			</tr>";
        
            $all_total = 0;
            $sql = "SELECT po.*, dp.*, p.nama_produk 
                    FROM po INNER JOIN d_po dp ON po.id_po = dp.id_po INNER JOIN produk p ON dp.id_produk = p.id_produk
                    WHERE md5(po.id_po) = '". $_GET['id'] ."' AND po.status_po = 'metode-pembayaran'";
            
            foreach($db->selectALL($sql) as $data_produk){
                
                $total_p = $data_produk['harga'] * $data_produk['qty'];
                $all_total = $all_total + $total_p;
                $message = $message. "
                    			<tr>
                    				<td>". $data_produk['nama_produk'] ."</td>
                    				<td>". $data_produk['qty'] ."</td>
                    				<td>". number_format($data_produk['harga'],0,',','.') ."</td>
                    				<td align='right'>". number_format($total_p,0,',','.') ."</td>
                    			</tr>";
            }
            
            if ($data_produk['nominal_voucher'] > 0 ) { $lbl_voucher =  "( ". $data_produk['id_voucher'] ." )"; }
            
            $message = $message. "    			
                			<tr>                        
                                <td></td>
                				<td></td>
                				<td><h5>Total Pesanan</h5></td>
                				<td align='right'>". number_format($all_total,0,',','.') ."</td>
                			</tr>
                			<tr>                        
                                <td></td>
                				<td></td>
                				<td><h5>Voucher Diskon <br> ". $lbl_voucher ."</h5></td>
                				<td align='right'>". number_format($data_produk['nominal_voucher'],0,',','.') ."</td>
                			</tr>
                			<tr>                        
                                <td></td>
                				<td></td>
                				<td><h5>Biaya Pengiriman</h5></td>
                				<td align='right'>". number_format($data_produk['value_pengirim'],0,',','.') ."</td>
                			</tr>
                			<tr>                        
                                <td></td>
                				<td></td>
                				<td><h5>Kode Transaksi</h5></td>
                				<td align='right'>". number_format($data_produk['kode_transaksi'],0,',','.') ."</td>
                			</tr>
                			<tr>                        
                                <td></td>
                				<td></td>
                				<td><h5>Total</h5></td>
                				<td align='right'><b>". number_format($data_produk['total_pembayaran'],0,',','.') ."</b></td>
                			</tr>
                		</table>
                
                		Silahkan kunjungi Pusat Bantuan kami untuk tips terbaru dan pertanyaan yang sering diajukan. Silahkan jika Anda ingin menghubungi kami, jangan ragu untuk memberikan informasi disini.<br><br>
                		
                		Setelah melakukan konfirmasi pembayaran, mohon tunggu paling lama 1 hari untuk proses verifikasi. Anda akan menerima Email konfirmasi setelah pembayaran terverifikasi. jika anda mengalami masalah konfirmasi pembayaran anda bisa menghubungi kami di nomor WhatsApp +62 822-4002-7798.<br><br>
                
                		Hormat kami,<br>
                		Tim Soka<br><br>
                
                		<table width='100%' border='0'>
                			<tr>
                				<td colspan='6'>
                					$gambar_inv
                				</td>
                			</tr>
                			<tr>
                				<td align='center'><a href='https://www.facebook.com/SokaIndonesia/' target='_blank'><img src='http://sokasocks.com/images/icon_sosmed/facebook.png' width='50%'/></a></td>
                				<td align='center'><a href='https://www.instagram.com/soka_indonesia/' target='_blank'><img src='http://sokasocks.com/images/icon_sosmed/instagram.png' width='50%'/></a></td>
                				<td align='center'><a href='https://line.me/R/ti/p/%40soka_indonesia' target='_blank'><img src='http://sokasocks.com/images/icon_sosmed/line.png' width='50%'/></a></td>
                				<td align='center'><a href='https://twitter.com/soka_id?lang=en' target='_blank'><img src='http://sokasocks.com/images/icon_sosmed/twitter.png' width='50%'/></a></td>
                				<td align='center'></td>
                				<td align='right'><a href='http://sokasocks.com/index.php?page=confirm-payment' target='_blank'><img src='http://sokasocks.com/images/inv_promo/pay.png' width='50%'/></a></td>
                			</tr>
                		</table>
                
                	 </div>
                   </td></tr></tbody></table>
                </td></tr></tbody></table>
                <table class='table-space' height='12' style='height: 12px; font-size: 0px; line-height: 0; width: 580px; background-color: #ffffff;' width='580' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='12' style='height: 12px; width: 580px; background-color: #ffffff;' width='580' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                
                
                <table class='table-space' height='12' style='height: 12px; font-size: 0px; line-height: 0; width: 580px; background-color: #113d68;' width='580' bgcolor='#113D68' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='12' style='height: 12px; width: 580px; background-color: #113d68;' width='580' bgcolor='#113D68' align='left'>&nbsp;</td></tr></tbody></table>
                <table class='table-row' width='580' bgcolor='transparent' style='table-layout: fixed; background-color: transparent;' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-row-td' height='45px' bgcolor='transparent' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; height: 45px; padding-left: 24px; padding-right: 24px; background-color: transparent;' valign='top' align='left'>
                 <table class='table-col' align='left' width='532' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td class='table-col-td' width='532' align='center' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; text-align: center;' valign='top'>
                  <span style='font-family: Arial, sans-serif; line-height: 19px; color: #bbbbbb; font-size: 13px;'></span>
                  </td></tr></tbody></table>
                </td></tr></tbody></table>
                </td></tr></table>
                </td></tr>
                 </table>
                 </body>
                 </html>";

			$mail = new PHPMailer; 
			$mail->IsSMTP();
			$mail->SMTPSecure = 'ssl'; 
			$mail->Host = "sokasocks.com"; //host masing2 provider email
			$mail->SMTPDebug = 1;
			$mail->Port = 465;
			$mail->SMTPAuth = true;
			$mail->Username = "billing@sokasocks.com"; //user email
			$mail->Password = "kaoskakibiling74"; //password email 
			$mail->SetFrom("billing@sokasocks.com","Soka Payment"); //set email pengirim
			$mail->Subject = "Order #". $no_pesan .""; //subyek email
			$mail->AddAddress($email,$nama_lengkap);  //tujuan email
			$mail->MsgHTML($message);
			
			if( $mail->Send() ) {
			    
				$sql = "UPDATE po SET sts_email= sts_email + 1
				        WHERE id_member = '". $id_member ."' AND md5(id_po) = '". $_GET['id'] ."'";
				        
            	//echo $sql;
            	if ($db->IUD_db($sql)){
            		//berhasil
            	}else{
            		//gagal
            	}
	
			}else{
				//gagal
			}
			
            }
        ?>
<div class="container-payment wrapper">
				<div class="container-payment">
                    <div class="row">
                        <p></p>
                    </div>
                    <div class="row">
                        <div style="display: table; margin: auto;">
                                  <!--/w3_short-->
                 <div class="services-breadcrumb">
                        <div class="agile_inner_breadcrumb">

                                   <ul class="w3_short_cat">
                                        <li><a >Pengiriman</a><i>|</i></li>
                                        <li><a>Metode Pembayaran</a><i>|</i></li>
                                        <li><a>Pembayaran</a></li>
                                    </ul>
                         </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <p></p>
                    </div>

                    </div>
                <div class="alert alert-danger fade in payment-page">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <div class="col-md-3">
                      <img src="http://icon-icons.com/icons2/588/PNG/512/1458264596_authorisation_lock_padlock_safe_password_privacy_security_icon-icons.com_55333.png" >
                    </div>
                  
                    <h4>Selalu waspada terhadap pihak tidak bertanggung jawab</h4>
                    <p>
                        <ul>
                          <li>Jangan lakukan pembayaran dengan nominal yang berbeda dengan yang tertera pada tagihan atau invoice yang di tampilkan atau yang di kirim ke e-mail Anda.</li>
                          <li>Jangan lakukan transfer selain ke nomor rekening atas nama PT. Soka Cipta Niaga</li>
                        </ul>
                    </p>
                  <p></p>
                </div>
              

                <div class="panel panel-info">
                                 <div class="panel-heading" align="center">
                                    Batas Waktu pembayaran : <div class="pull-right"></div>
                                 </div>
                                    <div class="panel-body">
                                        
                                        <?php 
                                        /*
                                            $sql = "SELECT *
                                                    FROM po
                                                    WHERE md5(id_po) = '". $_GET['id'] ."' AND status_po = 'metode-pembayaran'";
                                            //echo $sql;
                                    		$dataP = $db->selectOne($sql);
                                    	*/
                                    		
                                    		
                                    		$awal  = date_create(''. $dataP['tgl_input'] .'');
                                            $akhir = date_create(); // waktu sekarang
                                            $diff  = date_diff( $awal, $akhir );
                                            
                                            $jam = (24 - $diff->h);
                                            $menit = (60 - $diff->i);
                                            $detik = (60 - $diff->s);
                                        ?>
                                        
                                        <script type="text/javascript">
                                        
                                            var detik = <?php echo $detik; ?>;
                                            var menit = <?php echo $menit; ?>;
                                            var jam   = <?php echo $jam; ?>;
                                            
                                        </script>
              
                                            <div id='timer'></div>
                                            <h3>No. Tagihan : <?php echo $dataP['no_tagihan']; ?> </h3> 
                                            <div class="col-md-12" align="center">
                                                Jumlah Tagihan : <br />
                                                <h2><b>Rp. <?php echo number_format($dataP['total_pembayaran'],0,',','.'); ?></b></h2><br/>
                                            
                                                <div class="alert alert-success" role="alert">
                                                    <strong>Transfer hingga 2 digit terakhir</strong> Agar proses verifikasi tidak terhambat.
                                                </div>
                                                
                                                        <?php 
                                                            $db = new database(0);
                                                            $sql = "SELECT * FROM bank WHERE id_bank = '". $dataP['id_bank'] ."'";
                                                            //echo $sql;
                                                    		$data_bank = $db->selectOne($sql);
                                                        ?>

                                                            <!-- Hilangkan salah satu menyesuaikan dengan metode pembayaran yang sudah di pilih sebelumnya -->
                                                
                                                            <div class="col-md-12">
                                                                <img src="images/bank/<?php echo $data_bank['gambar']; ?>" style="width:180px; height: 80px;">
                                                            </div>

                                                            <div class="col-md-12">
                                                                No. Rekening : <?php echo $data_bank['no_rek']; ?><br />
                                                                A/n : <?php echo $data_bank['atas_nama']; ?>
                                                            </div>
                                                                         
                                                <br>      
                                                <!-- //Hilangkan salah satu menyesuaikan dengan metode pembayaran yang sudah di pilih sebelumnya -->
                                                <div class="inner_w3l_agile_grids img-payment">
                                                   
                                                
                                                    <div class="col-md-3 team-grids">
                                                        <div class="thumbnail team-w3agile">
                                                            <img src="images/gambar_bayar/pay1.jpg" class="img-responsive" alt="" >
                                                            <div class="caption">
                                                            <b>1. Transfer Dapat Melalui ATM, SMS/ M - Bangking dan E- Bangking.</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 team-grids">
                                                        <div class="thumbnail team-w3agile">
                                                            <img src="images/gambar_bayar/pay2.jpg" class="img-responsive" alt="" >
                                                           <div class="caption">
                                                            <b>2. Masukan Nomor Rekening a/n PT. Soka Cipta Niaga</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3 team-grids">
                                                        <div class="thumbnail team-w3agile">
                                                            <img src="images/gambar_bayar/pay3.jpg" class="img-responsive" alt="" >
                                                             <div class="caption">
                                                            <b>3. Masukan Jumlah Tagihan Tepat 2 Digit Terakhir</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3 team-grids">
                                                        <div class="thumbnail team-w3agile">
                                                            <img src="images/gambar_bayar/pay4.jpg" class="img-responsive" alt="">
                                                           <div class="caption">
                                                            <b>4. Upload/Unggah Bukti Transfer di Halaman Konfirmasi Pembayaran</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                           
                                            </div><br/>
                                        <h5>Transaksi pembelian telah di catat dengan nomor tagihan <?php echo $no_pesan; ?>. Dan kami sudah mengirimkan bukti transaksi/invoice ke alamat e-mail yang sudah di daftarkan sebelumnya. Silahkan unggah/upload bukti transaksi pembayaran pada halaman <a href="http://sokasocks.com/index.php?page=confirm-payment">Konfirmasi pembayaran</a> atau konfirmasi pembayaran di halaman utama bagian atas. Jika menghadapi kendala mengenai pembayaran, silahkan langsung <a href="http://sokasocks.com/index.php?page=contact">Hubungi Kami</a> </h5>
                                    </div>
                                    
                                       <div class="container" style="text-align: center; ">          
  
                                          <a href="index.php?page=confirm-payment"><button type="button" class="btn btn-success">
                                                Lanjut Konfirmasi Pembayaran <span class="glyphicon glyphicon-play"></span>
                                            </button>
                                                </a>
                                         </div>
                
                                 
                </div>

             
<!-- //team -->
                
</div>