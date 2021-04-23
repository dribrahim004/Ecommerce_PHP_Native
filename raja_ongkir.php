<?php

  $curl = curl_init();  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "key:-"
    ),
  ));
 
  $response = curl_exec($curl);
  $err = curl_error($curl);
 
  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
 
  echo "<br><br><br><label>Kota Asal</label><br>";
  echo "<select name='asal' id='asal'>";
  echo "<option>Pilih Kota Asal</option>";
    $data = json_decode($response, true);
    for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
        echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
    }
  echo "</select><br><br><br>";
  
  echo "coba :". $data['rajaongkir']['results'][0]['province'];

  echo "<br><br><br>";
  
  $curl = curl_init();  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://pro.rajaongkir.com/api/city?province=9",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "key:-"
    ),
  ));
 
  $response = curl_exec($curl);
  
  echo $response;

  echo "<br><br><br>";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?id=1382&city=103",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key:-"
  ),
));

$response = curl_exec($curl);

echo $response;

$data = json_decode($response, true);

echo $data['rajaongkir']['results']['province'];
echo $data['rajaongkir']['results']['city'];
echo $data['rajaongkir']['results']['subdistrict_name'];

$asal = 338;
$tujuan = 340;
$ukuran = 100;
$kurir = "jne";

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

echo $response;

    $data_tabel = array();
    
    $data = json_decode($response, true);
    for ($i=0; $i < count($nama = $data['rajaongkir']['results'][0]['costs']); $i++) { 
                            
        $code = $data['rajaongkir']['results'][0]['code'];
        $name = $data['rajaongkir']['results'][0]['name'];
        
        $service = $data['rajaongkir']['results'][0]['costs'][$i]['service'];
        $description = $data['rajaongkir']['results'][0]['costs'][$i]['description'];
        
        $value = $data['rajaongkir']['results'][0]['costs'][$i]['cost']['value'];
        $etd = $data['rajaongkir']['results'][0]['costs'][$i]['cost']['etd'];
        $note = $data['rajaongkir']['results'][0]['costs'][$i]['cost']['note'];
        
        array_push($data_tabel, array('code' => $code,
                                        'name' => $name,
                                        'service' => $service,
                                        'description' => $description,
                                        'value' => $value,
                                        'etd' => $etd,
                                        'note' => $note));
    }
    echo "<br><br><br><br><br>";
    echo json_encode($data_tabel);

 ?>