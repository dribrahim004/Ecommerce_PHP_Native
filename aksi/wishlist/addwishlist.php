<?php 
	error_reporting(0); 
	include('../../lib/class/database.php'); 
	include('../../lib/class/autoNumber.php'); 

	$id_m = $_POST['id_m'];
	$id_b = $_POST['id_b'];

	if (!empty($id_m) AND !empty($id_b) ){
        
        $db = new database(0);
        $sql = "SELECT * FROM wishlist WHERE md5(id_member)='$id_m' AND md5(id_produk) ='$id_b'";
    	$data_member = $db->selectOne($sql);
    	$tmp = $data_member['id_wishlist'];
    	
    	if ($tmp == ""){
    	
            $auto_number = new autoNumber("WS". date("ym"),"",2);
        	$sql = "SELECT * FROM wishlist 
        			WHERE SUBSTRING(id_wishlist,1,6) = 'WS". date("ym") ."'
        			ORDER BY id_wishlist DESC";
        	$data_WS = $db->selectOne($sql);
        
        	$id_wishlist = $auto_number->getId($data_WS['id_newsletter']);
        	
        	$sql = "SELECT * FROM member WHERE md5(id_member)='$id_m'";
        	$data_member = $db->selectOne($sql);
        	$id_member = $data_member['id_member'];
        	
        	$sql = "SELECT * FROM produk WHERE md5(id_produk)='$id_b'";
        	$data_produk = $db->selectOne($sql);
        	$id_produk = $data_produk['id_produk'];
    
    		$sql = "INSERT INTO wishlist (id_wishlist, tgl_input, id_member, id_produk)
    					VALUES
    				('". $id_wishlist . "',now(),'". $id_member . "','". $id_produk . "')";
    				
    		//echo $sql;
    		if ($db->IUD_db($sql)){
    		    //berhasil
    			echo json_encode("berhasil"); 
    
    		}else{
    			//gagal tambah
    			echo json_encode("gagal"); 
    		}
    	}else{
    	    echo json_encode("sudah_ada"); 
    	}

	}else{
		echo json_encode("gagal");
		echo"<script>location.href='/'</script>";
	}
?>