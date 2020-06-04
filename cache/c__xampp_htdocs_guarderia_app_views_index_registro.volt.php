<?php echo "<script src='https://code.jquery.com/jquery-3.4.1.js'></script>"; ?>
<?php echo "<script src='../js/parsley.min.js'></script>"; ?>
<?php echo "<script src='../js/es.js'></script>"; ?>
<?php echo $this->tag->stylesheetLink("css/parsley.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_registro.css"); ?>
<div id='cabecera'>
    <h3>Registrar nuevo usuario</h3>
    <a id="enlace" href="<?= $this->url->get('nino/buscarNino') ?>">El alumno ya esta registrado</a>
</div>

<h4>Datos del alumno</h4>
<form action="<?= $this->url->get('nino/submitRegistroAlumno') ?>" method="POST" data-parsley-validate>
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"
               placeholder="Nombre" value="<?= (isset($datosPost) ? $datosPost['nombre'] : '') ?>" data-parsley-required><br>

        <label for="nombre">Primer apellido:</label>
        <input type="text" id="apellido1" name="apellido1"
               placeholder="Apellido1" value="<?= (isset($datosPost) ? $datosPost['apellido1'] : '') ?>" data-parsley-required><br>

        <label for="nombre">Segundo apellido:</label>
        <input type="text" id="apellido2" name="apellido2"
               placeholder="Apellido2" value="<?= (isset($datosPost) ? $datosPost['apellido2'] : '') ?>" data-parsley-required><br>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto"><br>

        <label for="aula">Aula:</label>
        <select id="aula" name="aula" required data-parsley-required-message="Seleccione un aula.">
            <option value="">Seleccione un aula</option>
            <?php if (!empty($aulas)) { ?>
                <?php foreach ($aulas as $aula) { ?>
                    <option value='<?= $aula['CodAula'] ?>'><?= $aula['CodAula'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
        <br>
    </div>

    <div>
        <br>
        <button type="submit">Enviar datos</button>
        <a id="cancel" href="<?= $this->url->get('index/crud') ?>">Cancelar</a>

    </div>
</form>

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



