
<h4>Authentification</h4>
<hr/>

<form id="form0" action="index.php?page=0" method="post">
<p><label>Nom</label><input type="text" name="nom" value="<?php echo $nom;?>" /></p>
<p><label>Mot de passe</label><input type="text" name="passe" value="<?php echo $passe;?>" /></p>
<p><label></label><input type="submit" name="authentifier" value="Connexion" /></p>
</form>

<?php
echo "<h4>$Resultat</h4>";
?>