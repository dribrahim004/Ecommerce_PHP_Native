<?php 
	error_reporting(0); 
	include('../../lib/class/database.php'); 
	//include('../../lib/class/autoNumber.php'); 

	$id = $_POST['id'];
	$id_p = $_POST['id_p'];
	$id_p_value = $_POST['id_p_value'];
	$catatan = $_POST['catatan'];
	$id_a = $_POST['id_a'];
	$code = $_POST['code'];
	$nama = $_POST['nama'];
	$service = $_POST['service'];
	$description = $_POST['description'];
	$value = $_POST['value'];
	$etd = $_POST['etd'];
	$berat = $_POST['berat'];
	$voucher = $_POST['voucher'];

	if ( !empty($id) AND !empty($id_p) AND !empty($id_a) AND !empty($code) AND !empty($nama) 
			AND !empty($service) AND !empty($description) AND !empty($value) AND !empty($etd) AND !empty($berat) ){

		$db = new database(0);
		
		$sql = "SELECT * FROM po WHERE md5(id_po)='$id_p'";
		$data_po = $db->selectOne($sql);
		$id_po = $data_po['id_po'];
		
		$sql = "SELECT * FROM alamat WHERE md5(id_alamat)='$id_a'";
		$data_alamat = $db->selectOne($sql);
		$id_alamat = $data_alamat['id_alamat'];
		
		$sql = "SELECT * FROM po WHERE id_po='$id_po'";
		$data_kt = $db->selectOne($sql);
		$tmp_kt = $data_kt['kode_transaksi'];
		$kode_transaksi = $data_kt['kode_transaksi'];
		$total_pembayaran = $id_p_value + $value + $kode_transaksi - $voucher;
		
		if ($tmp_kt == "0"){
		    
		    $kode = "false";
		    while($kode != "true")
		    { 
        		$kode_transaksi = rand(1,99);
        		$kode_transaksi = str_pad($kode_transaksi,2,"0");
        		$total_pembayaran = $id_p_value + $value + $kode_transaksi - $voucher;
        		
        		$sql = "SELECT * FROM po WHERE total_pembayaran = '$total_pembayaran'";
    		    $data_cross_cek = $db->selectOne($sql);
    		    $tmp_cross_cek = $data_cross_cek['total_pembayaran'];
    		    
    		    if ($tmp_cross_cek != $total_pembayaran){
    		        
    		        $kode = "true";
    		        
    		    }
		    } 
		
		}

		$sql = "UPDATE po SET status_po = 'pengiriman',
		                      tgl_input = now(),
		                      catatan = '". $catatan . "',
		                      id_alamat = '". $id_alamat . "',
		                      code_pengirim = '". $code . "',
		                      nama_pengirim = '". $nama . "',
		                      service_pengirim = '". $service . "',
		                      description_pengirim = '". $description . "',
		                      value_pengirim = '". $value . "',
		                      etd_pengirim = '". $etd . "',
		                      berat_produk = '". $berat . "',
		                      kode_transaksi = '". $kode_transaksi . "',
		                      total_pembayaran = '". $total_pembayaran . "'
		        WHERE id_po = '". $id_po ."'";
		
		//echo $sql;
		if ($db->IUD_db($sql)){
			//berhasil
			echo json_encode("berhasil"); 
		}else{
			//gagal tambah
			echo json_encode("gagal"); 
		}

	}else{
		echo json_encode("gagal");
		echo"<script>location.href='/'</script>";
	}
?>