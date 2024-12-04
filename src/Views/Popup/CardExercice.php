<button onclick="closePopup()" class="buttonClosePopup">X</button><br>
<form class="ajaxForm" method="post" data-entity="Exercice" data-type-action="<?= $exercice->id != 0 ? "ajaxFormUpdate" : "ajaxFormAdd"  ?>">
    <input type="hidden" name="typeAction" value="<?= $exercice->id != 0 ? "update" : "add"?>">
    <input type="hidden" name="id" value="<?= $exercice->id ?>">
    <label for="duration">Durée de l'exercice</label>
    <input type="text" name="duration" value="<?= $exercice->duration ?>" required>
    <label for="repetition">Nombre de répétition</label>
    <input type="text" name="repetition" value="<?= $exercice->repetition ?>" required>
    <label for="rest">Temps de repos</label>
    <input type="text" name="rest" value="<?= $exercice->rest ?>" required>
    <label for="machine">Machine</label>
    <select name="id_machine" required>
        <?php
        foreach ($machines as $machine){
            $selected = "";
            if ($exercice->id != 0){
                $selected = $machine->__get("id") == $exercice->__get("machine")->__get("id") ? "selected" : "";
            }
            ?>
            <option value="<?= $machine->__get("id") ?>" <?= $selected ?>><?= $machine->__get("name") ?></option>
            <?php
        }
        ?>
    </select><br>

    <div class="flex-center">
        <button class="button" type="submit">Enregistrer</button>
    </div>
</form>