<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="service_client.css">
    <title>Liste des services du client </title>
</head>
<body>
	<?php		

		// Inclure le fichier bdd_infoger.php pour pourvoir utiliser les méthodes de ce fichier
		require '../library/bdd_infoger.php';
		$infoger_bdd = new BDD_infoger();
					
		// Connexion à la BDD
		$infoger_bdd->Connexion();
		//Récupération des variables nécessaires
		$num_client = htmlspecialchars($_GET["num_client"]);
		$nom_entreprise = htmlspecialchars($_GET["nom_entreprise"]);
	?>
	<a class="button_return" href="../client/tableau_bord.html">&#11013; Retour au tableau de bord</a>
    <a class="button_return" href="../client/lister_client.php">&#11013; Retour a la liste des clients</a>
    <h1>Liste des services du client <?php echo $nom_entreprise?></h1>
	<div class="flex_list">
        <div class="liste_client">
            <?php
				if ($infoger_bdd->isConnected()){
					// Requêtes SQL pour lister les services du client A MODIFIER LISTER TOUT LES SERVICES ET NON PAS CEUX DU CLIENT
					$tabService = $infoger_bdd->SQL_lister_services();
					if (count($tabService) > 0)
					{
						echo '<TABLE CELLSPACING="0" border="0">';
						echo "<TR><TD>Nom service</TD><TD>Etat</TD>";
						echo "</TR>";

						//Requête SQL pour lister les status des services du client 
						$tabStatus = $infoger_bdd->SQL_lister_status($num_client);
						
						if (count($tabStatus) == 0) $tabStatusVide = true; else $tabStatusVide = false;

						// Boucle d'affichage du tableau des services	
						for ($i=0;$i<count($tabService);$i++)
						{
							
							echo "<TR>";
							echo '<TD>'.$tabService[$i]['nom_service'].'</TD>';
                            echo '<TD class="';
							
							// Le service est indisponible
							if ($tabService[$i]['disponible'] == 'false') 
							{
								echo 'maDivGrey';
								echo '"></TD>';
								echo "</TR>";
							}
							else
							{
								// Il n'y a pas d'entrée pour le client dans la table status
								if ($tabStatusVide)
								{
									echo 'maDivRed';
									echo '"></TD>';
									echo '<TD><A HREF="ajouter_status_service.php?num_client='.$num_client.'&num_service='.$tabService[$i]['n_service'].'&id_nom_status=1'.'&nom_entreprise='.$nom_entreprise.'" CLASS="monBouton"">Activer/Désactiver</BUTTON></TD>';
echo "TAB VIDE";						
									
									echo "</TR>";
								}
								else
								{
									// Recherche du bonne enregistrement dans la table status
									$compteur=-1;
									for ($j=0; $j<count($tabStatus); $j++)
									{
										
										if ($tabStatus[$j]['n_service'] == $tabService[$i]['n_service']) {$compteur = $j; break; }
									}
									
									// Il n y a pas d'entrée pour ce service dans la table status
									if ($compteur==-1)
									{
										echo 'maDivRed';
										echo '"></TD>';
										echo '<TD><A HREF="ajouter_status_service.php?num_client='.$num_client.'&num_service='.$tabService[$i]['n_service'].'&id_nom_status=1'.'&nom_entreprise='.$nom_entreprise.'" CLASS="monBouton"">Activer/Désactiver</BUTTON></TD>';
echo "PAS D ENTREE";						
										
										echo "</TR>";
									}
									
									// Il y a une entrée pour ce client dans la table status et le service est inactif
									if ($compteur!=-1 && $tabStatus[$compteur]['n_status'] == '2' ) 
									{
										echo 'maDivRed';
										echo '"></TD>';
										echo '<TD><A HREF="changer_status_service.php?num_client='.$num_client.'&num_service='.$tabService[$i]['n_service'].'&id_nom_status='.$tabStatus[$compteur]['n_status'].'&nom_entreprise='.$nom_entreprise.'" CLASS="monBouton"">Activer/Désactiver</BUTTON></TD>';
echo "INACTIF";						
										echo "</TR>";
									}
									
									// Il y a une entrée pour ce client dans la table status et le service est actif
									if ($compteur!=-1 && $tabStatus[$compteur]['n_status'] == '1' ) 
									{
										echo 'maDivGreen';  
										echo '"></TD>';
										echo '<TD><A HREF="changer_status_service.php?num_client='.$num_client.'&num_service='.$tabService[$i]['n_service'].'&id_nom_status='.$tabStatus[$compteur]['n_status'].'&nom_entreprise='.$nom_entreprise.'" CLASS="monBouton"">Activer/Désactiver</BUTTON></TD>';
										echo '<TD><A HREF="../service_parametre/parametre_service.php?num_client='.$num_client.'&num_service='.$tabService[$i]['n_service'].'&nom_entreprise='.$nom_entreprise.'&nom_service='.$tabService[$i]['nom_service'].'">Paramètres</A></TD>';
										echo "</TR>";
									}
								}
							}
							
						}
						echo "</TABLE>";
					}


				}
			?>
        	</div>
		</div>
</body>
</html>