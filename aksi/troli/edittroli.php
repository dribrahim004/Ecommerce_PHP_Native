<?php 
	error_reporting(0); 
	include('../../lib/class/database.php'); 
	include('../../lib/class/stokbarang.php');

	$id_m = $_POST['id_m'];
	$id_b = $_POST['id_b'];
	$qty = $_POST['qty'];

	if (!empty($id_m) AND !empty($id_b) AND !empty($qty)){

		$db = new database(0);
		$sql = "SELECT * FROM produk WHERE md5(id_produk)='$id_b'";
		$data_produk = $db->selectOne($sql);
		$id_produk = $data_produk['id_produk'];
		$harga = $data_produk['harga_produk'];
		if ($data_produk['harga_diskon'] > 0){
			$harga = $data_produk['harga_diskon'];
		}

		$sql = "SELECT * FROM po WHERE md5(id_member)='$id_m' AND status_po = 'pemesanan'";
		$data_po = $db->selectOne($sql);
		$id_po = $data_po['id_po'];

		if ($id_po != ""){
			$stok = 0;
	        $stokbarang = new stokbarang("0",$data_produk['id_produk']);
	        $stok = $stokbarang->hitungstok();

	        $sql = "SELECT * FROM d_po WHERE id_po='$id_po' AND id_produk = '$id_produk' AND harga = '$harga'";
			$data_dpo = $db->selectOne($sql);
			$qty_dpo = $data_dpo['qty'];

			if (($stok > 0) && ($qty <= ($stok + $qty_dpo))) { 

				$sql = "UPDATE d_po SET tgl_input = now(), qty = '". $qty ."' WHERE id_po = '$id_po' AND id_produk = '$id_produk' AND harga = '$harga'";
				//echo $sql;
				if ($db->IUD_db($sql)){
				    
				    $sql = "UPDATE po SET id_voucher = NULL, nominal_voucher='0' WHERE id_po = '$id_po'";
    				//echo $sql;
    				if ($db->IUD_db($sql)){
    					//berhasil
    					echo json_encode("berhasil"); 
    				}else{
    					//gagal tambah
    					echo json_encode("gagal"); 
    				}
				
					//berhasil
					//echo json_encode("berhasil"); 
				}else{
					//gagal tambah
					echo json_encode("gagal"); 
				}

			}else{
				echo json_encode("stok_kosong");
			}
		}else{
			echo json_encode("gagal_id_po");
		}
	}else{
		echo json_encode("gagal");
		echo"<script>location.href='/'</script>";
	}
?>