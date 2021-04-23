<?php

    error_reporting(0); 

    $page=$_GET['page'];

    include('lib/class/database.php');

?>

<!DOCTYPE html>

<html>

<head>

<title>Socks By SOKA - Belanja Online SOKA </title>

<!--/tags -->

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

		function hideURLbar(){ window.scrollTo(0,1); } 

</script>

<!--//tags -->
<link href="images/logo/icon.PNG" rel="shortcut icon">

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<link href="css/font-awesome.css" rel="stylesheet"> 

<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>

<link href="css/costum.css" rel='stylesheet' type='text/css'/>

<link href="css/cart_checkout.css" rel='stylesheet' type='text/css'/>

<link href="css/chosen.min.css" rel='stylesheet' type='text/css'/>

<link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<link href="css/dataTables/dataTables.responsive.css" rel="stylesheet">

<link href="css/desktop-versi.css" rel="stylesheet"> 

<!--
 <script src="http://maps.google.com/maps/api/js?sensor=true&key=AIzaSyDUitsQtn0Ai_zAdbVVSZnW3buLHTCZsQc"></script> 
-->

<!-- //for bootstrap working -->

<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>


    <style type="text/css">
        .gal-personal img{ width: 50%; padding: 5px 0;}
        
        .gal-all img{ width: 100%; padding: 5px 0;}
    </style>
    
</head>

<body>
  

	<?php include ('page/master/main.php');?>

	<!-- <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a> -->
	

</body>

</html>



<!-- js -->

<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

<!-- //js -->

<script src="js/modernizr.custom.js"></script>

	<!-- Custom-JavaScript-File-Links --> 

	<!-- cart-js -->

	<script src="js/minicart.min.js"></script>

<script>

	// Mini Cart

	paypal.minicart.render({

		action: '#'

	});



	if (~window.location.search.indexOf('reset=true')) {

		paypal.minicart.reset();

	}

</script>



<!-- //cart-js --> 

<!-- script for responsive tabs -->						

<script src="js/easy-responsive-tabs.js"></script>

<script>

	$(document).ready(function () {

	$('#horizontalTab').easyResponsiveTabs({

	type: 'default', //Types: default, vertical, accordion           

	width: 'auto', //auto or any width like 600px

	fit: true,   // 100% fit in a container

	closed: 'accordion', // Start closed if in accordion view

	activate: function(event) { // Callback function if tab is switched

	var $tab = $(this);

	var $info = $('#tabInfo');

	var $name = $('span', $info);

	$name.text($tab.text());

	$info.show();

	}

	});

	$('#verticalTab').easyResponsiveTabs({

	type: 'vertical',

	width: 'auto',

	fit: true

	});

	});

</script>

<!-- //script for responsive tabs -->		

<!-- stats -->

	<script src="js/jquery.waypoints.min.js"></script>

	<script src="js/jquery.countup.js"></script>

	<script>

		$('.counter').countUp();

	</script>

<!-- //stats -->

<!-- start-smoth-scrolling -->

<script type="text/javascript" src="js/move-top.js"></script>

<script type="text/javascript" src="js/jquery.easing.min.js"></script>

<script type="text/javascript">

	jQuery(document).ready(function($) {

		$(".scroll").click(function(event){		

			event.preventDefault();

			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);

		});

	});

</script>

<!-- here stars scrolling icon -->

	<script type="text/javascript">

		$(document).ready(function() {

			/*

				var defaults = {

				containerID: 'toTop', // fading element id

				containerHoverID: 'toTopHover', // fading element hover id

				scrollSpeed: 1200,

				easingType: 'linear' 

				};

			*/

								

			$().UItoTop({ easingType: 'easeOutQuart' });

								

			});

	</script>

<!-- //here ends scrolling icon -->

<script>

	// Mini Cart

	paypal.minicart.render({

		action: '#'

	});



	if (~window.location.search.indexOf('reset=true')) {

		paypal.minicart.reset();

	}

</script>

	<!-- single -->

<script src="js/imagezoom.js"></script>

<!-- single -->

<!-- script for responsive tabs -->						

<script src="js/easy-responsive-tabs.js"></script>

