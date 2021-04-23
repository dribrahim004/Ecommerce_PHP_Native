    <!-- /banner_bottom_agile_info -->
    <div class="container">
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <ul class="w3_short_cat">
                    <li><a href="index.php">Home</a><i>|</i></li>
                    <li>Informasi Register</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>

     <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="col-md-8 single-right-left simpleCart_shelfItem">
                <h3>Informasi Register</h3>
                <?php if ($_GET['pesan'] == "") { ?>
                    <p>Terima kasih sudah registrasi<br/>
                    Email verifikasi telah dikirimkan ke alamat email anda, silahkan cek inbox/spam anda segera<br/>
                    Akun anda akan diaktifkan setelah diverifikasi 
                    </p>
                <?php } ?>

                <?php if ($_GET['pesan'] == "email_sama") { ?>
                    <p>Email yang anda masukan sudah terdaftar.</p>
                <?php } ?>

                <?php if ($_GET['pesan'] == "captcha") { ?>
                    <p>Captcha yang anda masukan salah.</p>
                <?php } ?>

                <?php if ( ($_GET['pesan'] == "gagal") ||  ($_GET['pesan'] == "gagal_id") ){ ?>
                    <p>Silakan coba kembali atau hubungi via email ke dev-it@soka.co.id</p>
                <?php } ?>
            </div>             
        </div>
     </div>
    <!--//single_page-->
