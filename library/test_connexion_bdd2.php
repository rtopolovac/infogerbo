<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Backo office INFOGER - Test connexion BDD</title>

  </head>
   <body>
     
	<?php
	// Inclure le fichier bdd_infoger.php pour pourvoir utiliser les méthodes de ce fichier					
	require 'bdd_infoger.php';	
	

	// Connexion à la BDD
echo "REQUIRE OK ";				
		$infoger_bdd = new BDD_infoger();
echo "NEW OK ";					
		// Connexion à la BDD
		$infoger_bdd->Connexion();
echo "AVANGT TEST CONNECT ";

	if ($infoger_bdd->isConnected()) 
		echo "La connexion à la BBD à réuissi :)";
	else
		echo "\nLa connexion à la BBD à ECHOUE !!!";
		
		

?>

    
  </body>
</html>