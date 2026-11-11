<?php
require_once "fonctions.php";

$taille = rand(5, 10);
$notes = [];
for ($i = 0; $i < $taille; $i++) {
    $notes[] = rand(10, 30);
}

echo "Notes : " . implode(" ", $notes) . "<br>";

$m = moyenne($notes);
echo "Moyenne : " . round($m, 2) . "<br>";
echo "Note max : " . noteMax($notes) . "<br>";
echo "Note min : " . noteMin($notes) . "<br>";
echo "Décision : " . admis($m);