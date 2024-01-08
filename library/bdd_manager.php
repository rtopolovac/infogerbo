
<?php
class BDDManager {
    private $conn;
    private $connected = false;

    public function ConnexionBDD($host, $username, $password, $database) {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connected = true;
            
        } catch (PDOException $e) {
            die("Échec de la connexion : " . $e->getMessage());
        }
    }

    public function isConnected()
    {
        return $this->connected;
    }

    public function executerRequete($sql) {
            try {
                $result = $this->conn->query($sql);
                return $result->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Erreur dans la requête : " . $e->getMessage());
            }
    }

    public function insererDonnees($table, $donnees) {
        // Construire la requête d'insertion
        $colonnes = implode(", ", array_keys($donnees));
        $valeurs = implode(", ", array_fill(0, count($donnees), '?'));

        $sql = "INSERT INTO $table ($colonnes) VALUES ($valeurs)";
        
        // Préparer la requête
        $prepa = $this->conn->prepare($sql);

        // Exécuter la requête avec les valeurs correspondantes
        $prepa->execute(array_values($donnees));
    }

    public function modifierDonnees($table, $condition, $donnees) {
        // Construire la requête d'insertion
        $sql = "UPDATE $table SET ";
        
        $count= count($donnees);
        foreach($donnees as $clef => $valeur)
        {
            $sql =  $sql.$clef."=".'"'.$valeur.'"';
            if ($count!=1) $sql =  $sql.", ";
            $count--;
        }
        
        $sql =  $sql." WHERE ".$condition;
    
        try {
            $result = $this->conn->exec($sql);
        } catch (PDOException $e) {
            die("Erreur dans la requête : " . $e->getMessage());
        }
    }
}
?>

