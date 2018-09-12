<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DOGODKI</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- nucamo jquery da lahko postamo ($.ajax({...) -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<style>

<!--filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#066dab', endColorstr='#c5deea',GradientType=0 );
}>-->

.GumbObDogodkih {
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
  background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0.16, rgb(207, 207, 207)), color-stop(0.79, rgb(252, 252, 252)));
  background-image: -moz-linear-gradient(center bottom, rgb(207, 207, 207) 16%, rgb(252, 252, 252) 79%);
  background-image: linear-gradient(to top, rgb(207, 207, 207) 16%, rgb(252, 252, 252) 79%); 
  padding: padding:6px 24px;;
  border: 1px solid #dcdcdc;
  color: #666666;
  text-decoration: none;
  font-weight:bold;
}
.GumbObDogodkih:hover {
  background: #f7f7f7;
  border: 1px solid #8b8b8b;
}

.GumbObDogodkih:active {
  background: #2e2e2e;
  border: 1px solid black;
  color: white;
  }

.gumbDodajDogodek {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f9f9f9), color-stop(1, #e9e9e9));
	background:-moz-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:-webkit-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:-o-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:-ms-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f9f9f9', endColorstr='#e9e9e9',GradientType=0);
	background-color:#f9f9f9;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	cursor:pointer;
	color:#666666;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffffff;
}
.gumbDodajDogodek:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e9e9e9), color-stop(1, #f9f9f9));
	background:-moz-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:-webkit-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:-o-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:-ms-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:linear-gradient(to bottom, #e9e9e9 5%, #f9f9f9 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e9e9e9', endColorstr='#f9f9f9',GradientType=0);
	background-color:#e9e9e9;
}
.gumbDodajDogodek:active {
	position:relative;
	top:1px;
}

h1 {
    text-align: center;
    width: 100%;
	font-size: 500%;
	<!--font-family: 'Holtwood One SC';-->
	background-color:blue;
    padding: 10px;
}

h3, h4 {
    text-align: center;
    width: 100%;
    
    padding: 10px;
}
table {
text-align: center;
}
th{
text-align: center;
}
  
.col-1 {width: 14.28%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}
table {
  border-spacing: 1;
  border-collapse: collapse;
  background: white;
  border-radius: 6px;
  overflow: hidden;
  max-width: 800px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}
table * {
  position: relative;
}
table td, table th {
  padding-left: 8px;
}
table thead tr {
  height: 60px;
  background: #FBEEC1;
  font-size: 16px;
}
table tbody tr {
  height: 48px;
  border-bottom: 1px solid #ffffff;
}
table tbody tr:last-child {
  border: 0;
}
table td, table th {
  text-align: left;
}
table td.l, table th.l {
  text-align: right;
}
table td.c, table th.c {
  text-align: center;
}
table td.r, table th.r {
  text-align: center;
}

@media screen and (max-width: 35.5em) {
  table {
    display: block;
  }
  table > *, table tr, table td, table th {
    display: block;
  }
  table thead {
    display: none;
  }
  table tbody tr {
    height: auto;
    padding: 8px 0;
  }
  table tbody tr td {
    padding-left: 45%;
    margin-bottom: 12px;
  }
  table tbody tr td:last-child {
    margin-bottom: 0;
  }
  table tbody tr td:before {
  background: #FBEEC1;
    position: absolute;
    font-weight: 700;
    width: 40%;
    left: 10px;
    top: 0;
  }
  table tbody tr td:nth-child(1):before {
    content: "Ime";
  }
  table tbody tr td:nth-child(2):before {
    content: "Lokacija";
  }
  table tbody tr td:nth-child(3):before {
    content: "Začetek";
  }
  table tbody tr td:nth-child(4):before {
    content: "Trajanje";
  }
  table tbody tr td:nth-child(5):before {
    content: "Termin";
  }
  
}
body {
  background-image: url("https://cdn.zuerich.com/sites/default/files/styles/sharing/public/web_zuerich_home_topevents_1600x900.jpg?itok=yjC-dXXH");
  
  background-size: 2000px 1000px;
	
 <!-- font: 400 14px 'Calibri','Arial';-->
  padding: 20px;
}

blockquote {
  color: white;
  text-align: center;
}
.naslov1{
color: #666666;
  text-decoration: none;
  font-weight:bold;
  }
  

</style>
<body>

<article>
  <header>
    <h1>Event Magician</h1>
  </header>
</article>


<div id="container" class="row">
<a style="float:right;" href="<?php echo $this->config->base_url(); ?>CtrMain/odjava_uporabnika" class="gumbDodajDogodek">Odjava</a>
		<?php
		if($tipUporabnika == 1) //če je prijavljen uporabnik admin potem prikažemo gumb za dodajanje dogodka 
		{
		?>
			<a href="<?php echo $this->config->base_url(); ?>CtrMain/dodaj_dogodek" class="gumbDodajDogodek">Dodaj dogodek</a>
			<br/>
			<br/>
		<?php 
		}
		?>
		
		<h3 class="naslov1">PRIHAJAJOČI DOGODKI</h4>
<table class="col-12" id="container" style="background: #FBEEC1; ">
      <thead>
        <tr style="background: #8EE4AF; border-style: none none solid none;">
          <th class="col-1">Ime</th>
          <th class="col-1">Lokacija</th>
          <th class="col-1">Zacetek</th>
          <th class="col-1">trajanje</th>
          <th class="col-1">Termin</th>
          <th class="col-1">Slika</th>
          <th class="col-1" colspan="2" style="text-align: center;">Ogled in Prijava</th>
          <th colspan="2" style="background: #8EE4AF;"></th>
		  <th style="background: #8EE4AF;"></th>
        </tr>
      <thead>
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
					
					<td>
					<?php 
					
					if($dogodek->slika != "")//če ima dogodek sliko jo prikažemo, damo tudi link okoli nje da lahko odpremo celo sliko
					{
					?>
						<a href="<?php echo $this->config->base_url(); ?>slike/<?php echo $dogodek->slika; ?>"><img src="<?php echo $this->config->base_url(); ?>slike/<?php echo $dogodek->slika; ?>" alt="<?php echo $dogodek->slika; ?>" height="50"></a>
						<br/>
					<?php 
					}
					?>	
					</td>
					
        <?php 
					
					$trenutniCasTimestamp = time();
					
					if($dogodek->termin > $trenutniCasTimestamp) //če je timestamp trenutnega časa manjši od timestampa termina prijave/odjave pomeni da se še vedno lahko prijavimo/odjavimo
					{
						if(isset($dogodek->id_uporabnika))  //če ima id_uporabnika pomeni da je ta uporabnik že prijavlen na ta dogodek, zato mu ponudimo odjavo
						{
						?>
						<td><button onclick="odjavaIzDogodka(<?php echo $dogodek->id;?>)" class="GumbObDogodkih">ODJAVA</button></td>
						<?php 
						}
						else 
						{
						?>
						<td><button onclick="prijavaNaDogodek(<?php echo $dogodek->id;?>)" class="GumbObDogodkih">PRIJAVA</button></td>
						<?php 
						}
					}
					?>
					<td colspan="2"><a href="<?php echo $this->config->base_url(); ?>CtrMain/dogodek/<?php echo $dogodek->id; ?>" class="GumbObDogodkih">PREGLED</a></td>
					
					<?php 
					if($tipUporabnika == 1) 
					{
					?>
					<td colspan="2" ><a href="<?php echo $this->config->base_url(); ?>CtrMain/uredi_dogodek/<?php echo $dogodek->id; ?>" class="GumbObDogodkih">UREDI</a></td>
					<?php
					}
					?>
				</tr>
          <!--<td colspan="2" >CES-9000</td>
          
          <td class="linki">9mm</td>
          
          <td colspan="2" >Kangal / Coil</td> -->
        </tr>
           
        <?php
			}	
			?>
      </tbody>
    <table/>
	
	
	
		<br/>
		<br/>
		<h4 class="naslov1">POTEKLI DOGODKI</h4>
		<table  style="background: #FBEEC1;">
			<thead>
				<tr  style="background: #8EE4AF; border-style: none none solid none;">
					<th>Ime</th>
					<th>Lokacija</th>
					<th>Zacetek</th>
					<th>Trajanje</th>
					<th>Termin prijave/odjave</th>
					<th class="col-1" colspan="2" style="text-align: center;">Ogled</th>
          
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
					
					<td><a href="<?php echo $this->config->base_url(); ?>CtrMain/dogodek/<?php echo $dogodek->id; ?>" class="GumbObDogodkih">PREGLED</a></td>
					
					<?php 
					if($tipUporabnika == 1) 
					{
					?>
					<td><a href="<?php echo $this->config->base_url(); ?>CtrMain/uredi_dogodek/<?php echo $dogodek->id; ?>" class="GumbObDogodkih">UREDI</a></td>
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
	
</div>
</body>
</html>

