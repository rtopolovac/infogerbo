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
    $nom_entreprise = htmlspecialchars($_GET["nom_entreprise"]);

    $array = array();
    
    foreach ($_GET as $cle => $valeur){
      echo $cle.'=>'.$valeur.'<br>';

      $mot_rechercher = 'Id_parametre_';

      if (stripos($cle, $mot_rechercher) !== false){
        $rest = substr($cle, 13, 14);
        $array[$rest] = $valeur;
        if(intval($cle) == true){
          array_push($array, $cle);
        }
      }
       
    }

    echo var_dump($array);
    
    if (isset($_GET["update"])) $update = htmlspecialchars($_GET["update"]);
    if ($update)
    {
      foreach($array as $rest => $valeur){
        $rest = intval($rest);
        $infoger_bdd->SQL_modifier_parametre_service($rest, $array[$rest]);
      }
      echo 'Enregistrement effectuer';
    }
      // header('Location: ../service/service_client.php'); // pas d'echo sinon erreur //

  }

  // rajouter une redirection vers une page d'erreur


?>
<form id="monformulaire" action="../service/service_client.php" method="get">
      <input type="text" value='<?php echo $num_client?>' name='num_client'>
      <input type="text" value='<?php echo $nom_entreprise?>' name='nom_entreprise'>
    </form>
  </body>

  <?php
  echo $num_client;
  echo $nom_entreprise;
  ?>

  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
    var formulaire = document.getElementById('monformulaire');
    
    // Soumettre le formulaire dès que la page est chargée
    formulaire.submit();
    });
  </script>
</html>


<!-- DOMContentLoaded sert à déclencher la fonction lorsque la page html est chargé et analysé-->