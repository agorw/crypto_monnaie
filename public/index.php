<?php

require_once './../src/common.php';

// On récupére la valeur GET "p" qui se trouve dans le lien
$page = $_GET['p'] ?? 'accueil';

// Sécurité: empêche de charger n'importe quel fichier
// L'expressions régulière permettent de tester le format de la chaîne
// Test si $page contient d'autres caractère que des lettres en minuscule et majuscule
if (!preg_match('/^[a-zA-Z_]*$/', $page)) {
    $page = 'accueil';
}

// S'il y a la chaine "admin" dans cette variable
if (false !== strpos($page, 'admin_')) {
    $page = substr($page, 6); // On supprime "admin_" de la chaîne
    checkAdmin(); // Test si l'utilisateur est administrateur, fait une redirection si l'user n'est pas admin
    require_once "../src/pages/admin/$page.php"; // Charge la page dans le dossier admin
} else {
    require_once "./../src/pages/$page.php"; // Charge la page
}
if (isset($_POST['name'])) {
    addDevise($_POST['name'], $_POST['img']);
}
