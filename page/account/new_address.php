

					<hr>

					<h4 class="black-w3ls">Tambah <span>Alamat</span></h4>



						  <form action="aksi.php?module=alamat&act=add" method="post" class="form-horizontal">

                <!-- Text input-->

                <div class="form-group">

                  <label class="col-md-4 control-label" for="nome">Alamat Sebagai</label>  

                  <div class="col-md-5">
                    <input name="id" type="hidden" value="<?php echo $_SESSION['enkrip']; ?>" required="">
                    <input id="alamat_sebagi" name="alamat_sebagi" type="text" placeholder="Rumah, Kantor, Kost, atau lain-lain" class="form-control input-md" required="">  

                  </div>

                </div>



                <!-- Text input-->

                <div class="form-group">

                  <label class="col-md-4 control-label" for="nome">Nama Penerima</label>  

                  <div class="col-md-5">

                    <input id="nama_penerima" name="nama_penerima" type="text" class="form-control input-md" required="" >

                  </div>

                </div>



                <!-- Textarea -->

                <div class="form-group new-address">

                  <label class="col-md-4 control-label" for="alamat">Alamat</label>

                  <div class="col-md-4">                     

                    <textarea class="form-control" id="alamat" name="alamat"></textarea>

                  </div>

                </div>



                <!-- Text input-->

                <div class="form-group">

                  <label class="col-md-4 control-label" for="nome">Kode Pos</label>  

                  <div class="col-md-5">

                    <input id="kode_pos" name="kode_pos" type="number" class="form-control input-md" required="" >

                  </div>

                </div>



                <!-- Select Basic -->

                <div class="form-group">

                  <label class="col-md-4 control-label">Provinsi</label>

                  <div class="col-md-6">

                    <select id="provinsi" name="provinsi" style="width: 300px"  data-placeholder="">

                      <option value="">-- Pilih Provinsi --</option>

                      <?php

                        $curl = curl_init();  
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "GET",
                          CURLOPT_HTTPHEADER => array(
                            "key:d088621f40e01f3317513b33167a9022"
                          ),
                        ));
                       
                        $response = curl_exec($curl);

                        $data = json_decode($response, true);
                        
                        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
                            $id = $data['rajaongkir']['results'][$i]['province_id'];
                            $nama = $data['rajaongkir']['results'][$i]['province'];
                            
                            echo "<option value='".$id."|".$nama."'>".$nama."</option>";
                        }
                      ?>

                    </select>

                  </div>

                </div>



                <!-- Select Basic -->

                <div class="form-group">

                  <label class="col-md-4 control-label">Kota/Kabupaten</label>

                  <div class="col-md-6">

                    <select id="kota" name="kota" style="width: 300px"  data-placeholder="">

                      <option value="">-- Pilih Kota/Kabupaten --</option>

                    </select>

                  </div>

                </div>



                <!-- Select Basic -->

                <div class="form-group">

                  <label class="col-md-4 control-label">Kecamatan</label>

                  <div class="col-md-6">

                      <select id="kec" name="kec" style="width: 300px"  data-placeholder="">

                        <option value="">-- Pilih Kecamatan --</option>                                      	

                      </select>

                  </div>

                </div>



                <div class="form-group">

                  <div class="col-md-5">

                    <button class="btn btn-success btn-lg"><i class="fa fa-disk "></i> Simpan</button>

                    <button class="btn btn-default btn-lg"><i class="fa fa-disk "></i> Batal</button>

                  </div>

                </div>

              </form>

							

