<?php 
	error_reporting(0); 
	include('../../lib/class/database.php'); 
	include('../../lib/class/autoNumber.php'); 
	
	$id = $_POST['id'];
	$id_p = $_POST['id_p'];
	$bank = $_POST['bank'];

	//if ( !empty($id) AND !empty($id_p) AND !empty($bank)  ){

		$db = new database(0);
		
		$sql = "SELECT * FROM po WHERE md5(id_po)='$id_p'";
		$data_po = $db->selectOne($sql);
		$id_po = $data_po['id_po'];
		$total_pembayaran = $data_po['total_pembayaran'];
		
		$sql = "SELECT * FROM bank WHERE md5(id_bank)='$bank'";
		$data_bank = $db->selectOne($sql);
		$id_bank = $data_bank['id_bank'];
		$nama_bank = $data_bank['nama_bank'];
		$no_rek_bank = $data_bank['no_rek'];
		$atas_nama = $data_bank['atas_nama'];
		
		$tgl = str_pad(date("dm"), 4);
		$str_no_tagihan = substr($total_pembayaran, -3) ."". $tgl;
		
		$auto_number = new autoNumber("". $str_no_tagihan ."","",2);
		$sql = "SELECT * FROM po 
				WHERE SUBSTRING(no_tagihan,1,6) = '". $str_no_tagihan ."'
				ORDER BY no_tagihan DESC";
		$data = $db->selectOne($sql);
		$no_tagihan = $auto_number->getId($data['no_tagihan']);

		$sql = "UPDATE po SET status_po = 'metode-pembayaran',
		                      tgl_input = now(),
		                      no_tagihan = '". $no_tagihan . "',
		                      id_bank = '". $id_bank . "',
		                      nama_bank = '". $nama_bank . "',
		                      no_rek_bank = '". $no_rek_bank . "',
		                      atas_nama = '". $atas_nama . "'
		        WHERE id_po = '". $id_po ."'";
		
		//echo $sql;
		if ($db->IUD_db($sql)){
			//berhasil
			echo json_encode("berhasil"); 
		}else{
			//gagal tambah
			echo json_encode("gagal"); 
		}
/*
	}else{
		echo json_encode("gagal");
		echo"<script>location.href='/'</script>";
	}
*/
?>