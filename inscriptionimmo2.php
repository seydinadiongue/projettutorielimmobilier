<?php
  if(isset($_POST['nu']) and  isset($_POST['mdp'])
    and isset($_POST['mdp1']) and isset($_POST['prenom'])
  and isset($_POST['nom']) and isset($_POST['adresse']) 
  and isset($_POST['telephone']))
   {
     $prenom=$_POST['prenom']; $nom=$_POST['nom']; $adresse=$_POST['adresse'];
   $telephone=$_POST['telephone'];
     $nu=$_POST['nu'];$mdp=$_POST['mdp'];
     $mdp1=$_POST['mdp1'];
     
     if(($prenom!=null ) and  ($nom!=null ) and  ($adresse!=null )
       and  ($telephone!=null ) and  ($nu!=null ) and  ($mdp!=null )
     and  ($mdp1!=null ) ){
       if ($mdp==$mdp1){
     $bd= new PDO("mysql:host=localhost;dbname=immobilier","root","");
  if($bd)
    $r=$bd->exec("insert into compte value ('$nu','$mdp','Non actif')");
  if($r){
    $rr=$bd->exec("insert into agent value ('$nu','$prenom','$nom','$adresse','$telephone')");
    if($rr)
      echo"<script> alert('Inscription réussie !!!');</script>";
    
  } }}}
 ?>
  <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Inscription agent</title>
    <link rel="stylesheet" href= "inscriptionimmo.css?<?php echo time();?>" />
    
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script type="text/javascript" src="JS/jquery-3.4.1.min.js"> </script>
    <script src="JS/bootstrap.min.js"></script>
    <style>
#im
{
  width:30%;
  margin:auto;
  margin-top:15px;
}
  </style> 
  </head>
  <header>
  <ul id="menu">
      <li><a href="#"> <i data-feather="align-justify"></i>Menu</a>

             <ul>
                <li><a href="accueilimmo1.php">les biens disponibles</a></li>
                <li><a href="Authentification.php">Mon espace profestionnel</a></li>
               <li><a href="contactimmo.php">nous contacter</a></li>
             </ul>
        </li>
    <div id="ecart">
    
                <li><a href="Authentification.php"> <i data-feather="user"></i>  </a></li>


    </div>
  </ul>
  </header>
  <body>
   <div id="conteneur">
    <div id='im' class="card-body">

 
  
  <form  class="well" method="POST" action="" >
  
  <div id="service" >
   
  

 
  <label for="prenom"> Prenom: </label>
  <input type="text" class="form-control"  name="prenom" id="prenom" placeholder="donner votre prenom "required="*"/>
 
  
  <label for="nom"> Nom: </label>
  <input type="text" class="form-control"  name="nom" id="nom" placeholder="donner votre nom "required="*"/>
  
 <label for="adresse"> Adresse: </label>
  <input type="text" class="form-control"  name="adresse" id="adresse" placeholder="donner votre adresse "required="*" />
  
  <label for="telephone"> Telephone: </label>
  <input  type="text" class="form-control"  name="telephone" pattern="^7([7806])[0-9]{7}" id="telephone" placeholder="saisir votre numero de tel "required="*" />
 
  <label for="username"> Username: </label>
  <input type="text" class="form-control"  name="nu" id="username" placeholder="choisir votre nom d'utilisateur "required="*"/>
  
  <label for="pwd"> Mdp: </label>
  <input type="password" class="form-control"  name="mdp" id="pwd" placeholder="choisir un mot de passe"required="*" />
 

 
  <label for="tel"> Confirmer: </label>
  <input type="password" class="form-control"  name="mdp1" id="tel"placeholder="confimer votre mot de passe " required="*" /></br>
 
  
  
  
  <input class="btn btn-success" type="submit" value="Valider" name="con" id="ajouter" required="*" style="" / > 
    </div>
   
   
  </form>
   </div>
  
 
  </div>
          
    
  </body>
<footer>
  <div id="middle">
           <a  class="btt" href="#"> <i     data-feather="facebook"></i></a>
           <a class="btt" href="#"> <i    data-feather="instagram"></i></a>
           <a class="btt"   href="#"> <i    data-feather="twitter"></i></a>
           <a class="btt" href="#"> <i     data-feather="youtube"></i></a>
  
   </div>
  
  </footer>
  
  </script>
  <script type="text/javascript" src="js/feather.min.js"></script>
  <script type="text/javascript">
    feather.replace();
  </script>


</html>
