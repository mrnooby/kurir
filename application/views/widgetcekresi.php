    <form action="<?php echo base_url();?>cekresi" method="POST" accept-charset="utf-8" target="_blank">
    	<div class="lobster" style="font-size: 20px;border-bottom:3px solid #ccc!important;border-color:#2196F3!important;margin-bottom: 10px">Lacak Kiriman</div>
		<label>Pilih Kurir :</label>
			<select id="kurir" name="kurir">
				<option value="jne">JNE</option>
				<option value="tiki">TIKI</option>
				<option value="pos">POS INDONESIA</option>
			</select>
		<label>Nomer Resi :</label>
		<input type="text" id="idresi" name="idresi" value="" placeholder="Inputkan nomer resi Anda" size="50"><p/><p/>
		<input id="cekresi" type="submit" value="Cek" class="btn btn-primary"/>
	</form>	
	<a href="http://contohnya.net" target="_blank">created by contohnya.net</a>