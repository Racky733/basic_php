<?php
session_start();
require_once "fonctions.php";
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
    } elseif (is_numeric($produit)) {
        $message = "Le nom du produit ne doit pas être un nombre.";
    } else {
        ajouterProduit($produit, $prix, $quantite);
    }
}

if (isset($_POST['vider'])) {
    viderPanier();
}

if (isset($_POST['quitter'])) {
    session_destroy();
    viderPanier();
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
  foreach ($_SESSION['panier'] as $p) {
      echo "<tr>";
      echo "<td>" . $p['produit'] . "</td>";
      echo "<td>" . $p['prix'] . "</td>";
      echo "<td>" . $p['quantite'] . "</td>";
      echo "<td>" . sousTotal($p['prix'], $p['quantite']) . "</td>";
      echo "</tr>";
  }
  ?>
</table>

<p>Total : <?php echo totalPanier($_SESSION['panier']); ?> FCFA</p>