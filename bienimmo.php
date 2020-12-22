<?php
session_start();

if($_SESSION['login']==NULL)
	header("Location:connexionMin.php");
?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>bienimmo</title>
  <script src="jquery-3.4.1.min.js"></script>
 <link rel="stylesheet" href="admineimmo.css" />
</head>
<body  >
<section id='span'>
<a class="app"  href="accueilimmo1.php"> Recherche</a>
<a class="app"  href="adminimmo.php"> Retour</a>
		
		
</section>
<header >
	
<img id ='b' src  ="im1.png"/>



	</header>

		<section id='span'>
        <a  class="gf" href="reservationimmo.php" >Réservations </a>
		<a class="gf" href="locationimmo.php" >locations </a>
		<a  id="kal" class="gf" href="bienimmo1.php" > Biens</a>
		<a class="gf" href="agentimmo.php" > Gestion Agents</a>
		<a class="gf" href="clientimmo.php" > Gestion Clients</a>
		<a class="gf" href="ajoutimmo.php"> Ajout de bien</a>''
		</section>
	
	<?php
	$con=new PDO("mysql:host=localhost;dbname=immobilier","root","");
	$b='select * from bien ';
	$a=$con->query($b);
	while($res=$a->fetch())
	{
		$i=$res['image'];
		echo"<div id='di'>";
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
		echo'<span class="id" >Numéro du Bien:</span><span class="res">'.$res["idBien"].'</span>';
		echo'<form method="post" action="supimmo.php" >
		<br>
		<input type="hidden" name="idBien" value="'.$res["idBien"].'" />
		<input  type="submit"   value="Supprimer" 
		style="background:red;color:white;font-size:30px;
		border-radius:10px;margin-left:15px;"/>
		</form> <br>';
	    
		echo'<form method="post" action="modifiimmo.php" >
		<input type="hidden" name="idBie" value="'.$res["idBien"].'" />
		<input type="hidden" name="eta" value="'.$res["etat"].'" />
		<input type="hidden" name="adress" value="'.$res["adresse"].'" />
		<input type="hidden" name="pri" value="'.$res["prix"].'" />
		<input type="hidden" name="descriptio" value="'.$res["description"].'" />
		<input type="hidden" name="imag" value="'.$res["image"].'" />
		
		<input type="submit" value="Modifier" style="background:green;font-size:30px;border-radius:10px;margin-left:15px;color:white;margin-bottom:15px;margin-top:5px;"/></form></div>';
	
	
	
	
	}
	
	?>
	

	<script>
	$('input').click(function()
	{
		if($(this).val()=="Supprimer")
	return confirm("Voulez vous supprimer ?");
	}
	);
	</script>	 
	
	
</body>
</html>