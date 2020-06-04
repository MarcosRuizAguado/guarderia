<?php echo "<script src='https://code.jquery.com/jquery-3.4.1.js'></script>"; ?>
<?php echo "<script src='../js/parsley.min.js'></script>"; ?>
<?php echo "<script src='../js/es.js'></script>"; ?>
<?php echo $this->tag->stylesheetLink("css/parsley.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formRegistroFicha.css"); ?>
<h2>Añade el menú del <?= $dia ?>, <?= $fecha ?></h2>

<br>

<?php if (empty($menu)) { ?>
    <form action="<?= $this->url->get('menu/addMenuFicha') ?>" method="POST" data-parsley-validate>
        <label for="fecha_add">Fecha :</label>
        <input type="date" id="fecha_add" name="fecha_add" value="<?= $fecha ?>" readonly>
        <br>

        <label for="comida_primero">Primer plato :</label>
        <input type="text" id="comida_primero" name="comida_primero" value="" data-parsley-required>
        <br>

        <label for="comida_segundo">Segundo plato :</label>
        <input type="text" id="comida_segundo" name="comida_segundo" value="" data-parsley-required>
        <br>

        <label for="comida_postre">Postre :</label>
        <input type="text" id="comida_postre" name="comida_postre" value="" data-parsley-required>
        <br>

        <label for="merienda">Merienda :</label>
        <input type="text" id="merienda" name="merienda" value="" data-parsley-required>
        <br>
        <br>

        <button type="submit">Añadir menú</button>
        <a href="<?= $this->url->get('menu/menu') ?>">Cancelar</a>
    </form>
<?php } ?>

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