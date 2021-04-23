<?php 
	error_reporting(0); 
	include('../../lib/class/database.php'); 
	include('../../lib/class/autoNumber.php'); 
	include('../../lib/class/stokbarang.php');

	$id_m = $_POST['id_m'];
	$id_b = $_POST['id_b'];
	$qty = $_POST['qty'];

	if (!empty($id_m) AND !empty($id_b) AND !empty($qty)){

		$db = new database(0);
		$sql = "SELECT * FROM produk WHERE md5(id_produk)='$id_b'";
		$data_produk = $db->selectOne($sql);
		$id_produk = $data_produk['id_produk'];
		$nama_produk = $data_produk['nama_produk'];
		$harga = $data_produk['harga_produk'];
		$pesen_diskon = $data_produk['persen_diskon'];
		$harga_jual = $data_produk['harga_produk'];
		
		if ($data_produk['harga_diskon'] > 0){
			$harga = $data_produk['harga_diskon'];
		}

		$stok = 0;
        $stokbarang = new stokbarang("0",$data_produk['id_produk']);
        $stok = $stokbarang->hitungstok();

		if (($stok > 0) && ($qty <= $stok)){ 
		
			$sql = "SELECT * FROM member WHERE md5(id_member)='$id_m'";
			$data_member = $db->selectOne($sql);
			$id_member = $data_member['id_member'];

			$sql = "SELECT * FROM po WHERE md5(id_member)='$id_m' AND status_po = 'pemesanan'";
			$data_po = $db->selectOne($sql);
			$tmp = $data_po['id_po'];

			if ($tmp == ""){

				$auto_number = new autoNumber("PO". date("ym"),"",4);
				$sql = "SELECT * FROM po 
						WHERE SUBSTRING(id_po,1,6) = 'PO". date("ym") ."'
						ORDER BY id_po DESC";
				$data = $db->selectOne($sql);

				$id_po = $auto_number->getId($data['id_po']);

				$sql = "INSERT INTO po  (id_po, id_member, status_po, tgl_input)
											VALUES
										('". $id_po . "','". $id_member . "','pemesanan',now())";
				//echo $sql;
				if ($db->IUD_db($sql)){

					$sql = "INSERT INTO d_po  (id_po, tgl_input, id_produk, nama_produk, qty, harga, persen_diskon, harga_jual)
											VALUES
										('". $id_po . "', now(), '". $id_produk . "', '". $nama_produk . "', '". $qty . "', '". $harga . "', '". $pesen_diskon . "', '". $harga_jual . "')";
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
					//gagal tambah
					echo json_encode("gagal"); 
				}

			}else{

				$id_po = $data_po['id_po'];

				$sql = "SELECT * FROM d_po WHERE id_po='$id_po' AND id_produk = '$id_produk' AND harga = '$harga'";
				$data_po = $db->selectOne($sql);
				$tmp = $data_po['id_produk'];

				if ($tmp == ""){

					$sql = "INSERT INTO d_po  (id_po, tgl_input, id_produk, nama_produk, qty, harga, persen_diskon, harga_jual)
											VALUES
										('". $id_po . "', now(), '". $id_produk . "', '". $nama_produk . "', '". $qty . "', '". $harga . "', '". $pesen_diskon . "', '". $harga_jual . "')";
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

					$sql = "UPDATE d_po SET tgl_input = now(), qty = qty + ". $qty ." WHERE id_po = '$id_po' AND id_produk = '$id_produk' AND harga = '$harga'";
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
				}
			}

		}else{
			echo json_encode("stok_kosong");
		}
	}else{
		echo json_encode("gagal");
		echo"<script>location.href='/'</script>";
	}
?>