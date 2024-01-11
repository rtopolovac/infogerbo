<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Backo office INFOGER - Test connexion BDD</title>

  </head>
   <body>
     
	<?php						
	require 'bdd_manager.php';	
	

	// Connexion à la BDD
	$infoger = new BDDManager();

	$infoger->ConnexionBDD("localhost", "infoger_user1", "123456+azerty", "infoger");
	
	if ($infoger->isConnected()) 
		echo "La connexion à la BBD à réuissi :)";
	else
		echo "\nLa connexion à la BBD à ECHOUE !!!";
		
		

?>

    
  </body>
</html>