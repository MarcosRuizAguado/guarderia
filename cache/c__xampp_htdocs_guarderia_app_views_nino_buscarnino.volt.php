<?php echo $this->tag->stylesheetLink("css/style_perfil0.css"); ?>
<div>
    <form action="<?= $this->url->get('nino/addOtroPadre') ?>" method="POST">
        <h3>Datos del niño/niña :</h3>
        <select id="nino" name="nino">
            <option value="0">Seleccione un alumno</option>
            <?php if (!empty($ninos)) { ?>
                <?php foreach ($ninos as $nino) { ?>
                    <option value='<?= $nino['CodAlum'] ?>'><?= $nino['Nombre'] ?> <?= $nino['Apellido1'] ?> <?= $nino['Apellido2'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
        <button type='submit'>Seleccionar</button>
    </form>

    
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
    <a id="cancel" href="<?= $this->url->get('index/crud') ?>">Volver</a>
</div>






