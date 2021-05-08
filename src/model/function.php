<?php

function token()
{
    $_SESSION['token'] = md5(rand(0, 9999999));
}


function isAdmin(): bool
{
    return isset($_SESSION['user_admin']) && 1 == $_SESSION['user_admin'];
}

function checkAdmin()
{
    if (!isAdmin()) {
        header('Location: index.php');
    }
}

function addDevise(string $name, string $img)
{
    global $pdo;
    $name = strip_tags(trim($name));
    $img = strip_tags(trim($img));
    $date = date('Y-m-d H:i:s');
    $request = $pdo->prepare("INSERT INTO `devise` (`id_devise`, `name`, `date_add`, `image`) VALUES (NULL, ?, ?, ?);");
    $request->execute(array($name, $date, $img));

    return $request->fetch();
}

function getDevise()
{
    global $pdo;
    $request = $pdo->query('SELECT * FROM `devise` ');
    return $request->fetchAll();
}
