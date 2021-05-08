<?php
$user = "root";
$password = "";
$srv = "localhost";
$database = "crypto_devise";

try {
    $pdo = new PDO("mysql:host=$srv;dbname=$database", $user, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    $pdo->exec('SET CHARACTER SET utf8'); // Indique à PDO qu'on veut de l'encodage UTF-8
} catch (Exception $e) {
    echo $e->getMessage();
}
