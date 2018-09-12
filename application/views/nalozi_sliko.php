<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>NALAGANJE SLIKE</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- nucamo jquery da lahko postamo ($.ajax({...) -->

</head>
<body>
	<div id="container">
	
	
		<a style="float:right;" href="<?php echo $this->config->base_url(); ?>CtrMain/odjava_uporabnika">ODJAVA</a>
		
		
		<p><?php echo $rezultat; ?></p>
		<br/>
		<a href="<?php echo $this->config->base_url(); ?>CtrMain/">NAZAJ</a>
		<br/>
		
		<br/>
		
		<?php 
		if(isset($slika)) //isset preveri če ni $slika null
		{
		?>
			<img src="<?php echo $this->config->base_url(); ?>slike/<?php echo $slika; ?>" alt="<?php echo $slika; ?>">
		<?php 
		}
		?>
		
	</div>
	<script>

	
	
	</script> 
</body>
</html>
