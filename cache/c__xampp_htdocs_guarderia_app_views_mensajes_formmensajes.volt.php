<?php echo "<script src='https://code.jquery.com/jquery-3.4.1.js'></script>"; ?>
<?php echo "<script src='../js/parsley.min.js'></script>"; ?>
<?php echo "<script src='../js/es.js'></script>"; ?>
<?php echo $this->tag->stylesheetLink("css/parsley.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formUpdatePerfil.css"); ?>
<h2>Crear un comunicado</h2>
<form action="<?= $this->url->get('mensajes/enviarMensaje') ?>" method="POST" data-parsley-validate>
    <div>
        <label for="titulo">Titulo :</label>
        <input type="text" id="titulo" name="titulo" placeholder="Titulo" data-parsley-required>
        <br>

        <label for="para">Destinatario :</label>
        <select id="para" name="para">
            <option value="0">Para todos los padres</option>
            <?php if (!empty($padres)) { ?>
                <?php foreach ($padres as $padre) { ?>
                    <option value='<?= $padre['ID'] ?>'><?= $padre['Nombre'] ?> <?= $padre['Apellido1'] ?> <?= $padre['Apellido2'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
        <br>

        <label for="mensaje">Mensaje :</label>
        <textarea name="mensaje" placeholder="Escribe un mensaje" cols="40" rows="10" data-parsley-required></textarea>
        <br>
    </div>

    <div>
        <button type="submit">Enviar mensaje</button>
        <a id="cancel" href="<?= $this->url->get('') ?>">Cancelar</a>
    </div>

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

