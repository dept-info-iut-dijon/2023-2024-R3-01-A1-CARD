<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="public/css/main.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titre ?></title>
    <link rel="icon" href="public/img/logo.png">
</head>

<body>
<header>
    <div class="logo">
        <img src="public/img/logo.png" alt="Pokédex">
        Pokédex
    </div>
    <!-- Menu -->
    <nav>
        <svg onclick="document.getElementById('navbar').classList.toggle('toggled')" class="btn-burger" width="30px" height="30px" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 7L4 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
            <path d="M20 12L4 12" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
            <path d="M20 17L4 17" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <ul id="navbar">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?action=add-pokemon">Ajouter</a></li>
            <li><a href="index.php?action=add-pokemon-type">Types</a></li>
            <li><a href="index.php?action=search">Rechercher</a></li>
        </ul>
    </nav>
</header>
<!-- #contenu -->
<main id="contenu">
    <?= $contenu ?>
</main>
<footer>

</footer>
</body>

</html>