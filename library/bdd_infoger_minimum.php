<?php

require 'bdd_manager.php';


class BDD_infoger extends BDDManager{
    public function Connexion()
    {
        //Utilisation de parent:: car BDD_infoger est hérité des méthodes BDDManager (son père)
echo "AVANT CONNEXION ";
        parent::ConnexionBDD("192.168.100.210", "dev_web", "123+aze", "infoger");
echo "APRES CONNEXION ";
    }
    
    public function isConnected()
    {
 echo "DANS ISCONNECTED ";       
        return parent::isConnected();
        //return true;
    }

    
}
?>