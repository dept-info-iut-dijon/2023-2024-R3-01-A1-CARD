<?php if (!empty($message)): ?>
    <div class="notif notif-danger" role="alert">
        <?= $message ?>
    </div>
<?php endif ?>

<h1><?= !empty($pokemon) ? "Modifier {$pokemon->getNomEspece()}" : 'Ajouter un pokémon' ?></h1>

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
            <option value="Acier" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Acier") echo " selected"; ?>>Acier</option>
            <option value="Combat" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Combat") echo " selected"; ?>>Combat</option>
            <option value="Dragon" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Dragon") echo " selected"; ?>>Dragon</option>
            <option value="Eau" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Eau") echo " selected"; ?>>Eau</option>
            <option value="Electrik" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Electrik") echo " selected"; ?>>Electrik</option>
            <option value="Fée" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Fée") echo " selected"; ?>>Fée</option>
            <option value="Feu" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Feu") echo " selected"; ?>>Feu</option>
            <option value="Glace" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Glace") echo " selected"; ?>>Glace</option>
            <option value="Insecte" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Insecte") echo " selected"; ?>>Insecte</option>
            <option value="Normal" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Normal") echo " selected"; ?>>Normal</option>
            <option value="Plante" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Plante") echo " selected"; ?>>Plante</option>
            <option value="Poison" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Poison") echo " selected"; ?>>Poison</option>
            <option value="Psy" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Psy") echo " selected"; ?>>Psy</option>
            <option value="Roche" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Roche") echo " selected"; ?>>Roche</option>
            <option value="Sol" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Sol") echo " selected"; ?>>Sol</option>
            <option value="Spectre" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Spectre") echo " selected"; ?>>Spectre</option>
            <option value="Ténèbres" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Ténèbres") echo " selected"; ?>>Ténèbres</option>
            <option value="Vol" <?php if (!empty($pokemon)) if ($pokemon->getTypeOne() === "Vol") echo " selected"; ?>>Vol</option>
        </select>
    </div>
    <div class="form-group">
        <label for="typeTwo">Type 2</label>
        <select name="typeTwo" id="typeTwo" class="form-control">
            <option value="null" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === null) echo " selected"; ?>>Aucun</option>
            <option value="Acier" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Acier") echo " selected"; ?>>Acier</option>
            <option value="Combat" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Combat") echo " selected"; ?>>Combat</option>
            <option value="Dragon" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Dragon") echo " selected"; ?>>Dragon</option>
            <option value="Eau" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Eau") echo " selected"; ?>>Eau</option>
            <option value="Electrik" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Electrik") echo " selected"; ?>>Electrik</option>
            <option value="Fée" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Fée") echo " selected"; ?>>Fée</option>
            <option value="Feu" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Feu") echo " selected"; ?>>Feu</option>
            <option value="Glace" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Glace") echo " selected"; ?>>Glace</option>
            <option value="Insecte" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Insecte") echo " selected"; ?>>Insecte</option>
            <option value="Normal" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Normal") echo " selected"; ?>>Normal</option>
            <option value="Plante" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Plante") echo " selected"; ?>>Plante</option>
            <option value="Poison" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Poison") echo " selected"; ?>>Poison</option>
            <option value="Psy" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Psy") echo " selected"; ?>>Psy</option>
            <option value="Roche" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Roche") echo " selected"; ?>>Roche</option>
            <option value="Sol" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Sol") echo " selected"; ?>>Sol</option>
            <option value="Spectre" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Spectre") echo " selected"; ?>>Spectre</option>
            <option value="Ténèbres" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Ténèbres") echo " selected"; ?>>Ténèbres</option>
            <option value="Vol" <?php if (!empty($pokemon)) if ($pokemon->getTypeTwo() === "Vol") echo " selected"; ?>>Vol</option>
        </select>
    </div>
    <div class="form-group">
        <label for="urlImg">Image</label>
        <input type="text" name="urlImg" id="urlImg" class="form-control"<?php if (!empty($pokemon)) echo " value='{$pokemon->getUrlImg()}'"; ?>>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="<?= !empty($pokemon) ? "Mettre à jour {$pokemon->getNomEspece()}" : 'Ajouter le pokémon' ?>">
    </div>
</form>