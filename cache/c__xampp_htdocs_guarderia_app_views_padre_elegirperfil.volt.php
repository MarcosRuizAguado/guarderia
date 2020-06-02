<?php echo $this->tag->stylesheetLink("css/style_perfil0.css"); ?>
<div>
    <form action='<?= $this->url->get('padre/formUpdatePerfil') ?>' method='POST'>
        <h3>Datos del padre/madre :</h3>
        <select id="padre" name="padre">
            <option value="0">Seleccione para modificar</option>
            <?php if (!empty($padres)) { ?>
                <?php foreach ($padres as $padre) { ?>
                    <option value='<?= $padre['ID'] ?>'><?= $padre['Nombre'] ?> <?= $padre['Apellido1'] ?> <?= $padre['Apellido2'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
        <button type='submit'>Modificar</button>
    </form>


    <form action="<?= $this->url->get('nino/formUpdatePerfil') ?>" method="POST">
        <h3>Datos del niño/niña :</h3>
        <select id="nino" name="nino">
            <option value="0">Seleccione para modificar</option>
            <?php if (!empty($ninos)) { ?>
                <?php foreach ($ninos as $nino) { ?>
                    <option value='<?= $nino['CodAlum'] ?>'><?= $nino['Nombre'] ?> <?= $nino['Apellido1'] ?> <?= $nino['Apellido2'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
        <button type='submit'>Modificar</button>
    </form>

    <div id="volver">
        <a href="<?= $this->url->get('index/crud') ?>">Volver</a>
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
</div>






