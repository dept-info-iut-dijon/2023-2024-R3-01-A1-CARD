<?php if (!empty($message)): ?>
    <div class="notif notif-<?= $msgType ?>"><?= $message ?></div>
<?php endif ?>

<h1>Pokémons</h1>

<section class="pokemons">
    <?php foreach ($pokemons as $pokemon): ?>
        <article class="pokemon">
            <img src="<?= $pokemon->getUrlImg() ?>" alt="Nom du pokémon">
            <div class="infos">
                <h2>#<?= $pokemon->getIdPokemon() ?> - <?= $pokemon->getNomEspece() ?></h2>
                <div class="tags">
                    <?= "<span class='tag tag-info'>{$pokemon->getTypeOne()}</span>" ?>
                    <?php if($pokemon->getTypeTwo() != null) echo "<span class='tag tag-info'>{$pokemon->getTypeTwo()}</span>"; ?>
                </div>
                <p><?= $pokemon->getDescription() ?></p>
            </div>
            <div class="actions">
                <a href="index.php?action=edit-pokemon&idPokemon=<?= $pokemon->getIdPokemon() ?>" class="btn btn-primary">Modifier</a>
                <a href="index.php?action=del-pokemon&idPokemon=<?= $pokemon->getIdPokemon() ?>" class="btn btn-danger">Supprimer</a>
            </div>
        </article>
    <?php endforeach ?>
</section>