<script>

	$(document).ready(function () {

	$('#horizontalTab').easyResponsiveTabs({

	type: 'default', //Types: default, vertical, accordion           

	width: 'auto', //auto or any width like 600px

	fit: true,   // 100% fit in a container

	closed: 'accordion', // Start closed if in accordion view

	activate: function(event) { // Callback function if tab is switched

	var $tab = $(this);

	var $info = $('#tabInfo');

	var $name = $('span', $info);

	$name.text($tab.text());

	$info.show();

	}

	});

	$('#verticalTab').easyResponsiveTabs({

	type: 'vertical',

	width: 'auto',

	fit: true

	});

	});

</script>



<!-- FlexSlider -->

<script src="js/jquery.flexslider.js"></script>

						<script>

						// Can also be used with $(document).ready()

							$(window).load(function() {

								$('.flexslider').flexslider({

								animation: "slide",

								controlNav: "thumbnails"

								});

							});

						</script>

					<!-- //FlexSlider-->

<!-- //script for responsive tabs -->

<!-- start-smoth-scrolling -->

<script type="text/javascript" src="js/move-top.js"></script>

<script type="text/javascript" src="js/jquery.easing.min.js"></script>



<script type="text/javascript">

	jQuery(document).ready(function($) {

		$(".scroll").click(function(event){		

			event.preventDefault();

			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);

		});

	});

</script>

<!-- here stars scrolling icon -->

	<script type="text/javascript">

		$(document).ready(function() {

			/*

				var defaults = {

				containerID: 'toTop', // fading element id

				containerHoverID: 'toTopHover', // fading element hover id

				scrollSpeed: 1200,

				easingType: 'linear' 

				};

			*/

								

			$().UItoTop({ easingType: 'easeOutQuart' });

								

			});

	</script>
	
<script type="text/javascript">

    $(document).ready(function () { 
    
        $("#watch-me").click(function(){
    
            $("#show-me:hidden").show('slow');
        
            $("#show-me-two").hide();
        
            $("#show-me-three").hide();
    
        });
    
        $("#watch-me").click(function(){
    
            if($('watch-me').prop('checked')===false){
    
                $('#show-me').hide();
    
            }
    
        });
    
        $("#see-me").click(function(){
    
            $("#show-me-two:hidden").show('slow');
        
            $("#show-me").hide();
        
            $("#show-me-three").hide();
    
        });
    
        $("#see-me").click(function(){
    
            if($('see-me-two').prop('checked')===false){
        
                $('#show-me-two').hide();
        
            }
    
        });
    
        $("#look-me").click(function(){
    
            $("#show-me-three:hidden").show('slow');
        
            $("#show-me").hide();
        
            $("#show-me-two").hide();
    
        });
    
        $("#look-me").click(function(){
    
            if($('see-me-three').prop('checked')===false){
        
                $('#show-me-three').hide();
        
            }
    
        });
     });

</script>  

<script src="js/jquery.dataTables.min.js"></script>

<script src="js/jquery.dataTables.bootstrap.min.js"></script>


 <script>

            $(document).ready(function() {

                $('#tabel').DataTable({

                        responsive: true

                });

            });



          



</script>



<?php if ($_GET['page'] != "product-categories"){ ?>

	<script src="js/chosen.jquery.min.js"></script>

		<script>

		    $(function() {

		        $(".chzn-select").chosen({no_results_text: "Data Yang Anda Cari Tidak Ada !"});

		    });





	    </script>

<?php } ?>



<!-- for bootstrap working -->

<script type="text/javascript" src="js/bootstrap.js"></script>



