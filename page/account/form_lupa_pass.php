    <!-- /banner_bottom_agile_info -->
    <div class="container">
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <ul class="w3_short_cat">
                    <li><a href="index.php">Home</a><i>|</i></li>
                    <li>Form Ganti password</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>

     <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="col-md-8 single-right-left simpleCart_shelfItem">
                <h3>Ganti Password</h3><br>
                <form method="post" action="aksi.php?module=ganti_password&act=edit">
                    <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>" required=""><br>
                    <h5>Password :</h5>
                    <input name="password" type="password"  required=""><br><br>
                    <h5>Re-enter Password :</h5>
                    <input name="password_again" type="password" required=""><br><br>
                    <input type="submit" value="Ganti Password">
                </form>

                <?php if ($_GET['pesan'] == "pass_tdk_sama") { ?>
                    <br> <font color="red">*Password yang anda masukan tidak sama</font>
                <?php } ?>
                
            </div>             
        </div>
     </div>
    <!--//single_page-->
