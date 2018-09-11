<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DOGODKI</title>

</head>
<body>
	<div id="container">
	
		<?php
		if($userType == 1) //če je prijavljen uporabnik admin potem prikažemo gumb za dodajanje dogodka 
		{
		?>
			<a href="<?php echo $this->config->base_url(); ?>CtrMain/add_event">Dodaj dogodek</a>
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
			foreach ($events as $event)
			{
			?>
				<tr>
					<td><?php echo $event->name; ?></td>
					<td><?php echo $event->location; ?></td>
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
