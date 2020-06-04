<?php echo $this->tag->stylesheetLink("css/style_perfil.css"); ?>
<div>
    <form action='<?= $this->url->get('aula/formUpdateAula') ?>' method='POST'>
        <h3>Aulas</h3>
        <select id="aula" name="aula">
            <option value="0">Seleccione para modificar</option>
            <?php if (!empty($aulas)) { ?>
                <?php foreach ($aulas as $aula) { ?>
                    <option value='<?= $aula['CodAula'] ?>'><?= $aula['Nombre'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
        <button type='submit'>Modificar</button>
    </form>

    <div id="volver">
        <a href="<?= $this->url->get('aula/crud') ?>">Volver</a>
    </div>
    <div id="error">
        <?php if (!(empty($error))) { ?>
            <?= $error ?>
        <?php } ?>
    </div>
    <div id="succes">
        <?php if (!(empty($succes))) { ?>
            <?= $succes ?>
        <?php } ?>
    </div>
</div>






