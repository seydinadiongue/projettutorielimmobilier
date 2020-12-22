

<?php
session_start();
$_SESSION['login']=null;
?>
<!DOCTYPE html>
<html>
   <head>
   <style>
   #contenu
   {
	   margin-top:15px;
	 
   }
   </style>
		<link rel="stylesheet" href= "inscriptionimmo.css?<?php echo time();?>" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="JS/jquery-3.4.1.min.js"> </script>
		<script src="JS/bootstrap.min.js"></script>
   <meta charset="utf-8" />
    <title>connexion</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="pp.css"/>
    <link href="bootstrap-4.1.1-dist/css/bootstrap.css" rel="stylesheet">
   <link href="bootstrap-4.1.1-dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<header id="header1">

</header>
<body>
<div id="contenu" class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="logi" placeholder="username" required="*">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="psw" placeholder="password" required="*"/>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="valider" class="btn float-right login_btn" class="btn btn-success" required="*"/>
					</div>
                </form>
                </div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					j'ai pas encore de compte?<a href="inscriptionimmo.php">veuillez-vous s'inscire </a>
				</div>
			</div>
		</div>
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

	<?php
if(isset ($_POST['logi']) AND isset( $_POST['psw']))
{
$a= $_POST['logi']	;$b= $_POST['psw'];


$bd= new PDO("mysql:host=localhost;dbname=immobilier","root","");
if($bd){
if(($a=='seydina') and ($b=='diongue'))
{
	$_SESSION['login']="seydina";
	//var_dump($_SESSION['login']);
	header("Location:adminimmo.php");
}



$q12a= "select * from client ";
$q112a=$bd->query($q12a);
while($ligne2a=$q112a->fetch()){
$idClient=$ligne2a['idClient'];



$q12= "select * from agent ";
$q112=$bd->query($q12);
while($ligne2=$q112->fetch()){
$idAgent=$ligne2['idAgent'];

$q1= "select * from compte ";
$q11=$bd->query($q1);
while($ligne=$q11->fetch()){
$mdp=$ligne['mdp'];
$login=$ligne['login'];
$etat=$ligne['etat'];

 if(($a==$login) and ($b==$mdp) and ($etat=="actif")
	 and ($a==$idClient))

	 { 
		$_SESSION['login']=$a;
		 header("Location:reserverimmo.php");
	 }
   
   
   
  else if(($a==$login)  && ($a==$idAgent) &&
 ($b==$mdp) && ($etat=="actif"))
 {
	 $_SESSION['login']=$login;
	 header("Location:accueilagentimmo.php");
 }

 

}

}}}}

?>

</html>

