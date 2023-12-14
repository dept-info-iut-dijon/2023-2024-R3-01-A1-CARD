<?php include('message.php'); ?>

<h1>Ajouter un type de pokémon</h1>

<form action="" method="POST">
    <div class="form-group">
        <label for="nomType">Nom du type</label>
        <input type="text" name="nomType" id="nomType" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="urlImg">URL de l'image</label>
        <input type="text" name="urlImg" id="urlImg" class="form-control" required>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Ajouter le type">
    </div>
</form>