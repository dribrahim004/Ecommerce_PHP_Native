
		
				<hr>
					<h4 class="black-w3ls">Detail<span>Transaksi</span></h4>

                      <div class="panel panel-info">
                                <?php 
                                    $db = new database(0);
                            		$sql = "SELECT no_tagihan, nama_pengirim, service_pengirim, no_resi, status_po FROM po WHERE md5(id_po) = '". $_GET['id'] ."'";
                            		$data_po = $db->selectOne($sql);
                            	?>
                            	
                                <div class="panel-heading">
                                    No. Transaksi : <?php echo $data_po['no_tagihan']; ?> 
                                </div>
                                <?php 
                            		$sql = "SELECT a.*, m.nomor_tlp 
                            		        FROM alamat a INNER JOIN member m ON a.id_member = m.id_member
                            		        WHERE id_alamat = (SELECT id_alamat FROM po WHERE md5(id_po) = '". $_GET['id'] ."')";
                            		$data_ma = $db->selectOne($sql);
                            	?>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <h4><i class="fa fa-map-marker" aria-hidden="true"></i>Alamat Penerima :</h4>
                                            Nama Penerima : <?php echo $data_ma['nama_penerima']; ?>, no. hp : <?php echo $data_ma['nomor_tlp']; ?><br/>
                                            Alamat Lengkap : <?php echo $data_ma['alamat']; ?><br>
                                            Kec.<?php echo $data_ma['nama_kec']; ?>, Kota/kab.<?php echo $data_ma['nama_kota']; ?>, Provinsi <?php echo $data_ma['nama_provinsi']; ?> - Kode pos : <?php echo $data_ma['kode_pos']; ?>"
                                        </div>
                                          
                                        <div class="form-group">
                                            <h4><i class="fa fa-truck" aria-hidden="true"></i>Info Pengiriman :</h4>
                                            Kurir : <?php echo $data_po['nama_pengirim']; ?><br>
                                            Paket : <?php echo $data_po['service_pengirim']; ?><br>
                                            No Resi : <?php echo $data_po['no_resi']; ?><br>
                                            Status : <?php 
                                                    if ($data_po['status_po'] == "kirim-barang"){
                                                        echo "Kirim Barang";
                                                    }else if ($data_po['status_po'] == "selesai"){
                                                        echo "Selesai";
                                                    }
                                                ?><br>
                                        </div>
                                    </div>
                      </div>


                       <div class="panel panel-info">
                                 <div class="panel-heading">
                                    No. Transaksi : <?php echo $data_po['no_tagihan']; ?>  
                                 </div>


                                    <div class="panel-body detail-transaksi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th><h5>Produk</h5></th>
                                                    <th><h5>Jumlah</h5></th>
                                                    <th ><h5>Harga</h5></th>
                                                    <th ><h5>Sub Total</h5></th>
                                                    
                                                </tr>
                                            </thead>

                                            <tbody>
                                                
                                            <?php
                                                $sql = "SELECT po.*, dp.*, p.*
                                                        FROM po INNER JOIN d_po dp ON po.id_po = dp.id_po INNER JOIN produk p ON dp.id_produk = p.id_produk
                                                        WHERE md5(po.id_po) = '". $_GET['id'] ."'";  
                                                //echo $sql;
                                                foreach($db->selectALL($sql) as $data){
                                                    $enkrip = md5($data['id_produk']);
                                                    $id_voucher = $data['id_voucher'];
                                                    $nominal_voucher = $data['nominal_voucher'];
                                                    $value_pengirim = $data['value_pengirim'];
                                                    $kode_transkasi = $data['kode_transaksi'];
                                                    $total = $data['harga'] * $data['qty'];
                                                    $Alltotal = $Alltotal + $total;
                                                    $total_berat = $total_berat + ($data['qty'] * $data['berat_produk']);
                                                    
                                                    //if ($data['id_po'] != ""){
                                                        $id_po = md5($data['id_po']);
                                                    //}
                                            ?>
                                                <tr>
                                                    <td class="col-sm-4 col-md-4">
                                                        <div class="media detail-order">
                                                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="images/produk/<?php echo $data['gambar_1']; ?>"> </a>
                                                            <div class="media-body">
                                                                <h4 class="media-heading"><a href="#"><?php echo $data['nama_produk']; ?></a></h4>
                                                                
                                                            </div>
                                                        </div>
                                                     </td>

                                                     <td class="col-sm-1 col-md-1" style="text-align: center">
                                                        <strong><?php echo number_format($data['qty'],0,',','.'); ?></strong>
                                                     </td>

                                                     <td class="col-sm-1 col-md-1 text-center"><strong><?php echo number_format($data['harga'],0,',','.'); ?></strong></td>


                                                      <td class="col-sm-1 col-md-1 text-center"><strong><?php echo number_format($total ,0,',','.'); ?></strong></td>
                                                </tr>
                                                
                                            <?php } ?>
                                            
                                                <input id='id_p' name='id_p' type='hidden' value="<?php echo $id_po; ?>"/>
                                                <input id='id_p_value' name='id_p_value' type='hidden' value="<?php echo $All_total; ?>"/>
                                                
                                            <?php $All_total = $Alltotal - $nominal_voucher + $value_pengirim + $kode_transkasi; ?>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2"><h5>Total Pesanan</h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="total_pesanan"><?php echo number_format($Alltotal ,0,',','.'); ?></label></strong></h5></td>
                                                </tr>

                                                 <tr>
                                                    <td></td>
                                                    <td colspan="2"><h5>Voucher Diskon <?php if ($nominal_voucher > 0 ) { echo "<br>( $id_voucher )"; } ?></h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="total_voucher"><?php echo number_format($nominal_voucher ,0,',','.'); ?></label></strong></h5></td>
                                                </tr>

                                                 <tr>
                                                    <td></td>
                                                    <td colspan="2"><h5>Biaya Pengiriman <br>( berat <?php echo $total_berat; ?> gram )</h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="ongkir"><?php echo number_format($value_pengirim ,0,',','.'); ?></label></strong></h5></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2"><h5>Kode Transaksi</h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="kode_transkasi"><?php echo number_format($kode_transkasi ,0,',','.'); ?></label></strong></h5></td>
                                                </tr>

                                                 <tr>
                                                    <td></td>
                                                    <td colspan="2"><h5>Total</h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="total_all"><?php echo number_format($All_total ,0,',','.'); ?></label></strong></h5></td>
                                                </tr>

                                            </tbody>
                                
                                        </table>

                                    </div>


                      </div>


                
			             <a href="index.php?page=transaksi"><button type="button" class="btn btn-success">
                            <i class="fa fa-refresh" aria-hidden="true"></i> Kembali 

                        </button>
                        </a>
					
			
			
