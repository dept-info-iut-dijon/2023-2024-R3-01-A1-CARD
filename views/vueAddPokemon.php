<h1>Ajouter un pokémon</h1>

<form action="index.php?action=add-pokemon" method="post">
    <div class="form-group">
        <label for="nomEspece">Nom de l'espèce</label>
        <input type="text" name="nomEspece" id="nomEspece" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="typeOne">Type 1</label>
        <select name="typeOne" id="typeOne" class="form-control" required>
            <option value="Acier">Acier</option>
            <option value="Combat">Combat</option>
            <option value="Dragon">Dragon</option>
            <option value="Eau">Eau</option>
            <option value="Electrik">Electrik</option>
            <option value="Fée">Fée</option>
            <option value="Feu">Feu</option>
            <option value="Glace">Glace</option>
            <option value="Insecte">Insecte</option>
            <option value="Normal">Normal</option>
            <option value="Plante">Plante</option>
            <option value="Poison">Poison</option>
            <option value="Psy">Psy</option>
            <option value="Roche">Roche</option>
            <option value="Sol">Sol</option>
            <option value="Spectre">Spectre</option>
            <option value="Ténèbres">Ténèbres</option>
            <option value="Vol">Vol</option>
        </select>
    </div>
    <div class="form-group">
        <label for="typeTwo">Type 2</label>
        <select name="typeTwo" id="typeTwo" class="form-control" required>
            <option value="null">Aucun</option>
            <option value="Acier">Acier</option>
            <option value="Combat">Combat</option>
            <option value="Dragon">Dragon</option>
            <option value="Eau">Eau</option>
            <option value="Electrik">Electrik</option>
            <option value="Fée">Fée</option>
            <option value="Feu">Feu</option>
            <option value="Glace">Glace</option>
            <option value="Insecte">Insecte</option>
            <option value="Normal">Normal</option>
            <option value="Plante">Plante</option>
            <option value="Poison">Poison</option>
            <option value="Psy">Psy</option>
            <option value="Roche">Roche</option>
            <option value="Sol">Sol</option>
            <option value="Spectre">Spectre</option>
            <option value="Ténèbres">Ténèbres</option>
            <option value="Vol">Vol</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control" required>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Ajouter le pokémon">
    </div>
</form>