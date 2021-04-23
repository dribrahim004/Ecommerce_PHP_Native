            <?php
            	$db = new database(1);
            	$sql = "SELECT * FROM member WHERE md5(id_member) ='". $_SESSION['enkrip'] ."'";
            	$dataP = $db->selectOne($sql);
            ?>
				<div class="sort-grid">
					<div class="profile-form">
						<h4 class="black-w3ls">Personal <span>Data</span></h4>

						<form action="aksi.php?module=profile&act=edit" method="post">
							<input name="id" type="hidden" value="<?php echo $_SESSION['enkrip']; ?>" required="">

							<div class="styled-input agile-styled-input-top">
								<input type="text" name="nama_lengkap" required="" value="<?php echo $dataP['nama_lengkap']; ?>">
								<label>Nama Lengkap</label>
								<span></span>
							</div>

							<div class="styled-input">
								<input type="text" name="tgl_lahir" required="" value="<?php if ($dataP['tgl_lahir'] != "") { echo date("d-m-Y", strtotime($dataP['tgl_lahir'])); } else { echo 'd-m-y'; } ?>">
								<label>Tanggal Lahir (tanggal-bulan-tahun)</label>
								<span></span>
							</div>

							<div class="styled-input">
								<label>Jenis Kelamin</label><br/><br/>
								<input type="radio" name="jk" value="pria" <?php if ($dataP['jk'] == 'pria') { echo "checked"; } ?> >Pria
  								<input type="radio" name="jk" value="wanita" <?php if ($dataP['jk'] == 'wanita') { echo "checked"; } ?> >Wanita<br>
							</div>

							<br><h4 class="black-w3ls">Kontak <span>Data</span></h4>

							<div class="styled-input">
								<input type="email" name="email" required="" value="<?php echo $dataP['email']; ?>" readonly>
								<!--<label>Email</label>-->
								<span></span>
							</div>

							<div class="styled-input">
								<input type="text" name="nomor_tlp" required="" value="<?php echo $dataP['nomor_tlp']; ?>">
								<label>Nomor Telepon</label>
								<span></span>
							</div>

							<input type="submit" value="simpan">
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
							
