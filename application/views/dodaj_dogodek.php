<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DODAJ DOGODEK</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- nucamo jquery da lahko postamo ($.ajax({...) -->
	
	
	  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	  	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"></script>
	  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

</head>
<body>
	<div id="container">
	
		
		<form class="form-horizontal" id="formAddDogodek" method="post" role="form" action="<?php echo $this->config->base_url(); ?>CtrMain/dodaj_dogodek_perform">
			
			<label>Ime dogodka</label>
			<input type="text" name="imeDogodka" id="imeDogodka" required>
			
			<br/>
			<br/>
			
			<label>Lokacija dogodka</label>
			<input type="text" name="prostorDogodka" id="prostorDogodka" required>
			
			<br/>
			
			<br/>
			<div class="form-group col-md-6">
				<label class="control-label col-sm-2" for="trajanjeDogodka">Začetek dogodka</label>
				<div class="input-group date col-sm-4" id="datetimepicker1">
					<input type='text' class="form-control" name="zacetekDogodka" id="zacetekDogodka" required />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
			
			<br/>
			<br/>
			<br/>

			<div class="form-group col-md-6">
				<label class="control-label col-sm-2" for="trajanjeDogodka">Trajanje dogodka</label>
				<div class="input-group date col-sm-4" id="datetimepicker2">
					<input type='text' class="form-control" name="trajanjeDogodka" id="trajanjeDogodka" required />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
			
			<br/>
			<br/>
			<br/>

			<div class="form-group col-md-6">
				<label class="control-label col-sm-2" for="trajanjeDogodka">Termin prijave/odjave</label>
				<div class="input-group date col-sm-4" id="datetimepicker3">
					<input type='text' class="form-control" name="terminDogodka" id="terminDogodka" required />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
			
			<br/>
			<br/>
			<br/>
			
			<br/>
			
			<label>Min. število udeležencev</label>
			<input type="number" name="minUdelezencev" id="minUdelezencev" required>
			
			<br/>
			<br/>
			
			<label>Max. število udeležencev</label>
			<input type="number" name="maxUdelezencev" id="maxUdelezencev" required>
			
			<br/>
			<br/>
			
			<label>Opis dogodka</label>
			<textarea name="opisDogodka" id="opisDogodka" >
			</textarea>
			
			<br/>
			<br/>
			
			<button type="submit">SHRANI</button>
			<br/>
			<a href="<?php echo $this->config->base_url(); ?>CtrMain">NAZAJ</a>
				
		</form>

		<p id="rezultat"></p>

	</div>
	
	
	<script>

    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'DD-MM-YYYY HH:mm'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'DD-MM-YYYY HH:mm'
        });
        $('#datetimepicker3').datetimepicker({
            format: 'DD-MM-YYYY HH:mm'
        });
    });

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
			    } else {
		        	document.getElementById("rezultat").innerHTML = "Napaka pri dodajanju dogodka";
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
