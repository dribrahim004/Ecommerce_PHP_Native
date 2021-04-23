
<!-- /banner_bottom_agile_info -->
<div class="container wrapper margin-checkout">
            <div class="row cart-head">
                <div class="container">
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
                                        <li >Metode Pembayaran<i>|</i></li>
                                        <li>Pembayaran</li>
                                    </ul>
                                    <br> 
                                    <?php 
                                        $mp = "";
                                        $db = new database(0);
        								$sql = "SELECT * FROM member WHERE md5(id_member) = '". $_GET['id'] ."'";
        								$data_member = $db->selectOne($sql);
        								
        								if ( ($data_member['tgl_lahir'] == NULL) || ($data_member['jk'] == NULL) || ($data_member['nomor_tlp'] == NULL) ) {
        								$mp = "true";
        							?>   
                                        <div class='alert alert-danger'>
                                            Harap lengkapi data personal anda terlebih dahulu klik <a href="index.php?page=profile" target="_blank">link berikut ini</a>
                                        </div>
                                    <?php } ?>
                         </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <p></p>
                    </div>
                </div>
            </div>    

            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                        <!--REVIEW ORDER-->
                            <div class="panel panel-info">
                                 <div class="panel-heading">
                                    Detail Order <div class="pull-right"></div>
                                 </div>
                                 <div class="panel-body">
                                       <div class="table-responsive">
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
                                                $total_berat = 0;
                                                $Alltotal = 0;
                                                $id_po = "";
                                                $db = new database(0);
                                                $sql = "SELECT po.*, dp.*, p.*
                                                        FROM po INNER JOIN d_po dp ON po.id_po = dp.id_po INNER JOIN produk p ON dp.id_produk = p.id_produk
                                                        WHERE md5(po.id_member) = '". $_GET['id'] ."' AND po.status_po = 'pemesanan'";  
                                                //echo $sql;
                                                foreach($db->selectALL($sql) as $data){
                                                    $enkrip = md5($data['id_produk']);
                                                    $id_voucher = $data['id_voucher'];
                                                    $nominal_voucher = $data['nominal_voucher'];
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
                                                <input id='id_p_value' name='id_p_value' type='hidden' value="<?php echo $Alltotal; ?>"/>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2"><h5>Total Pesanan</h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="total_pesanan"><?php echo number_format($Alltotal ,0,',','.'); ?></label></strong></h5></td>
                                                </tr>
                                            <?php $All_total = $Alltotal - $nominal_voucher; ?> 
                                                 <tr>
                                                    <td>
                                                        <div class="input-group">
                                                            <input class="btn btn-sm" name="voucher" id="voucher" type="text" placeholder="Masukan Kode voucher">
                                                            <button class="btn btn-info btn-sm" type="button" id="cek_voucher">Cek</button>
                                                        </div>
                                                    </td>
                                                    <td colspan="2"><h5>Voucher Diskon <br><label id="lbl_voucher"><?php if ($nominal_voucher > 0 ) { echo "( $id_voucher )"; } ?></label></h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="total_voucher"><?php echo number_format($nominal_voucher ,0,',','.'); ?></label></strong></h5></td>
                                                </tr>

                                                 <tr>
                                                    <td></td>
                                                    <td colspan="2"><h5>Biaya Pengiriman <br>( berat <?php echo $total_berat; ?> gram )</h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="ongkir"><?php echo number_format(0 ,0,',','.'); ?></label></strong></h5></td>
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
                            </div>

                     </div>
                </form>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6 panel-ship">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Detail Pengiriman : </div>
                        <div class="panel-body">
                            
                        <!-- Jika akun belum input data alamat aktikan button-->
                            <div class="form-group">
                                <div class="col-md-12">
                                 <div class="col-md-6">
                                    <a href="index.php?page=new_address">
                                        <button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
                                            Tambah alamat baru 
                                        </button>
                                    </a>
                                    <br>
                                 </div>
                                 <div class="col-md-6">
                                     <!-- Single button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                                                Kirim ke alamat lain <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="index.php?page=new_address">+ Tambah Alamat</a>
                                                </li>
                                                <li class="divider"></li>
                                                <?php 
                                                    $sql = "SELECT nama_penerima, SUBSTRING(alamat,1,50) as as_alamat, id_alamat FROM alamat WHERE md5(id_member) = '". $_GET['id'] ."'";
                                                    foreach($db->selectALL($sql) as $data){ 
                                                        $linkSet = "aksi.php?module=alamat&act=set_shipping&id=". md5($data['id_alamat']) ."&id2=". $_GET['id'] ."";
                    							?>
                                                <li>
                                                    <a href="<?php echo $linkSet; ?>">
                                                        Nama Penerima : <?php echo $data['nama_penerima']; ?><br/>Alamat : <?php echo $data['as_alamat']; ?>...
                                                    </a>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                 </div>
                                </div>
                            </div>
                        <!-- //Jika akun belum input data alamat aktikan button//-->    


                        <!-- Jika akun sudah input data alamat-->
                            <br><br>
                            
                            <?php 
                        		$sql = "SELECT a.*, m.nomor_tlp 
                        		        FROM alamat a INNER JOIN member m ON a.id_member = m.id_member
                        		        WHERE md5(a.id_member) = '". $_GET['id'] ."' AND a.status = 'set'";
                        		$data = $db->selectOne($sql);
                        		
                        	    if ($data['status'] == "set"){
                        	       $linkUbah = "index.php?page=edit_address&id=". md5($data['id_alamat']) ."";
                        	?>
                                    <input id='alamat' name='alamat' type='hidden' value="<?php echo md5($data['id_alamat']); ?>" />
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h4><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                            Nama Penerima : <?php echo $data['nama_penerima']; ?></h4>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h4>Alamat Pengiriman : <?php echo $data['alamat']; ?></h4>
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h4>Kecamatan : <?php echo $data['nama_kec']; ?>, Kota/Kab : <?php echo $data['nama_kota']; ?></h4>
                                        </div>
                                    </div>
        
        
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h4>Provinsi : <?php echo $data['nama_provinsi']; ?> - Kode Pos : <?php echo $data['kode_pos']; ?></h4>
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h4>No. Telp : <?php echo $data['nomor_tlp']; ?></h4>
                                        </div>
                                    </div>
        
                                    <div class="form-group">                           
                                        <div class="col-md-12">
                                            <a href="<?php echo $linkUbah; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah Alamat</a>
                                        </div>
                                    </div>
                                    
                            <?php } ?>
                          </div>
                          
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Kurir Pengiriman : </div>
                            <div class="panel-body">
                            
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Catatan Pembeli :</strong></div>
                                    <div class="col-md-12">
                                       <textarea id="catatan" name="catatan" style="width: 100%; height: 75px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-7 col-xs-12">
                                        <strong>Kurir Pengiriman :</strong>
                                        <div>
                                          <select id="kurir" name="kurir">
                                            <option value="">Pilih Kurir</option>
                                            <option value="jne">Jalur Nugraha Ekakurir (JNE)</option>
                                        <!--
                                            <option value="wahana">Wahana Prestasi Logistik (WAHANA)</option>
                                            <option value="pos">POS Indonesia (POS)</option>
                                            <option value="jet">JET Express (JET)</option>
                                            <option value="tiki">Citra Van Titipan Kilat (TIKI)</option>
                                            <option value="pcp">Priority Cargo and Package (PCP)</option>
                                            <option value="rpx">RPX Holding (RPX)</option>
                                            <option value="sicepat">SiCepat Express (SICEPAT)</option>
                                            <option value="jnt">J&T Express (J&T)</option>
                                            <option value="sap">SAP Express (SAP)</option>
                                            <option value="dse">21 Express (DSE)</option>
                                            <option value="first">First Logistics (FIRST)</option>
                                        -->
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <!--
                                <div class="col-md-5 col-xs-12">
                                    <strong>Paket Pengiriman :</strong>
                                    <div>
                                      <select id="jenis_paket" name="jenis_paket">
                                        <option value="">Pilih Jenis Paket</option>
                                      </select>
                                    </div>
                                </div>
                                -->
                                
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div id="jenis_paket" class="paket">
                                            
                                            <div id="radio_display" class="pilih-paket">
                                                <strong>Jenis Paket Pengiriman :</strong>
                                                <div id="display_jp_1" style="">
                                                    <input id='jp_1' name='jenis_paket' type='radio' /> <label id="txt_radio_1"> OKE </label>
                                                </div>
                                                <div id="display_jp_2" style="">
                                                    <input id='jp_2' name='jenis_paket' type='radio' /> <label id="txt_radio_2"> OKE2 </label>
                                                </div>
                                                <div id="display_jp_3" style="">
                                                    <input id='jp_3' name='jenis_paket' type='radio' /> <label id="txt_radio_3"> OKE3 </label>
                                                </div>
                                                <div id="display_jp_4" style="">
                                                    <input id='jp_4' name='jenis_paket' type='radio' /> <label id="txt_radio_4"> OKE4 </label>
                                                </div>
                                            </div>
                                            
                                            <div id="radio_text">
                                                <div>
                                                    <div id='show_jp_1' style='display:none; border:1px solid #ccc'>
                                                        <div class="col-md-12">
                                                            <!--<br>Jalur Nugraha Ekakurir (JNE) - OKE -->
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <ul class="list-group" style="border: 0px">
                                                                <li  class="list-group-item">
                                                                    <label id="deskripsi_1">
                                                                        Jalur Nugraha Ekakurir (JNE)<br>
                                                                        Jenis Paket : Ongkos Kirim Ekonomis ( OKE )<br />
                                                                        Harga : Rp.26.000
                                                                    </label>
                                                                    
                                                                    <input id='code_1' name='code' type='hidden' /><br>
                                                                    <input id='nama_1' name='nama' type='hidden' /><br>
                                                                    <input id='service_1' name='service' type='hidden' /><br>
                                                                    <input id='description_1' name='description' type='hidden' /><br>
                                                                    <input id='value_1' name='value' type='hidden' /><br>
                                                                    <input id='etd_1' name='etd' type='hidden' /><br>
                                                                    <input id='note_1' name='note' type='hidden' /><br>
                                                                    <input id='berat_1' name='berat' type='hidden' /><br>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div>
                                                    <div id='show_jp_2' style='display:none; border:1px solid #ccc'>
                                                        <div class="col-md-12">
                                                            <!--<br>Jalur Nugraha Ekakurir (JNE) - OKE -->
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <ul class="list-group" style="border: 0px">
                                                                <li  class="list-group-item">
                                                                    <label id="deskripsi_2">
                                                                        Jalur Nugraha Ekakurir (JNE)<br>
                                                                        Jenis Paket : Ongkos Kirim Ekonomis ( OKE )<br />
                                                                        Harga : Rp.26.000
                                                                    </label>
                                                                    
                                                                    <input id='code_2' name='code' type='hidden' /><br>
                                                                    <input id='nama_2' name='nama' type='hidden' /><br>
                                                                    <input id='service_2' name='service' type='hidden' /><br>
                                                                    <input id='description_2' name='description' type='hidden' /><br>
                                                                    <input id='value_2' name='value' type='hidden' /><br>
                                                                    <input id='etd_2' name='etd' type='hidden' /><br>
                                                                    <input id='note_2' name='note' type='hidden' /><br>
                                                                    <input id='berat_2' name='berat' type='hidden' /><br>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div>
                                                    <div id='show_jp_3' style='display:none; border:1px solid #ccc'>
                                                        <div class="col-md-12">
                                                            <!--<br>Jalur Nugraha Ekakurir (JNE) - OKE -->
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <ul class="list-group" style="border: 0px">
                                                                <li  class="list-group-item">
                                                                    <label id="deskripsi_3">
                                                                        Jalur Nugraha Ekakurir (JNE)<br>
                                                                        Jenis Paket : Ongkos Kirim Ekonomis ( OKE )<br />
                                                                        Harga : Rp.26.000
                                                                    </label>
                                                                    
                                                                    <input id='code_3' name='code' type='hidden' /><br>
                                                                    <input id='nama_3' name='nama' type='hidden' /><br>
                                                                    <input id='service_3' name='service' type='hidden' /><br>
                                                                    <input id='description_3' name='description' type='hidden' /><br>
                                                                    <input id='value_3' name='value' type='hidden' /><br>
                                                                    <input id='etd_3' name='etd' type='hidden' /><br>
                                                                    <input id='note_3' name='note' type='hidden' /><br>
                                                                    <input id='berat_3' name='berat' type='hidden' /><br>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div>
                                                    <div id='show_jp_4' style='display:none; border:1px solid #ccc'>
                                                        <div class="col-md-12">
                                                            <!--<br>Jalur Nugraha Ekakurir (JNE) - OKE -->
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <ul class="list-group" style="border: 0px">
                                                                <li  class="list-group-item">
                                                                    <label id="deskripsi_4">
                                                                        Jalur Nugraha Ekakurir (JNE)<br>
                                                                        Jenis Paket : Ongkos Kirim Ekonomis ( OKE )<br />
                                                                        Harga : Rp.26.000
                                                                    </label>
                                                                    
                                                                    <input id='code_4' name='code' type='hidden' /><br>
                                                                    <input id='nama_4' name='nama' type='hidden' /><br>
                                                                    <input id='service_4' name='service' type='hidden' /><br>
                                                                    <input id='description_4' name='description' type='hidden' /><br>
                                                                    <input id='value_4' name='value' type='hidden' /><br>
                                                                    <input id='etd_4' name='etd' type='hidden' /><br>
                                                                    <input id='note_4' name='note' type='hidden' /><br>
                                                                    <input id='berat_4' name='berat' type='hidden' /><br>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->

            </div>
           
  
                <div class="container" style="text-align: center; ">          
  
                        <!-- <a href="index.php?page=metode-payment"> -->
                        <button type="button" class="btn btn-success" id="metode_pembayaran" <?php if ($mp == "true") { echo "disabled"; } ?> >
                            Pilih Metode Pembayaran <span class="glyphicon glyphicon-play"></span>
                        </button>
                </div>

            
            </div>
        
 </div>