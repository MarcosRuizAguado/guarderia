<?php echo $this->tag->stylesheetLink("css/style_crud.css"); ?>
<h2>Administracion de perfiles de usuario</h2>

<nav>
    <li class="list">
        <a href="<?= $this->url->get('index/registro') ?>">Registrar nuevo usuario</a>
    </li>
    <li class="list">
        <a href="<?= $this->url->get('padre/elegirPerfil') ?>">Modificar</a>
    </li>
    <li class="list">
        <a href="<?= $this->url->get('padre/elegirPerfilDelete') ?>">Eliminar</a>
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

