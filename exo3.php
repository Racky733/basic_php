<?php
session_start();
?>

<form method="post">
  Produit :<input type="text" name="produit"><br><br>
  Prix :<input type="number" name="prix"><br><br>
  Quantité:<input type="number" name="quantite"><br><br>
  <button type="submit" name="ajouter">Ajouter</button>
  <button type="submit" name="vider">Vider le panier</button>
  <button type="submit" name="quitter">Quitter</button>
</form>

<?php
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

$message = "";

if (isset($_POST['ajouter'])) {
    $produit = $_POST['produit'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];

    if ($produit == "" || $prix == "" || $quantite == "") {
        $message = "Tous les champs sont obligatoires.";
    }elseif (is_numeric($produit)) {
        echo "Le nom du produit ne doit pas être un nombre.";
    }else {
        $_SESSION['panier'][] = [
            'produit'  => $produit,
            'prix'     => $prix,
            'quantite' => $quantite
        ];
    }
}

if (isset($_POST['vider'])) {
    $_SESSION['panier'] = [];
}

if (isset($_POST['quitter'])) {
session_destroy();
    $_SESSION['panier'] = [];
    $message = "Vous avez quitté. Session terminée.";
}
?>

<p><?php echo $message; ?></p>

<table border="1">
  <tr>
    <th>Produit</th>
    <th>Prix</th>
    <th>Quantité</th>
    <th>Sous-total</th>
  </tr>

  <?php
  $total = 0;
  foreach ($_SESSION['panier'] as $p) {
      $sous = $p['prix'] * $p['quantite'];
      $total = $total + $sous;
      echo "<tr>";
      echo "<td>" . $p['produit'] . "</td>";
      echo "<td>" . $p['prix'] . "</td>";
      echo "<td>" . $p['quantite'] . "</td>";
      echo "<td>" . $sous . "</td>";
      echo "</tr>";
  }
  ?>
</table>

<p>Total : <?php echo $total; ?> FCFA</p>