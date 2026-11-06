<?php
$notes = [12, 15, 8, 17, 10, 14];

function moyenne($notes){
    $somme = 0;
    $nb = 0;

    foreach ($notes as $n){
        $somme += $n;
        $nb++;
    }
    return $somme / $nb ;
}

function noteMax($notes){
    $max = $notes[0];
    foreach ($notes as $n) {
        if ($n > $max){
            $max = $n;   
        }
    }
    return $max;
}

function noteMin($notes){
    $min = $notes[0];
    foreach ($notes as $n) {
        if ($n < $min){
            $min = $n;   
        }
    }
    return $min;
}

function admis($moyenne) {
    if ($moyenne >= 10){
        return "Admis";
    }else{
        return "Ajourné";
    }
}

echo "Notes : ";
foreach ($notes as $n) {
    echo $n . " ";
}

echo "<br>";

$m = moyenne($notes);

echo "Moyenne : " . $m . "<br>";

echo "Note max : " . noteMax($notes) . "<br>";

echo "Note min : " . noteMin($notes) . "<br>";

echo "Décision : " . admis($m);

?>

    


