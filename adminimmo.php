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
 <link rel="stylesheet" href="admineimmo.css" />
</head>
<body >
<section id='span'>
<a class="app"  href="accueilimmo1.php"> Recherche</a>
 <a class="app"   href="connexionMin.php"> Se déconnecter</a>

   
    
</section>
<header>
  
<img id ='b' src  ="im1.png"/>
</header>

    <section id='span'>
    <a  class="gfi" class="ch" href="reservationimmo1.php" > Réservations</a>
        <a  class="gfi" class="ch" href="locationimmo1.php" >location </a>
    <a class="gfi"  class="ch" href="bienimmo1.php" >Biens </a>
    <a  class="gfi" class="ch"  href="agentimmo.php" >Gestion Agent</a>
     <a  class="gfi" class="ch"  href="clientimmo.php" >Gestion Client</a>
    <a class="gfi" href="ajoutimmo1.php" >Ajouter Bien  </a>
   
    </section>
  

  
    <?php
  $con=new PDO("mysql:host=localhost;dbname=immobilier","root","");
  $req='select * from bien ';
  $res=$con->query($req);
  while($resultat=$res->fetch())
  {$i=$resultat['image'];
    echo'<div id="di" >';
    echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
    
    echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
    echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
    echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
    echo'<form method="post" action="detailimmo.php"  style="margin-left:15px;margin-top:5px;" > ';
    echo'<input type="hidden" name="decription" value='.$resultat["description"].' />
         <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
       <input type="hidden" name="image" value='.$resultat["image"].' />
       <input type="submit" value="Plus d\'informations" style="background:blue;color:white;
       border-radius:10px;margin-top:10px;margin-bottom:10px;font-weight:bold;height:30px;"/></form>'; 
    echo"</div>";
  }
  ?>
  
</body>
</html>