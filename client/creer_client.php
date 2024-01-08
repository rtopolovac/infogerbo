<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Création Client</title>

  </head>
   <body>
     
	<?php						
	require '../library/bdd_infoger.php';
  $infoger_bdd = new BDD_infoger();
        
  // Connexion à la BDD
  $infoger_bdd->Connexion();		

	
    $nom_referent = htmlspecialchars($_POST["nom_referent"]);
    $mail_referent = htmlspecialchars($_POST["mail_referent"]);
    $tel_referent = htmlspecialchars($_POST["tel_referent"]);
    $nom_entreprise = htmlspecialchars($_POST["nom_entreprise"]);
    $adresse_entreprise = htmlspecialchars($_POST["adresse_entreprise"]);

    if ($infoger_bdd->isConnected()){
      $infoger_bdd->SQL_ajouter_client($nom_referent, $mail_referent, $tel_referent,  $nom_entreprise, $adresse_entreprise);
      
      header('Location: lister_client.php'); // pas d'echo sinon erreur //

      exit;
  }

  // rajouter une redirection vers une page d'erreur




?>

    
  </body>
</html>