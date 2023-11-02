<h1>Pokédex de <?= $nomDresseur ?></h1>

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
                <a href="#" class="btn btn-primary">Modifier</a>
                <a href="#" class="btn btn-danger">Supprimer</a>
            </div>
        </article>
    <?php endforeach ?>
</section>