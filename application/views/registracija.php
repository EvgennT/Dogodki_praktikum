<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>REGISTRACIJA</title>
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- nucamo jquery da lahko postamo ($.ajax({...) -->

</head>
<body>
	<div id="container">
	
		
		<h3>REGISTRACIJA</h3>
		
		<form id="formRegistracija" method="post" role="form" action="<?php echo $this->config->base_url(); ?>CtrMain/registracija_perform">
			
			<label>Ime</label>
			<input type="text" name="ime" id="ime" required>
			
			<br/>
			<br/>
			
			<label>Priimek</label>
			<input type="text" name="priimek" id="priimek" required>
			
			<br/>
			<br/>
			
			<label>E-poštni naslov</label>
			<input type="email" name="email" id="email" required>
			
			<br/>
			<br/>
			
			<label>Ponovite e-poštni naslov</label>
			<input type="email" name="emailPonovno" id="emailPonovno" required>
			
			<br/>
			<br/>
			
			<label>Geslo</label>
			<input type="password" name="geslo" id="geslo" required>
			
			
			<br/>
			<br/>
			
			<label>Ponovite geslo</label>
			<input type="password" name="gesloPonovno" id="gesloPonovno" required>
			
			
			<br/>
			<br/>
			<button type="submit">REGISTRACIJA</button>
				
		</form>
	</div>
	
	
	<script>

    
	$('#formRegistracija').on('submit', function (e) 
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
		        	alert("Registracija uspešna. Sedaj se lahko prijavite.");
		        	window.location.replace("http://localhost/Dogodki_praktikum/CtrMain/login"); //če uspešna preusmerimo na login
			    } 
		        else if(data == "obstaja") 
			    {
		        	alert("Uporabnik s tem e-poštnim naslovom obstaja.");
			    }
		        else if(data == "email") 
			    {
		        	alert("E-poštna naslova nista enaka.");
			    }
		        else if(data == "geslo") 
			    {
		        	alert("Gesli nista enaki.");
			    }
			    else 
				{
		        	alert("Napaka pri registraciji");
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
