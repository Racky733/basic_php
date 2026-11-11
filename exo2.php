<?php require_once "fonctions.php"; ?>

<form method="post">
  <input type="text" name="nom" placeholder="Nom">
  <input type="number" name="heures" placeholder="Heures">
  <input type="number" name="tarif" placeholder="Tarif horaire">
  <button type="submit" name="calculer">Calculer</button>
</form>

<?php
if (isset($_POST['calculer'])) {
    $nom = $_POST['nom'];
    $heures = $_POST['heures'];
    $tarif = $_POST['tarif'];

    if ($nom == "" || $heures == "" || $tarif == "") {
        echo "Tous les champs sont obligatoires.";
    } elseif (is_numeric($nom)) {
        echo "Le nom ne doit pas être un nombre.";
    } else {
        $brut = calculSalaire($heures, $tarif);
        $prime = 0;
        if ($brut > 500000) {
            $prime = $brut * 0.10;
        }
        $total = $brut + $prime;

        echo "Nom : " . $nom . "<br>";
        echo "Salaire brut : " . $brut . " FCFA<br>";
        echo "Prime : " . $prime . " FCFA<br>";
        echo "Salaire total : " . $total . " FCFA";
    }
}
?>