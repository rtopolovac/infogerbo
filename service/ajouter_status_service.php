<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer status du service du client</title>
</head>
<body>
    <?php 		
    
    // Inclure le fichier bdd_infoger.php pour pourvoir utiliser les méthodes de ce fichier
    require '../library/bdd_infoger.php';
    
    //Création d'un objet de type BDD_infoger
    $infoger_bdd = new BDD_infoger();
                
    // Connexion à la BDD
    $infoger_bdd->Connexion();

    //Récupération des variables nécessaires
    $num_client = htmlspecialchars($_GET["num_client"]);
    $num_service = htmlspecialchars($_GET["num_service"]);
    $id_nom_status = htmlspecialchars($_GET["id_nom_status"]);
    $nom_entreprise = htmlspecialchars($_GET["nom_entreprise"]);

    //Requête SQL pour changer l'id status du service du client
    $infoger_bdd->SQL_ajouter_status($id_nom_status,  $num_service, $num_client)
    SQL_switch_status_service_client($num_client, $num_service, $id_nom_status);

    //Redirection sur la page service_client
    // header('Location: ../service/service_client.php?num_client='.$num_client.'&num_service='.$num_service.'&nom_entreprise='.$nom_entreprise.'&id_nom_status='.$id_nom_status.'');
    ?>
</body>
</html>
