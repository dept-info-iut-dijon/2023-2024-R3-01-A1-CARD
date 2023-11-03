<h1>Rechercher un pokémon</h1>

<form action="" method="POST">
    <div class="form-group">
        <label for="recherche">Rerchercher</label>
        <input type="text" name="recherche" id="recherche" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="champ">Dans le champ</label>
        <select id="champ" name="champ" class="form-control">
            <?php foreach ($champs as $champ): ?>
                <option value="<?= $champ->name ?>"><?= $champ->name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Rechercher">
    </div>
</form>