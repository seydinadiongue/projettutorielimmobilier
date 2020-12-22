
<?php
session_start();
if($_SESSION['login']==null)
	header("Location:connexionMin.php");
?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Faire vos réservations</title>
 <script src="jquery-3.4.1.min.js"></script>
 <link rel="stylesheet" href="indeximmo.css" />
</head>
<style>
#sui{color:navy;background-color:white;border:1px solid blue;}
#sui:hover{color:white;background-color:blue;}
</style>
<body >


<a  class='app'href="connexionMin.php" >Se Déconnecter</a>

<section id='span'>

<a  id="sui" class='gfi'href="suivreimmo.php"  >Consulter mes reservation</a>
		
		
</section>
<header>
	
<img id ='b' src  ="im1.png"/>

<

	</header>
	

<?php
	$con=new PDO("mysql:host=localhost;dbname=immobilier","root","");
	$req='select * from bien where etat like "disponible" ';
	$res=$con->query($req);
	while($resultat=$res->fetch())
	{
		$i=$resultat['image'];
		echo'<div  id="di" style="margin-bottom:20px;margin-top:20px;margin-left:20px;">';
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
		echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
		echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
		echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
		echo'<form method="post" action="detailimmo.php"  style="margin-left:60px;margin-top:5px;" > ';
		echo'<input  type="hidden" name="decription" value='.$resultat["description"].' />
		     <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
			 <input type="hidden" name="image" value='.$resultat["image"].' />
			<input id="su" type="submit" value="Plus d\'informations" style="background:blue;color:white;
			 border-radius:10px;margin-top:10px;margin-bottom:10px;font-weight:bold;height:30px;"/></form>'; 
		
		echo"<br>";
		echo'<form  method="post" action=""  style="margin-left:100px;margin-top:5px;" > ';
		echo'<input type="hidden" name="id" value="'.$resultat["idBien"].'" />
		 <input type="hidden" name="image" value='.$resultat["image"].' />
		  <input type="hidden" name="cli" value='.$_SESSION["login"].' />
		 <input type="submit" value="Réserver" style="background:blue;border-radius:10px;font-weight:bold; margin-bottom:20px;color:white;height:30px;" id="ad"/></form>'; 
       echo"</div>";
	}
	if(isset($_POST["id"]))
	{
		$s=$_SESSION["login"];
		//$ndey=$con->exec("insert into reservation (idClient) value('$s')");
		//if($ndey)
	$re=$con->prepare("insert into reservation (idBien,date,image,etat,idClient) values(?,?,?,?,?)");
	//$date=date("H:i:s");
	//$jour=date("y/m/d");
	
	
	
	
$jour=Date("y/m/d");




date_default_timezone_set("UTC");
$date=Date("H:i:s");






	$a="en attente";
	$re->execute(array($_POST["id"],$jour,$_POST["image"],$a,"$s"));
	
	}
	
	?>
	
	
	<script>
	$('input').click(function()
	{
	if($(this).val()=="Réserver")
		return confirm("Vous Confirmez la reservation ? ");
	
	

	}
	);
	</script>


</body>
</html>