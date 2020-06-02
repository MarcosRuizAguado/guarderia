<?php echo $this->tag->stylesheetLink("css/style_listaMensajes.css"); ?>
<div id="cabecera">
    <h2>Mensajes</h2> 
    <?php if ($this->session->has('rol') != 'admin') { ?>
        <a id="enlace" href="<?= $this->url->get('mensajes/formMensajesAdmin') ?>">¿Necesitas mandarnos un mensaje?</a>
    <?php } ?>
</div>
<div>
    <?php if (!(empty($unread))) { ?>
        <h3><?= $unread ?></h3>
    <?php } ?>
</div>
<?php if (!(empty($mensajes))) { ?>
    <?php foreach ($mensajes as $mensa) { ?>
        <?php if ($mensa['Leido'] == 0) { ?>
            <div id="mensaje">
                <div id="lista-no">
                    Titulo : <?= $mensa['Titulo'] ?> <br>
                    Fecha : <?= $mensa['Fecha'] ?> <br>
                    De : <?= $mensa['De'] ?> <br>       
                </div>
                <section>
                    <img src="../img/unread.png" alt="unread" class="icon">
                    <a href="<?= $this->url->get('mensajes/show/') ?><?= $mensa['ID'] ?>">Ver mensaje</a>
                    <a href="<?= $this->url->get('mensajes/delete/') ?><?= $mensa['ID'] ?>">Eliminar mensaje</a>
                </section>
            </div>
        <?php } else { ?>
            <div id="mensaje">
                <div id="lista">
                    Titulo : <?= $mensa['Titulo'] ?> <br>
                    Fecha : <?= $mensa['Fecha'] ?> <br>
                    De : <?= $mensa['De'] ?> <br>     
                </div>
                <section>
                    <img src="../img/read.png" alt="read" class="icon">
                    <a href="<?= $this->url->get('mensajes/show/') ?><?= $mensa['ID'] ?>">Ver mensaje</a>
                    <a href="<?= $this->url->get('mensajes/delete/') ?><?= $mensa['ID'] ?>">Eliminar mensaje</a>
                </section>
            </div>
        <?php } ?>

    <?php } ?>
<?php } else { ?>
    <h3>No tiene mensajes para mostrar</h3>
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
<div id="volver">
    <a href="<?= $this->url->get('index/index') ?>">Volver</a>
</div>

