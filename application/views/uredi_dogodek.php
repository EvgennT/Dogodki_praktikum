<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>UREDI DOGODEK</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- nucamo jquery da lahko postamo ($.ajax({...) -->
	
	
	  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	  	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"></script>
	  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

</head>
<body>
	<div id="container">
	
		<form class="form-horizontal" id="formUrediDogodek" method="post" role="form" action="<?php echo $this->config->base_url(); ?>CtrMain/uredi_dogodek_perform">
			
			<input type="hidden" name="idDogodka" id="idDogodka" value="<?php echo $dogodek->id; ?>"> <!-- naredimo id skriti (hidden), da ga ne moremo spremeniti -->
			
			<?php 
			
			if($dogodek->slika != "")//če ima dogodek sliko jo prikažemo, damo tudi link okoli nje da lahko odpremo celo sliko
			{
			?>
				<a href="<?php echo $this->config->base_url(); ?>slike/<?php echo $dogodek->slika; ?>"><img src="<?php echo $this->config->base_url(); ?>slike/<?php echo $dogodek->slika; ?>" alt="<?php echo $dogodek->slika; ?>" height="150"></a>
				<br/>
				<br/>
			<?php 
			}
			?>			
			
			<label>Ime dogodka</label>
			<input type="text" name="imeDogodka" id="imeDogodka" required value="<?php echo $dogodek->ime; ?>">
			
			<br/>
			<br/>
			
			<label>Lokacija dogodka</label>
			<input type="text" name="prostorDogodka" id="prostorDogodka" required value="<?php echo $dogodek->lokacija; ?>">
			
			<br/>
			
			<br/>
			<div class="form-group col-md-6">
				<label class="control-label col-sm-2" for="trajanjeDogodka">Začetek dogodka</label>
				<div class="input-group date col-sm-4" id="datetimepicker1">
					<input type='text' class="form-control" name="zacetekDogodka" id="zacetekDogodka" required value="<?php echo date('d-m-Y H:i', $dogodek->zacetek); ?>"/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
			
			<br/>
			<br/>
			<br/>
			<br/>

			<div class="form-group col-md-6">
				<label class="control-label col-sm-2" for="trajanjeDogodka">Trajanje dogodka</label>
				<div class="input-group date col-sm-4" id="datetimepicker2">
					<input type='text' class="form-control" name="trajanjeDogodka" id="trajanjeDogodka" required value="<?php echo date('d-m-Y H:i', $dogodek->trajanje); ?>"/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
			
			<br/>
			<br/>
			<br/>
			<br/>

			<div class="form-group col-md-6">
				<label class="control-label col-sm-2" for="trajanjeDogodka">Termin prijave/odjave</label>
				<div class="input-group date col-sm-4" id="datetimepicker3">
					<input type='text' class="form-control" name="terminDogodka" id="terminDogodka" required value="<?php echo date('d-m-Y H:i', $dogodek->termin); ?>"/>
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
			<input type="number" name="minUdelezencev" id="minUdelezencev" required value="<?php echo $dogodek->min_udelezencev; ?>">
			
			<br/>
			<br/>
			
			<label>Max. število udeležencev</label>
			<input type="number" name="maxUdelezencev" id="maxUdelezencev" required value="<?php echo $dogodek->max_udelezencev; ?>">
			
			<br/>
			<br/>
			
			<label>Opis dogodka</label>
			<textarea name="opisDogodka" id="opisDogodka" >
			<?php echo $dogodek->opis; ?>
			</textarea>
			
			<br/>
			<br/>
			
			<button type="submit">UREDI</button>
				
		</form>
				
		<br/>
		<br/>
		<form id="formNaloziSliko" action="<?php echo $this->config->base_url(); ?>CtrMain/nalozi_sliko" method="post" enctype="multipart/form-data">
		
		
			<input type="hidden" name="idDogodkaSlika" id="idDogodkaSlika" value="<?php echo $dogodek->id; ?>"> <!-- naredimo id skriti (hidden), da ga ne moremo spremeniti -->
		
		    Izberite sliko dogodka: <!-- https://www.w3schools.com/php/php_file_upload.asp -->
		    <input type="file" name="fileToUpload" id="fileToUpload">
		    <input type="submit" value="Naloži" name="submit">
		</form>
		<br/>
		<br/>
			
		
		<button onclick="izbrisi(<?php echo $dogodek->id;?>)">IZBRIŠI DOGODEK</button> <!-- gumb damo izven form, drugace hoce submitati formo -->
		<br/>
		<a href="<?php echo $this->config->base_url(); ?>CtrMain">NAZAJ</a>

		<p id="rezultat"></p>

	</div>
	
	
	<script>



	/* $('#formNaloziSliko').on('submit', function (e) 
	{
        e.preventDefault(); //preprečimo da se forma submita in preusmeri na drugo stran ampak naredimo po svoje s postom v javaskriptu
	    $.ajax({
	        url : $(this).attr('action'), //vzamemo url iz forme (action="....")
	        type: "POST",
	        data: $(this).serialize(), //vzameme avtomatsko vse inpute iz forme da jih ne rabimo posebej pisat
	        success: function (data) 
	        {
		        alert(data);
	        },
	        error: function (jXHR, textStatus, errorThrown) {
	        	document.getElementById("rezultat").innerHTML = "Napaka pri urejanju dogodka";
		        alert(errorThrown);
	        }
	    });
	}); */
	
	
	function izbrisi(idDogodka)
	{
		//var txt;
	    var r = confirm("Izbrišem dogodek?"); //okno za portditev pred brisanjem
	    if (r == true) {
	        izbrisiDogodek(idDogodka);
	    } else {
	        //txt = "You pressed Cancel!";
	    }
	}

	function izbrisiDogodek(idDogodka)
	{
		
		$.ajax({
	        url : "http://localhost/Dogodki_praktikum/CtrMain/izbrisi_dogodek_perform",
	        type: "POST",
	        data: {'idDogodka': idDogodka},
	        success: function (data) 
	        {
	        	if(data == 1) {
					alert("Dogodek izbrisan");
					window.location.replace("http://localhost/Dogodki_praktikum/CtrMain"); //če izbrisan preusmerimo na glavno stran
			    } else {
					alert("Napaka");
					location.reload();
				}
	        },
	        error: function (jXHR, textStatus, errorThrown) {
		        alert(errorThrown);
	        }
	    });
	}

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

	$('#formUrediDogodek').on('submit', function (e) 
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
		        	document.getElementById("rezultat").innerHTML = "Dogodek uspešno urejen";
			    } else {
		        	document.getElementById("rezultat").innerHTML = "Napaka pri urejanju dogodka";
			    }
	        },
	        error: function (jXHR, textStatus, errorThrown) {
	        	document.getElementById("rezultat").innerHTML = "Napaka pri urejanju dogodka";
		        alert(errorThrown);
	        }
	    });
	});
	
	</script> 
</body>
</html>
