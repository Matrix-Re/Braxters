<button onclick="closePopup()" class="buttonClosePopup">X</button><br>
<form class="ajaxForm" method="post" data-entity="Machine" data-type-action="<?= $machine->id != 0 ? "update" : "add"  ?>">
    <input type="hidden" name="typeAction" value="<?= $machine->id != 0 ? "update" : "add"?>">
    <input type="hidden" name="id" value="<?= $machine->id ?>">
    <label for="name">Nom de la machine</label>
    <input type="text" name="name" value="<?= $machine->name ?>" required>
    <label for="description">Type de machine</label>
    <input type="text" name="type" value="<?= $machine->type ?>" required>
    <label for="picture">Image de la machine</label>
    <input type="file" name="picture" accept="image/png, image/jpeg" value="<?= $machine->picture ?>" required><br>
    <div class="flex-center">
        <button class="button" type="submit">Enregistrer</button>
    </div>
</form>