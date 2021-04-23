                      <?php
                        $province = $_GET['id'];

                        $curl = curl_init();  
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "https://pro.rajaongkir.com/api/city?province=$province",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "GET",
                          CURLOPT_HTTPHEADER => array(
                            "key:d088621f40e01f3317513b33167a9022"
                          ),
                        ));
                       
                        $response = curl_exec($curl);
                        echo "<option value=''>-- Pilih Kota/Kabupaten --</option>";
                        $data = json_decode($response, true);
                        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
                          
                          $id = $data['rajaongkir']['results'][$i]['city_id'];
                          $nama = $data['rajaongkir']['results'][$i]['city_name'];
                            
                          echo "<option value='".$id."|".$nama."'>".$nama."";
                            
                          if ($data['rajaongkir']['results'][$i]['type'] == "Kota"){
                            echo " (Kota)";
                          }

                          echo "</option>";

                        }

                        //echo $response;
                      ?>