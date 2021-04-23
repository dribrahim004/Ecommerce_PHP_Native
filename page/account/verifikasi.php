    <!-- /banner_bottom_agile_info -->

    <div class="container">

        <!--/w3_short-->

        <div class="services-breadcrumb">

            <div class="agile_inner_breadcrumb">

                <ul class="w3_short_cat">

                    <li><a href="index.php">Home</a><i>|</i></li>

                    <li>INFORMASI VERIFIKASI</li>

                </ul>

            </div>

        </div>

        <!--//w3_short-->

    </div>



     <!-- banner-bootom-w3-agileits -->

    <div class="banner-bootom-w3-agileits">

        <div class="container">

            <div class="col-md-8 single-right-left simpleCart_shelfItem">

                <h3>Informasi Verifikasi</h3>

                  <?php 

                      $sql = "SELECT * FROM member WHERE md5(id_member) ='". $_GET['id'] ."'";

                      //echo $sql;



                      $db = new database(0);

                      $dataP = $db->selectOne($sql);



                      if ($dataP['id_member'] != ""){



                        $sql = "UPDATE member SET status='Aktif'

                                WHERE md5(id_member) = '". $_GET['id'] ."'";



                        //echo $sql;

                        if ($db->IUD_db($sql)){

                          //berhasil tambah

                          echo "<p>Akun anda telah terverifikasi Silahkan login.</p>";

                        }else{

                          //gagal tambah

                          echo "<p>Akun anda tidak terverifikasi Silahkan anda kirim email ke dev-it@soka.co.id.</p>";

                        }



                      }else{

                        echo "<p>Akun anda tidak terverifikasi Silahkan anda kirim email ke dev-it@soka.co.id.<br> sertakan email yang anda daftarkan pada email yang anda daftarkan.</p>";

                      }

                  ?>

            </div>             

        </div>

     </div>

    <!--//single_page-->

