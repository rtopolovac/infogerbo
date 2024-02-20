<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="parametre_service.css">
    <title>Paramètre du service Y du client X</title>
</head>
<body>
<?php						
		// Inclure le fichier bdd_infoger.php pour pourvoir utiliser les méthodes de ce fichier
		require '../library/bdd_infoger.php';
		$infoger_bdd = new BDD_infoger();
					
		// Connexion à la BDD
		$infoger_bdd->Connexion();

		//Récupération des id dans des variables 
		$nom_entreprise = htmlspecialchars($_GET["nom_entreprise"]);
		$num_client = htmlspecialchars($_GET["num_client"]);
		$num_service = htmlspecialchars($_GET["num_service"]);
		$nom_service = htmlspecialchars($_GET["nom_service"]);

	?>
	<a class="button_return" href="../client/tableau_bord.html">&#11013; Retour au tableau de bord</a>
	<?php echo '<TD>'.'<A class=button_return href="../service/service_client.php?num_client='.$num_client.'&nom_entreprise='.$nom_entreprise.'">'.'&#11013; Retour au service'.'</A>'.'</TD>'; ?>
	<?php echo "<H1>Paramètre du service ".$nom_service." du client ".$nom_entreprise."</H1>";?>
    <div class="list">
        <div class="list_service">
			<form action="modifier_parametre.php" method="get">
				<?php
					if ($infoger_bdd->isConnected()){

						// Requêtes SQL pour lister les paramèetres du service du client
						$tab_parametre = $infoger_bdd->SQL_lister_parametres($num_client, $num_service);

						if (count($tab_parametre) > 0)
						{
							echo '<TABLE  CELLSPACING="0" border="0">';
							echo "<TR><TD>Paramètre prédéfini</TD><TD>Paramètre client</TD>";
							echo "</TR>";
							
							// Boucle d'affichage du tableau des clients	
							for ($i=0;$i<count($tab_parametre);$i++)
							{
								echo "<TR>";
								echo '<TD>'.$tab_parametre[$i]['nom'].'</TD>';
								echo '<TD>'.'<INPUT TYPE="text" NAME="Id_parametre_'.$tab_parametre[$i]['Id_parametre'].'" value="'.$tab_parametre[$i]['valeur_parametre'].'"></INPUT>'.'</TD>';
								echo "</TR>";
							
							}
							echo "</TABLE>";
						}
					}
				?>

				<!-- Input cacher pour pouvoir les renvoyer dans une autre page -->
				<input type="hidden" value='<?php echo $num_client?>' name='num_client'>
				<input type="hidden" value='<?php echo $num_service?>' name='num_service'>
				<input type="hidden" value='<?php echo $nom_entreprise?>' name='nom_entreprise'>
				<input type="hidden" value='true' name='update'>
				<input type="submit" value="Enregistrer">
			</form>
        </div>
    </div>
</body>
</html>