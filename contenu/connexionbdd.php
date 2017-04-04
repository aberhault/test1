<?php

// connexion à la bdd

try
{
	$bdd=new PDO('mysql:host=mysql.test1.svc;dbname=absence','root',"Bt+4ez9h");
	$bdd->exec("set character set utf8");
	
	$connect=true;
}
catch(Exception $e)
{
	$connect=false;
}

?>