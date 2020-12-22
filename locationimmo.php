<?php
session_start();

if($_SESSION['login']==NULL)
	header("Location:connexionMin.php");
?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Accueil administrateur</title>
 <script src="jquery-3.4.1.min.js"></script>
 <link rel="stylesheet" href="admineimmo.css" />
</head>
<body  >
<section id='span'>
<a class="app"  href="accueilagentimmo.php"> Retour</a>
		
		
</section>
<header>
	
<img id ='b' src  ="im1.png"/>


	</header>

		<section id='span'>
        <a  class="gf" href="reservationimmo.php" >Réservations </a>
		<a id="kal" class="gf" href="locationimmo.php" >location </a>
		<a  class="gf" href="bienimmo.php" > Biens</a>
		<a class="gf" href="modifierprofilimmo.php" >Modifier Profil </a>
		<a class="gf" href="connexionMin.php" > Se deconnecter </a>
		<a class="gf" href="ajoutimmo.php"> Ajout de bien </a>
		</section>
	
	
	
	<?php
			$con=new PDO("mysql:host=localhost;dbname=immobilier","root","");
			$req="select * from location";
			$res=$con->query($req);
			while($r=$res->fetch())
			{
				$i=$r["image"];
			        
				echo'<div id="di" style="height:480px;margin-bottom:20px;margin-top:20px;margin-left:20px;">';
				echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
				echo'<span style="font-size:20px;color:black;">Numéro Location:</span><span style="font-size:18px;color:black;font-weight:bold;">'.$r["idLoc"].'</span>';
				echo'<form method="post" action="locimmo.php" />
				<input type="hidden" name="bien" value='.$r["idBien"].'/>
				<input type="hidden" name="loc" value='.$r["idLoc"].' />
				<br> <br> 
				<input  type="submit" value="Gérer" style="background:blue;color:white;font-weight:bold;margin-bottom:5px;width:220px;border-radius:10px;margin-left:35px;font-size:30px;" />
				</form>';	
				echo'<form method="post" action=""> 
				<input type="hidden" value='.$r["idLoc"].' name="loc" />
				<input type="hidden" value='.$r["idBien"].' name="bien" />
				<br>
				<input type="submit" value="Libérer" style="color:white;background:red;border-radius:10px;margin-left:90px;font-size:30px;"/>
				</form>';
				echo'<form method="post" action="detail_locationimmo.php"> 
				<input type="hidden" value='.$r["idLoc"].' name="loc" />
				<input type="hidden" value='.$r["idBien"].' name="bien" />
			
				</form>';
				echo"</div>";
			}
			if(isset($_POST["loc"]))
			{
				$a='delete from location where idLoc='.$_POST["loc"].'';
				$rek=$con->exec($a);
				
				
				
				
				
				$b='update bien set etat="disponible" where idBien='.$_POST["bien"].'';
				$re=$con->exec($b);
				//header("location:location.php");
			
			
			
			
			}
			
			
				
	?>
	
	
	<script>
	$('input').click(function()
	{
	if($(this).val()=="Libérer")
	return confirm("Voulez vous vraiment libérer ce logement ?");
	}
	);
	</script>
</body>
</html>