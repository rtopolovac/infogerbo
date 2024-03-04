<?php

require 'bdd_manager.php';


class BDD_infoger extends BDDManager{
    public function Connexion()
    {
        //Utilisation de parent:: car BDD_infoger est hérité des méthodes BDDManager (son père)
        parent::ConnexionBDD("localhost", "infoger_user1", "123456+azerty", "infoger");
    }
    
    //Méthode pour Lister les clients
    public function SQL_liste_client()
    {
        return parent::executerRequete("SELECT Id_client, nom_entreprise, adresse_entreprise, nom_referent FROM client;");
    }
    
    // Méthode pour Lister les infos du client//
    public function SQL_info_client($num_client)
    {
        return parent::executerRequete("SELECT Id_client, nom_entreprise, adresse_entreprise, nom_referent, mail_referent, tel_referent FROM client WHERE Id_client =".$num_client);
    }
    
    // Méthode pour Ajouter un client// 
    public function SQL_ajouter_client($nom_referent, $mail_referent, $tel_referent,  $nom_entreprise, $adresse_entreprise)
    {
        $tab = array(
            'nom_referent' => $nom_referent,
            'mail_referent' => $mail_referent,
            'tel_referent' => $tel_referent,
            'nom_entreprise' => $nom_entreprise,
            'adresse_entreprise' => $adresse_entreprise
            ); // tableau de donnée

        parent::insererDonnees("client",$tab);
    }
    
    // Méthode pour Ajouter des services à un client//
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


    // Méthode pour Lister les clients qui ont le même service//
    public function SQL_lister_service_client($Id_client)
    {
    return parent::executerRequete("SELECT c.* FROM client AS c INNER JOIN service AS s ON c.Id_client = s.Id_service");
    }

    // Méthode pour Lister les paramètres du service//
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

    // Méthode pour faire passer l'id du status de 1 à 2 ou de 2 à 1 
    public function SQL_switch_status_service_client($Id_client, $Id_service, $id_nom_status)
    {
        if ($id_nom_status == 1){
            $id_nom_status = 2;
        }
        else{
            $id_nom_status = 1;
        }
        
        $tab = array(
            'Id_nom_status' => $id_nom_status
            );// tableau

        
        parent::modifierDonnees("status"," Id_client=".$Id_client." AND Id_service = ".$Id_service, $tab);
    }

    // Méthode pour modifier les paramètres des services
    public function SQL_modifier_parametre_service($Id_parametre, $valeur_parametre)
    {
        $tab = array(
            'valeur_parametre' => $valeur_parametre
            ); // tableau
        
        parent::modifierDonnees("parametre","Id_parametre = ".$Id_parametre, $tab);
    }



    //Lister les services//
    public function SQL_lister_services()
    {
    return parent::executerRequete("SELECT nom_service, service.Id_service AS n_service, disponible FROM service;");
}

    //Méthode pour lister les paramètres
    public function SQL_lister_parametres($num_client, $num_service)
    {
    return parent::executerRequete("SELECT nom, valeur_parametre, Id_parametre FROM parametre JOIN nom_parametre ON parametre.Id_nom_parametre = nom_parametre.Id_nom_parametre WHERE Id_client=".$num_client." and Id_service=".$num_service.";");
    }

    //Méthode pour lister les status des services du clients
    public function SQL_lister_status($num_client)
    {
    return parent::executerRequete("SELECT nom, nom_status.Id_nom_status AS n_status FROM nom_status JOIN status ON nom_status.Id_nom_status = status.Id_nom_status WHERE Id_client=".$num_client.";");
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
            ); // tableau

        parent::modifierDonnees("client","Id_client=".$Id_client, $tab);
    }

    
}
?>