<?php echo $this->tag->stylesheetLink("css/style_formRegistroFicha.css"); ?>
<h2>Eliminar ficha</h2>
<form action="<?= $this->url->get('ficha/eliminar') ?>" method="POST">
    <label for="aula">Aula:</label>
    <select id="aula" name="aula">
        <option value="0">Seleccione un aula</option>
        <?php if (!empty($aulas)) { ?>
            <?php foreach ($aulas as $aula) { ?>
                <option value='<?= $aula['CodAula'] ?>'><?= $aula['CodAula'] ?></option>
            <?php } ?>
        <?php } ?>
    </select>
    <br>

    <button type="submit">Buscar aula</button>
    <a id="cancel" href="<?= $this->url->get('ficha/crud') ?>">Cancelar</a>
</form>
<br><br>

<form action="<?= $this->url->get('ficha/eliminar') ?>" method="POST">
    <label for="alumno">Alumno:</label>
    <select id="alumno" name="alumno">
        <option value="0">Seleccione un alumno</option>
        <?php if (!empty($ninos)) { ?>
            <?php foreach ($ninos as $nino) { ?>
                <option value='<?= $nino['CodAlum'] ?>'><?= $nino['Nombre'] ?> <?= $nino['Apellido1'] ?> <?= $nino['Apellido2'] ?></option>
            <?php } ?>
        <?php } ?>
    </select>
    <br>
    <label for="fecha">Fecha :</label>
    <input type="date" id="fecha" name="fecha">
    <br>

    <button type="submit" id="enviar" name="enviar">Ver ficha del alumno</button>
    <a id="cancel" href="<?= $this->url->get('ficha/crud') ?>">Cancelar</a>
</form>
<br><br>

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
