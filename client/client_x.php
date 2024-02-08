<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="client_x.css">
    <title>Informations client X</title>
</head>
<body>
    <?php 
        require '../library/bdd_infoger.php';

        $infoger_bdd = new BDD_infoger();
                    
        // Connexion à la BDD
        $infoger_bdd->Connexion();
    ?>
    <a href="tableau_bord.html">&#11013; Retour au tableau de bord</a>
    <a href="lister_client.php">&#11013; Retour a la liste des clients</a>
    <h1>Informations Client</h1>
    <div class="informations">
        <form action="modifier_client.php">
            <?php
            if ($infoger_bdd->isConnected()){
                
                // Requêtes SQL
                // $tabClient = $infoger_bdd->SQL_modifier_client("1", "nom_entreprise1", "adresse_entreprise1", "nom_referent1", "mail_referent1", "tel_referent1");

                $num_client = htmlspecialchars($_GET["num_client"]);
                $update = false;
                if (isset($_GET["update"])) $update = htmlspecialchars($_GET["update"]);

                if ($update)
                {
                    $nom_referent = htmlspecialchars($_GET["nom_referent"]);
                    $mail_referent = htmlspecialchars($_GET["mail_referent"]);
                    $tel_referent = htmlspecialchars($_GET["tel_referent"]);
                    $nom_entreprise = htmlspecialchars($_GET["nom_entreprise"]);
                    $adresse_entreprise = htmlspecialchars($_GET["adresse_entreprise"]);

                    $infoger_bdd->SQL_modifier_client($num_client, $nom_entreprise, $adresse_entreprise, $nom_referent, $mail_referent, $tel_referent);
                }

                $info = $infoger_bdd->SQL_info_client($num_client);

                if (count($info) > 0)
                {
                    echo '<TABLE  CELLSPACING="0" border="0">';
                    
                    // Boucle d'affichage du tableau des clients	
                    for ($i=0;$i<count($info);$i++)
                    {
                        echo "<TR>";
                        echo '<TD>NOM DE L\'ENTREPRISE : '.'<INPUT TYPE="HIDDEN" NAME="nom_entreprise" value="'.$info[$i]['nom_entreprise'].'">'.$info[$i]['nom_entreprise'].'</TD>';
                        echo "</TR>";
                        echo "<TR>";
                        echo '<TD>ADRESSE DE L\'ENTREPRISE : '.'<INPUT TYPE="HIDDEN" NAME="adresse_entreprise" value="'.$info[$i]['adresse_entreprise'].'">'.$info[$i]['adresse_entreprise'].'</TD>';
                        echo "</TR>";
                        echo "<TR>";
                        echo '<TD>NOM DU RÉFÉRENT : '.'<INPUT TYPE="HIDDEN" NAME="nom_referent" value="'.$info[$i]['nom_referent'].'">'.$info[$i]['nom_referent'].'</INPUT>'.'</TD>';
                        echo "</TR>";
                        echo "<TR>";
                        echo '<TD>E-MAIL DU RÉFÉRENT : '.'<INPUT TYPE="HIDDEN" NAME="mail_referent" value="'.$info[$i]['mail_referent'].'">'.$info[$i]['mail_referent'].'</TD>';
                        echo "</TR>";
                        echo "<TR>";
                        echo '<TD>TÉLÉPHONE DU RÉFÉRENT : '.'<INPUT TYPE="HIDDEN" NAME="tel_referent" value="'.$info[$i]['tel_referent'].'">'.$info[$i]['tel_referent'].'</TD>';
                        echo "</TR>";
                        echo "<TR>";
                        echo '<TD>'.'<INPUT TYPE="HIDDEN" NAME="num_client" value="'.$info[$i]['Id_client'].'">'.'</TD>';
                        echo "</TR>";
                    }

                    echo "</TABLE>";
                    
                }

            }
            ?>
            <input type="submit" value="Modifier">
        </form>
    </div>
</body>
</html>

