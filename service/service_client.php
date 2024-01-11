<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="service_client.css">
    <title>Liste des services Y du client X</title>
</head>
<body>
	<?php						
		require '../library/bdd_infoger.php';
		$infoger_bdd = new BDD_infoger();
					
		// Connexion à la BDD
		$infoger_bdd->Connexion();

		$num_client = htmlspecialchars($_GET["num_client"]);
		$nom_entreprise = htmlspecialchars($_GET["nom_entreprise"]);
	?>
    <button class="plus">&#10010;</button>
    <h1>Liste des services du client <?php echo $nom_entreprise?></h1>
	<div class="flex_list">
        <div class="liste_client">
            <?php
				if ($infoger_bdd->isConnected()){
					// Requêtes SQL
					$tabService = $infoger_bdd->SQL_lister_services($num_client);

					if (count($tabService) > 0)
					{
						echo '<TABLE CELLSPACING="0" border="0">';
						echo "<TR><TD>Nom service</TD><TD>Etat</TD>";
						echo "</TR>";
						
						// Boucle d'affichage du tableau des clients	
						for ($i=0;$i<count($tabService);$i++)
						{
							echo "<TR>";
							echo '<TD>'.$tabService[$i]['nom_service'].'</TD>';
                            echo '<TD><DIV CLASS="maDiv"></DIV></TD>';
							echo '<TD><BUTTON CLASS="monBouton" ONCLICK="changerTexte('.$i.')">Clique</BUTTON></TD>';
							echo '<TD><A HREF="../service_parametre/parametre_service.php?num_client='.$num_client.'&num_service='.$tabService[$i]['n_service'].'&nom_entreprise='.$nom_entreprise.'"><IMG SRC="paramètre.png" alt=""></A></TD>';
							echo "</TR>";
						}
						echo "</TABLE>";
					}

				}
			?>
        	</div>
		</div>
	<script> 
	// Fonction pour changer le texte du bouton
	// function changerTexte() {
	// 	var bouton = document.getElementsByClassName('monBouton');
	// 	var maDiv = document.querySelector('.maDiv');

	// 	// Vérifier le texte actuel du bouton
	// 	var texteActuel = bouton.innerText;

	// 	// Changer le texte en fonction de l'état actuel
	// 	if (texteActuel === 'Désactiver') {
	// 	bouton.innerText = 'Activer';
	// 	maDiv.style.backgroundColor = 'green';
	// 	} else {
	// 	bouton.innerText = 'Désactiver';
	// 	maDiv.style.backgroundColor = 'red';
	// 	}
	// }

	// Fonction pour changer le texte du bouton
function changerTexte(indice) {
    var boutons = document.getElementsByClassName('monBouton');
    var maDivs = document.querySelectorAll('.maDiv');

    // Parcourir tous les boutons
        var bouton = boutons[indice];
        var maDiv = maDivs[indice];

        // Vérifier le texte actuel du bouton
        var texteActuel = bouton.innerText;

        // Changer le texte en fonction de l'état actuel
        if (texteActuel === 'Désactiver') {
            bouton.innerText = 'Activer';
            maDiv.style.backgroundColor = 'green';
        } else {
            bouton.innerText = 'Désactiver';
            maDiv.style.backgroundColor = 'red';
        }
}

	</script>
</body>
</html>