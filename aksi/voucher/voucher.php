<?php 
	error_reporting(0); 
	include('../../lib/class/database.php'); 

	$id_m = $_POST['id_m'];
	$voucher = trim($_POST['voucher']);
	    
	    $db = new database(0);
	    
	    $sql = "SELECT * FROM voucher WHERE voucher = '". $voucher ."'";
    	$data_v = $db->selectOne($sql);
    	
    	if ( !empty($id_m) && !empty($voucher) ){
    	
        	if ($voucher == $data_v['voucher']){
        	    
        	    if ($data_v['sekema_voucher'] == "sv_1"){
        	        
            	    $diskon_v = 0;
            	    
            	    $sql = "SELECT po.*, dp.*, p.*
                            FROM po INNER JOIN d_po dp ON po.id_po = dp.id_po INNER JOIN produk p ON dp.id_produk = p.id_produk
                            WHERE md5(po.id_member) = '". $id_m ."' AND po.status_po = 'pemesanan'";  
                    //echo $sql;
                    foreach($db->selectALL($sql) as $data){
                        
                        $id_po = $data['id_po'];
                        
                        $sql = "SELECT * FROM produk WHERE id_produk = '". $data['id_produk'] ."'";
                    	$data_brg = $db->selectOne($sql);
                    	$tmp_harga = $data_brg['harga_produk'];
                		    
                	    if ($tmp_harga == $data['harga']){
                            $total = $data['harga'] * $data['qty'];
                            $Alltotal = $Alltotal + $total;
                		}
                            
                    }
        	    
        	        if ($data_v['js_nominal'] == "r"){
        	            
                        $diskon_v = $data_v['nominal'];
                        
                    }else if ($data_v['js_nominal'] == "p"){
                    
                        $diskon_v = $Alltotal * $data_v['nominal'] / 100;
                        
                    }
            		
            		if ($Alltotal >= $data_v['min_pembelian']){
            		    echo json_encode("$diskon_v"); 
            		}else{
            		    echo json_encode("0");   
            		    $diskon_v = 0;
            		}
            		
            		if ($diskon_v > 0){
                    	$sql = "UPDATE po SET id_voucher='". $voucher ."',
                    	                      nominal_voucher='". $diskon_v ."'
            				    WHERE id_po = '". $id_po ."'";
                	}else{
                	    $sql = "UPDATE po SET id_voucher=NULL,
                    	                      nominal_voucher=0
            				    WHERE id_po = '". $id_po ."'";
                	}
                	
                	//echo $sql;
                	if ($db->IUD_db($sql)){
                		//berhasil tambah
                	}else{
                		//gagal tambah
                	}
                	
        	    }else if ($data_v['sekema_voucher'] == "sv_2"){
        	        
        	        $diskon_v = 0;
            	    
            	    $sql = "SELECT po.*, dp.*, p.*
                            FROM po INNER JOIN d_po dp ON po.id_po = dp.id_po INNER JOIN produk p ON dp.id_produk = p.id_produk
                            WHERE md5(po.id_member) = '". $id_m ."' AND po.status_po = 'pemesanan' AND dp.id_produk IN (SELECT id_produk FROM d_voucher WHERE voucher = '". $voucher ."')";  
                    //echo $sql;
                    foreach($db->selectALL($sql) as $data){
                        
                        $id_po = $data['id_po'];
                	        
                        $total_harga = $data['harga'] * $data['qty'];
                            
                        $Alltotal_qty = $Alltotal_qty + $data['qty'];
                        $Alltotal_harga = $Alltotal_harga + $total_harga;
                            
                    }
                    
                    if ($data_v['js_nominal'] == "r"){
        	            
                        $diskon_v = $data_v['nominal'];
                        
                    }else if ($data_v['js_nominal'] == "p"){
                    
                        $diskon_v = $Alltotal_harga * $data_v['nominal'] / 100;
                        
                    }
                    
                    if ($data_v['js_min_pem'] == "q"){
                        
                        if ($Alltotal_qty >= $data_v['min_pembelian']){
                            echo json_encode("$diskon_v"); 
                		}else{
                		    echo json_encode("0");   
                		    $diskon_v = 0;
                		}
                        
                    }else if ($data_v['js_min_pem'] == "r"){
                        
                        if ($Alltotal_harga >= $data_v['min_pembelian']){
                            echo json_encode("$diskon_v"); 
                		}else{
                		    echo json_encode("0");   
                		    $diskon_v = 0;
                		}
                        
                    }
                    
                    if ($diskon_v > 0){
                    	$sql = "UPDATE po SET id_voucher='". $voucher ."',
                    	                      nominal_voucher='". $diskon_v ."'
            				    WHERE id_po = '". $id_po ."'";
                	}else{
                	    $sql = "UPDATE po SET id_voucher=NULL,
                    	                      nominal_voucher=0
            				    WHERE id_po = '". $id_po ."'";
                	}
                	
                	//echo $sql;
                	if ($db->IUD_db($sql)){
                		//berhasil tambah
                	}else{
                		//gagal tambah
                	}
        	        
        	    }
    		
        	}else{
        	    echo json_encode("0");    
        	}

        }else{
		    echo json_encode("kosong");
	    }
?>