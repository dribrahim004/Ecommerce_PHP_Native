    <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
	         <!-- mens -->
		
				<div class="col-md-12 products-right">
					<hr>
					<h4 class="black-w3ls">Konfirmasi <span>Pembayaran</span></h4>
					
                    <form method="POST" class="form-horizontal" action="aksi.php?module=bayar&act=konfirmasi" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nome">No. Transaksi Pesanan</label>  
                            <div class="col-md-5">
                                <input id="no_transaksi" name="no_transaksi" type="number"  class="form-control input-md" required="">    
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nome">Nomor Rekening Pemesan</label>  
                            <div class="col-md-5">
                                <input id="no_rek" name="no_rek" type="number" class="form-control input-md" required="" >
                            </div>
                        </div>

                        <div class="form-group confirm-side">
                            <label class="col-md-4 control-label">Transfer Ke Bank (Bank Kami)</label>
                            <div class="col-md-6">
                                <select class="chzn-select" id="bank" name="bank" style="width: 450px"  data-placeholder="">
                                    <option value="">-- Pilih Bank --</option>
                                    <?php
                					    $db = new database(1);
                					    $sql = "SELECT * FROM bank ORDER BY id_bank DESC";
                					    foreach($db->selectALL($sql) as $data){
                					    ?>
                					        <option value=<?php echo md5($data['id_bank']); ?> > <?php echo $data['nama_bank']; ?> ( <?php echo $data['no_rek']; ?> ) </option>
                				    <?php } ?>           
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="alamat">Transfer Sebesar</label>
                            <div class="col-md-5">                     
                                <input id="transfer_sebesar" name="transfer_sebesar" type="number" class="form-control input-md" required="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nome">Email</label>  
                            <div class="col-md-5">
                                <input id="email" name="email" type="email" class="form-control input-md"  >
                            </div>
                        </div>
      
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nome">Bukti Pembayaran</label>  
                            <div class="col-md-5">
                                <input type="file" id="bukti" name="bukti" required="" />
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="nome"></label>  
                            <div class="col-md-5">
                                Setelah melakukan konfirmasi pembayaran, mohon tunggu paling lama 1 hari untuk proses verifikasi. Anda akan menerima Email konfirmasi setelah pembayaran terverifikasi. jika anda mengalami masalah konfirmasi pembayaran anda bisa menghubungi kami di nomor WhatsApp +62 822-4002-7798
                            </div>
                        </div>
						
                        <div class="col-md-offset-5 col-md-9">
                            
                            <div class="form-group">
                                <button class="btn btn-success btn-lg"><i class="fa fa-disk "></i> Ya, Saya sudah transfer</button>
                            </div>
                        </div>
                    </form>
                    
				</div>
		
			<div class="clearfix"></div>
		</div>
	</div>	
	