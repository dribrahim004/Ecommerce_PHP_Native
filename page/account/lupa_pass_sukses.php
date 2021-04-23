    <!-- /banner_bottom_agile_info -->
    <div class="container">
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <ul class="w3_short_cat">
                    <li><a href="index.php">Home</a><i>|</i></li>
                    <li>Informasi Lupa Password</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>

     <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="col-md-8 single-right-left simpleCart_shelfItem">
                <h3>Informasi Lupa Password</h3>
                <?php if ($_GET['pesan'] == "") { ?>
                    <p>Silahkan lihat inbox atau spam email yang sudah anda daftarkan klik link untuk menganti password agar dapat login.</p>
                <?php } ?>

                <?php if ($_GET['pesan'] == "gagal") { ?>
                    <p>Silakan coba kembali atau hubungi via email ke teknis@sokasocks.com</p>
                <?php } ?>
            </div>             
        </div>
     </div>
    <!--//single_page-->
