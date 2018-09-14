<!DOCTYPE html>
<?php include('..\Connexion.php'); ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<h2>STOCK SERVICE INFORMATIQUE</h2>
<p>Les éléments affichés sont seulement les matériels en stock</p>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher un matériel" title="Entrer un numéro commande">

<table id="myTable">
  <tr class="header">
    <th style="width:15%;">Commande</th>
    <th style="width:20%;">Materiel</th>
    <th style="width:15%;">SN</th>
    <th style="width:15%;">Date de Commande</th>
    <th style="width:15%;">Date de reception</th>
    <th style="width:20%;">Fournisseur</th>

  </tr>
  <?php
    $sql = "SELECT type_mat, sn, commande, date_commande, date_reception, fournisseur FROM gestion_commande WHERE etat='stock'";
    $result = $bdd->query($sql);
    $count = $result->rowCount();
    if ($count > 0) {
    // output data of each row
    while($row = $result->fetch()) {
        echo "<tr> <td>". $row["commande"]. "</td><td>". $row["type_mat"]. "</td><td>" . $row["sn"] . " </td><td> ". $row["date_commande"] . " </td><td> ". $row["date_reception"] . " </td><td> ". $row["fournisseur"]." </td> </tr> ";
    }
} else {
    echo "0 results";
}

   ?>
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</body>
</html>
