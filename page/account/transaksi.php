
				<hr>
					<h4 class="black-w3ls">Transaksi<span>Pembelian</span></h4>
			<div style="overflow-x:auto;">
					<table class="table table-striped table-responsive">
                        <thead>
                        	 <tr>
                        	 	<th></th>
                                <th>No Transaksi</th>
                                <th>Total Pembayaran</th>
                                <th>Batas Waktu Pembayaran</th>
                                <th>Status transaksi</th>
                                <th></th>
                              </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=0;
                            $db = new database(0);
                            $sql = "SELECT po.*
                                    FROM po 
                                    WHERE md5(po.id_member) = '". $_SESSION['enkrip'] ."'
                                    ORDER BY tgl_input DESC";  
                            //echo $sql;
                            foreach($db->selectALL($sql) as $data){
                                
                                if ($data['status_po'] != "batal-member"){
                                if ($data['status_po'] != "batal-admin"){
                                    
                                $i++;
                                $id = md5($data['id_po']);
                        ?>
                        	<tr>
                        		<td>
                        		    <?php echo $i; ?>
                        		</td>
                        		<td>
                            		<?php
                            		    if ($data['status_po'] == "pemesanan"){
                        		            $link = "index.php?page=cart&id=". $_SESSION['enkrip'] ."";
                        		        }else if ($data['status_po'] == "pengiriman"){
                        		            $link = "index.php?page=metode-payment&id=". $id ."";
                        		        }else if ($data['status_po'] == "metode-pembayaran"){
                        		            $link = "index.php?page=payment&id=". $id ."";
                        		        }
                        		        
                        		        if ( ($data['status_po'] == "pemesanan") || ($data['status_po'] == "pengiriman") || ($data['status_po'] == "metode-pembayaran") ){
                        		            
                                		    if ($data['no_tagihan'] != ""){
                                		        echo "<a target='_blank' href='$link'>". $data['no_tagihan'] ."</a>"; 
                                		    }else{
                                		        echo "<a target='_blank' href='$link'> Cek transaksi </a>";
                                		    }
                                		    
                        		        }else{
                        		            echo $data['no_tagihan'];
                        		        }
                            		?>
                        		</td>
                        		<td align="right">
                        		    <?php 
                        		        if ($data['total_pembayaran'] != 0){
                        		            echo number_format($data['total_pembayaran'] ,0,',','.');
                        		        }
                        		    ?>
                        		</td>
                        		<td>
                        		    <?php 
                        		        if ($data['status_po'] == "metode-pembayaran"){
                                            $tmp = date('d',strtotime($data['tgl_input']));
                                            $d = str_pad($tmp + 1,2);
                                            $my = date('m-Y',strtotime($data['tgl_input']));
                                            $jam = date('H:i:s',strtotime($data['tgl_input']));
                                            
                                            echo "$d-$my <br>( $jam WIB )";
                        		        }
                                    ?>
                        		</td>
                        		<td>
                        		    <?php
                        		        if ($data['status_po'] == "pemesanan"){
                        		            $link = "index.php?page=cart&id=". $_SESSION['enkrip'] ."";
                        		            echo "Cart / Pilih Metode Pengiriman";
                        		        }else if ($data['status_po'] == "pengiriman"){
                        		            $link = "index.php?page=metode-payment&id=". $id ."";
                        		            echo "Pilih Metode Pembayaran";
                        		        }else if ($data['status_po'] == "metode-pembayaran"){
                        		            echo "Menunggu Pembayaran";
                        		        }else if ($data['status_po'] == "verifikasi-bayar"){
                                            echo "Proses Packing Barang";
                                        }else if ($data['status_po'] == "packing-barang"){
                                            echo "Proses Kirim Barang";
                                        }else if ($data['status_po'] == "kirim-barang"){
                                            echo "Kirim Barang";
                                        }else if ($data['status_po'] == "selesai"){
                                            echo "Selesai";
                                        }
                                        
                                        if ( ($data['status_po'] == "kirim-barang") ){
                                            echo "<br>No Resi : ". $data['no_resi'];   
                                        }
                        		    ?>
                        		</td></td>
                        		<td>
                        		    <?php $link_dt = "index.php?page=detail-transaksi&id=". $id .""; ?>
                        		    <a href="<?php echo $link_dt; ?>"><button class="btn btn-success btn-sm">Detail Transaksi</button></a>
                        		    
                        		    <?php
                        		        if ( ($data['status_po'] == "pemesanan") || ($data['status_po'] == "pengiriman") || ($data['status_po'] == "metode-pembayaran") ){
                            		        $link_b = "aksi.php?module=transaksi&act=batal&id=". $id .""; ?>
                            		        <a href="<?php echo $link_b; ?>" onclick="return confirm('Apakah Anda Yakin Membatalkan Transaksi ini ?')"><button class="btn btn-danger btn-sm">Batal Transaksi</button></a>
                        		    <?php } ?>
                        		</td>
                        		
                        	</tr>
                        <?php } } } ?>
                        </tbody>
                    </table>
                </div>
	