		<!-- banner-bootom-w3-agileits -->



				<div class="col-md-9 products-right">

				 	<a href="index.php?page=new_address"><button class="btn btn-warning btn-lg"><i class="fa fa-plus "></i> Tambah Alamat</button></a>

						<div class="sort-grid">

							<table class="table table-striped">

							<thead>

								<tr>

									<th>Set</th>

									<th>Alamat</th>

									<th></th>

								</tr>

							</thead>

							<?php 
								$db = new database(0);
                                $sql = "SELECT * FROM alamat WHERE md5(id_member) = '". $_SESSION['enkrip'] ."'";
                                foreach($db->selectALL($sql) as $data){ 

                                	$i++;

									$sql = "SELECT * FROM member WHERE md5(id_member) = '". $_SESSION['enkrip'] ."'";
									$data_member = $db->selectOne($sql);

									$tlp = $data_member['nomor_tlp'];
							?>
								<tr>
									<td><?php if ($data['status']=="set") { echo "Default"; } ?></td>
									<td>

										<?php echo $data['nama_lengkap'];  ?><br/>

										<?php echo $data['alamat'];  ?><br/>

										Kec.<?php echo $data['nama_kec'];  ?>, Kota/kab.<?php echo $data['nama_kota'];  ?><br/>

										Provinsi.<?php echo $data['nama_provinsi'];  ?>, Kode Pos.<?php echo $data['kode_pos'];  ?><br/>

										telepon/handphone.<?php echo $tlp;  ?>

										<?php //echo $response;  ?>

									</td>
									<td> 
									    <?php 
									        $id = md5($data['id_alamat']);
									        $linkUbah = "index.php?page=edit_address&id=". $id ."";
									        $linkHapus = "aksi.php?module=alamat&act=hapus&id=". $id ."";
									    
    									    if ($data['status']=="none") { 
    									        $linkSeth = "aksi.php?module=alamat&act=set&id=". $id ."";
    									?>
    									        <a class="" href="<?php echo $linkSeth; ?>" data-rel="tooltip" title="Set Utama">
    										        <button class="btn btn-success btn-sm">Set Utama</button> 
    										    </a>
    								    <?php } ?>
										
										<a class="" href="<?php echo $linkUbah; ?>" data-rel="tooltip" title="Ubah">
										    <button class="btn btn-default">Ubah</button> 
										</a>
										
										<a class="" href="<?php echo $linkHapus; ?>" data-rel="tooltip" title="Hapus">
										    <button class="btn btn-danger">Hapus</button>
										</a>
									</td>
								</tr>
							<?php } ?>

							</table>

							<div class="clearfix"></div>

						</div>			

