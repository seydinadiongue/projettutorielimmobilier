<?php
session_start();

if($_SESSION['login']==NULL)
  header("Location:connexionMin.php");
?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Accueil agent</title>
 <link rel="stylesheet" href="admineimmo.css" />
</head>
<body >
<section id='span'>
<a class="app"  href="accueilagentimmo.php"> Retour</a>

   
    
</section>
<header>
  
<img id ='b' src  ="im1.png"/>
</header>

    <section id='span'>
    <a  class="gfi" class="ch" href="modifierprofilimmo.php" > Modifier profil </a>
        <a  class="gfi" class="ch" href="reservationimmo.php" >Réservations </a>
    <a class="gfi"  class="ch" href="locationimmo.php" >location </a>
    <a  class="gfi" class="ch"  href="bienimmo.php" > Biens</a>
    <a class="gfi" class="ch"  href="connexionMin.php"> Se déconnecter</a>
     <a class="gfi" href="ajoutimmo.php" >Ajouter Bien  </a>
    </section>
  

  
   <?php
      $con=new PDO("mysql:host=localhost;dbname=immobilier","root","");
      $req="select * from reservation where etat='en attente'";
      $res=$con->query($req);
      while($r=$res->fetch())
      {
        $i=$r["image"];
      echo'<div id="di" style="height:480px;">';
            
      
    
    echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
      
      echo'<span style="font-size:200%;color:black;">Numéro Client:'.$r["idClient"].'<br/>';
      echo'Date:'.$r["date"].'<br/></span>';
      
      echo'<form style="display:inline-block;" id="f2" method="post" action="valideimmo.php" >';
      echo'<input id="f3" type="hidden" name="et" value='.$r["idReservation"].' />
        <input type="hidden" name="id" value='.$r["idBien"].' />
        <input type="hidden" name="image" value='.$r["image"].' />
        <input type="hidden" name="date" value='.$r["date"].' />
        <input type="hidden" name="idClient" value='.$r["idClient"].' />
        <input type="submit" value="valider" style="background:blue;border-radius:10px;
        color:white;margin-bottom:20px;margin-left:30px;margin-top:20px;height:190%;padding-bottom:10px;padding-top:10px;width:100%;font-size:110%;" />
        </form>';
      echo'<form  style="display:inline-block;"   method="post" action="jetimmo.php">';
      echo'<input type="hidden" name="etat" value='.$r["idReservation"].' />
        <input type="submit" value="Rejeter" style="background:red;border-radius:10px;\


\        color:white;margin-bottom:20px;margin-left:80px;
  margin-top:0px;height:170%;padding-bottom:10px;
  padding-top:10px;width:52%;font-size:120%;" />
        </form>';
            echo"</div>";     
        
      }
        
    ?>
    
    <script>
  $('input').click(function()
  {
  if($(this).val()=="Rejeter")
  return confirm("Voulez vous vraiment rejeter ?");
  }
  );
  </script>
  
  
  
    <script>
  $('input').click(function()
  {
  if($(this).val()=="valider")
  alert("Reservation validée avec succés ?");
  }
  );
  </script>

</body>
</html>
  