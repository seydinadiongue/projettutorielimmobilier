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
  <link rel="stylesheet" href="stylimmo.css" />
</head>
<body >
<section id='span'>

 <a class="app"   href="adminimmo.php"> Retourne</a>

   
    
</section>
<header>
  
<img id ='b' src  ="im1.png"/>
</header>

    <section id='span'>
    <a  class="gfi" class="ch" href="reservationimmo.php" > Réservations</a>
        <a  class="gfi" class="ch" href="locationimmo.php" >location </a>
    <a class="gfi"  class="ch" href="bienimmo.php" >Biens </a>
    <a  class="gfi" class="ch"  href="agentimmo.php" >Gestion Agent</a>
     <a  class="gfi" class="ch"  href="clientimmo.php" >Gestion Client</a>
    <a class="gfi" href="ajoutimmo.php" >Ajouter Bien  </a>
   
    </section>
  

  
   <?php
    $con=new PDO("mysql:host=localhost;dbname=immobilier","root","");
    $a='SELECT * FROM compte c join agent a where a.idAgent=c.login';
      $re=$con->query($a);
    echo"<table><thead> <th>pseudo</th> <th>Prenom</th> <th>Nom</th> <th>Adresse</th> <th>Téléphone</th> <th>Etat Actuel</th> <th>Modifier Etat</th> </thead>";
    while($res=$re->fetch())
    {
      echo"<tr>";
      echo'<td>'.$res["idAgent"].' </td>';
      echo'<td>'.$res["prenom"].' </td>';
      echo'<td>'.$res["nom"].' </td>';
      echo'<td>'.$res["adresse"].' </td>';
      echo'<td> '.$res["telephone"].'</td>';
      echo'<td> '.$res["etat"].'</td>';
      echo'<td>';
      if($res["etat"]=="actif")
    {
      echo" <form  method='post' action='activerimmo.php' >";
    echo '<input type="hidden" name="pseudo" value='.$res["login"].' />';
    echo '<input type="hidden" name="etat" value="oui" />';
    echo "<span><input type='submit'  value='Désactiver' style='background:red;color:white;width:120px;height:40px;border-radius:10px;font-size:20px; ' />  </span>
    </form>";
    }
    else
    {
      echo" <form method='post' action='activerimmo.php' >";
    echo '<input type="hidden" name="pseudo" value='.$res["login"].' />';
    echo '<input type="hidden" name="etat" value="non" />';
    echo "<span><input type='submit'  value='Activer' style='background:blue;color:white;width:120px;height:40px;border-radius:10px;font-size:20px; ' /> </span>
    </form>";
     }       
      
      
      
      echo"'</td></tr>";
    }
    echo"</table>";
      
  ?>
  
  <script>
  $('input').click(function()
  {
  if($(this).val()=="Désactiver")
  return confirm("Voulez vous vraiment le désactiver ?");
  }
  );
  </script>

  
</body>
</html>