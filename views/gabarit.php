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
        <ul>
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