<?php
    error_reporting (0);
	include('../../lib/class/database.php');
	
    $id_member = $_POST['id'];
    $id_po = $_POST['id_p'];
    $kurir = $_POST['kurir'];
                                                
    $db = new database(0);
    
     $sql = "SELECT *
            FROM kota_asal LIMIT 1";
    $data = $db->selectOne($sql);
    $asal = $data['kec'];
    
    $sql = "SELECT a.*, m.nomor_tlp 
            FROM alamat a INNER JOIN member m ON a.id_member = m.id_member
            WHERE md5(a.id_member) = '". $id_member ."' AND a.status = 'set'";
    $data = $db->selectOne($sql);
    $tujuan = $data['kec'];
                        		
    $ukuran = 0;
    $sql = "SELECT dpo.*, p.berat_produk
            FROM d_po dpo INNER JOIN produk p ON dpo.id_produk = p.id_produk
            WHERE md5(dpo.id_po) = '". $id_po ."'";  
    //echo $sql;
    foreach($db->selectALL($sql) as $data){
        $ukuran = $ukuran + ( $data['berat_produk'] * $data['qty'] );
    }
                                            
    //$asal = 338;
    //$tujuan = 340;
    //$ukuran = 100;
    //$kurir = "jne";
    
    if ( ($asal != "") && ($tujuan != "") && ($ukuran != "") && ($kurir != "") ){
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=$asal&originType=subdistrict&destination=$tujuan&destinationType=subdistrict&weight=$ukuran&courier=$kurir",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key:-"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        //echo $response;
        
        $data_tabel = array();
        
        $data = json_decode($response, true);
        for ($i=0; $i < count($nama = $data['rajaongkir']['results'][0]['costs']); $i++) { 
                                
            $code = $data['rajaongkir']['results'][0]['code'];
            $name = $data['rajaongkir']['results'][0]['name'];
            
            $service = $data['rajaongkir']['results'][0]['costs'][$i]['service'];
            $description = $data['rajaongkir']['results'][0]['costs'][$i]['description'];
            
            $value = $data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value'];
            $etd = $data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['etd'];
            $note = $data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['note'];
            
            if ( ($name == "POS Indonesia (POS)") AND ( ($service == "Express Next Day Barang") || ($service == "Paketpos Dangerous Goods") || ($service == "Paketpos Valuable Goods") ) ) {
                //agar paket nama paket diatas tidak muncul
            }else{
                
            if ( ($name == "Jalur Nugraha Ekakurir (JNE)") AND ( ($service == "CTCOKE") || ($service == "CTCYES") ) ) {
                //agar paket nama paket diatas tidak muncul    
            }else{
                
            if ( ($name == "JET Express") AND ( ($service == "CRG") || ($service == "PRI") ) ) {
                //agar paket nama paket diatas tidak muncul
            }else{
                
                 $tampilradio = $description." ( ". $service ." ) ";
                
                if (($description == "JNE City Courier") AND ($service == "CTC")){
                    $tampilradio = "Reguler";
                }
                else if(($description == "JNE City Courier" AND ($service == "CTCYES"))){
                    $tampilradio = "YES";
                    
                }
                else if(($description == "Paket Kilat Khusus" AND ($service == "Paket Kilat Khusus"))){
                    $tampilradio = "POS Kilat Khusus";
                    
                }
                
                
                $etd_explode = explode("-",$etd);
                $data1 = $etd_explode[0];
                $data2 = $etd_explode[1] + 1;
                	
                $etd_explode2 = explode(" ",$etd);
                $data11 = $etd_explode2[0];
                $data22 = $etd_explode2[1];
                	
                if (strtoupper($data22) == "JAM"){
                    $etd = ( $data1 / 24 ) + 1;
                }else if ($data2 == "1"){
                    $etd = $data1 + 1;
                }else{
                    $etd = $data1 ."-". $data2;
                }
                    
                array_push($data_tabel, array('tampilradio' => $tampilradio,
                                                'code' => $code,
                                                'name' => $name,
                                                'service' => $service,
                                                'descriptions' => $description,
                                                'value' => $value,
                                                'etd' => $etd,
                                                'note' => $note,
                                                'berat' => $ukuran));
            
            }                                   
            }                           
            }
        }
    }
    echo json_encode($data_tabel);

?>