<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DODAJ DOGODEK</title>

</head>
<body>
	<div id="container">
	
	
		<form id="formAddEvent" method="post" role="form" action="<?php echo $this->config->base_url(); ?>CtrMain/add_event_perform">
			
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
			<textarea type="text" name="opisDogodka" id="opisDogodka" >
			</textarea>
			
			<br/>
			<br/>
			
			<button type="submit">SHRANI</button>
				
		</form>


	</div>
</body>
</html>
