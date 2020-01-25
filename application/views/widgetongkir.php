<?php 
	//mengambil data asal penririman
	$curlasal = curl_init();	
	curl_setopt_array($curlasal, array(
	  CURLOPT_URL => "".$city."",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key: ".$key
	  ),
	));
 
	$responseasal = curl_exec($curlasal);
	$errasal = curl_error($curlasal);
 
	curl_close($curlasal);
  
	//-----------------------------------------------------------------------------
 
	//Menagmbil data provinsi tujuan pengiriman
	$curltujuan = curl_init();
 
	curl_setopt_array($curltujuan, array(
	  CURLOPT_URL => "".$provinsi."",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key: ".$key
	  ),
	));
 
	$responsetujuan = curl_exec($curltujuan);
	$errtujuan = curl_error($curltujuan);
 
 	curl_close($curltujuan);
 	//-----------------------------------------------------
	?>	
<div class="lobster" style="font-size: 20px;border-bottom:3px solid #ccc!important;border-color:#2196F3!important;margin-bottom: 10px">Pengecekan Ongkir</div>
	<form action="<?php echo base_url();?>cekongkir" method="POST" target="_blank">
		<label>Kota Asal :</label>
		<select name='asal' id='asal'><option value='0'>Pilih Kota Asal</option>
			<?php
				$data = json_decode($responseasal, true);
					for($i=0;$i<count($data['rajaongkir']['results']);$i++){
						echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['type']." ".$data['rajaongkir']['results'][$i]['city_name']."</option>";
					}
			?>
		</select>
		<label>Provinsi Tujuan :</label>
		<select name="provinsi" id="provinsi">
			<option value='0'>Pilih Provinsi Tujuan</option>
			<?php
				$data = json_decode($responsetujuan,true);
				for($i=0;$i<count($data['rajaongkir']['results']);$i++){
					echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option> ";
				}
			?>
		</select>	
		<label>Kota Tujuan :</label>
		<select id="kabupaten" name="kabupaten"><option value='0'>Pilih Kota Tujuan</option></select>
		<label>Pilih Kurir :</label>
			<select id="kurir" name="kurir">
                <option value="jne">JNE - Jalur Nugraha Ekakurir</option>
                <option value="tiki">TIKI - Citra Van Titipan Kilat</option>
                <option value="pos">POS - POS INDONESIA</option>
                <option value="pcp">PCP - Priority Cargo and Package</option>
                <option value="esl">ESL - Eka Sari Lorena</option>
                <option value="rpx">RPX - RPX Holding</option>
                <option value="pandu">Pandu - Pandu Logistic</option>
                <option value="wahana">WAHANA - Wahana Prestasi Logistik</option>
                <option value="sicepat">SICEPAT - SiCepat Express</option>
                <option value="j&t">J&T - J&T Express</option>
                <option value="pahala">PAHALA - Pahala Kencana Express</option>
                <option value="sap">SAP - SAP Express</option>
                <option value="jet">JET - JET Express</option>
                <option value="slis">SLIS - Solusi Ekspres</option>
                <option value="expedito">Expedito</option>
                <option value="dse">21 Express</option>
                <option value="first">First Logistics</option>
                <option value="ncs">NCS - Nusantara Card Semesta</option>
                <option value="star">Star Cargo</option>
                <option value="lion">Lion Parcel</option>
                <option value="ninja">Ninja Xpress</option>
                <option value="idl">IDL Cargo</option>
                <option value="rex">Royal Express Indonesia</option>
			</select>
		<label>Berat (gram):</label>
		<input id="berat" type="text" name="berat" value="500" /><p/><p/>
		<input id="cek" type="submit" value="Cek" class="btn btn-primary"/>
	</form>	
	<a href="http://contohnya.net" target="_blank">created by contohnya.net</a>