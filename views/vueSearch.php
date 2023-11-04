<?php include('message.php'); ?>

<h1>Rechercher un pokémon</h1>

<form action="" method="POST">
    <div class="form-group">
        <label for="recherche">Rerchercher</label>
        <input type="text" name="recherche" id="recherche" class="form-control"<?php if($data !== null) echo " value='{$data['recherche']}'"; ?> required>
    </div>
    <div class="form-group">
        <label for="champ">Dans le champ</label>
        <select id="champ" name="champ" class="form-control" required>
            <?php foreach ($champs as $champ): ?>
                <option value="<?= $champ->name ?>"<?php if($data !== null) if ($data['champ'] == $champ->name) echo " selected"; ?>><?= $champ->name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Rechercher">
    </div>
</form>

<section class="pokemons">
    <?php if(!empty($pokemons)): foreach ($pokemons as $pokemon): ?>
        <article class="pokemon">
            <img src="<?= $pokemon->getUrlImg() ?>" alt="<?= $pokemon->getNomEspece() ?>">
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
    <?php endforeach; elseif ($data !== null): ?>
        <p>Aucun résultat pour « <?= $data['recherche'] ?> » dans <?= $data['champ'] ?>.</p>
    <?php endif ?>
</section>