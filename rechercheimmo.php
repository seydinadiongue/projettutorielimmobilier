
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Recherche Bien</title>
 <link rel="stylesheet" href="admineimmo.css" />
</head>
<body >
<section id='span'>
<p><a class='app'href="accueilimmo1.php" >Retour</a>
		
</section>
	<header>
<img id ='b' src  ="im1.png"/>


	</header>
<?php
	$con=new PDO("mysql:host=localhost;dbname=immobilier","root","");
	if(isset($_POST["type"]) || isset($_POST["adresse"]) ||  isset($_POST["prix"]))
	{
		$type=$_POST["type"];
		$adresse=$_POST["adresse"];
		$prix=$_POST["prix"];
		
			if(!empty($type) and !empty($adresse) and !empty($prix))
			{
				$prix_max=$prix+10000;
				$prix_min=$prix-10000;
				$req='select * from bien where etat like "disponible" and  type like "'.$type.'" and adresse like "'.$adresse.'" and prix between '.$prix_min.' and '.$prix_max.'';
				$res=$con->query($req);
				if($prix>0)
				while($resultat=$res->fetch())
	{$i=$resultat['image'];
		echo'<div id="di" >';
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
					echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
					echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
					echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
					echo'<form method="post" action="detailimmo.php"  style="margin-left:60px;margin-top:5px;" > ';
					echo'<input type="hidden" name="decription" value='.$resultat["description"].' />
						 <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
						 <input type="hidden" name="image" value='.$resultat["image"].' />
						 <input type="submit" value="plus d\'informations" style="background:blue;
						 border-radius:10px;margin-top:10px;margin-bottom:10px;font-weight:bold;height:30px;margin-left:30px;"/>'; 
					echo"</div>";
				}
		    }
			else if(!empty($type) and !empty($adresse) and empty($prix))
			{
				$req='select * from bien where etat like "disponible" and  type like "'.$type.'" and adresse like "'.$adresse.'" ';
				$res=$con->query($req);
				while($resultat=$res->fetch())
	{$i=$resultat['image'];
		echo'<div id="di" >';
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
					echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
					echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
					echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
					echo'<form method="post" action="detailimmo.php"  style="margin-left:60px;margin-top:5px;" > ';
					echo'<input type="hidden" name="decription" value='.$resultat["description"].' />
						 <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
						 <input type="hidden" name="image" value='.$resultat["image"].' />
						 <input type="submit" value="plus d\'informations" style="background:blue;
						 border-radius:10px;margin-top:10px;margin-bottom:10px;font-weight:bold;height:30px;margin-left:30px;"/>'; 
					echo"</div>";
				}
			}
				
			else if(!empty($type) and empty($adresse) and !empty($prix))
		    {
				$prix_max=$prix+10000;
			$prix_min=$prix-10000;
			$req='select * from bien where etat like "disponible" and  type like "'.$type.'" and prix between '.$prix_min.' and '.$prix_max.'';
			$res=$con->query($req);
			    if($prix>0)
				while($resultat=$res->fetch())
				{
					$i=$resultat['image'];
		echo'<div id="di" >';
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
					echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
					echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
					echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
					echo'<form method="post" action="detailimmo.php"  style="margin-left:60px;margin-top:5px;" > ';
					echo'<input type="hidden" name="decription" value='.$resultat["description"].' />
						 <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
						 <input type="hidden" name="image" value='.$resultat["image"].' />
						 <input type="submit" value="plus d\'informations" style="background:blue;
						 border-radius:10px;margin-top:10px;margin-bottom:10px;font-weight:bold;height:30px;margin-left:30px;"/>'; 
					echo"</div>";
				}
			
			}
			else if(empty($type) and !empty($adresse) and !empty($prix))
		    {
				$prix_max=$prix+10000;
			$prix_min=$prix-10000;
			$req='select * from bien where etat like "disponible" and  adresse like "'.$adresse.'" and prix between '.$prix_min.' and '.$prix_max.'';
			$res=$con->query($req);
			    if($prix>0)
				while($resultat=$res->fetch())
				{
					$i=$resultat['image'];
		echo'<div id="di" >';
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
					echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
					echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
					echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
					echo'<form method="post" action="detailimmo.php"  style="margin-left:60px;margin-top:5px;" > ';
					echo'<input type="hidden" name="decription" value='.$resultat["description"].' />
						 <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
						 <input type="hidden" name="image" value='.$resultat["image"].' />
						 <input type="submit" value="plus d\'informations" style="background:blue;
						 border-radius:10px;margin-top:10px;margin-bottom:10px;font-weight:bold;height:30px;margin-left:30px;"/>'; 
					echo"</div>";
				}
			}
			else if(!empty($type) and empty($adresse) and empty($prix))
		    {
				
			$req='select * from bien where etat like "disponible" and  type like "'.$type.'" ';
			$res=$con->query($req);
				while($resultat=$res->fetch())
				{
					$i=$resultat['image'];
		echo'<div id="di" >';
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
					echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
					echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
					echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
					echo'<form method="post" action="detailimmo.php"  style="margin-left:60px;margin-top:5px;" > ';
					echo'<input type="hidden" name="decription" value='.$resultat["description"].' />
						 <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
						 <input type="hidden" name="image" value='.$resultat["image"].' />
						 <input type="submit" value="plus d\'informations" style="background:blue;
						 border-radius:10px;margin-top:10px;margin-bottom:10px;font-weight:bold;height:30px;margin-left:30px;"/>'; 
					echo"</div>";
				}
			}
			else if(empty($type) and !empty($adresse) and empty($prix))
		    {

			$req='select * from bien where etat like "disponible" and  adresse like "'.$adresse.'" ';
			$res=$con->query($req);
				while($resultat=$res->fetch())
				{
					$i=$resultat['image'];
		echo'<div id="di" >';
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
					echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
					echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
					echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
					echo'<form method="post" action="detailimmo.php"  style="margin-left:60px;margin-top:5px;" > ';
					echo'<input type="hidden" name="decription" value='.$resultat["description"].' />
						 <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
						 <input type="hidden" name="image" value='.$resultat["image"].' />
						 <input type="submit" value="plus d\'informations" style="background:blue;
						 border-radius:10px;margin-top:10px;margin-bottom:10px;font-weight:bold;height:30px;margin-left:30px;"/>'; 
					echo"</div>";
				}
			}	
			else if(empty($type) and empty($adresse) and !empty($prix))
		    {
				$prix_max=$prix+10000;
			$prix_min=$prix-10000;
			$req='select * from bien where etat like "disponible" and  prix  between '.$prix_min.' and '.$prix_max.'';
			$res=$con->query($req);
			    if($prix>0)
				while($resultat=$res->fetch())
				{
					$i=$resultat['image'];
		echo'<div id="di" >';
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
					echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
					echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
					echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
					echo'<form method="post" action="detailimmo.php"  style="margin-left:60px;margin-top:5px;" > ';
					echo'<input type="hidden" name="decription" value='.$resultat["description"].' />
						 <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
						 <input type="hidden" name="image" value='.$resultat["image"].' />
						 <input type="submit" value="plus d\'informations" style="background:blue;
						 border-radius:10px;margin-top:10px;margin-bottom:10px;font-weight:bold;height:30px;margin-left:30px;"/>'; 
					echo"</div>";
				}
			}
	}
	
	
	
	
	?>
	</body>
</html>