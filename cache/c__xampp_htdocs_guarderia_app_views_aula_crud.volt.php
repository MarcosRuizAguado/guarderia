<?php echo $this->tag->stylesheetLink("css/style_crud.css"); ?>
<h2>Administracion aulas</h2>

<nav>
    <li class="list">
        <a href="<?= $this->url->get('aula/registro') ?>">Registrar nueva aula</a>
    </li>
    <li class="list">
        <a href="<?= $this->url->get('aula/elegirAula') ?>">Modificar</a>
    </li>
    <li class="list">
        <a href="<?= $this->url->get('aula/elegirAulaDelete') ?>">Eliminar</a>
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
