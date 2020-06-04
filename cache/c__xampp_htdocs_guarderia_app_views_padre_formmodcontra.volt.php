<?php echo "<script src='https://code.jquery.com/jquery-3.4.1.js'></script>"; ?>
<?php echo "<script src='../js/parsley.min.js'></script>"; ?>
<?php echo "<script src='../js/es.js'></script>"; ?>
<?php echo $this->tag->stylesheetLink("css/parsley.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formUpdatePerfil.css"); ?>
<div>
    <form action="<?= $this->url->get('padre/modContra') ?>" method="POST" data-parsley-validate>
        <h3>Contraseña :</h3>

        <label for="Contra">Antigua contraseña:</label>
        <input type="text" id="Contra" name="Contra"
               placeholder="Contraseña" value="<?= $contra ?>" readonly>
        <br><br>

        <label for="NewContra">Nueva contraseña:</label>
        <input type="text" id="NewContra" name="NewContra"
               placeholder="Nueva contraseña" value="" data-parsley-required>
        <br><br>

        <label for="NewContra2">Repita la nueva contraseña:</label>
        <input type="text" id="NewContra2" name="NewContra2"
               placeholder="Repita la nueva contraseña" value="" data-parsley-required data-parsley-equalto="#NewContra">
        <br><br>

        <button type="submit">Modificar</button>
        
    </form>
    <div id="volver">
        <a href="<?= $this->url->get('padre/perfil') ?>">Volver</a>
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





