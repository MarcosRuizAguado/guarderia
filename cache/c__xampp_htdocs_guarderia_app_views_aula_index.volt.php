<?php echo $this->tag->stylesheetLink("css/style_aulas.css"); ?>
<div id="aula">

    <?php if (!empty($aula)) { ?>
        <?php foreach ($aula as $aul) { ?>
            <section>
                <h2><?= $aul['Nombre'] ?></h2>
                <a href="<?= $this->url->get('aula/show/') ?><?= $aul['CodAula'] ?>"><img src="http://localhost/guarderia/img/<?= $aul['Logo'] ?>" title="Ver aula"></a>
            </section>
        <?php } ?>
    <?php } ?>
</div>