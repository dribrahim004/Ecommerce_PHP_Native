<!-- /banner_bottom_agile_info -->
	<div class="container">
						<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short_cat">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li><a href="index.php?page=return-page">Pengembalian & Penukaran</a><i>|</i></li>
								<li >Form Return</li>
								
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->


				<div class="col-md-12 products-right">
					<hr>
					<h4 class="black-w3ls">Form <span>Return</span></h4>
					        <form action="aksi.php?module=retur&act=add" method="POST" class="form-horizontal" enctype="multipart/form-data">
						        <!-- Text input-->
						        <div class="form-group">
    						        <label class="col-md-4 control-label" for="nome">Nama</label>  
    						        <div class="col-md-5">
    						            <input id="nama" name="nama" type="text"  class="form-control input-md" required="">
    						        </div>
						        </div>

						        <div class="form-group">
    						        <label class="col-md-4 control-label" for="nome">No. Order</label>  
    						        <div class="col-md-5">
    						            <input id="id_order" name="id_order" type="text"  class="form-control input-md" required="">
    						        </div>
						        </div>

						        <div class="form-group">
    						        <label class="col-md-4 control-label" for="nome">Jenis Pengembalian</label>  
    						        <div class="col-md-6">
                                        <select class="chzn-select" id="jenis_retur" name="jenis_retur" style="width: 300px"  data-placeholder="" required="">
                                            <option value="">-- Pilih Keterangan --</option>
                                            <option value="tukar model">Tukar Model </option>
                                            <option value="salah kirim">Salah Kirim</option>
                                            <option value="cacat">Cacat</option>
                                            <option value="Tidak sesuai pesanan">Tidak sesuai pesanan (jumlah)</option>
                                        </select>
                                    </div>
						        </div>

						        <div class="form-group form-return">
    						        <label class="col-md-4 control-label" for="nome">Keterangan</label>  
    						        <div class="col-md-5">
    						            <textarea id="ket" name="ket" required=""></textarea>
    						        </div>
						        </div>

						        <div class="form-group">
    						        <label class="col-md-4 control-label" for="nome">Bukti Return</label>  
    						        <div class="col-md-5">
    						            <input type="file" id="gambar_1" name="gambar_1" required=""/>
    						        </div>
						        </div>
						        
						        <div class="form-group">
						            <label class="col-md-4 control-label" for="nome"></label>  
    						        <div class="col-md-5">
            						    <button type="submit" class="btn btn-success">
                                            Kirim <span class="glyphicon glyphicon-play"></span>
                                        </button>
                            		</div>
						        </div>
					        </form>
                </div>
				</div>
	 </div>

