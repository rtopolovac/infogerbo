<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Modification Client</title>

  </head>
   <body>
 
<?php	
  // Inclure le fichier bdd_infoger.php pour pourvoir utiliser les méthodes de ce fichier
	require '../library/bdd_infoger.php';
  $infoger_bdd = new BDD_infoger();
        
  // Connexion à la BDD
  $infoger_bdd->Connexion();

 

  if ($infoger_bdd->isConnected()){
    
    //Récupération des id et des chaine de caracère dans des variables
    $num_client = htmlspecialchars($_GET["num_client"]);
	  $num_service = htmlspecialchars($_GET["num_service"]);
    $nom_entreprise = htmlspecialchars($_GET["nom_entreprise"]);

    //Création d'un tableau
    $array = array();
    
    // Boucle pour prendre traiter le tableau $_GET et récuperer des chaine de caractère spécifique avec des comparaison et des conditions //
    foreach ($_GET as $cle => $valeur){
      echo $cle.'=>'.$valeur.'<br>';
      
      //Chaine de caractère recherché
      $mot_rechercher = 'Id_parametre_';

      //Conditions avec stripos qui fait la recherche de la chaine de caractère rechercher avec la clé dans le $_GET
      if (stripos($cle, $mot_rechercher) !== false){
        
        //Récuperation d'un id en chaine de caractère en découpant la clé dnas le $_GET
        $rest = substr($cle, 13, 14);
        $array[$rest] = $valeur;
        if(intval($cle) == true){
          array_push($array, $cle);
        }
      }
       
    }

    //Affiche le tableau avec le type de varible qui contient et en forme clé valeur
    echo var_dump($array);
    
    //Conditions pour voir si il existe une variable update et récupératino de la valeur de update
    if (isset($_GET["update"])) $update = htmlspecialchars($_GET["update"]);
    
    //Conditions si il existe une variable update
    if ($update)
    {
      // Pour tout les id récuperer de type chaine de caractère, les transformer en entier et 
      //les envoyer pour la modification des services du client 
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

<!-- Formulaire pour renvoyer des id important la prochiane page -->
<form id="monformulaire" action="../service/service_client.php" method="get">
      <input type="text" value='<?php echo $num_client?>' name='num_client'>
      <input type="text" value='<?php echo $nom_entreprise?>' name='nom_entreprise'>
    </form>
  </body>

  <!-- script Javascript pour un envoi automatique du formulaire  -->
  <script type="text/javascript">
    // DOMContentLoaded sert à déclencher la fonction lorsque la page html est chargé et analysé
    document.addEventListener('DOMContentLoaded', function () {
    var formulaire = document.getElementById('monformulaire');
    
    // Soumettre le formulaire dès que la page est chargée
    formulaire.submit();
    });
  </script>
</html>
