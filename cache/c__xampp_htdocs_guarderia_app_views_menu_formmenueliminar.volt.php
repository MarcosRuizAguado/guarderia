<?php echo $this->tag->stylesheetLink("css/style_formMenu.css"); ?>
<h2>Eliminar menú</h2>

<form action="<?= $this->url->get('menu/formMenuEliminar') ?>" method="POST">
    <label for="fecha">Introduce una fecha:</label>
    <input type="date" id="fecha" name="fecha">
    <br>
    <button type="submit">Obtener menú</button>
</form>
<br><br>
<?php if (!empty($menu)) { ?>
    <form action="<?= $this->url->get('menu/deleteMenu') ?>" method="POST">
        <label for="fecha">Fecha :</label>
        <input type="date" id="fecha" name="fecha" value="<?= $menu['Fecha'] ?>" readonly>
        <br>

        <label for="comida_primero">Primer plato :</label>
        <input type="text" id="comida_primero" name="comida_primero" value="<?= $menu['Comida_primero'] ?>" readonly>
        <br>

        <label for="comida_segundo">Segundo plato :</label>
        <input type="text" id="comida_segundo" name="comida_segundo" value="<?= $menu['Comida_segundo'] ?>" readonly>
        <br>

        <label for="comida_postre">Postre :</label>
        <input type="text" id="comida_postre" name="comida_postre" value="<?= $menu['Comida_postre'] ?>" readonly>
        <br>

        <label for="merienda">Merienda :</label>
        <input type="text" id="merienda" name="merienda" value="<?= $menu['Merienda'] ?>" readonly>
        <br>
        <br>

        <button type="submit">Eliminar menú</button>
        <a id="cancel" href="<?= $this->url->get('menu/menu') ?>">Cancelar</a>
    </form>
<?php } ?>

<?php if (empty($menu)) { ?>
    <h2>No hay menú establecido para esa fecha</h2>
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
