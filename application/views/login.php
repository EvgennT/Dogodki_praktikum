
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PRIJAVA</title>

</head>
<style>
body {}

body {
  background-image: url("https://cdn.zuerich.com/sites/default/files/styles/sharing/public/web_zuerich_home_topevents_1600x900.jpg?itok=yjC-dXXH");
  
  background-size: 2000px 1000px;
	
 <!-- font: 400 14px 'Calibri','Arial';-->
  padding: 20px;
  margin:5%;padding:5;
}

.GumbObDogodkih {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #d6d6d6), color-stop(1, #ffffff));
	background:-moz-linear-gradient(top, #d6d6d6 5%, #ffffff 100%);
	background:-webkit-linear-gradient(top, #d6d6d6 5%, #ffffff 100%);
	background:-o-linear-gradient(top, #d6d6d6 5%, #ffffff 100%);
	background:-ms-linear-gradient(top, #d6d6d6 5%, #ffffff 100%);
	background:linear-gradient(to bottom, #d6d6d6 5%, #ffffff 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d6d6d6', endColorstr='#ffffff',GradientType=0);
	background-color:#d6d6d6;
	-moz-border-radius:13px;
	-webkit-border-radius:13px;
	border-radius:13px;
	border:1px solid #6e6e6e;
	display:inline-block;
	cursor:pointer;
	color:#000000;
	font-family:Arial;
	font-size:17px;
	font-weight:bold;
	padding:7px 13px;
	text-decoration:none;
}
.GumbObDogodkih:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #d6d6d6));
	background:-moz-linear-gradient(top, #ffffff 5%, #d6d6d6 100%);
	background:-webkit-linear-gradient(top, #ffffff 5%, #d6d6d6 100%);
	background:-o-linear-gradient(top, #ffffff 5%, #d6d6d6 100%);
	background:-ms-linear-gradient(top, #ffffff 5%, #d6d6d6 100%);
	background:linear-gradient(to bottom, #ffffff 5%, #d6d6d6 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#d6d6d6',GradientType=0);
	background-color:#ffffff;
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
h1 {
    text-align: center;
    width: 100%;
	font-size: 500%;
	<!--font-family: 'Holtwood One SC';-->
	text-color:blue;
    padding: 10px;
}
#glava{
	  
	  color:white; 
	  backdrop-filter: blur(5px);
	  font-family: 'Times New Roman', Times, serif;
  }
  .rcorners1 {
    border: 5px solid #FBEEC1;
    border-radius: 1em;
}
  

</style>
<body>
		<a style="float: right;" href="http://localhost/Dogodki_praktikum/CtrMain/registracija" class="GumbObDogodkih">Registracija</a>

<article>
  <header>
    <h1 id="glava" >Prijava</h1>
  </header>
</article>
	<div id="container" class="row">
	
		
		</br>
		<center>
		<form class="col-3 rcorners1" class="" id="formLogin" method="post" role="form" action="http://localhost/Dogodki_praktikum/CtrMain/login_perform">
			<table   style="background: #FBEEC1;">
			
			<tr class="col-1">
			<td class="col-1" style="background: #8EE4AF;">
			<label>E-mail</label>
			</td>
			<td class="col-1">
			<input type="email" name="email" id="email" required>
			</td>
			</tr>
			
			
			<tr class="col-1">
			<td class="col-1" style="background: #8EE4AF;">
			<label>Geslo</label>
			</td>
			<td class="col-1">
			<input type="password" name="geslo" id="geslo" required>
			</td>
			</tr>
			
			
			<tr class="col-1">
			<td class="col-1"  colspan="2"   style="background: #FBEEC1;">
			<button type="submit" class="GumbObDogodkih">PRIJAVA</button>
			</td>
			</tr>
			
				
		</form>
		</center>
	</div>
	
	
</body>
</html>
