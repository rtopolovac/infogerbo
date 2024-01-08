<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="liste_service.css">
    <title>Liste Service</title>
</head>
<body>
<?php						
		require '../library/bdd_infoger.php';
		$infoger_bdd = new BDD_infoger();
					
		// Connexion à la BDD
		$infoger_bdd->Connexion();
	?>
    <button>Enregistrer</button>
    <h1>Liste Service</h1>
    <div class="list">
        <div class="list_service">
            <?php
				if ($infoger_bdd->isConnected()){
					// Requêtes SQL
					$tabClient = $infoger_bdd->SQL_lister_services();

					if (count($tabClient) > 0)
					{
						echo '<TABLE  CELLSPACING="0" border="0">';
						echo "<TR><TD>Nom service</TD><TD>Id catégorie</TD>";
						echo "</TR>";
						
						// Boucle d'affichage du tableau des clients	
						for ($i=0;$i<count($tabClient);$i++)
						{
							echo "<TR>";
							echo '<TD>'.$tabClient[$i]['nom_service'].'</TD>';
							echo '<TD>'.$tabClient[$i]['Id_categorie'].'</TD>';
							echo "</TR>";
						
						}
						echo "</TABLE>";
					}

				}
			?>
        </div>
        <div class="list_checkbox">
            <ul>
                <li><input type="checkbox" placeholder="3"></li>
                <li><input type="checkbox" placeholder="2"></li>
                <li><input type="checkbox" placeholder="1"></li>
            </ul>
        </div>
    </div>
</body>
</html>