<?php

	$nom=$_POST["nom"];
	$passe=$_POST["passe"];
	$authentifie=false;
	include_once("connexionbdd.php");
	$_SESSION["auth"]="";
	if ($connect==true)
	{ // recopié p29
		
		$requete="select prenom from etudiant where nom=? ";
			
		if ($reponse=$bdd->prepare($requete))
		{
			if (@$reponse->execute(array($nom)))
			{
				while($ligne=$reponse->fetch(PDO::FETCH_NUM))
				{
					if ($ligne[0]==$passe)
					{
						$authentifie=true;
						$_SESSION["auth"]=$nom;
						$page=1;
						break;
					}
				}
				$reponse->closeCursor();
			}
			else
			{
				echo "<h6>erreur execute requete : $requete</h6>";
			}
		}
		else
		{
			echo "<h6>erreur requete : $requete</h6>";
		}
	
		
	}
	else
		echo "<h4>erreur connexion à la base</h4>";
	
	if($authentifie==true)
		$resultat="authentification OK";
	else
		$resultat="authentification ECHEC";

?>
