<?php
session_start();
if($_SESSION['login']==NULL)
	header("Location:connexionMin.php");
?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Supprimer</title>
 <link rel="stylesheet" href="admine.css" />
</head>

<?php
$con=new PDO("mysql:host=localhost;dbname=immobilier","root","");
if(isset($_POST["idBien"]))
	{
		$var=$_POST["idBien"];
		$a=$con->prepare("delete from reservation where idBien=?");
		$a->execute(array($var));
		
		$x=$con->prepare("delete from bien where idBien=?");
        $x->execute(array($var));
	
		
		header("location:bienimmo1.php");
	}
	?>
	</body>
</html>