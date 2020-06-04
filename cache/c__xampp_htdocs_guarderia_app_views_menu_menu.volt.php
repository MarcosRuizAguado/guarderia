<?php echo $this->tag->stylesheetLink("css/style_crud.css"); ?>
<?php if ($this->session->has('rol') == 'admin') { ?>
    <h2>Administracion de menús</h2>
<?php } else { ?>
    <h2>Menú</h2>
<?php } ?>
<nav>
    <?php if ($this->session->has('rol') == 'admin') { ?>
        <li class="list">
            <a href="<?= $this->url->get('menu/formMenu') ?>">Añadir / Modificar menú</a>
        </li>
        <li class="list">
            <a href="<?= $this->url->get('menu/formMenuEliminar') ?>">Eliminar menú</a>
        </li>
    <?php } ?>
    <li class="list">
        <a href="<?= $this->url->get('menu/verMenu') ?>">Ver menú</a>
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