<?php echo $this->tag->stylesheetLink("css/style_aulas_ninos.css"); ?>
<?php echo $this->tag->stylesheetLink("css/imagehover.min.css"); ?>
<script src="../../public/js/menu.js"></script>
<h2><?= $aula->getNombre() ?></h2>

<div id="clase">  
    <?php $emp = $aula->getNene(); ?>
    <?php foreach ($emp as $nino) { ?>

        <figure class="imghvr-slide-down" id="nino" style="background-color:yellow;">
            <img src="../../img/ninos/<?= $nino->getFoto() ?>">
            <figcaption style="background-color: rgba(0,0,0,0.5);">
                <h4 style="color: white;"><?= $nino->getNombre() ?></h4>
                <?php if ($nino->getCodAlum() == $codi_padre) { ?>
                    <a href="<?= $this->url->get('ficha/show') ?>"></a>
                <?php } ?>
            </figcaption>
        </figure>
        <?php if ($nino->getCodAlum() == $codi_padre) { ?>
            <h4 id="nom"><a href="<?= $this->url->get('ficha/show') ?>"><?= $nino->getNombre() ?></a></h4>
            <?php } else { ?>
            <h4 id="nom"><?= $nino->getNombre() ?></h4>
            <?php } ?>
        <?php } ?>
</div>


<div id="volver">
    <a href="<?= $this->url->get('index/index') ?>">Volver</a>
</div>