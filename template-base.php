<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="navigation bg-blue disable">
        <div>
            <i id="btn-return" class="fas fa-arrow-alt-circle-left fa-2x"></i>
            <div id="menuLogo"></div>
        </div>
        <div>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Inscription</a></li>
                <li><a href="#">Connexion</a></li>
            </ul>
        </div>
    </div>
    <!-- Bouton Toggle Menu permettant l'affichage du menu -->
    <div class="navigation2 bg-blue">
        <div id="content  bg-blue ">
            <i id="sidebarCollapse" class="fas fa-bars fa-2x"></i>
        </div>
    </div>
    <!-- FIN PARTIE MENU SIDEBAR -->
    <div class="container">
        <?= $content ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>