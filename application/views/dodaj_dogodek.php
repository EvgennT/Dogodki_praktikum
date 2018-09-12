<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DODAJ DOGODEK</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- nucamo jquery da lahko postamo ($.ajax({...) -->

</head>
<body>
	<div id="container">
	
	
		<form id="formAddDogodek" method="post" role="form" action="<?php echo $this->config->base_url(); ?>CtrMain/dodaj_dogodek_perform">
			
			<label>Ime dogodka</label>
			<input type="text" name="imeDogodka" id="imeDogodka" required>
			
			<br/>
			<br/>
			
			<label>Lokacija dogodka</label>
			<input type="text" name="prostorDogodka" id="prostorDogodka" required>
			
			<br/>
			<br/>
			
			<label>Začetek dogodka</label>
			<input type="text" name="zacetekDogodka" id="zacetekDogodka" required>
			
			<br/>
			<br/>
			
			<label>Trajanje dogodka</label>
			<input type="text" name="trajanjeDogodka" id="trajanjeDogodka" required>
			
			<br/>
			<br/>
			
			<label>Opis dogodka</label>
			<textarea name="opisDogodka" id="opisDogodka" >
			</textarea>
			
			<br/>
			<br/>
			
			<button type="submit">SHRANI</button>
				
		</form>

		<p id="rezultat"></p>

	</div>
	
	
	<script>

	$('#formAddDogodek').on('submit', function (e) 
	{
        e.preventDefault(); //preprečimo da se forma submita in preusmeri na drugo stran ampak naredimo po svoje s postom v javaskriptu
	    $.ajax({
	        url : $(this).attr('action'), //vzamemo url iz forme (action="....")
	        type: "POST",
	        data: $(this).serialize(), //vzameme avtomatsko vse inpute iz forme da jih ne rabimo posebej pisat
	        success: function (data) 
	        {
		        if(data == 1)
		        {
		        	document.getElementById("rezultat").innerHTML = "Dogodek uspešno dodan";
			    }
	        },
	        error: function (jXHR, textStatus, errorThrown) {
	        	document.getElementById("rezultat").innerHTML = "Napaka pri dodajanju dogodka";
		        alert(errorThrown);
	        }
	    });
	});
	
	</script> 
</body>
</html>
