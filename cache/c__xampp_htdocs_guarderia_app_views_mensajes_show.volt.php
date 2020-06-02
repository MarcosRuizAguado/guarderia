<?php echo $this->tag->stylesheetLink("css/style_mensajes_show.css"); ?>
<script src="../../public/js/menu.js"></script>
<h2>Mensaje</h2>
<?php if (!empty($mensa)) { ?>
    <?php foreach ($mensa as $men) { ?>
        <div id="mensaje">  
            <div id="mensa">
                Titulo :<?= $men->getTitulo() ?> <br>
                Fecha : <?= $men->getFecha() ?> <br>
                De : <?= $men->getDe() ?> <br><br>
            </div>

            <div id="mensa_content">
                Mensaje : <?= $men->getMensaje() ?><br>
            </div>
        </div>
    <?php } ?>
<?php } ?>
<div id="volver">
    <a href="<?= $this->url->get('mensajes/listaMensajes') ?>">Volver</a>
</div>