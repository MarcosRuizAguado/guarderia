<?php echo "<script src='https://code.jquery.com/jquery-3.4.1.js'></script>"; ?>
<?php echo "<script src='../js/parsley.min.js'></script>"; ?>
<?php echo "<script src='../js/es.js'></script>"; ?>
<?php echo $this->tag->stylesheetLink("css/parsley.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formUpdatePerfil.css"); ?>

<h2>Añadir nueva aula</h2>
<form action="<?= $this->url->get('aula/add') ?>" method="POST" data-parsley-validate>
    <div>
        <label for="nombre">Nombre :</label>
        <input type="text" id="nombre" name="nombre"
               placeholder="Nombre" value="" data-parsley-required><br>

        <label for="logo">Logo:</label>
        <input type="file" id="logo" name="logo" data-parsley-required><br>
    </div>
    <div>
        <br>
        <button type="submit">Enviar datos</button>
        <a id="cancel" href="<?= $this->url->get('aula/crud') ?>">Cancelar</a>

    </div>

</form>