<?php if ($_GET['page'] == "product-categories"){ ?>



	<script type="text/javascript">

		$(document).ready(function(){
            
			$("#add_cart").on('click',function() {
                
                //$("#myModals_error").modal("show"); //modal untuk error

				var id_m = "<?php echo md5($_SESSION['id_member']); ?>";

				var id_b = $("#id_b").val();

				var qty = $("#qty").val();



				if (id_m != "<?php echo md5(''); ?>") {



					$.ajax({

						type: "POST",

						url: "aksi/troli/addtroli.php",		

						dataType: 'JSON',

						data: {

								id_m:id_m,

								id_b:id_b,

								qty:qty

						},    

						error: function(xhr, status, error) {

								var err = eval("(" + xhr.responseText + ")");

								alert(err.Message);

								alert(err);

							},

						success: function(data) {

								if (data == "berhasil"){
                                    
                                    document.getElementById("jml_troli").style.display="";
                                    var tmp_jml_troli = document.getElementById("jml_troli");
                                    var jml_troli_tmp = tmp_jml_troli.innerHTML;
                                    tmp_jml_troli = parseInt(jml_troli_tmp) + parseInt(qty);
                                                        
                                    document.getElementById("jml_troli").style.display="";
                                    document.getElementById("jml_troli").innerHTML=tmp_jml_troli;
                                        
									showModals("<?php echo md5($_SESSION['id_member']); ?>");

								}else if (data = "stok_kosong"){

									alert("Stok barang yang anda pilih sudah tidak tersedia !")

								}else{

									alert("Add To Cart Anda Gagal, Hubungi Kontak Kami!")

								}

						}

					});



				}else{



					$("#myModal").modal("show");



				}

			});
			



			$("#qty_modal").on('change',function() {

				//alert("tess");

			});



			function showModals(id) {

				$('.preview_troli').load("halaman/preview_troll.php?id="+ id);

				$("#myModals_cart").modal("show");

			}
			
			
			$("#add_wishlist").on('click',function() {

				var id_m = "<?php echo md5($_SESSION['id_member']); ?>";
				var id_b = $("#id_b").val();

				if (id_m != "<?php echo md5(''); ?>") {
				    
				    $.ajax({

						type: "POST",
						url: "aksi/wishlist/addwishlist.php",		
						dataType: 'JSON',
						data: {
								id_m:id_m,
								id_b:id_b,
						},    
						error: function(xhr, status, error) {
								var err = eval("(" + xhr.responseText + ")");
								alert(err.Message);
								alert(err);
							},
						success: function(data) {

								if (data == "berhasil"){
                                    alert("Data Wishlist Anda Berhasil Tersimpan");
								}else if (data == "sudah_ada"){
                                    alert("Data Wishlist Yang Anda Simpan Sudah Ada");
								}else{
									alert("Tambah Data Wishlist Anda Gagal, Hubungi Kontak Kami!")
								}
						}

					});
					
				}else{

					$("#myModal").modal("show");
				}

			});

			

		});

	</script>



<?php } ?>


<?php if ($_GET['pesan'] == "gagal_login"){ ?>

	<script type="text/javascript">

		alert("email & password anda salah !!!");

	</script>

<?php } ?>

<?php if ($_GET['pesan'] == "belum_verifikasi"){ ?>

	<script type="text/javascript">

		alert("Anda belum verifikasi email, harap cek inbox email anda !");

	</script>

<?php } ?>


<?php if ($_GET['page'] == "cart"){ ?>



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
                                    
                                    /*
                                        document.getElementById("jml_troli").style.display="";
                                        var tmp_jml_troli = document.getElementById("jml_troli");
                                        var jml_troli_tmp = tmp_jml_troli.innerHTML;
                                        tmp_jml_troli = parseInt(jml_troli_tmp) + parseInt(qty_val);
                                                            
                                        document.getElementById("jml_troli").style.display="";
                                        document.getElementById("jml_troli").innerHTML=tmp_jml_troli;
                                    */

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



                                        document.getElementById("alltotal_txt_2").style.display="";

                                        document.getElementById("alltotal_txt_2").innerHTML=setMoney_nodouble(alltotal,"");



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



                        document.getElementById("alltotal_txt_2").style.display="";

                        document.getElementById("alltotal_txt_2").innerHTML=setMoney_nodouble(alltotal,"");



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
                                
                                document.getElementById("jml_troli").style.display="";
                                var tmp_jml_troli = document.getElementById("jml_troli");
                                var jml_troli_tmp = tmp_jml_troli.innerHTML;
                                tmp_jml_troli = parseInt(jml_troli_tmp) - parseInt(qty_val);
                                                            
                                document.getElementById("jml_troli").style.display="";
                                document.getElementById("jml_troli").innerHTML=tmp_jml_troli;

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



                                document.getElementById("alltotal_txt_2").style.display="";

                                document.getElementById("alltotal_txt_2").innerHTML=setMoney_nodouble(alltotal,"");



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

<?php } ?>

