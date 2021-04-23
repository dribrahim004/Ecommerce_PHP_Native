	<script type="text/javascript">
        var data_produk = [];
    </script>

    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <table id="table" class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>

                <?php
                	include('../lib/class/database.php');

                    $id = 0;
                    $Alltotal = 0;
                	$db = new database(0);
					$sql = "SELECT po.*, dp.*, p.*
							FROM po INNER JOIN d_po dp ON po.id_po = dp.id_po INNER JOIN produk p ON dp.id_produk = p.id_produk
							WHERE md5(po.id_member) = '". $_GET['id'] ."' AND po.status_po = 'pemesanan'";	
                    //echo $sql;
			        foreach($db->selectALL($sql) as $data){
			            $enkrip = md5($data['id_produk']);

                        $total = $data['harga'] * $data['qty'];
                        $Alltotal = $Alltotal + $total;
                        $id = $id + 1;
			    ?>
                    <tr>
	                    <td class="col-sm-8 col-md-6 text-left">
	                        <div class="media-troll">
	                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="images/produk/<?php echo $data['gambar_1']; ?>" > </a>
	                            <div class="media-body">
	                                <br><h4 class="media-heading"><a href="#"><?php echo $data['nama_produk']; ?></a></h4>
	                            </div>
	                        </div>
	                    </td>
	                    <td class="col-sm-1 col-md-1" style="text-align: center">
                            <input id="id_b_modal_<?php echo $id; ?>" type="hidden" class="form-control" value="<?php echo $enkrip; ?>">
                            <input id="harga_modal_<?php echo $id; ?>" type="hidden" class="form-control" value="<?php echo $data['harga']; ?>">
	                        <input id="qty_modal_<?php echo $id; ?>" type="number" class="form-control" value="<?php echo $data['qty']; ?>">
	                    </td>
	                    <td class="col-sm-1 col-md-1 text-center"><strong><label id="harga_txt_<?php echo $id; ?>"><?php echo number_format($data['harga'],0,',','.'); ?></label></strong></td>
	                    <td class="col-sm-1 col-md-1 text-center"><strong><label id="total_txt_<?php echo $id; ?>"><?php echo number_format($total ,0,',','.'); ?></label></strong></td>
	                   	<td class="col-sm-1 col-md-1 text-center">
                            <a href='#' data-rel='tooltip' id='hapus_modal_<?php echo $id; ?>' onclick='deleteRowT(this,<?php echo $id; ?>)'>
    	                        <button type="button" class="btn btn-danger">
    	                            <span class="glyphicon glyphicon-trash"></span>
    	                        </button>
                            </a>
	                    </td>
                    </tr>

                    <script type="text/javascript">
                        data_produk.push("<?php echo $enkrip; ?>");
                    </script>

                <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><label id="alltotal_txt"><?php echo number_format($Alltotal ,0,',','.'); ?></label></strong></h3></td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Lanjutkan Belanja</button>
                            <button type="button" class="btn btn-default" onclick="window.location='index.php?page=cart&id=<?php echo $_GET['id']; ?>'">Lihat Keranjang</button>
                            <button type="button" class="btn btn-default" onclick="window.location='index.php?page=shipping&id=<?php echo $_GET['id']; ?>'">Lanjut ke Pembayaran</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
                    <div class="w3_agile_latest_arrivals produk-troll">
                            <h3 class="wthree_text_info">Produk <span>Lainnya</span></h3>
                            <?php
                                $sql = "SELECT * FROM produk 
                                        WHERE status='Aktif' 
                                        ORDER BY view DESC LIMIT 2";   

                                foreach($db->selectALL($sql) as $data_produk){
                                    $enkrip = md5($data_produk['id_produk']);
                            ?>
                                    <div class="col-md-3 product-men">
                                        <div class="men-pro-item simpleCart_shelfItem">
                                            <div class="men-thumb-item">
                                                <img src="images/produk/<?php echo $data_produk['gambar_1']; ?>" alt="" class="">
                                                <div class="men-cart-pro">
                                                    <div class="inner-men-cart-pro">
                                                        <a href="index.php?page=product-categories&id=<?php echo $enkrip; ?>" class="link-product-add-cart"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                    </div>
                                                </div>
                                                <!-- <span class="product-new-top">New</span> -->
                                            </div>
                                            <div class="item-info-product ">
                                                <h4><a href="index.php?page=product-categories&id=<?php echo $enkrip; ?>"><div id="nama_produk"><?php echo $data_produk['nama_produk']; ?></div></a></h4>
                                                <div class="info-product-price">
                                                    
                                                    <?php if ( ($data_produk['harga_diskon'] > 0) AND ($data_produk['stok_diskon'] > 0) ) { ?>
                                                        <span id="harga" class="item_price">Rp.<?php echo number_format($data_produk['harga_diskon'],0,',','.'); ?></span>
                                                        <del>Rp.<?php echo number_format($data_produk['harga_produk'],0,',','.'); ?></del>
                                                    <?php } else { ?>
                                                        <span id="harga" class="item_price">Rp.<?php echo number_format($data_produk['harga_produk'],0,',','.'); ?></span>
                                                    <?php } ?>
                                                    
                                                </div>
                                            <?php /* if ($data_produk['stok_produk'] > 0) { ?>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                    <input id="add_cart" type="button" name="add_cart" value="Add to cart" class="button">
                                                </div>
                                            <?php } */?>
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
                            
                            <?php
                                $sql = "SELECT * FROM produk 
                                        WHERE status='Aktif' 
                                        ORDER BY view ASC LIMIT 2";   

                                foreach($db->selectALL($sql) as $data_produk){
                                    $enkrip = md5($data_produk['id_produk']);
                            ?>
                                    <div class="col-md-3 product-men">
                                        <div class="men-pro-item simpleCart_shelfItem">
                                            <div class="men-thumb-item">
                                                <img src="images/produk/<?php echo $data_produk['gambar_1']; ?>" alt="" class="">
                                                <div class="men-cart-pro">
                                                    <div class="inner-men-cart-pro">
                                                        <a href="index.php?page=product-categories&id=<?php echo $enkrip; ?>" class="link-product-add-cart"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                    </div>
                                                </div>
                                                <!-- <span class="product-new-top">New</span> -->
                                            </div>
                                            <div class="item-info-product ">
                                                <h4><a href="index.php?page=product-categories&id=<?php echo $enkrip; ?>"><div id="nama_produk"><?php echo $data_produk['nama_produk']; ?></div></a></h4>
                                                <div class="info-product-price">
                                                    
                                                    <?php if ( ($data_produk['harga_diskon'] > 0) AND ($data_produk['stok_diskon'] > 0) ) { ?>
                                                        <span id="harga" class="item_price">Rp.<?php echo number_format($data_produk['harga_diskon'],0,',','.'); ?></span>
                                                        <del>Rp.<?php echo number_format($data_produk['harga_produk'],0,',','.'); ?></del>
                                                    <?php } else { ?>
                                                        <span id="harga" class="item_price">Rp.<?php echo number_format($data_produk['harga_produk'],0,',','.'); ?></span>
                                                    <?php } ?>
                                                    
                                                </div>
                                            <?php /* if ($data_produk['stok_produk'] > 0) { ?>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                    <input id="add_cart" type="button" name="add_cart" value="Add to cart" class="button">
                                                </div>
                                            <?php } */?>
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
                            <div class="clearfix"> </div>
                    </div>
    </div>

                    

    <script src="js/money.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){

            <?php for ($i = 1; $i <= $id; $i++) { ?>

                $("#qty_modal_<?php echo $i; ?>").on('change',function() {
                    var id_m = "<?php echo $_GET['id']; ?>";
                    var id_b = $("#id_b_modal_<?php echo $i; ?>").val();
                    var harga_val = $("#harga_modal_<?php echo $i; ?>").val();
                    var qty_val = $("#qty_modal_<?php echo $i; ?>").val();

                    document.getElementById("total_txt_<?php echo $i; ?>").style.display="";
                    var tmp_total=document.getElementById("total_txt_<?php echo $i; ?>");
                    var total_tmp=tmp_total.innerHTML;
                    tmp_total = getMoney(total_tmp.trim());

                    if (qty_val > 0) {

                        if ( (id_b != "") && (harga_val != "") && (qty_val != "") && (tmp_total != "")){

                            $.ajax({
                                type: "POST",
                                url: "aksi/troli/edittroli.php",
                                dataType: 'JSON',
                                data: {
                                        id_m:id_m,
                                        id_b:id_b,
                                        qty:qty_val
                                      },    
                                error: function(xhr, status, error) {
                                        var err = eval("(" + xhr.responseText + ")");
                                        alert(err.Message);
                                        alert(err);
                                      },
                                success: function(data) {
                                    if (data == "berhasil"){

                                        var total = parseInt(harga_val) * parseInt(qty_val);

                                        document.getElementById("total_txt_<?php echo $i; ?>").style.display="";
                                        document.getElementById("total_txt_<?php echo $i; ?>").innerHTML=setMoney_nodouble(total,"");

                                        document.getElementById("alltotal_txt").style.display="";
                                        var tmp_alltotal=document.getElementById("alltotal_txt");
                                        var alltotal_tmp=tmp_alltotal.innerHTML;
                                        tmp_alltotal = getMoney(alltotal_tmp.trim());

                                        var alltotal = ( (parseInt(tmp_alltotal) - parseInt(tmp_total)) + parseInt(total) );

                                        document.getElementById("alltotal_txt").style.display="";
                                        document.getElementById("alltotal_txt").innerHTML=setMoney_nodouble(alltotal,"");

                                        //alert("Data Berhasil Terubah");
                                    }else if (data = "stok_kosong"){
                                        alert("Stok barang yang anda pilih sudah tidak tersedia !")
                                    }else{
                                        alert("Add To Cart Anda Gagal, Hubungi Kontak Kami!")
                                    }
                                }
                            }); 

                        }else{
                            alert("Data tidak bisa dirubah !")
                        }

                    }else{

                        var total = parseInt(harga_val) * parseInt(qty_val);

                        document.getElementById("total_txt_<?php echo $i; ?>").style.display="";
                        document.getElementById("total_txt_<?php echo $i; ?>").innerHTML=setMoney_nodouble(total,"");

                        document.getElementById("alltotal_txt").style.display="";
                        var tmp_alltotal=document.getElementById("alltotal_txt");
                        var alltotal_tmp=tmp_alltotal.innerHTML;
                        tmp_alltotal = getMoney(alltotal_tmp.trim());

                        var alltotal = ( (parseInt(tmp_alltotal) - parseInt(tmp_total)) + parseInt(total) );

                        document.getElementById("alltotal_txt").style.display="";
                        document.getElementById("alltotal_txt").innerHTML=setMoney_nodouble(alltotal,"");


                        alert("Quantity yang dipilih harus lebih besar dari 0 !")
                    }

                });

            <?php } ?>
            
        });

                function deleteRowT(r,x) {
                    
                    var id_m = "<?php echo $_GET['id']; ?>";
                    var id_b = $("#id_b_modal_"+x).val();
                    var harga_val = $("#harga_modal_"+ x).val();
                    var qty_val = $("#qty_modal_"+ x).val();
                    
                    $.ajax({
                        type: "POST",
                        url: "aksi/troli/deletetroli.php",
                        dataType: 'JSON',
                        data: {
                                id_m:id_m,
                                id_b:id_b,
                                harga:harga_val
                              },    
                        error: function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                alert(err.Message);
                                alert(err);
                              },
                        success: function(data) {
                            if (data == "berhasil"){
                                
                                document.getElementById("total_txt_"+ x).style.display="";
                                var tmp_total=document.getElementById("total_txt_"+ x);
                                var total_tmp=tmp_total.innerHTML;
                                tmp_total = getMoney(total_tmp.trim());

                                document.getElementById("alltotal_txt").style.display="";
                                var tmp_alltotal=document.getElementById("alltotal_txt");
                                var alltotal_tmp=tmp_alltotal.innerHTML;
                                tmp_alltotal = getMoney(alltotal_tmp.trim());

                                var alltotal = (parseInt(tmp_alltotal) - parseInt(tmp_total));

                                document.getElementById("alltotal_txt").style.display="";
                                document.getElementById("alltotal_txt").innerHTML=setMoney_nodouble(alltotal,"");

                                var i = r.parentNode.parentNode.rowIndex;
                                var j = data_produk.indexOf($("#id_produk_modal_"+ x).val());
                                    if (j != -1) {
                                        data_produk.splice(j, 1);
                                    }
                                document.getElementById("table").deleteRow(i);
                            
                                //alert("Data Berhasil Terhapus");
                            }else{
                                alert("Gagal Tersimpan Hubungi Admin");
                            }
                        }
                    }); 
                }
    </script>