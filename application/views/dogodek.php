<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DOGODEK <?php echo $dogodek->ime;?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- nucamo jquery da lahko postamo ($.ajax({...) -->

<style>body {margin:5%;padding:5; 
background: #066dab;
background: -moz-linear-gradient(top, #066dab 16%, #066dab 16%, #c5deea 89%);
background: -webkit-linear-gradient(top, #066dab 16%,#066dab 16%,#c5deea 89%);
background: linear-gradient(to bottom, #066dab 16%,#066dab 16%,#c5deea 89%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#066dab', endColorstr='#c5deea',GradientType=0 );
}
 
.GumbObDogodkih {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f9f9f9), color-stop(1, #e9e9e9));
	background:-moz-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:-webkit-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:-o-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:-ms-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f9f9f9', endColorstr='#e9e9e9',GradientType=0);
	background-color:#f9f9f9;
	-moz-border-radius:13px;
	-webkit-border-radius:13px;
	border-radius:13px;
	border:1px solid #dcdcdc;
	display:inline-block;
	cursor:pointer;
	color:#666666;
	font-family:Arial;
	font-size:17px;
	font-weight:bold;
	padding:13px 16px;
	text-decoration:none;
}
.GumbObDogodkih:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e9e9e9), color-stop(1, #f9f9f9));
	background:-moz-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:-webkit-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:-o-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:-ms-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:linear-gradient(to bottom, #e9e9e9 5%, #f9f9f9 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e9e9e9', endColorstr='#f9f9f9',GradientType=0);
	background-color:#e9e9e9;
}
.GumbObDogodkih:active {
	position:relative;
	top:1px;
}


  .col-1 {width: 14.28%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 65%;}
.col-10 {width: 83.33%;}
.col-11 {width: 90%;}
.col-12 {width: 100%;}
  
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}
th
{
background-color:black;
color:white;
}
th:first-child, td:first-child
{
  position:sticky;
  left:0px;
 
}
 td:first-child
 {
  background-color:grey;
 }
 .vSredino{
    border: 1px ;
    text-align: center;
    padding: 8px;
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
	<div id="container">
	<div align="center">
		<h1><?php echo $dogodek->ime;?></h1>
		
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
		</br>
		<?php 
		
		if($dogodek->slika != "")//če ima dogodek sliko jo prikažemo, damo tudi link okoli nje da lahko odpremo celo sliko
		{
		?>
			<a href="<?php echo $this->config->base_url(); ?>slike/<?php echo $dogodek->slika; ?>"><img src="<?php echo $this->config->base_url(); ?>slike/<?php echo $dogodek->slika; ?>" alt="<?php echo $dogodek->slika; ?>" height="150"></a>
			<br/>
		<?php 
		}
		?>	
		
	
		
		
		
		

			<form  class="col-9"  class="center" class="form-horizontal" id="formAddDogodek" method="post" role="form" action="http://localhost/Dogodki_praktikum/CtrMain/dodaj_dogodek_perform">
			<table width = "80%  align="center">
			
			<tr class="col-1">
			<td class="col-1">
			<label>Id dogodka</label>
			</td>
			<td class="col-1">
			<?php echo $dogodek->id;?>
			</td>
			</tr>
			
			
			
			<tr class="col-1">
			<td>
			<label>Lokacija dogodka</label>
			</td>
			<td>
			<?php echo $dogodek->lokacija;?>
			</td>
			</tr>
			
			
			<tr>
			<td>
			Začetek dogodka
			</td>
			<td>
			<?php echo date('d/m/Y H:i', $dogodek->zacetek);?>
			</td>
			</tr>
			
			
			<tr>
			<td>
		Trajanje dogodka
			</td>
			<td>
			<?php echo date('d/m/Y H:i', $dogodek->trajanje);?>
			</td>
			</tr>
			

			<tr>
			<td>
		Konec odjav/prijav
			</td>
			<td>
<?php echo date('d/m/Y H:i', $dogodek->termin); ?>
			</td>
			</tr>
		
			
			
			<tr>
			<td>
			<label>Minimalno udeležencev</label>
			</td>
			<td>
		  <?php echo $dogodek->min_udelezencev; ?>
			
			</td>
			</tr>
			
			<tr>
			<td>
			<label>Maksimalno udeležencev</label>
			</td>
			<td>
		<?php echo $dogodek->max_udelezencev; ?>
			
			</td>
			</tr>
			
			<tr>
			<td>
			Trenutno udeležencev
			</td>
			<td>
			<?php echo count($prijavljeniNaDogodek); //count vrne število elementov v array ?>
		
			</td>
			</tr>
			
			<tr>
			<td >
		Opis dogodka 
			</td><td>
			<?php echo $dogodek->opis; ?></td>
			</tr>
			
			<table>	
		</form>


		</div>



		
		
		<?php 
		$trenutniCasTimestamp = time() + 7200;
		
		if($dogodek->termin < $trenutniCasTimestamp) //če je timestamp trenutnega časa večji je dogodek potekel in lahko prikažemo oceno
		{
		?>
		
		<p>Ocena dogodka: <?php echo $ocena; ?></p>
		
		<?php 
		if($dogodek->prisotnost == "Y") // če je bil uporabnik prisoten lahko tudi dogodek oceni
		{
		?>
		
		Oceni dogodek
		<select id="oceni">
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5" selected>5</option>
		</select>
  		<button onclick="oceniDogodek(<?php echo $dogodek->id; ?>)">Oceni</button>
		
		<?php 
		}
		?>
		
		
		
		<?php
		}
		?>
		
		
		
		<a class="GumbObDogodkih" href="<?php echo $this->config->base_url(); ?>CtrMain">NAZAJ</a>
		
	
		
		
		<?php 
		if($tipUporabnika == 1) //prikažemo seznam prijavljenih uporabnikov samo organizatorju
		{
		?>
			<h3>PRIJAVLJENI NA DOGODEK</h3>
			<?php 
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
						<button onclick="PotrdiPrisotnost(<?php echo $uporabnik->id; ?>, <?php echo $dogodek->id;?>)">POTRDI PRISOTNOST</button>
						<br>
					<?php
					}
					else if($uporabnik->prisotnost == "Y")
					{
					?>
						<button onclick="OdpotrdiPrisotnost(<?php echo $uporabnik->id; ?>, <?php echo $dogodek->id;?>)">ODPOTRDI PRISOTNOST</button>
						<br>
					<?php 
					}
				}
				?>
				</br>
				
			<?php 
			}
			?>
		<?php
		}
		?>
		
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
