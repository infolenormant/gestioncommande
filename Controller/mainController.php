<?php

include('..\Connexion.php');
if ($_GET['action'] == 'ajoutCommande') {
  $controller=new controller($bdd);
  $controller->ajoutCommandeBDD();
}

class controller
{
  private $_db;
  function __construct($db)
  {
    $this->setDb($db);
  }
  public function ajoutCommandeBDD(){
    $sn = explode("\n",$_POST['SN']);
    $nombreDeSN = count($sn) -1;
    $etat ='stock';
    $type ='COMPUTER';
    $requete = $this->_db->prepare('INSERT INTO gestion_commande (TYPE_MAT,SN, Commande, Date_commande, Date_reception, Fournisseur_ID, etat)
                          VALUES (:TYPE_MAT, :sn, :commande, :orderDate, :deliveryDate, :supplier, :etat)');
    for($x = 0; $x < $nombreDeSN; $x++) {
      $requete->execute(array(
        'TYPE_MAT' => $type,
        'sn'=> $sn[$x],
        'commande' => $_POST['commande'],
        'orderDate' => $_POST['orderDate'],
        'deliveryDate' => $_POST['deliveryDate'],
        'supplier' => $_POST['supplier'],
        'etat' => $etat));
    }
  }

  public function setDb(PDO $db){
    $this->_db=$db;
  }
}



?>