<?php if ( ($_GET['page'] == "new_address") || ($_GET['page'] == "edit_address") ){ ?>

    <script type="text/javascript">

     	$(document).ready(function(e){

          	$("#provinsi").change(function(){
	            var provinsi = $("#provinsi").val();

	            $.ajax({
	                url: "aksi/combo_box/kota.php",
	                data: "id="+provinsi,
	                cache: false,
	                error: function(xhr, status, error) {
	                    var err = eval("(" + xhr.responseText + ")");
	                    alert(err.Message);
	                    alert(err);
	                },
	                success: function(msg){
	                    $("#kota").html(msg);
	                }
	            });
          	});

          	$("#kota").change(function(){
	            var kota = $("#kota").val();

	            $.ajax({
	                url: "aksi/combo_box/kec.php",
	                data: "id="+kota,
	                cache: false,
	                error: function(xhr, status, error) {
	                    var err = eval("(" + xhr.responseText + ")");
	                    alert(err.Message);
	                    alert(err);
	                },
	                success: function(msg){
	                    $("#kec").html(msg);
	                }
	            });
          	});

      	});

    </script>

<?php } ?>

<?php if ($_GET['page'] == "shipping"){ ?>
    <script src="js/money.js"></script>
    <script type="text/javascript">
    
        var id_ongkir = "";
    
        $(document).ready(function () { 
            
            $("#radio_display").hide();
            $("#radio_text").hide();
                
            $("#kurir").change(function(){
                
                var id = "<?php echo $_GET['id']; ?>";
                var id_p = $("#id_p").val();
	            var kurir = $("#kurir").val();
	            id_ongkir = "";
    
                if (kurir == ""){
                    
                    $("#radio_display").hide();
    	            $("#radio_text").hide();
                    
                }else{
    	            $.ajax({
    	                type: "POST",
    	                url: "aksi/kurir/data_paket.php",
    	                dataType: 'JSON', 
    	                data: {
    	                    id:id,
    						id_p:id_p,
    						kurir:kurir
    				    }, 
    	                cache: false,
    	                error: function(xhr, status, error) {
    	                    var err = eval("(" + xhr.responseText + ")");
    	                    alert(err.Message);
    	                    alert(err);
    	                },
    	                success: function(data){
    	                    
    	                    var i_tampil = 0;
    	                    
    	                    for (var i=1; i <= 4; i++){
    	                        $("#display_jp_"+i).show();
    	                        
    	                        $("#code_"+i).val("");
    	                        $("#nama_"+i).val("");
    	                        $("#service_"+i).val("");
    	                        $("#description_"+i).val("");
    	                        $("#value_"+i).val("");
    	                        $("#etd_"+i).val("");
    	                        $("#note_"+i).val("");
    	                    }
    	                    
    	                    document.getElementById("jp_1").checked = false;
    	                    document.getElementById("jp_2").checked = false;
    	                    document.getElementById("jp_3").checked = false;
    	                    document.getElementById("jp_4").checked = false;
    	                    
    	                    $("#show_jp_1").hide();
    	                    $("#show_jp_2").hide();
                            $("#show_jp_3").hide();
                            $("#show_jp_4").hide();
    	                    
    	                    for (var i=0; i < data.length; i++){
    	                        id_tampil = i + 1;
    	                        
    	                         //data_txt = ""+ data[i].descriptions +" ( "+ data[i].service +" )";
    	                        data_txt = data[i].tampilradio;
    	                        document.getElementById("txt_radio_"+id_tampil).innerHTML = data_txt;
    	                        
    	                        data_txt = ""+ data[i].name +"<br> Jenis Paket : "+ data[i].descriptions +" ( "+ data[i].service +" ) <br> Harga : Rp."+ setMoney_nodouble(data[i].value,"") +"<br> Estimasi Pengiriman : "+ data[i].etd +" Hari";
    	                        document.getElementById("deskripsi_"+id_tampil).innerHTML = data_txt;
    	                        
    	                        $("#code_"+id_tampil).val(""+ data[i].code +"");
    	                        $("#nama_"+id_tampil).val(""+ data[i].name +"");
    	                        $("#service_"+id_tampil).val(""+ data[i].service +"");
    	                        $("#description_"+id_tampil).val(""+ data[i].descriptions +"");
    	                        $("#value_"+id_tampil).val(""+ data[i].value +"");
    	                        $("#etd_"+id_tampil).val(""+ data[i].etd +"");
    	                        $("#note_"+id_tampil).val(""+ data[i].note +"");
    	                        $("#berat_"+id_tampil).val(""+ data[i].berat +"");
    	                        
    	                        i_tampil = i;
    	                    }
    	                    
    	                    i_tampil = i_tampil + 1;
    	                    
    	                    for (var j=i_tampil + 1; j <= 4; j++){
    	                        $("#display_jp_"+j).hide();
    	                    }
    	                    
    	                    $("#radio_display:hidden").show();
    	                    $("#radio_text:hidden").show();
    	                }
    	            });
                }
          	});
        
            $("#jp_1").click(function(){
        
                $("#show_jp_1:hidden").show('slow');
                
                //hide yang lain
                $("#show_jp_2").hide();
                $("#show_jp_3").hide();
                $("#show_jp_4").hide();
                
                if($('jp_1').prop('checked')===false){
        
                    $('#show_jp_1').hide();
                    
                }else{
                    pilih_jenis(1);
                }
        
            });
            
            $("#jp_2").click(function(){
        
                $("#show_jp_2:hidden").show('slow');
                
                //hide yang lain
                $("#show_jp_1").hide();
                $("#show_jp_3").hide();
                $("#show_jp_4").hide();
                
                if($('jp_2').prop('checked')===false){
            
                    $('#show_jp_2').hide();
                    
                }else{
                    pilih_jenis(2);
                }
        
            });
            
            $("#jp_3").click(function(){
        
                $("#show_jp_3:hidden").show('slow');
                
                //hide yang lain
                $("#show_jp_1").hide();
                $("#show_jp_2").hide();
                $("#show_jp_4").hide();
                
                if($('jp_3').prop('checked')===false){
        
                    $('#show_jp_3').hide();
                    
                }else{
                    pilih_jenis(3);
                }
        
            });
            
            $("#jp_4").click(function(){
        
                $("#show_jp_4:hidden").show('slow');
                
                //hide yang lain
                $("#show_jp_1").hide();
                $("#show_jp_2").hide();
                $("#show_jp_3").hide();
                
                if($('jp_4').prop('checked')===false){
        
                    $('#show_jp_4').hide();
                    
                }else{
                    pilih_jenis(4);
                }
        
            });
            
            function pilih_jenis(id){
                
                var ongkir = $("#value_"+id).val();
                document.getElementById("ongkir").style.display="";
                document.getElementById("ongkir").innerHTML=setMoney_nodouble(ongkir,"");
                
                hitung();
                id_ongkir = id;
            }
            
            function hitung(){
                document.getElementById("total_pesanan").style.display="";
                var tmp_total_pesanan=document.getElementById("total_pesanan");
                var total_pesanan_tmp=tmp_total_pesanan.innerHTML;
                tmp_total_pesanan = getMoney(total_pesanan_tmp.trim());
                
                document.getElementById("total_voucher").style.display="";
                var tmp_total_voucher=document.getElementById("total_voucher");
                var total_voucher_tmp=tmp_total_voucher.innerHTML;
                tmp_total_voucher = getMoney(total_voucher_tmp.trim());
                
                document.getElementById("ongkir").style.display="";
                var tmp_ongkir=document.getElementById("ongkir");
                var ongkir_tmp=tmp_ongkir.innerHTML;
                tmp_ongkir = getMoney(ongkir_tmp.trim());
                
                document.getElementById("total_all").style.display="";
                var tmp_total_all=document.getElementById("total_all");
                var total_all_tmp=tmp_total_all.innerHTML;
                tmp_total_all = getMoney(total_all_tmp.trim());
                
                var alltotal = ( parseInt(tmp_total_pesanan) - parseInt(tmp_total_voucher) + parseInt(tmp_ongkir) ); 

                document.getElementById("total_all").style.display="";
                document.getElementById("total_all").innerHTML=setMoney_nodouble(alltotal,"");
            }
        
        
            $("#metode_pembayaran").click(function(){
                
                //$("#myModals_error").modal("show"); //modal untuk error
                
                var id_pp = $("#id_p").val();
                
                if (id_pp == ""){
                    
                    alert("Belum ada data pemesanana !");
                    window.location='index.php';
                    
                }else{
                    
                    if (id_ongkir == ""){
                        alert("Harap pilih kurir pengiriman telebih dahulu !");
                    }else{
                        var id = "<?php echo $_GET['id']; ?>";
                        var id_p = $("#id_p").val();
                        var id_p_value = $("#id_p_value").val();
                        var catatan = $("#catatan").val();
                        var id_a = $("#alamat").val();
                        
                        document.getElementById("total_voucher").style.display="";
                        var tmp_total_voucher=document.getElementById("total_voucher");
                        var total_voucher_tmp=tmp_total_voucher.innerHTML;
                        var voucher = getMoney(total_voucher_tmp.trim());
                        
                        var code = $("#code_"+id_ongkir).val();
                        var nama = $("#nama_"+id_ongkir).val();
        	            var service = $("#service_"+id_ongkir).val();
        	            var description = $("#description_"+id_ongkir).val();
        	            var value = $("#value_"+id_ongkir).val();
        	            var etd = $("#etd_"+id_ongkir).val();
        	            var note = $("#note_"+id_ongkir).val();
        	            var berat = $("#berat_"+id_ongkir).val();
                        
                        $.ajax({
    						type: "POST",
    						url: "aksi/shipping/shipping.php",		
    						dataType: 'JSON',
    						data: {
    								id:id,
    								id_p:id_p,
    								id_p_value:id_p_value,
    								catatan:catatan,
    								id_a:id_a,
    								code:code,
    								nama:nama,
    								service:service,
    								description:description,
    								value:value,
    								etd:etd,
    								berat:berat,
    								voucher:voucher
    						},    
    						error: function(xhr, status, error) {
    								var err = eval("(" + xhr.responseText + ")");
    								alert(err.Message);
    								alert(err);
    							},
    						success: function(data) {
    								if (data == "berhasil"){ 
    									window.location='index.php?page=metode-payment&id='+ id_p +'';
    								}else{
    									alert("Gagal Harap Coba Kembali!");
    								}
    						}
    					});
                    }
                
                }
                
            });
            
            
            $("#cek_voucher").on('click',function() {

                    var id_m = "<?php echo $_GET['id']; ?>";
                    var voucher = $("#voucher").val();
                    
                    $.ajax({
                        type: "POST",
                        url: "aksi/voucher/voucher.php",
                        dataType: 'JSON',
                        data: {
                                id_m:id_m,
                                voucher:voucher
                              },    
                        error: function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                alert(err.Message);
                                alert(err);
                              },
                        success: function(data) {
                            if (data == "kosong"){
                                document.getElementById("total_voucher").style.display="";
                                document.getElementById("total_voucher").innerHTML=setMoney_nodouble("0","");
                                
                                document.getElementById("lbl_voucher").style.display="";
                                document.getElementById("lbl_voucher").innerHTML="";
                                        
                                alert("voucher yang anda masukan kosong !!!");
                            }else{
                                if (data != ""){
                                    if (data != "0"){
                                        document.getElementById("total_voucher").style.display="";
                                        document.getElementById("total_voucher").innerHTML=setMoney_nodouble(data,"");  
                                        
                                        document.getElementById("lbl_voucher").style.display="";
                                        document.getElementById("lbl_voucher").innerHTML="( "+ voucher +" )";
                                        
                                    }else{
                                        document.getElementById("total_voucher").style.display="";
                                        document.getElementById("total_voucher").innerHTML=setMoney_nodouble("0","");
                                        
                                        document.getElementById("lbl_voucher").style.display="";
                                        document.getElementById("lbl_voucher").innerHTML="";
                                        
                                        alert("voucher yang anda masukan salah silakan coba kembali");
                                    }
                                }else{
                                    document.getElementById("total_voucher").style.display="";
                                    document.getElementById("total_voucher").innerHTML=setMoney_nodouble("0","");
                                    
                                    document.getElementById("lbl_voucher").style.display="";
                                    document.getElementById("lbl_voucher").innerHTML="";
                                        
                                    alert("voucher yang anda masukan salah silakan coba kembali");
                                }
                            }
                            
                            hitung();
                        }
                    }); 
        	});    
            
         });
    
    </script> 
