<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Modification Client</title>

  </head>
   <body>
 
	<?php						
	require '../library/bdd_infoger.php';
  $infoger_bdd = new BDD_infoger();
        
  // Connexion à la BDD
  $infoger_bdd->Connexion();

 

  if ($infoger_bdd->isConnected()){

    $num_client = htmlspecialchars($_GET["num_client"]);
	  $num_service = htmlspecialchars($_GET["num_service"]);

    foreach ($_GET as $cle => $valeur){
      echo $cle.'=>'.$valeur.'<br>';

      $mot_rechercher = 'Id_parametre_';

      if (stripos($cle, $mot_rechercher) !== false){
        $rest =substr($cle, 13, 14);
        echo $rest.'<br>';
        echo $valeur.'<br>';
      }
       
    }

    $update = false;
    if (isset($_GET["update"])) $update = htmlspecialchars($_GET["update"]);
    if ($update)
    {
        $infoger_bdd->SQL_modifier_parametre_service($rest, $valeur);
        echo 'Enregistrement effectuer';
    }
        //header('Location: ../service/service_client.php'); // pas d'echo sinon erreur //

    exit;
  }

  // rajouter une redirection vers une page d'erreur


?>
  </body>
</html>