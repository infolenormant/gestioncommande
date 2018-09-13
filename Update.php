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
    //Recherche dans les différentes tables
    public function searchBddGlpi()
    {
        $devices = $this->getDevices();
        $count = count($devices);
        $computers = $this->bddComputers($devices, $count);
        $monitors = $this->bddMonitors($devices, $count);
        return $computers;
    }
    //Récupération des ordinateurs fixes et portables dans la base GLPI
    public function bddComputers($devices, $count)
    {
        $requete = $this->_db->prepare('SELECT * FROM glpi_computers WHERE serial = ?');
        for($i = 0; $i < $count; $i++) {
            if ($requete->execute(array($devices[$i][1]))) {
                while ($row = $requete->fetch()) {
                    $results[] = $row;
                }
            }
        }
        return $results;
    }

    //Récupération des écrans dans la base GLPI
    public function bddMonitors($devices, $count)
    {
        $requete = $this->_db->prepare('SELECT * FROM glpi_monitors WHERE serial = ?');
        for($i = 0; $i < $count; $i++) {
            if ($requete->execute(array($devices[$i][1]))) {
                while ($row = $requete->fetch()) {
                    $results[] = $row;
                }
            }
        }
        return $results;
    }
    //Récupération des devices en attente d'attribution dans GLPI
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
$result = $update->searchBddGlpi();
print_r($result);
