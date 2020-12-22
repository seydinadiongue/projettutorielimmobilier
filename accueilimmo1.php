
<!doctype html>
<html>
<head class="header">
 <meta charset="utf-8">
 <title>les biens</title>
 <style>
 
 </style>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
 <script src="jquery-3.4.1.min.js"></script>
 <link rel="stylesheet" href="indeximmo.css" />
</head>
<body>



<div id="div2" >
		<form method="post" action="rechercheimmo.php"  enctype='multipart/form-data' >
		
				
				<select id="res" class="a"  name="type" placeholder="Donner le type du bien " >
				<option>Immeuble</option><option>Appartement</option>
				</select>
				
				<input id='input' onKeyup="ndeye();" class="a"   type="text" name="adresse" placeholder="Donner l'adresse du Bien" />
				
				<input  id='input2' class="a" type="text" name="prix" placeholder="Donner le prix du Bien " />
				<input   type="submit" value="Rechercher"  id="sub"/>
		</form>

	
	<div id ='i' style="background-color:white;margin-top:0px;"></div>
		</div>
	<?php
	$con=new PDO("mysql:host=localhost;dbname=immobilier","root","");
	$req='select * from bien where etat like "disponible" ';
	$res=$con->query($req);
	while($resultat=$res->fetch())
	{
		$i=$resultat["image"];
		echo'<div id="di"  >';
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
		
		echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
		echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
		echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
		echo'<form method="post" action="detailimmo.php"  style="margin-left:15px;margin-top:5px;" > ';
		echo'<input type="hidden" name="decription" value='.$resultat["description"].' />
		     <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
			 <input type="hidden" name="image" value='.$resultat["image"].' />
			 <input id="su" type="submit" value="Plus d\'informations" style="background:blue;color:white;
			 border-radius:10px;margin-top:10px;margin-bottom:10px;font-weight:bold;height:30px;"/></form>'; 
		echo"</div>";
	}
	?>
	
	</body>
	</html>