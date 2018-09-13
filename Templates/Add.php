<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AJOUT COMMANDE</title>
  </head>
  <body>
    <h1>Ajout d'une commande</h1>
    <form action="../Controller/mainController.php?action=ajoutCommande" method="POST">
      Numéro de commande:<br>
      <input type="text" name="commande" value="Numero de commande"><br>
      Date de commande:<br>
      <input type="date" name="orderDate" value="AAAA-MM-JJ"><br>
      Date de réception:<br>
      <input type="date" name="deliveryDate" value="AAAA-MM-JJ"><br>
      Fournisseur :<br>
      <select name="supplier">
        <option value="1">LDLC</option>
        <option value="2">Orange</option>
        <option value="3">DEFI60</option>
        <option value="4">TECHDATA</option>
      </select><br>
      Numéros de série des matériels :<br>
      <textarea name="SN" rows="20" cols="100"></textarea>
      <br><br>
      <input type="submit" value="Submit">
    </form>

  </body>
</html>
