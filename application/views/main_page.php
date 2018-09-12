<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DOGODKI</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- nucamo jquery da lahko postamo ($.ajax({...) -->

</head>
<body>
	<div id="container">
	
	
		<a style="float:right;" href="<?php echo $this->config->base_url(); ?>CtrMain/odjava_uporabnika">ODJAVA</a>
		<?php
		if($tipUporabnika == 1) //če je prijavljen uporabnik admin potem prikažemo gumb za dodajanje dogodka 
		{
		?>
			<a href="<?php echo $this->config->base_url(); ?>CtrMain/dodaj_dogodek">Dodaj dogodek</a>
			<br/>
			<br/>
		<?php 
		}
		?>
		
		<h4>PRIHODNJOI DOGODKI</h4>
		<table>
			<thead>
				<tr>
					<th>Ime</th>
					<th>Lokacija</th>
					<th>Zacetek</th>
					<th>Trajanje</th>
					<th>Termin prijave/odjave</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			foreach ($dogodkiPrihodnji as $dogodek)
			{
			?>
				<tr>
					<td><?php echo $dogodek->ime; ?></td>
					<td><?php echo $dogodek->lokacija; ?></td>
					<td><?php echo date('d/m/Y H:i', $dogodek->zacetek);  //date nam pretvori timestamp v datum podanega formata ?></td>
					<td><?php echo date('d/m/Y H:i', $dogodek->trajanje); ?></td>
					<td><?php echo date('d/m/Y H:i', $dogodek->termin);?></td>
					<?php 
					
					$trenutniCasTimestamp = time();
					
					if($dogodek->termin > $trenutniCasTimestamp) //če je timestamp trenutnega časa manjši od timestampa termina prijave/odjave pomeni da se še vedno lahko prijavimo/odjavimo
					{
						if(isset($dogodek->id_uporabnika))  //če ima id_uporabnika pomeni da je ta uporabnik že prijavlen na ta dogodek, zato mu ponudimo odjavo
						{
						?>
						<td><button onclick="odjavaIzDogodka(<?php echo $dogodek->id;?>)">ODJAVA</button></td>
						<?php 
						}
						else 
						{
						?>
						<td><button onclick="prijavaNaDogodek(<?php echo $dogodek->id;?>)">PRIJAVA</button></td>
						<?php 
						}
					}
					?>
					<td><a href="<?php echo $this->config->base_url(); ?>CtrMain/dogodek/<?php echo $dogodek->id; ?>">PREGLED DOGODKA</a></td>
					
					<?php 
					if($tipUporabnika == 1) 
					{
					?>
					<td><a href="<?php echo $this->config->base_url(); ?>CtrMain/uredi_dogodek/<?php echo $dogodek->id; ?>">UREDI DOGODEK</a></td>
					<?php
					}
					?>
				</tr>
			<?php
			}	
			?>
			</tbody>
		</table>
		
		<br/>
		<br/>
		<h4>POTEKLI DOGODKI</h4>
		<table>
			<thead>
				<tr>
					<th>Ime</th>
					<th>Lokacija</th>
					<th>Zacetek</th>
					<th>Trajanje</th>
					<th>Termin prijave/odjave</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			foreach ($dogodkiPretekli as $dogodek)
			{
			?>
				<tr>
					<td><?php echo $dogodek->ime; ?></td>
					<td><?php echo $dogodek->lokacija; ?></td>
					<td><?php echo date('d/m/Y H:i', $dogodek->zacetek);  //date nam pretvori timestamp v datum podanega formata ?></td>
					<td><?php echo date('d/m/Y H:i', $dogodek->trajanje); ?></td>
					<td><?php echo date('d/m/Y H:i', $dogodek->termin);?></td>
					
					<td><a href="<?php echo $this->config->base_url(); ?>CtrMain/dogodek/<?php echo $dogodek->id; ?>">PREGLED DOGODKA</a></td>
					
					<?php 
					if($tipUporabnika == 1) 
					{
					?>
					<td><a href="<?php echo $this->config->base_url(); ?>CtrMain/uredi_dogodek/<?php echo $dogodek->id; ?>">UREDI DOGODEK</a></td>
					<?php
					}
					?>
				</tr>
			<?php
			}	
			?>
			</tbody>
		</table>
	</div>
	
	

	<script>

	
	function prijavaNaDogodek(idDogodka) //javaskript fukncija, ki te preko posta prijavi na dogodek 
	{
		//alert(idDogodka);
		$.ajax({
	        url : "http://localhost/Dogodki_praktikum/CtrMain/prijava_na_dogodek",
	        type: "POST",
	        data: {'idDogodka': idDogodka},
	        success: function (data) 
	        {
	        	if(data == 1) {
					alert("Uspešno prijavlen na dogodek");
					location.reload();
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
	
	function odjavaIzDogodka(idDogodka)
	{
		$.ajax({
	        url : "http://localhost/Dogodki_praktikum/CtrMain/odjava_iz_dogodka",
	        type: "POST",
	        data: {'idDogodka': idDogodka},
	        success: function (data) 
	        {
	        	if(data == 1) {
					alert("Uspešno odjavljeni iz dogodka");
					location.reload();
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
	
	</script> 
</body>
</html>
