      <div class="lobster" style="font-size: 20px;border-bottom:3px solid #ccc!important;border-color:#2196F3!important;margin-bottom: 10px">Hasil Pelacakan</div>
      <p>Berikut ini adalah hasil dari pelacakan barang Anda sesuai dengan nomer resi yang dimasukkan.</p>

<?php
$resinya = $_POST['idresi'];
$cour = $_POST['kurir'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $resis,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "waybill=".$resinya."&courier=".$cour,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key:".$key
  ),
));

//$response = curl_exec($curl);
$err = curl_error($curl);
$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);
if(($data['rajaongkir']['status']['code'])=="400"){
  echo $data['rajaongkir']['status']['description'];
}
    else{
    echo "<table class='table table-striped'>
      <thead>
        <tr>
          <th colspan='2'>".$data['rajaongkir']['result']['summary']['courier_name']."</th>
        </tr></thead>
        <tr>
        	<td>Servis Layanan</td>
        	<td>".$data['rajaongkir']['result']['summary']['service_code']."</td>
        </tr>     
        <tr>
        	<td>Resi</td>
        	<td width='75%'>".$data['rajaongkir']['result']['details']['waybill_number']."</td>
        </tr>
        <tr>
        	<td>Tanggal Kirim</td>
        	<td width='75%'>".$data['rajaongkir']['result']['details']['waybill_date']." ".$data['rajaongkir']['result']['details']['waybill_time']."</td>
        </tr>
        <tr>
        	<td>Berat barang</td>
        	<td width='75%'>".$data['rajaongkir']['result']['details']['weight']." Kg</td>
        </tr>        
        </table><br/>
    	<table class='table table-striped'>
    		<thead>
    		  <tr>
    		    <th colspan='2'>Detail Pengirim</th>
    		  </tr>
    		</thead>
    		  <tr>
    		  	<td>Nama Pengirim</td>
    		   	<td>".$data['rajaongkir']['result']['details']['shippper_name']."</td>
    		  </tr>     
    		  <tr>
    		   	<td>Kota Pengirim</td>
    		   	<td width='75%'>".$data['rajaongkir']['result']['details']['shipper_city']."</td>
    		  </tr>
    	</table><br/>
    	<table class='table table-striped'>
    	  <thead>
    	    <tr>
    	      <th colspan='3'>Detail Penerima</th>
    	    </tr>
    	  </thead>
    	    <tr>
    		   	<td>Nama Penerima</td>
    		   	<td width='75%'>".$data['rajaongkir']['result']['details']['receiver_name']."</td>
    		</tr>
    	    <tr>
    	    	<td>Alamat Penerima</td>
    	    	<td width='75%'>".$data['rajaongkir']['result']['details']['receiver_address1'].", ".$data['rajaongkir']['result']['details']['receiver_address2']." ".$data['rajaongkir']['result']['details']['receiver_address3'].", ".$data['rajaongkir']['result']['details']['receiver_city']."</td>
    	    </tr>  
       </table><br/>

    	<table class='table table-striped'>
    	  <thead>
    	    <tr>
    	      <th colspan='3'>Status Pengiriman</th>
    	    </tr>
    	  </thead>
    	    <tr>
    		   	<td>Status</td>
    		   	<td width='75%'>".$data['rajaongkir']['result']['delivery_status']['status']."</td>
    		</tr>
    	    <tr>
    	    	<td>Penerima</td>
    	    	<td width='75%'>".$data['rajaongkir']['result']['delivery_status']['pod_receiver']."</td>
    	    </tr>  
    	    <tr>
    		   	<td>Tanggal diterima</td>
    		   	<td width='75%'>".$data['rajaongkir']['result']['delivery_status']['pod_date']." ".$data['rajaongkir']['result']['delivery_status']['pod_time']."</td>
    		</tr>	    
       </table><br/>   

    	<table class='table table-striped'>
    	  <thead>
    	    <tr>
    	      <th colspan='2'>History Pengiriman</th>
    	    </tr>
    	  </thead>
    	    <tr>
    		   	<td widht='35%'><strong>Tanggal</strong></td>
    		   	<td width='65%'><strong>Keterangan</strong></td>
    		</tr>";
    		for($i=0;$i< count($data['rajaongkir']['result']['manifest']);$i++){ 
    		  echo"<tr>
    		      <td>".$this->Fungsi->date($data['rajaongkir']['result']['manifest'][$i]['manifest_date'])." 
    		      ".$this->Fungsi->time($data['rajaongkir']['result']['manifest'][$i]['manifest_time'])."</td>
    		      <td>".$data['rajaongkir']['result']['manifest'][$i]['manifest_description']." </td>
    		    </tr>";
    		  
    		 }
      echo "</table>";
  }    
?>
