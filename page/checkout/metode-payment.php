        <?php 
            $db = new database(0);
            
            $sql = "SELECT id_po
                    FROM po 
                    WHERE md5(po.id_po) = '". $_GET['id'] ."' AND po.status_po = 'pengiriman'";  
            $data = $db->selectOne($sql);
            
            if ($data['id_po'] == ""){ ?>
            
                <script type="text/javascript">
                    alert("Belum ada data pemesanana !");
                    window.location='index.php';
                </script>
                
        <?php } ?>
                                                        
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
                                        <li ><a>Metode Pembayaran</a><i>|</i></li>
                                        <li>Pembayaran</li>
                                    </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <p></p>
                    </div>
                </div>
            </div>    
              
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
                                                $Alltotal = 0;
                                                $id_po = "";
                                                $sql = "SELECT po.*, dp.*, p.*
                                                        FROM po INNER JOIN d_po dp ON po.id_po = dp.id_po INNER JOIN produk p ON dp.id_produk = p.id_produk
                                                        WHERE md5(po.id_po) = '". $_GET['id'] ."' AND po.status_po = 'pengiriman'";  
                                                //echo $sql;
                                                foreach($db->selectALL($sql) as $data){
                                                    $enkrip = md5($data['id_produk']);
                                                    $id_voucher = $data['id_voucher'];
                                                    $nominal_voucher = $data['nominal_voucher'];
                                                    $ongkir = $data['value_pengirim'];
                                                    $total = $data['harga'] * $data['qty'];
                                                    $Alltotal = $Alltotal + $total;
                                                    
                                                    //if ($data['id_po'] != ""){
                                                        $id_po = md5($data['id_po']);
                                                    //}
                                                    
                                                    $kode_transaksi = $data['kode_transaksi'];
                                            ?>
                                                <tr>
                                                    <td class="col-sm-4 col-md-4">
                                                        <div class="media">
                                                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="images/produk/<?php echo $data['gambar_1']; ?>" style="width: 52px; height: 52px;"> </a>
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
                                            <?php } 
                                                $All_total = $Alltotal + $nominal_voucher + $ongkir; 
                                            ?>
                                                <input id='id_p' name='id_p' type='hidden' value="<?php echo $id_po; ?>"/>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2"><h5>Subtotal</h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="total_pesanan"><?php echo number_format($Alltotal ,0,',','.'); ?></label></strong></h5></td>
                                                </tr>

                                                 <tr>
                                                    <td></td>
                                                    <td colspan="2"><h5>Voucher Diskon <br><label id="lbl_voucher"><?php if ($nominal_voucher > 0 ) { echo "( $id_voucher )"; } ?></label></h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="total_voucher"><?php echo number_format($nominal_voucher ,0,',','.'); ?></label></strong></h5></td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td colspan="2"><h5>Biaya Pengiriman</h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="ongkir"><?php echo number_format($ongkir,0,',','.'); ?></label></strong></h5></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2"><h5>Kode Transaksi</h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="ongkir"><?php echo number_format($kode_transaksi,0,',','.'); ?></label></strong></h5></td>
                                                </tr>
                                                
                                                <?php 
                                                    $akhir = $Alltotal - $nominal_voucher + $ongkir + $kode_transaksi;
                                                ?>
                                                    
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2"><h5>Total</h5></td>
                                                    
                                                    <td class="text-right"><h5><strong><label id="total_all"><?php echo number_format($akhir,0,',','.'); ?></label></strong></h5></td>
                                                </tr>

                                            </tbody>
                                
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                        <!--SHIPPING METHOD-->
                        <div class="panel panel-info">
                            <div class="panel-heading">Pilih Metode Pembayaran : </div>
                                <div class="panel-body">
                                        <div class="table-responsive">
                                         <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th>Subtotal</th>
                                                            <th>:</th>
                                                            <th class="text-left">Rp.</th>
                                                            <th class="text-right"><?php echo number_format($Alltotal ,0,',','.'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Voucher Diskon</th>
                                                            <th>:</th>
                                                            <th class="text-left">Rp.</th>
                                                            <th class="text-right"><?php echo number_format($nominal_voucher ,0,',','.'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Biaya Pengiriman</th>
                                                            <th>:</th>
                                                            <th class="text-left">Rp.</th>
                                                            <th class="text-right"><?php echo number_format($ongkir ,0,',','.'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Kode Transaksi</th>
                                                            <th>:</th>
                                                            <th class="text-left">Rp.</th>
                                                            <th class="text-right"><?php echo number_format($kode_transaksi ,0,',','.'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Pembayaran</th>
                                                            <th>:</th>
                                                            <th class="text-left">Rp.</th>
                                                            <th class="text-right"><?php echo number_format($akhir,0,',','.'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="4">
                                                            <?php
                                                                $i = 0;
                                                                $sql = "SELECT * FROM bank LIMIT 2";  
                                                                //echo $sql;
                                                                foreach($db->selectALL($sql) as $data){
                                                                    $i = $i + 1;
                                                            ?>
                                                                    <input id='jp_<?php echo $i; ?>' name='metode' type='radio' /> Bank Transfer ( <?php echo $data['nama_bank']; ?> )<br>
                                                                    <input id='bank_<?php echo $i; ?>' name='bank_<?php echo $i; ?>' type='hidden' value="<?php echo md5($data['id_bank']); ?>"/>
                                                            <?php } ?>
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                         </table>
                                        </div>
    
                                            <div class="form-group">
                                                <?php
                                                    $i = 0;
                                                    $sql = "SELECT * FROM bank LIMIT 2";  
                                                    //echo $sql;
                                                    foreach($db->selectALL($sql) as $data){
                                                        $i = $i + 1;
                                                ?>
                                                    <div id='show_jp_<?php echo $i; ?>' style='display:none; border:1px solid #ccc'>
                                                        <div class="col-md-6">
                                                            <img src="images/bank/<?php echo $data['gambar']; ?>" style="width:180px; height: 80px;">
                                                        </div>
                                                        <div class="col-md-6">
                                                            No. Rekening : <?php echo $data['no_rek']; ?><br />
                                                            A/n : <?php echo $data['atas_nama']; ?>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <ul class="list-group" style="border: 0px">
                                                                <li  class="list-group-item">Pembayaran dapat dilakukan melalui transfer rekening</li>
                                                                <li  class="list-group-item"><b>Total pembayaran</b> sudah termasuk kode pembayaran untuk keperluan proses verifikasi</li>
                                                                <li  class="list-group-item">Setelah melakukan pemesanan di soka.id, harap mentransfer dalam jangka waktu yang tertera pada halaman Pembayaran/Konfirmasi atau pesanannya akan <b>dibatalkan secara otomatis</b></li>
                                                                <li  class="list-group-item">Diharapakan melakukan <b>konfirmasi pembayaran</b> setelah melakukan transfer </li>            
                                                            </ul>
                                                        </div>
                                                    </div>  
                                                <?php } ?>
                                            </div>
                                </div>         
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                 
            </div>
        </div>   
        
          <div class="container" style="text-align: center; ">    
                </form> 
                <form class="form-horizontal" method="post" action="aksi.php?module=payment&act=metode_bayar">
                    <input id='id' name='id' type='hidden' value="<?php echo $_GET['id']; ?>"/>
                    <input id='id_p' name='id_p' type='hidden' value="<?php echo $id_po; ?>"/>
                    <input id='bank' name='bank' type='hidden' value=""/>
                    
                    <button type="submit" class="btn btn-success" id="konfirmasi">
                        Lanjut Konfirmasi <span class="glyphicon glyphicon-play"></span>
                    </button>
                </form> 
           </div>
        </div>


