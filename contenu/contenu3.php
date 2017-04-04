<?php
if (isset($_POST["filtrer"]))
{
	$dept=$_POST["dept"];
}
else
{
$dept="";
}

?>
			
<form action="index.php?page=3" method="post">
<p><label>N° dept</label><input type="text" name="dept" value="<?php echo $dept;?>" />
<input type="submit" name="filtrer" value="Filtrer" /></p>
</form>				
	<hr/>			
<?php

// connexion à la bdd

include_once("connexionbdd.php");

	if ($connect==true)
	{ // recopié p20
		if ($dept!="")
			$requete="select * from etudiant  where codepostal like '$dept%'";
		else
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
				for ($i=0;$i<$nbcol;$i++)
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