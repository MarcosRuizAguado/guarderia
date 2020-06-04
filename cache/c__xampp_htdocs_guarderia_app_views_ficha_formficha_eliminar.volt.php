<?php echo $this->tag->stylesheetLink("css/style_formRegistroFicha.css"); ?>
<h2 id="titulo">Ficha alumno</h2>

<?php if (!empty($ficha)) { ?>
    <div>
        <h3>Datos del alumno :</h3>
        <img src="../img/ninos/<?= $nino['Foto'] ?>">
        <h4>Nombre : <?= $nino['Nombre'] ?> <?= $nino['Apellido1'] ?> <?= $nino['Apellido2'] ?></h4>
    </div>

    <div>
        <form action="<?= $this->url->get('ficha/deleteFicha') ?>" method="POST">
            <label for="ID">ID ficha :</label>
            <input type="text" id="ID" name="ID" value="<?= $ficha['ID'] ?>" readonly>
            <br>
            
            <label for="CodAlum">Codigo alumno :</label>
            <input type="text" id="CodAlum" name="CodAlum" value="<?= $nino['CodAlum'] ?>" readonly>
            <br>

            <label for="fecha">Fecha :</label>
            <input type="date" id="Fecha" name="Fecha" value="<?= $fecha ?>" readonly>
            <br>

            <label for="comida_primero">Primer plato :</label>
            <input type="text" id="comida_primero" name="comida_primero" value="<?= $menu->getComidaPrimero() ?>" readonly>
            <br>

            <label for="comida_segundo">Segundo plato :</label>
            <input type="text" id="comida_segundo" name="comida_segundo" value="<?= $menu->getComidaSegundo() ?>" readonly>
            <br>

            <label for="comida_postre">Postre :</label>
            <input type="text" id="comida_postre" name="comida_postre" value="<?= $menu->getComidaPostre() ?>" readonly>
            <br>

            <label for="merienda">Merienda :</label>
            <input type="text" id="merienda" name="merienda" value="<?= $menu->getMerienda() ?>" readonly>
            <br>

            <label for="pipi">Pipi :</label>
            <select id="pipi" name="pipi" disabled="disabled">
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
            <br>

            <label for="caca">Caca :</label>
            <select id="caca" name="caca" disabled="disabled">
                <option value="<?= $ficha['Caca'] ?>"><?= $ficha['Caca'] ?></option>
                <option value="No">No</option>
                <option value="Si">Si</option>
            </select>

            <label for="caca_num">¿Cuantas cacas ha hecho? :</label>
            <select id="caca_num" name="caca_num" disabled="disabled">
                <option value="<?= $ficha['Caca_num'] ?>"><?= $ficha['Caca_num'] ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <br>

            <textarea name="observaciones" placeholder="Observaciones" cols="40" rows="10" readonly><?= $ficha['Observaciones'] ?></textarea>
            <br>
            <br>

            <button type="submit">Eliminar ficha</button>
            <a id="cancel" href="<?= $this->url->get('ficha/crud') ?>">Cancelar</a>

        </form>
    </div>

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

