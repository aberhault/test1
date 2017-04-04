<?php
session_start();


if (isset($_GET["logout"]))
{
	$_SESSION["auth"]="";
	$page=0;
}


if (isset($_GET["page"]))
{
	$page=$_GET["page"];
}
else
{
	$page=0;
}

if (isset($_POST["authentifier"]))
{
	include_once("contenu/authentification.php");
}
else
{
$nom="";
$passe="";
$resultat="";
}

if (!isset($_SESSION["auth"]))
{
	$_SESSION["auth"]="";
}


$auth=$_SESSION["auth"];

if ($auth=="")
{
	
	$page=0;
}
else
{
	$maxi=4;
}

?>



<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>ABSENCE LP ASUR</title>
		<link rel="stylesheet" href="annexe/style.css">
		<link rel="stylesheet" href="contenu/style<?php echo $page; ?>.css">
		<script>
			function LireDate(){
			var dt=new Date();
			var cal=""+ dt.getDate()+"/"+(dt.getMonth()+1)+ "/" +dt.getFullYear(); 

			document.getElementById('heure').innerHTML=cal;
			}
		</script> 
	</head>
	<body onLoad="LireDate()">
		<section id="ensemble">
			<header id="entete">
				<img class="droite" src="annexe/logort.gif">
				<img class="gauche" src="annexe/logouniv.png">
				<h1>accueil <?php echo $_SESSION["auth"]; ?></h1>
			</header>
			<nav id="menu">
				<span> <?php echo $_SESSION["auth"]; ?></span>
				<ul>
				
				
				<?php
				
				if ($_SESSION["auth"]=="")
				{
					echo '<li class="actif"><a  href="index.php?page=0" >Authentification</a></li>';	
				}
				else
				{
					$menu=array("","photorama","bilan","listing");
					
					echo '<li><a  href="index.php?logout=1" >Logout</a></li>';	
					
					for ($i=1;$i<$maxi;$i++)
					{
						if ($i==$page)
							echo '<li class="actif">';
						else
							echo '<li>';
						echo '<a  href="index.php?page='.$i.'" >'.$menu[$i].'</a></li>'."\n";	
					
					}
				}	
				?>
				</ul>
			</nav>
			<section id="contenu">
				<?php
				include_once("contenu/contenu$page.php");
				?>	
			</section>
			<footer id="pied">
				<a href="page1.html" ><img src="annexe/acceuil.gif"></a>
				<span id="heure">22/09/2012</span>
				<p>LP ASUR TP WEB </p>
				
			</footer>
		</section>
	</body>
</html>