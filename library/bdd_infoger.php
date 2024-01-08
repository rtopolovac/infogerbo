<?php

require 'bdd_manager.php';


class BDD_infoger extends BDDManager{
    public function Connexion()
    {
        parent::ConnexionBDD("localhost", "infoger_user", "123456+azerty", "infoger");
    }
    
    //Lister les clients//
    public function SQL_liste_client()
    {
        return parent::executerRequete("SELECT Id_client, nom_entreprise, adresse_entreprise, nom_referent FROM client;");
    }
    
    //Lister les infos du client//
    public function SQL_info_client($num_client)
    {
        return parent::executerRequete("SELECT Id_client, nom_entreprise, adresse_entreprise, nom_referent, mail_referent, tel_referent FROM client WHERE Id_client =".$num_client);
    }
    
    //Ajouter un client// 
    public function SQL_ajouter_client($nom_referent, $mail_referent, $tel_referent,  $nom_entreprise, $adresse_entreprise)
    {
        $tab = array(
            'nom_referent' => $nom_referent,
            'mail_referent' => $mail_referent,
            'tel_referent' => $tel_referent,
            'nom_entreprise' => $nom_entreprise,
            'adresse_entreprise' => $adresse_entreprise
            ); // array

        parent::insererDonnees("client",$tab);
    }
    
    //Ajouter des services à un client//
    public function SQL_ajouter_service_client($clientId, $serviceId)
    {
        try {
            $requete = $this->connexion->prepare("INSERT INTO services_clients (client_id, service_id) VALUES (?, ?)");
            $requete->execute([$clientId, $serviceId]);
echo "Service ajouté";
        } catch (PDOException) {
echo "Erreur ajout";
        }
    }


    // Lister les clients qui ont le même service//
    public function SQL_lister_service_client($Id_client)
    {
//         try {
//             $requete = $this->connexion->prepare("SELECT c.* FROM clients c INNER JOIN services_clients sc ON c.id = sc.client_id WHERE sc.service_id = ?");
//             $requete->execute([$serviceId]);
//             $clients = $requete->fetchAll(PDO::FETCH_ASSOC);
//             return $clients;
//         } catch (PDOException $e) {
// echo "Erreur lors de la récupération des clients : ";
//         }
    return parent::executerRequete("SELECT c.* FROM client AS c INNER JOIN service AS s ON c.Id_client = s.Id_service");
    //SELECT c.*, s.nom_service FROM client c INNER JOIN service s ON c.Id_client = s.Id_service//
    }

    //Lister les paramètres du service//
    public function SQL_lister_parametres_service_client($clientId, $Id_service)
    {
        try {
            $requete = $this->connexion->prepare("SELECT * FROM parametres_services WHERE client_id = ? AND service_id = ?");
            $requete->execute([$clientId, $serviceId]);
            $parametres = $requete->fetchAll(PDO::FETCH_ASSOC);
            return $parametres;
        } catch (PDOException $e) {
echo "Erreur lors de la récupération des paramètres : ";
        }
    }


    // Méthode pour modifier les paramètres d'un service pour un client

    public function SQL_modifier_parametres_service_client($clientId, $serviceId, $nouveauxParametres)
    {
        try {
            $requete = $this->connexion->prepare("UPDATE parametres_services_clients SET parametre1=?, parametre2=?, ... WHERE client_id=? AND service_id=?");
            $requete->execute([...$nouveauxParametres, $clientId, $serviceId]);
            echo "Paramètres modifiés avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la modification des paramètres : " . $e->getMessage();
        }
    }

    public function SQL_modifier_parametre_service($num_client, $num_service, $tab)
    {
        
        

        parent::modifierDonnees("parametre","Id_client=".$num_client." AND Id_service = ".$num_service, $tab);
    }



    //Lister les services//
    public function SQL_lister_services($num_client)
    {
    return parent::executerRequete("SELECT nom_service, service.Id_service AS n_service FROM service JOIN accede ON service.Id_service = accede.Id_service WHERE Id_client=".$num_client.";");
}

public function SQL_lister_parametres($num_client, $num_service)
{
return parent::executerRequete("SELECT nom, valeur_parametre, parametre.Id_nom_parametre AS ID_NOM FROM parametre JOIN nom_parametre ON parametre.Id_nom_parametre = nom_parametre.Id_nom_parametre WHERE Id_client=".$num_client." and Id_service=".$num_service.";");
}



    //Modification d'informations du client//
    public function SQL_modifier_client($Id_client, $nom_entreprise, $adresse_entreprise, $nom_referent, $mail_referent, $tel_referent)
    {
        
        $tab = array(
            'nom_entreprise' => $nom_entreprise,
            'adresse_entreprise' => $adresse_entreprise,
            'nom_referent' => $nom_referent,
            'mail_referent' => $mail_referent,
            'tel_referent' => $tel_referent
            ); // array

        parent::modifierDonnees("client","Id_client=".$Id_client, $tab);
    }

    
}
?>