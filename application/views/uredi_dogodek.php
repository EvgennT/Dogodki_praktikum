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

</head><style>
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
<body>
<article>
  <header>
    <h1 id="glava" >Urejanje dogodka</h1>
  </header>
</article>
	<div id="container" class="row">
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
			<input type="text" name="imeDogodka" id="imeDogodka" required value="<?php echo $dogodek->ime; ?>">
			</td>
			</tr>
			
			
			
			<tr >
			<td style="background: #8EE4AF;">
			<label>Lokacija dogodka</label>
			</td>
			<td >
			<input type="text" name="prostorDogodka" id="prostorDogodka" required value="<?php echo $dogodek->lokacija; ?>">
			</td>
			</tr>
			
			
			
			<tr >
			<td style="background: #8EE4AF;">
			<div class="form-group col-md-6">
				<label class="control-label col-sm-2" for="trajanjeDogodka">Začetek dogodka</label>
				</td>
			<td >
				<div class="input-group date col-sm-4" id="datetimepicker1">
					<input type='text' class="form-control" name="zacetekDogodka" id="zacetekDogodka" required value="<?php echo date('d-m-Y H:i', $dogodek->zacetek); ?>"/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
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
					<input type='text' class="form-control" name="trajanjeDogodka" id="trajanjeDogodka" required value="<?php echo date('d-m-Y H:i', $dogodek->trajanje); ?>"/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
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
					<input type='text' class="form-control" name="terminDogodka" id="terminDogodka" required value="<?php echo date('d-m-Y H:i', $dogodek->termin); ?>"/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
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
			<input type="number" name="minUdelezencev" id="minUdelezencev" required value="<?php echo $dogodek->min_udelezencev; ?>">
			</td>
			</tr>
			
			
			<tr >
			<td style="background: #8EE4AF;">
			<label>Max. število udeležencev</label>
			</td>
			<td >
			<input type="number" name="maxUdelezencev" id="maxUdelezencev" required value="<?php echo $dogodek->max_udelezencev; ?>">
			</td>
			</tr>
			
			
			<tr >
			<td style="background: #8EE4AF;">
			<label>Opis dogodka</label>
			</td>
			<td >
			<textarea name="opisDogodka" id="opisDogodka" >
			<?php echo $dogodek->opis; ?>
			</textarea>
			</td>
			</tr>
			
			
			
			
			
			<tr>
			<td colspan="2" >
			<center>
			<button type="submit"  class="gumbDodajDogodek" >UREDI</button>
			</center>
			</td>			
			</tr>
			
			
			</table>	
		</form>
		
		
		<form class="col-10"  class="form-horizontal" id="formNaloziSliko" action="<?php echo $this->config->base_url(); ?>CtrMain/nalozi_sliko" method="post" enctype="multipart/form-data">
		<table style="background: #8EE4AF; "> 
		<tr>
		<td colspan="2" >		    
		Izberite sliko dogodka: <!-- https://www.w3schools.com/php/php_file_upload.asp -->
		</td>
		</tr>
		
		<tr >
			<td style="background: #FBEEC1;">
			<input type="hidden" name="idDogodkaSlika" id="idDogodkaSlika" value="<?php echo $dogodek->id; ?>"> <!-- naredimo id skriti (hidden), da ga ne moremo spremeniti -->
		
		    <input type="file"  class="gumbDodajDogodek" name="fileToUpload" id="fileToUpload">
			
		    <input type="submit" class="gumbDodajDogodek" value="Naloži" name="submit">
			</td>
			</tr>
		</table></form>
		<br/>
		<br/>
			
		
		<button onclick="izbrisi(<?php echo $dogodek->id;?>)"  class="gumbDodajDogodek" >IZBRIŠI DOGODEK</button> <!-- gumb damo izven form, drugace hoce submitati formo -->
		<br/>

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
		        	document.getElementById("rezultat").innerHTML = "<p  class='alert alert-success' role='alert'>Dogodek uspešno dodan. S gumbom NAZAJ se vrnete na pregled dogodkov.</p>";
			    } else {
		        	document.getElementById("rezultat").innerHTML = "<p  class='alert alert-danger' role='alert'>Dogodek uspešno dodan. S gumbom NAZAJ se vrnete na pregled dogodkov.</p>";
			    }
	        },
	        error: function (jXHR, textStatus, errorThrown) {
	        	document.getElementById("rezultat").innerHTML = "<p  class='alert alert-danger' role='alert'>Dogodek uspešno dodan. S gumbom NAZAJ se vrnete na pregled dogodkov.</p>";
		        alert(errorThrown);
	        }
	    });
	});
	
	</script> 
</body>
</html>