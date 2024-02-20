<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Backo office INFOGER - Liste clients</title>
	<link rel="stylesheet" href="liste_client.css">
</head>
   <body>
   <?php
	     // Inclure le fichier bdd_infoger.php pour pourvoir utiliser les méthodes de ce fichier									
		require '../library/bdd_infoger.php';
		$infoger_bdd = new BDD_infoger();
					
		// Connexion à la BDD
		$infoger_bdd->Connexion();
	?>
   <button><a href="nouveau_client.html">&#10010;</a></button>
   <a class="button_return" href="tableau_bord.html"> &#11013; Retour au tableau de bord</a>
   <h1>Liste des Clients</h1>
    <div class="flex_list">
        <div class="liste_client">
				<?php
				if ($infoger_bdd->isConnected()){
					// Requêtes SQL pour lister les clients
					$tabClient = $infoger_bdd->SQL_liste_client();

					if (count($tabClient) > 0)
					{
						echo '<TABLE  CELLSPACING="0" border="0">';
						echo "<TR><TD>Nom entreprise</TD><TD>Adresse</TD><TD>Nom du referent</TD>";
						echo "</TR>";
						
						// Boucle d'affichage du tableau des clients	
						for ($i=0;$i<count($tabClient);$i++)
						{
							echo "<TR>";
							echo '<TD>'.$tabClient[$i]['nom_entreprise'].'</TD>';
							echo '<TD>'.$tabClient[$i]['adresse_entreprise'].'</TD>';
							echo '<TD>'.$tabClient[$i]['nom_referent'].'</TD>';
							echo '<TD>'.'<A href="client_x.php?num_client='.$tabClient[$i]['Id_client'].'">'.'Informations'.'</A>'.'</TD>';
							echo '<TD>'.'<A href="../service/service_client.php?num_client='.$tabClient[$i]['Id_client'].'&nom_entreprise='.$tabClient[$i]['nom_entreprise'].'">'.'Services'.'</A>'.'</TD>';
							echo "</TR>";
						
						}
						echo "</TABLE>";
					}

				}
			?>
        </div>
    </div>
  </body>
</html>
