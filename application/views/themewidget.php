<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<body style="padding-left: 10px">
	<?php $this->load->view($isi)?>
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
			var kurir = $('#kurir').val();
			var berat = $('#berat').val();
 
      		$.ajax({
            	type : 'POST',
           		url : '<?php echo base_url(); ?>manage/ongkir',
            	data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
					success: function (data) {
					$("#ongkir").html(data);					
				}
          	});
          	//$("#resinya").hide();
		});
		$("#cekresi").click(function(){
			var idres = $('#idresi').val();
 
      		$.ajax({
            	type : 'POST',
           		url : '<?php echo base_url(); ?>manage/resi',
            	data :  {'idresi' : idres},
					success: function (data) {
					$("#resinya").html(data);
				}
          	});
          	//$("#ongkir").hide();
		});
	});
</script>