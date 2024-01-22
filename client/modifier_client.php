<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modifier_client.css">
    <title>Modification</title>
</head>
<body>
    <?php 
      $num_client = htmlspecialchars($_GET["num_client"]);
      $nom_referent = htmlspecialchars($_GET["nom_referent"]);
      $mail_referent = htmlspecialchars($_GET["mail_referent"]);
      $tel_referent = htmlspecialchars($_GET["tel_referent"]);
      $nom_entreprise = htmlspecialchars($_GET["nom_entreprise"]);
      $adresse_entreprise = htmlspecialchars($_GET["adresse_entreprise"]);
    
    ?>

    <a class="button_return" href="lister_client.php">&#11013; Retour a la liste des clients</a>
	  <a class="button_return" href="tableau_bord.html">&#11013; Retour au tableau de bord</a>
    <h1>Modification</h1>
    <form method="get" action="client_x.php">
        <label for="nom_referent"></label>
        <input placeholder="Nom du référent"  value="<?php echo $nom_referent; ?>" type="text" name="nom_referent">
        <br>
        <label for="mail_referent"></label>
        <input placeholder="Mail du référent" value="<?php echo $mail_referent; ?>" type="text" name="mail_referent">
        <br>
        <label for="tel_referent"></label>
        <input placeholder="Numéro du référent" value="<?php echo $tel_referent; ?>" type="tel" name="tel_referent">
        <br>
        <label for="nom_entreprise"></label>
        <input placeholder="Nom de l'entreprise" value="<?php echo $nom_entreprise; ?>" type="text" name="nom_entreprise">
        <br>
        <label for="adresse_entreprise"></label>
        <input placeholder="Adresse de l'entreprise" value="<?php echo $adresse_entreprise; ?>" type="text" name="adresse_entreprise">
        <br>
        <input type="hidden" value='true' name='update'>
        <input type="hidden" value='<?php echo $num_client; ?>' name='num_client'>
        <input type="submit" value="Enregistrer">
    </form>

    <!-- <div class="heighter"></div>
    <div class="pop-up" id="pop-up">
      <div class="pop-up-back"></div>
      <div class="pop-up-contenu">
        Êtes vous sur de vouloir confirmer cette ajout <br />
        <button><a href="lister_client.php">Oui</a></button>
        <button><a href="nouveau_client.html">Non</a></button>
      </div>
    </div>
    <script src="pop-up.js"></script> -->
</body>
</html>