<?php } ?>

<?php if ($_GET['page'] == "metode-payment"){ ?>
    <script type="text/javascript">
        
        var metode = "";
        
        $(document).ready(function () {
            $("#jp_1").click(function(){
        
                $("#show_jp_1:hidden").show('slow');
                
                //hide yang lain
                $("#show_jp_2").hide();
                
                if($('jp_1').prop('checked')===false){
        
                    $('#show_jp_1').hide();
                    
                }else{
                    pilih_jenis(1);
                }
        
            });
            
            $("#jp_2").click(function(){
        
                $("#show_jp_2:hidden").show('slow');
                
                //hide yang lain
                $("#show_jp_1").hide();
                
                if($('jp_2').prop('checked')===false){
            
                    $('#show_jp_2').hide();
                    
                }else{
                    pilih_jenis(2);
                }
        
            });
            
            function pilih_jenis(id){
                metode = id;
                var bank = $("#bank_"+metode).val();
                $("#bank").val(""+ bank +"");
            }
            
            $("#konfirmasi").click(function(){
            
             /*
                var id_pp = $("#id_p").val();
                
                if (id_pp == ""){
                    
                    alert("Belum ada data pemesanana !");
                    window.location='index.php';
                    
                }else{
                    
                    if (metode == ""){
                        alert("Harap pilih metode pembayaran telebih dahulu !");
                    }else{ */
                        var id = "<?php echo $_GET['id']; ?>";
                        var id_p = $("#id_p").val();
                        var bank = $("#bank_"+metode).val();
                        
                        $("#bank").val(""+ bank +"");
                        
                        /*
                        $.ajax({
    						type: "POST",
    						url: "aksi/metode_payment/metode_payment.php",		
    						dataType: 'JSON',
    						data: {
    								id:id,
    								id_p:id_p,
    								bank:bank
    						},  
    						error: function(xhr, status, error) {
    								var err = eval("(" + xhr.responseText + ")");
    								alert(err.Message);
    								alert(err);
    							},
    						success: function(data) {
    								if (data == "berhasil"){
    									window.location='index.php?page=payment&id=<?php echo $id_po; ?>';
    								}else{
    									alert("Gagal Harap Coba Kembali!");
    								}
    						}
    					});
    					
                    }
                
                } */
                
            });
        });
            
    </script>
    
    <?php if ($_GET['pesan'] == "kosong"){ ?>
    
    	<script type="text/javascript">
    
    	    alert("Harap pilih metode pembayaran telebih dahulu !");
    
    	</script>
    
    <?php } else if ($_GET['pesan'] == "gagal"){ ?>
    
    	<script type="text/javascript">
    
    	    alert("Harap hubungi admin !");
    
    	</script>
    
    <?php } ?>

<?php } ?>

