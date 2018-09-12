<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DOGODKI</title>

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
					<td><button>PRIJAVA</button></td>
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
</body>
</html>
