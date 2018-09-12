<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AJOUT COMMANDE</title>
  </head>
  <body>
    <h1>Ajout d'une commande</h1>
    <form action="../Controller/mainController.php" method="POST">
      Numéro de commande:<br>
      <input type="text" name="commande" value="Numero de commande"><br>
      Date de commande:<br>
      <input type="date" name="orderDate" value="JJ/MM/AAAA"><br>
      Date de réception:<br>
      <input type="date" name="deliveryDate" value="JJ/MM/AAAA"><br>
      Fournisseur :<br>
      <select name="supplier">
        <option value="LDLC.com">LDLC</option>
        <option value="Orange">Orange</option>
        <option value="DEFI60">DEFI60</option>
        <option value="TECHDATA">TECHDATA</option>
      </select><br>
      Numéros de série des matériels :<br>
      <textarea name="SN" rows="20" cols="100"></textarea>
      <br><br>
      <input type="submit" value="Submit">
    </form>

  </body>
</html>
