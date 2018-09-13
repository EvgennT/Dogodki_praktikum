<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DOGODEK <?php echo $dogodek->ime;?></title>
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- nucamo jquery da lahko postamo ($.ajax({...) -->
	
	
	  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	  	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"></script>
	  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
<style>
body {}
body {
  background-image: url("https://cdn.zuerich.com/sites/default/files/styles/sharing/public/web_zuerich_home_topevents_1600x900.jpg?itok=yjC-dXXH");
  
  background-size: 2000px 1000px;
	
 <!-- font: 400 14px 'Calibri','Arial';-->
  padding: 20px;
  margin:5%;padding:5;
}
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
	text-color:blue;
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
blockquote {
  color: white;
  text-align: center;
}
.naslov1{
color: #666666;
  text-decoration: none;
  font-weight:bold;
  }
  #glava{
	  
	  color:white; 
	  backdrop-filter: blur(5px);
	  font-family: 'Times New Roman', Times, serif;
  }
  
  input, textarea{
width:100%;
}
textarea{
resize: vertical;
} 
  
</style>
</head>
<body>

<article>
  <header>
    <h1 id="glava" ><?php echo $dogodek->ime;?></h1>
  </header>
</article>
	<div id="container" class="row">
	
	<div align="center">
	
			<?php 
		
		$trenutniCasTimestamp = time() + 7200;
		
		if($dogodek->termin > $trenutniCasTimestamp) //če je timestamp trenutnega časa manjši od timestampa termina prijave/odjave pomeni da se še vedno lahko prijavimo/odjavimo
		{
			if(isset($dogodek->id_uporabnika))  //če ima id_uporabnika pomeni da je ta uporabnik že prijavlen na ta dogodek, zato mu ponudimo odjavo
			{
			?>
			<button class="GumbObDogodkih"  onclick="odjavaIzDogodka(<?php echo $dogodek->id;?>)">ODJAVA</button>
			<?php 
			}
			else 
			{
			?>
			<button class="GumbObDogodkih" onclick="prijavaNaDogodek(<?php echo $dogodek->id;?>)">PRIJAVA</button>
			<?php 
			}
		}
		?>
</div>
			<a style="float:left;" href="<?php echo $this->config->base_url(); ?>CtrMain"  class="gumbDodajDogodek" >NAZAJ</a>
</br></br></br>

	
		<form   class="col-10"  class="form-horizontal" id="formUrediDogodek" method="post" role="form" action="<?php echo $this->config->base_url(); ?>CtrMain/uredi_dogodek_perform">
			<table style="background: #FBEEC1; ">
			
			
			<tr >
			<td  colspan="2" ><center>
			<input type="hidden" name="idDogodka" id="idDogodka" value="<?php echo $dogodek->id; ?>"> <!-- naredimo id skriti (hidden), da ga ne moremo spremeniti -->
			
			
		<?php 
		
		if($dogodek->slika != "")//če ima dogodek sliko jo prikažemo, damo tudi link okoli nje da lahko odpremo celo sliko
		{
		?>
			<a href="<?php echo $this->config->base_url(); ?>slike/<?php echo $dogodek->slika; ?>"><img src="<?php echo $this->config->base_url(); ?>slike/<?php echo $dogodek->slika; ?>" alt="<?php echo $dogodek->slika; ?>" height="150"></a>
			<br/>
		<?php 
		}
		?>	</center>
			</td>
			</tr>

			
			<tr >
			<td style="background: #8EE4AF;">
			<label>Ime dogodka</label>
			</td>
			<td >
			
			<?php echo $dogodek->ime;?>
			</td>
			</tr>
			
			
			
			<tr >
			<td style="background: #8EE4AF;">
			<label>Lokacija dogodka</label>
			</td>
			<td >
			<?php echo $dogodek->lokacija; ?>
			</td>
			</tr>
			
			
			
			<tr >
			<td style="background: #8EE4AF;">
			<div class="form-group col-md-6">
				<label class="control-label col-sm-2" for="trajanjeDogodka">Začetek dogodka</label>
				</td>
			<td >
				<div class="input-group date col-sm-4" id="datetimepicker1">
					<?php echo date('d-m-Y H:i', $dogodek->zacetek); ?>
				</div>
			</div>
			</td>
			</tr>
			
			
			
<tr >
			<td style="background: #8EE4AF;">
			<div class="form-group col-md-6">
				<label class="control-label col-sm-2" for="trajanjeDogodka">Trajanje dogodka</label>
				</td>
			<td >
				<div class="input-group date col-sm-4" id="datetimepicker2">
					<?php echo date('d-m-Y H:i', $dogodek->trajanje); ?>
				</div>
			</div>
			</td>
			</tr>
			
			
<tr >
			<td style="background: #8EE4AF;">
			<div class="form-group col-md-6">
				<label class="control-label col-sm-2" for="trajanjeDogodka">Termin prijave/odjave</label>
				</td>
			<td >
				<div class="input-group date col-sm-4" id="datetimepicker3">
					<?php echo date('d-m-Y H:i', $dogodek->termin); ?>
					
				</div>
			</div>
			</td>
			</tr>
			
			
			
			<br/>
			<tr >
			<td style="background: #8EE4AF;">
			<label>Min. število udeležencev</label>
			</td>
			<td >
			<?php echo $dogodek->min_udelezencev; ?>
			</td>
			</tr>
			
			
			<tr >
			<td style="background: #8EE4AF;">
			<label>Max. število udeležencev</label>
			</td>
			<td >
			<?php echo $dogodek->max_udelezencev; ?>
			</td>
			</tr>
			
			
			<tr >
			<td style="background: #8EE4AF;">
			<label>Opis dogodka</label>
			</td>
			<td >
			<?php echo $dogodek->opis; ?>
			</td>
			</tr>
			<?php 
		$trenutniCasTimestamp = time() + 7200;
		
		if($dogodek->termin < $trenutniCasTimestamp) //če je timestamp trenutnega časa večji je dogodek potekel in lahko prikažemo oceno
		{
		?>
		
			<tr >
			<td style="background: #8EE4AF;">
			<label>Ocena dogodka</label>
			</td>
			<td>
			<?php echo $ocena; ?>
			</td>
			</tr>
		<tr>
      <td  style="background: #8EE4AF;">
    <?php 
    $trenutniCasTimestamp = time() + 7200;
    
    if($dogodek->termin < $trenutniCasTimestamp) //če je timestamp trenutnega časa večji je dogodek potekel in lahko prikažemo oceno
    {
    ?>
    
    
    
    <?php 
    if($dogodek->prisotnost == "Y") // če je bil uporabnik prisoten lahko tudi dogodek oceni
    {
    ?>
    </td>
    <td>
    <label>Oceni dogodek</label><td>
    
    <select id="oceni">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5" selected>5</option>
    </select>
      <button onclick="oceniDogodek(<?php echo $dogodek->id; ?>)">Oceni</button>
    
    </td>
    <?php 
    }
    ?>
    
    
    
    <?php
    }
    ?>
    </td>
    </tr> 	

			</table>	
		</form>
		
		 
		

		
		
		<?php
		}
		?>
		
		
		
		
	
		
	
			
			<table style="background: #FBEEC1;">
		<?php 
		if($tipUporabnika == 1) //prikažemo seznam prijavljenih uporabnikov samo organizatorju
		{
		?>
			<tr ><h3 style="color:yellow;"> <b>PRIJAVLJENI NA DOGODEK </b></h3>
			<td  style="background: #8EE4AF;"><p><?php 
			foreach ($prijavljeniNaDogodek as $uporabnik) 
			{
				echo $uporabnik->ime." ".$uporabnik->priimek." ";
			?>
			
				<?php 
				
				$trenutniCasTimestamp = time() + 7200;
				
				if($dogodek->trajanje  < $trenutniCasTimestamp) //gumbe za prisotnost pokažemo le če je dogodek že pretekel
				{
					if($uporabnik->prisotnost == "N") //če 
					{
					?>
						<button style="color:black" onclick="PotrdiPrisotnost(<?php echo $uporabnik->id; ?>, <?php echo $dogodek->id;?>)">POTRDI PRISOTNOST</button>
						<br>
					<?php
					}
					else if($uporabnik->prisotnost == "Y")
					{
					?>
						<button style="color:black" onclick="OdpotrdiPrisotnost(<?php echo $uporabnik->id; ?>, <?php echo $dogodek->id;?>)">ODPOTRDI PRISOTNOST</button>
						<br>
					<?php 
					}
				}
				?>
				</br>
				
			<?php 
			}
			?></p></td>
		<?php
		}
		?>
		</tr></table>
		<br/>
		<br/>



</div>

	
	
	<script>
	function oceniDogodek(idDogodka) 
	{
		var selectOceni = document.getElementById("oceni");
		var ocenaDogodka = selectOceni.options[selectOceni.selectedIndex].value; //dobimo izbrano oceno dogodka (https://stackoverflow.com/questions/1085801/get-selected-value-in-dropdown-list-using-javascript)
		$.ajax({
	        url : "http://localhost/Dogodki_praktikum/CtrMain/oceni_dogodek",
	        type: "POST",
	        data: {'idDogodka': idDogodka, 'ocenaDogodka': ocenaDogodka},
	        success: function (data) 
	        {
	        	if(data == 1) {
		        	alert("Vaša ocena je zabeležena");
					location.reload();
			    } else {
					alert("Napaka");
				}
	        },
	        error: function (jXHR, textStatus, errorThrown) {
		        alert(errorThrown);
	        }
	    });
	}
	 
	function PotrdiPrisotnost(idUporabnika, idDogodka)
	{
		//alert(idDogodka);
		$.ajax({
	        url : "http://localhost/Dogodki_praktikum/CtrMain/potrdi_prisotnost",
	        type: "POST",
	        data: {'idUporabnika': idUporabnika, 'idDogodka': idDogodka},
	        success: function (data) 
	        {
	        	if(data == 1) {
					location.reload();
			    } else {
					alert("Napaka");
				}
	        },
	        error: function (jXHR, textStatus, errorThrown) {
		        alert(errorThrown);
	        }
	    });
	}
	
	function OdpotrdiPrisotnost(idUporabnika, idDogodka)
	{
		$.ajax({
	        url : "http://localhost/Dogodki_praktikum/CtrMain/odpotrdi_prisotnost",
	        type: "POST",
	        data: {'idUporabnika': idUporabnika, 'idDogodka': idDogodka},
	        success: function (data) 
	        {
	        	if(data == 1) {
					location.reload();
			    } else {
					alert("Napaka");
				}
	        },
	        error: function (jXHR, textStatus, errorThrown) {
		        alert(errorThrown);
	        }
	    });
	}
	
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
					location.reload(); //osveži stran
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