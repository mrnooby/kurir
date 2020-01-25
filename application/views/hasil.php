<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ongkos Kirim dan Kurir</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster&effect=brick-sign">
	<style>
		.lobster {
		    font-family: "Lobster", Sans-serif;
		}
	</style>
 	<style>
	    /* Add a gray background color and some padding to the footer */
	    footer {
	      background-color: #f2f2f2;
	      padding: 25px;
	    }

	    .carousel-inner img {
	      width: 100%; /* Set width to 100% */
	      min-height: 200px;
	    }

	    /* Hide the carousel text when the screen is less than 600 pixels wide */
	    @media (max-width: 600px) {
	      .carousel-caption {
	        display: none; 
	      }
	    }

	    label{
	    	margin-bottom: 5px;
	    	display: block;
	    	font-size: 14px;
	    	font-weight: normal;
	    	line-height: 20px;
	    }

	    select{
	    	display: inline-block;
	    	padding: 4px 6px;
	    	margin-bottom: 10px;
	    	font-size: 14px;
	    	line-height: 20px;
	    	color: #bbb;
	    	vertical-align: middle;
	    	-webkit-border-radius: 0;
	    	-moz-border-radius: 0;
	    	border-radius: 0;
	    	color: #080808;
	    	width: 220px;
		    background-color: #fff;
		    border: 1px solid #bbb;
		       height: 30px;
		    *margin-top: 4px;
		    line-height: 30px;
	    }
	    input[type=text]{
	    	height: 28px;
		    font-size: 16px !important;
		    width: 220px !important;
	    }
	</style>	
</head>
<body>
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
// 	echo $responseasal;
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
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li><a href="tentang">About</a></li>
        <li><a href="widget">Widget</a></li>
        <li><a href="contact">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<div class="row">
  <div class="col-sm-7">
	<div class="well">

    <div id="iniisinya"><?php $this->load->view($isi);?></div>
    </div>
  </div>
  <div class="col-sm-4">
<div class="well">
    	<div class="lobster" style="font-size: 20px;border-bottom:3px solid #ccc!important;border-color:#2196F3!important;margin-bottom: 10px">Lacak Kiriman</div>
		<label>Pilih Kurir :</label>
			<select id="kurir" name="kurir">
				<option value="jne">JNE</option>
			</select>
		<label>Nomer Resi :</label>
		<input type="text" id="idresi" name="resi" value="" placeholder="Inputkan nomer resi Anda" size="50"><p/><p/>
		<input id="cekresi" type="submit" value="Cek" class="btn btn-primary"/>
    </div>
    <div class="well">
    	<div class="lobster" style="font-size: 20px;border-bottom:3px solid #ccc!important;border-color:#2196F3!important;margin-bottom: 10px">Pengecekan Ongkir</div>
		<label>Kota Asal :</label>
		<select name='asal' id='asal'><option value='0'>Pilih Kota Asal</option>
			<?php
				$data = json_decode($responseasal, true);
					for($i=0;$i<count($data['rajaongkir']['results']);$i++){
					    $a = $data['rajaongkir']['results'][$i]['type'];
					    ?>
					        <option value="<?php echo $data['rajaongkir']['results'][$i]['city_id'];?>"><?php echo $data['rajaongkir']['results'][$i]['city_name']; if($a=="Kota"){echo " (Kota)";}?></option>
					    <?php					    
				// 		echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['type']." ".$data['rajaongkir']['results'][$i]['city_name']."</option>";
					}
			?>
		</select>
		<label>Kota Tujuan :</label>
		<select name='kabupaten' id='kabupaten'><option value='0'>Pilih Kota Tujuan</option>
			<?php
				$data = json_decode($responseasal, true);
					for($i=0;$i<count($data['rajaongkir']['results']);$i++){
					    $a = $data['rajaongkir']['results'][$i]['type'];
					    ?>
					        <option value="<?php echo $data['rajaongkir']['results'][$i]['city_id'];?>"><?php echo $data['rajaongkir']['results'][$i]['city_name']; if($a=="Kota"){echo " (Kota)";}?></option>
					    <?php
				// 		echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".if($a=='Kota'){echo 'Kota ';}."".$data['rajaongkir']['results'][$i]['city_name']."</option>";
					}
			?>
		</select>		
		<!--<label>Provinsi Tujuan :</label>-->
		<!--<select name="provinsi" id="provinsi">-->
		<!--	<option value='0'>Pilih Provinsi Tujuan</option>-->
			<?php
				// $data = json_decode($responsetujuan,true);
				// for($i=0;$i<count($data['rajaongkir']['results']);$i++){
				// 	echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option> ";
				// }
			?>
		<!--</select>	-->
		<!--<label>Kota Tujuan :</label>-->
		<!--<select id="kabupaten" name="kabupaten"><option value='0'>Pilih Kota Tujuan</option></select>-->
		<label>Pilih Kurir :</label>
		<?php
		$query = $this->db->query("SELECT * FROM ekspedisi where status ='1' order by id ASC");
		?>
	    <select name="kurir2" id="kurir2" required>
	    <?php
	    	echo "<option value=''>Pilih Kurir</option>";
	      foreach ($query->result() as $row){
	        echo "<option value='$row->title'>$row->short - $row->longs</option>";

	      }
	      ?>
			
	    </select>
		<label>Berat (gram):</label>
		<input id="berat" type="text" name="berat" value="500" /><p/><p/>
		<input id="cek" type="submit" value="Cek" class="btn btn-primary"/>
			
    </div>
  </div>
</div>
<hr>
</div>

<br>

<footer class="container-fluid text-center">
  <p>(c) <?php echo date("Y");?> </p>
</footer>	

</body>
</html>
<script type="text/javascript">
 	$(document).ready(function(){
		$('#provinsi').change(function(){
			var prov = $('#provinsi').val();
      		$.ajax({
            	type : 'GET',
           		url : '<?php echo base_url(); ?>manage/kabupaten',
            	data :  'prov_id=' + prov,
					success: function (data) {
						$("#kabupaten").html(data);
				}
          	});
		});
 
		$("#cek").click(function(){
			var asal = $('#asal').val();
			var kab = $('#kabupaten').val();
			var kurir = $('#kurir2').val();
			var berat = $('#berat').val();
 
      		$.ajax({
            	type : 'POST',
           		url : '<?php echo base_url(); ?>manage/ongkir',
            	data :  {'kabupaten' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
					success: function (data) {
					$("#iniisinya").html(data);					
				}
          	});
		});
		$("#cekresi").click(function(){
			var idres = $('#idresi').val();
			var kurir = $('#kurir').val();
 
      		$.ajax({
            	type : 'POST',
           		url : '<?php echo base_url(); ?>manage/resi',
            	data :  {'idresi' : idres,'kurir' : kurir},
					success: function (data) {
					$("#iniisinya").html(data);
				}
          	});
		});
	});
</script>