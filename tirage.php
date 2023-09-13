<?php

$developpeurs = [
    "Karima",
    "Wassila", "Alin", "Cynthia", "Rahim", "Oliver", "Alexis", "Michel",
    "Nawal", "Narcis", "Jeremy", "Mitra", "Abraham"
];

$aleatoire = rand(0, count($developpeurs) - 1);

$nomAleatoire = $developpeurs[$aleatoire];

echo $nomAleatoire;

$dateduJour = date('Y-m-d H:i:s');
// Connexion base de données
function dbConnexion()
{
    $connexion = null;
    try {
        $connexion = new PDO("mysql:host=localhost;dbname=tirage", "root", "");
    } catch (PDOException $e) {
        $connexion = $e->getMessage();
    }
    return $connexion;
}

$db = dbConnexion();

// Préparer la requête :
$request = $db->prepare('INSERT INTO sort (date_tirage,personne_tiree) VALUES(?,?)');

// Execution de la requête :
$request->execute(array($dateduJour,$nomAleatoire));
