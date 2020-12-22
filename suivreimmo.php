<?php
session_start();

if($_SESSION['login']==NULL)
	header("Location:connexionMin.php");
?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Suivre réservations</title>
 <link rel="stylesheet" href="admineimmo.css" />
  <link rel="stylesheet" href="stylimmo.css" />
</head>
<body  >
<section id='span'>

<a class="app"  href="reserverimmo.php"> Retour</a>
<a class="app" href="connexionMin.php"> Se déconnecter</a>
		
		
</section>
<header>
	
<img id ='b' src  ="im1.png"/>


	</header>
	<?php
	
		$client=$_SESSION['login'];
	
	$bd= new PDO("mysql:host=localhost;dbname=immobilier","root","");
	if($bd)
    $r=$bd->query("select * from reservation where idClient='$client' "); 

	   while($ligne=$r->fetch()) 
	   {
			$id=$ligne['idReservation'];
			$bien=$ligne['idBien'];
			$date=$ligne['date'];
			$etat=$ligne['etat'];
			$i=$ligne["image"];
		echo"<div id='di'>";
       echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
		echo'<span style="font-size:250%;color:black;">Date:</span><span style="font-weight:bold;font-size:30px;color:black;">'.$date.'<br/></span>';
		if($etat=="valider")
		echo'<span style="font-size:250%;color:back;">Etat:</span><span style="color:green;font-weight:bold;font-size:40px;">'.$etat.'<br/></span>';
	    else
		echo'<span style="font-size:250%;color:black;">Etat:</span><span style="color:red;font-weight:bold;font-size:40px;">'.$etat.'<br/></span>';
		echo"</div>";


       }
	?>

		