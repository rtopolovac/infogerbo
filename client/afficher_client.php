<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Backo office INFOGER - Un client</title>

  </head>
   <body>
     
	<?php						
	// include ('library/bdd_library.php');	
	require 'bdd_manager.php';

	$Id_client = htmlspecialchars($_GET["Id_client"]);

	if ($Id_client)
	{
		// Connexion à la BDD
		$pdo=new BDDManager("localhost", "infoger_user", "123456+azerty", "infoger");	
		if ($pdo->isConnected()){
			// Requêtes SQL pour avoir la certains élément dans différente table
			$tabClient = SelectBDD($pdo, "SELECT nom_entreprise, adresse_entreprise, nom_referent FROM client WHERE Id_client =".$Id_client);
			$tabCat = SelectBDD($pdo, "SELECT Id_categorie, nom_categorie FROM categorie");
				
			if (count($tabClient) > 0)
			{
				echo '<TABLE border="1">';
				
				// Boucle d'affichage du tableau des clients	
				for ($i=0;$i<count($tabClient);$i++)
				{
					echo "<TR>";
					echo '<TD>'.$tabClient[$i]['nom_entreprise'].'</TD>';
					echo "</TR>";
					echo "<TR>";
					echo '<TD>'.$tabClient[$i]['adresse_entreprise'].'</TD>';
					echo "</TR>";
					echo "<TR>";
					echo '<TD>'.$tabClient[$i]['nom_referent'].'</TD>';
					echo "</TR>";
				
				}
				echo "</TABLE>";
				echo "<br>";	
			}

			if (count($tabCat) > 0)
			{
				echo '<TABLE border="1">';
				// Boucle d'affichage du tableau des Catégories
				for ($i=0;$i<count($tabCat);$i++)
				{
					echo "<TR>";
					echo '<TD>'.'<A HREF="afficher_client.php?Id_client='.$tabCat[$i]['Id_categorie'].'">'.$tabCat[$i]['nom_categorie'].'</A>'.'</TD>';
					echo "</TR>";
					
				}
				echo "</TABLE>";
			}
		}

	}


?>

    
  </body>
</html>