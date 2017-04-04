<?php

if (isset($_GET["id"]))
{
	$id=$_GET["id"];
    $nom=$_GET["nom"];
	$prenom=$_GET["prenom"];
	$codepostal=$_GET["codepostal"];
	$ville=$_GET["ville"];
	$photo=$_GET["photo"];
	$entreprise=$_GET["entreprise"];
	$tuteur=$_GET["tuteur"];
}
else
{
$id="";
$nom="";
$prenom="";
$codepostal="";
$ville="";
$photo="";
$entreprise="";
$tuteur="";
}

// connexion à la bdd
include_once("connexionbdd.php");
$req="";

if($_POST)
{
    $id=$_POST["id"];
    $nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$codepostal=$_POST["codepostal"];
	$ville=$_POST["ville"];
	$photo=$_POST["photo"];
	$entreprise=$_POST["entreprise"];
	$tuteur=$_POST["tuteur"];
    
if(isset($_POST['insert']))
{
    $req="INSERT INTO etudiant (nom, prenom, codepostal, ville, photo, entreprise, tuteur) VALUES ('$nom', '$prenom', '$codepostal', '$ville', '$photo', '$entreprise', '$tuteur')";
}

if(isset($_POST['update']))
{
    $req="UPDATE etudiant SET nom='$nom', prenom='$prenom', codepostal='$codepostal', ville='$ville', photo='$photo', entreprise='$entreprise', tuteur='$tuteur' where id='$id'";

}

if(isset($_POST['delete']))
{
    $req="DELETE from etudiant where id='$id'";
}

if($result=$bdd->prepare($req))
{
    if(@$result->execute())
    {
        echo 'Succès';
    }
    else 
    {
        echo 'Echec';
    }
}
}

?>
			
<form id=form1 action="index.php?page=2" method="post">
<p><label>ID</label> <input type="text" name="id" value="<?php echo $id;?>" /></p>
<p><label>Nom</label> <input type="text" name="nom" value="<?php echo $nom;?>" /></p>
<p><label>Prénom</label> <input type="text" name="prenom" value="<?php echo $prenom;?>" /></p>
<p><label>Code Postal</label> <input type="text" name="codepostal" value="<?php echo $codepostal;?>" /></p>
<p><label>Ville</label> <input type="text" name="ville" value="<?php echo $ville;?>" /></p>
<p><label>Photo</label> <input type="text" name="photo" value="<?php echo $photo;?>" /></p>
    
<p><label>Entreprise</label>
<select name="entreprise">
    <?php

    if ($connect==true)
	{ // recopié p20
		$requete="select * from entreprise";
			
		if ($reponse=$bdd->query($requete))
		{
			while($ligne=$reponse->fetch(PDO::FETCH_NUM))
			{
                if ($ligne[0]==$entreprise) {
                    echo " <option value=".$ligne[0]." selected>".$ligne[0].": ".$ligne[1].": ".$ligne[2].": ".$ligne[3]."</option>";

                }
                else {
					echo " <option value=".$ligne[0].">".$ligne[0].": ".$ligne[1].": ".$ligne[2].": ".$ligne[3]."</option>";
                }
            }
			$reponse->closeCursor();
        }
		else
		{
			echo "<h6>erreur requete : $requete</h6>";
		}
	}
	else
		echo "<h4>erreur connexion à la base</h4>";
        
    ?>
</select>
</p>
    
    
<p><label>Tuteur</label> 
<select name="tuteur">
    <?php

    if ($connect==true)
	{ // recopié p20
		$requete="select * from contact";
			
		if ($reponse=$bdd->query($requete))
		{
			while($ligne=$reponse->fetch(PDO::FETCH_NUM))
			{
                if ($ligne[0]==$tuteur) {
                    echo " <option value=".$ligne[0]." selected>".$ligne[0].": ".$ligne[1].": ".$ligne[2]."</option>";

                }
                else {
					echo " <option value=".$ligne[0].">".$ligne[0].": ".$ligne[1].": ".$ligne[2]."</option>";
                }
            }
			$reponse->closeCursor();
        }
		else
		{
			echo "<h6>erreur requete : $requete</h6>";
		}
	}
	else
		echo "<h4>erreur connexion à la base</h4>";
        
    ?>
</select>  

</p>
</br>
<p><label>Action</label> <input type="submit" name="insert" value="Insérer" />
<input type="submit" name="update" value="Modifier" />
<input type="submit" name="delete" value="Supprimer" /></p>
</form>	
</br>
	
<?php

	if ($connect==true)
	{ // recopié p20
		$requete="select * from etudiant";
			
		if ($reponse=$bdd->query($requete))
		{
			$nbcol=$reponse->columnCount();
			echo '<table id="listing">';
			echo '<caption>table étudiant</caption>';
			//copie p22
			echo '<tr>';
			for ($i=0;$i<$nbcol;$i++)
				{
					$col=$reponse->getColumnMeta($i);
					echo "<th>".$col["name"]."</th>";
				}
			echo '</tr>';
			while($ligne=$reponse->fetch(PDO::FETCH_NUM))
			{
				echo "<tr>";
                //identifier la première cellule et récupérer valeur si on clique sur l'ID grace a un lien
            $parametre='id='.$ligne[0].'&nom='.$ligne[1].'&prenom='.$ligne[2].'&codepostal='.$ligne[3].'&ville='.$ligne[4].'&photo='.$ligne[5].'&entreprise='.$ligne[6].'&tuteur='.$ligne[7];
                $p=$parametre;
                echo '<td><a href="index.php?page=2&'.$p.'">'.$ligne[0].'</td>';
				for ($i=1;$i<$nbcol;$i++)
				{
					echo "<td>".$ligne[$i]."</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
			$reponse->closeCursor();
			
		}
		else
		{
			echo "<h6>erreur requete : $requete</h6>";
		}
	
		
	}
	else
		echo "<h4>erreur connexion à la base</h4>";


?>