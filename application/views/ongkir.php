      <div class="lobster" style="font-size: 20px;border-bottom:3px solid #ccc!important;border-color:#2196F3!important;margin-bottom: 10px">Pengecekan Ongkir</div>
<?php

  $asal = $_POST['asal'];
  $id_kabupaten = $_POST['kabupaten'];
  $kurir = $_POST['kurir'];
  $berat = $_POST['berat'];
 
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => $ongkirs,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
    CURLOPT_HTTPHEADER => array(
      "content-type: application/x-www-form-urlencoded",
      "key: ".$key
    ),
  ));
 
  $response = curl_exec($curl);
  $err = curl_error($curl);
 
  curl_close($curl);
 

$data = json_decode($response,true);

// echo $response;exit();
if(($data['rajaongkir']['status']['code'])=="400"){
  echo $data['rajaongkir']['status']['description'];
}
else{
    echo "Dari <strong>".$data['rajaongkir']['origin_details']['type']." ".$data['rajaongkir']['origin_details']['city_name']."</strong> ke <strong>".$data['rajaongkir']['destination_details']['city_name']." @".$data['rajaongkir']['query']['weight']."</strong> gram<br/><br/>";

    if($kurir=="jne"){
      echo  "Ekspedisi <strong> JNE REG Only </strong><table class='table table-striped'>
        <thead>
          <tr>
            <th>Servis</th>
            <th>Biaya</th>
            <th>Estimasi</th>
          </tr></thead>";
      for($i=0;$i< count($data['rajaongkir']['results'][0]['costs']);$i++){ 
        $j=1+$i;
        $rupiah=$this->Fungsi->rupiah($data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value']);
        if($data['rajaongkir']['results'][0]['costs'][$i]['service']=="REG"){
        echo"<tr>
            <td>".$data['rajaongkir']['results'][0]['costs'][$i]['service']."</td>
            <td>".$rupiah."</td>
            <td>".$data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['etd']." hari</td>
          </tr>";
        }
        
       }
        echo "</table>";
    }

    echo  "Ekspedisi <strong>".$data['rajaongkir']['results'][0]['name']."</strong><table class='table table-striped'>
      <thead>
        <tr>
          <th>Servis</th>
          <th>Biaya</th>
          <th>Estimasi</th>
        </tr></thead>";
    for($i=0;$i< count($data['rajaongkir']['results'][0]['costs']);$i++){ 
      $j=1+$i;
      $rupiah=$this->Fungsi->rupiah($data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value']);
      echo"<tr>
          <td>".$data['rajaongkir']['results'][0]['costs'][$i]['service']."</td>
          <td>".$rupiah."</td>
          <td>".$data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['etd']." hari</td>
        </tr>";
      
     }
      echo "</table>";
}  

?>