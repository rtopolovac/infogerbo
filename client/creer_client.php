<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Création Client</title>

  </head>
   <body>
     
	<?php
  // Inclure le fichier bdd_infoger.php pour pourvoir utiliser les méthodes de ce fichier				
	require '../library/bdd_infoger.php';
  $infoger_bdd = new BDD_infoger();
        
  // Connexion à la BDD
  $infoger_bdd->Connexion();		

    // Récuperation de variable
    $nom_referent = htmlspecialchars($_POST["nom_referent"]);
    $mail_referent = htmlspecialchars($_POST["mail_referent"]);
    $tel_referent = htmlspecialchars($_POST["tel_referent"]);
    $nom_entreprise = htmlspecialchars($_POST["nom_entreprise"]);
    $adresse_entreprise = htmlspecialchars($_POST["adresse_entreprise"]);

    if ($infoger_bdd->isConnected()){
      // Requête SQL pour ajouter un client dans la liste des clients
      $infoger_bdd->SQL_ajouter_client($nom_referent, $mail_referent, $tel_referent,  $nom_entreprise, $adresse_entreprise);
      
      // Redirection vers une page une fois que l'ajout a été effectuer
      header('Location: lister_client.php'); // pas d'echo sinon erreur //

      //Sortir du code
      exit;
  }

  // rajouter une redirection vers une page d'erreur




?>

    
  </body>
</html>