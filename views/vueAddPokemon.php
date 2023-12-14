<?php include('message.php'); ?>

<h1><?= !empty($pokemon) ? "Modifier {$pokemon->getNomEspece()}" : "Ajouter un pokémon" ?></h1>

<form action="index.php?action=<?= !empty($pokemon) ? 'edit' : 'add' ?>-pokemon" method="post">
    <div class="form-group">
        <label for="nomEspece">Nom de l'espèce</label>
        <input type="text" name="nomEspece" id="nomEspece" class="form-control"<?php if (!empty($pokemon)) echo " value='{$pokemon->getNomEspece()}'"; ?> required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?php if (!empty($pokemon)) echo "{$pokemon->getDescription()}"; ?></textarea>
    </div>
    <div class="form-group">
        <label for="typeOne">Type 1</label>
        <select name="typeOne" id="typeOne" class="form-control" required>
            <?php foreach($types as $type): ?>
                <option value="<?= intval($type->getIdType()) ?>" <?php if (!empty($pokemon)) if (($pokemon->getTypeOne())->getIdType() == $type->getIdType()) echo " selected"; ?>><?= $type->getNomType() ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="typeTwo">Type 2</label>
        <select name="typeTwo" id="typeTwo" class="form-control">
            <option value="null" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === null) echo " selected"; ?>>Aucun</option>
            <?php foreach($types as $type): ?>
                <option value="<?= intval($type->getIdType()) ?>" <?php if (!empty($pokemon)) if (($pokemon->getTypeTwo())?->getIdType() == $type->getIdType()) echo " selected"; ?>><?= $type->getNomType() ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="urlImg">Image</label>
        <input type="text" name="urlImg" id="urlImg" class="form-control"<?php if (!empty($pokemon)) echo " value='{$pokemon->getUrlImg()}'"; ?>>
    </div>
    <?php if (!empty($pokemon)) : ?>
        <input type="hidden" id="idPokemon" name="idPokemon" value="<?= $pokemon->getIdPokemon() ?>">
    <?php endif ?>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="<?= !empty($pokemon) ? "Mettre à jour {$pokemon->getNomEspece()}" : 'Ajouter le pokémon' ?>">
    </div>
</form>
