<button onclick="closePopup()" class="buttonClosePopup">X</button><br>
<form class="ajaxForm" method="post" data-entity="Program" data-type-action="<?= $program->__get("id") != 0 ? "update" : "add"  ?>">
    <input type="hidden" name="typeAction" value="<?= $program->__get("id") != 0 ? "update" : "add"?>">
    <input type="hidden" name="id" value="<?= $program->__get("id") ?>">
    <label for="name">Nom de la machine</label>
    <input type="text" name="name" value="<?= $program->__get("name") ?>" required><br>
    <label for="motif">Motif du programme</label>
    <input type="text" name="motif" value="<?= $program->__get("motif") ?>" required><br>
    <label for="description">Description du programme</label>
    <textarea type="text" name="description" required><?= $program->__get("description") ?></textarea><br>
    <label for="picture">Image du programme</label>
    <input type="file" name="picture" accept="image/png, image/jpeg" value="<?= $program->__get("picture") ?>" required><br>

    <label for="listExercices">Exercices séléctionnés</label>
    <div class="listExercices flex-column flex-wrap">
        <?php
        foreach ($exercise as $ex){
            ?>
            <div>
                <input type="checkbox" name="exercise[]" value="<?= $ex->__get("id") ?>" <?= $program->isExerciceInProgram($ex->__get("id")) ? "checked" : "" ?>>
                <label class="exercices" for="exercise"><?= $ex->__get("machine")->__get("name") . " n°" . $ex->__get("id") ?></label>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="flex-center">
        <button class="button" type="submit">Enregistrer</button>
    <div>
</form>