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
    

    // Méthode pour Lister les clients qui ont le même service//
    public function SQL_lister_service_client($Id_client)
    {
    return parent::executerRequete("SELECT c.* FROM client AS c INNER JOIN service AS s ON c.Id_client = s.Id_service");
    }


    // Méthode pour faire passer l'id du status de 1 à 2 ou de 2 à 1 
    public function SQL_switch_status_service_client($Id_client, $Id_service, $id_nom_status, $id_parametre)
    {
        if(is_null($id_nom_status)){
            $id_nom_status = 1;
        }
        
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
        
        if (empty($id_parametre) and is_null($id_parametre)){
            $tab2 = array(
                'Id_client' => $Id_client, 
                'Id_service' => $Id_service,
                'Id_nom_parametre'=> '1',
                );// tableau

            parent::insererDonnees("parametre",$tab2);
            
            $tab3 = array(
                'Id_client' => $Id_client, 
                'Id_service' => $Id_service,
                'Id_nom_parametre'=> '2',
                );// tableau

            parent::insererDonnees("parametre",$tab2);
        }
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
    return parent::executerRequete("SELECT nom, status.Id_nom_status AS n_status , Id_service AS n_service FROM status JOIN nom_status ON status.Id_nom_status = nom_status.Id_nom_status WHERE Id_client=".$num_client.";");
    }

    public function SQL_ajouter_status($Id_nom_status,  $Id_service, $Id_client)
    {
        $tab = array(
            'Id_nom_status' => $Id_nom_status,
            'Id_service' => $Id_service,
            'Id_client' => $Id_client,
            ); // tableau de donnée

        parent::insererDonnees("status",$tab);
    }

	public function SQL_ajouter_parametre_virtualhost($Id_service, $Id_nom_parametre, $Id_client)
    {
        $tab = array(
            'Id_service' => $Id_service,
			'Id_nom_parametre' => $Id_nom_parametre,
            'Id_client' => $Id_client,
            ); // tableau de donnée
 
        parent::insererDonnees("parametre",$tab);
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