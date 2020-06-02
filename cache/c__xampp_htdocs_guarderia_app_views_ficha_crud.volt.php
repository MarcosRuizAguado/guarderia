<?php echo $this->tag->stylesheetLink("css/style_crud.css"); ?>
<h2>Administracion fichas</h2>

<nav>
    <li class="list">
        <a href="<?= $this->url->get('ficha/registro') ?>">Añadir / Modificar ficha</a>
    </li>
    <li class="list">
        <a href="<?= $this->url->get('ficha/eliminar') ?>">Eliminar</a>
    </li>
</nav>

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

