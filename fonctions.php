<?php
function moyenne($notes){
    $somme = 0;
    $nb = 0;
    foreach ($notes as $n){
        $somme += $n;
        $nb++;
    }
    return $somme / $nb;
}

function noteMax($notes){
    $max = $notes[0];
    foreach ($notes as $n) {
        if ($n > $max) $max = $n;
    }
    return $max;
}

function noteMin($notes){
    $min = $notes[0];
    foreach ($notes as $n) {
        if ($n < $min) $min = $n;
    }
    return $min;
}

function admis($moyenne) {
    return ($moyenne >= 10) ? "Admis" : "Ajourné";
}

function calculSalaire($heures, $tarif) {
    return $heures * $tarif;
}

function sousTotal($prix, $quantite) {
    return $prix * $quantite;
}

function totalPanier($panier) {
    $total = 0;
    foreach ($panier as $p) {
        $total += sousTotal($p['prix'], $p['quantite']);
    }
    return $total;
}

function ajouterProduit($produit, $prix, $quantite) {
    $_SESSION['panier'][] = [
        'produit'  => $produit,
        'prix'     => $prix,
        'quantite' => $quantite
    ];
}

function viderPanier() {
    $_SESSION['panier'] = [];
}