<?php if ($_GET['page'] == "payment"){ ?>
<!-- Script Timer -->

     <script type="text/javascript">

        $(document).ready(function() {

              /** Membuat Waktu Mulai Hitung Mundur Dengan 

                * var detik = 0,

                * var menit = 1,

                * var jam = 1

              */

             

              

             /**

               * Membuat function hitung() sebagai Penghitungan Waktu

             */

            function hitung() {

                /** setTimout(hitung, 1000) digunakan untuk 

                    * mengulang atau merefresh halaman selama 1000 (1 detik) 

                */

                setTimeout(hitung,1000);

  

               /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */

               if(menit < 10 && jam == 0){

                     var peringatan = 'style="color:red"';

               };

 

               /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */

               $('#timer').html(

                      '<h1 align="center"'+peringatan+'>' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h1><hr>'

                );

  

                /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */

                detik --;

 

                /** Jika var detik < 0

                    * var detik akan dikembalikan ke 59

                    * Menit akan Berkurang 1

                */

                if(detik < 0) {

                    detik = 59;

                    menit --;

 

                    /** Jika menit < 0

                        * Maka menit akan dikembali ke 59

                        * Jam akan Berkurang 1

                    */

                    if(menit < 0) {

                        menit = 59;

                        jam --;

 

                        /** Jika var jam < 0

                            * clearInterval() Memberhentikan Interval dan submit secara otomatis

                        */

                        if(jam < 0) {                                                                 

                            clearInterval();  

                        } 

                    } 

                } 

            }           

            /** Menjalankan Function Hitung Waktu Mundur */

            hitung();

      }); 

      // ]]>

    </script>
    
<?php } ?>