<?php echo $this->tag->stylesheetLink("css/style_ver_menu.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formUpdatePerfil.css"); ?>
<h2 id="titulo">Menú</h2>

<form action="<?= $this->url->get('menu/verMenu') ?>" method="POST">
    <label for="fecha">Introduce una fecha:</label>
    <input type="date" id="fecha" name="fecha"  value="<?php echo date('Y-m-d');?>">
    <br>
    <button type="submit">Obtener menú</button>
</form>
<br><br>
<?php if (!empty($menu)) { ?>
    <div id="menu">
        <p>Fecha : <?= $menu['Fecha'] ?></p> 
        <br>

        <p>Primer plato : <?= $menu['Comida_primero'] ?></p> 
        <br>

        <p>Segundo plato : <?= $menu['Comida_segundo'] ?></p> 
        <br>

        <p>Postre : <?= $menu['Comida_postre'] ?></p> 
        <br>

        <p>Merienda : <?= $menu['Merienda'] ?></p> 
        <br>
        <br>
    </div>
    
<?php } ?>

<?php if (empty($menu)) { ?>
    <h2>No hay menú establecido para esa fecha</h2>
<?php } ?>
<div id="volver">
    <a href="<?= $this->url->get('index/index') ?>">Volver</a>
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
