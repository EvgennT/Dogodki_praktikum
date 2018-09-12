<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DOGODKI</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- nucamo jquery da lahko postamo ($.ajax({...) -->

</head>
<body>
	<div id="container">
	
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
		
		<h3>DOGODKI</h3>
		<table>
			<thead>
				<tr>
					<th colspan="3">PRIHAJAJOČI DOGODKI</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			foreach ($dogodki as $dogodek)
			{
			?>
				<tr>
					<td><?php echo $dogodek->ime; ?></td>
					<td><?php echo $dogodek->lokacija; ?></td>
					<?php 
					if(isset($dogodek->id_uporabnika)) 
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
					?>
				</tr>
			<?php
			}	
			?>
			</tbody>
		</table>
		
		<br/>
		<br/>
		<table>
			<thead>
				<tr>
					<th colspan="3">POTEKLI DOGODKI</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	
	

	<script>

	
	function prijavaNaDogodek(idDogodka) //javaskript fukncija, ki te preko posta prijavi na dogodek 
	{
		//alert(idDogodka);
		$.ajax({
	        url : "prijava_na_dogodek",
	        type: "POST",
	        data: {'idDogodka': idDogodka},
	        success: function (data) 
	        {
	        	if(data == 1) {
					alert("Uspešno prijavlen na dogodek");
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
	        url : "odjava_iz_dogodka",
	        type: "POST",
	        data: {'idDogodka': idDogodka},
	        success: function (data) 
	        {
	        	if(data == 1) {
					alert("Uspešno odjavljeni iz dogodka");
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
