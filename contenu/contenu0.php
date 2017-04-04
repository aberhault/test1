
<h4>Authentification</h4>
<hr/>

<form id="form0" action="index.php?page=0" method="post">
<p><label>Nom</label><input type="text" name="nom" value="<?php echo $nom;?>" /></p>
<p><label>passe</label><input type="text" name="passe" value="<?php echo $passe;?>" /></p>
<p><label>Action</label><input type="submit" name="authentifier" value="Vérifier" /></p>
</form>

<?php
echo "<h4>$resultat</h4>";
?>