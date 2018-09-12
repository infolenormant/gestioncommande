<?php
/**
 * Created by PhpStorm.
 * User: blefevre
 * Date: 12/09/2018
 * Time: 15:12
 */
include('Connexion.php');
class update {
    private $_db; // Instance de PDO.
    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function searchSN()
    {
        $devices = $this->getDevices();
        $count = count($devices);
        $requete = $this->_db->prepare('SELECT * FROM glpi_infocoms WHERE id = ?');
        if ($requete->execute(array(
            for()
                $devices()}
            }
            ))) {
            while ($row = $requete->fetch()) {
               $results[] = $row;
            }
        }
        return $results;
    }

    public function getDevices()
    {
        $requete = $this->_db->prepare('SELECT * FROM gestion_commande WHERE etat = ?');
        if ($requete->execute(array(false))) {
            while ($row = $requete->fetch()) {
                $results[] = $row;
            }
        }
        return $results;
    }
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}

$update = new update($bdd);
$result = $update->getDevices();
print_r($result);
