<?php

// connexion à la bdd

try
{
	$bdd=new PDO('mysql:host=localhost;dbname=absence','root',"");
	$bdd->exec("set character set utf8");
	
	$connect=true;
}
catch(Exception $e)
{
	$connect=false;
}

?>