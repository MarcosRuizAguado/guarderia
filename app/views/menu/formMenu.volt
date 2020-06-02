<?php echo "<script src='https://code.jquery.com/jquery-3.4.1.js'></script>"; ?>
<?php echo "<script src='../js/parsley.min.js'></script>"; ?>
<?php echo "<script src='../js/es.js'></script>"; ?>
<?php echo $this->tag->stylesheetLink("css/parsley.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formMenu.css"); ?>
<h2>Añade o modifica el menú</h2>

<form action="{{ url('menu/formMenu') }}" method="POST" data-parsley-validate>
    <label for="fecha">Introduce una fecha :</label>
    <input type="date" id="fecha" name="fecha" id="fecha" data-parsley-required>
    <br>
    <button type="submit">Obtener menú</button>
</form>
<br><br>
<div>
    {%if not(errorMenu is empty)%}
        <h2>{{errorMenu}}</h2>
    {%endif%}
</div>
<br>
{%if menu is not empty%}
    <form action="{{ url('menu/modMenu') }}" method="POST" data-parsley-validate>
        <label for="fecha_mod">Fecha :</label>
        <input type="date" id="fecha_mod" name="fecha_mod" value="{{menu["Fecha"]}}" readonly>
        <br>

        <label for="comida_primero">Primer plato :</label>
        <input type="text" id="comida_primero" name="comida_primero" value="{{menu["Comida_primero"]}}" data-parsley-required>
        <br>

        <label for="comida_segundo">Segundo plato :</label>
        <input type="text" id="comida_segundo" name="comida_segundo" value="{{menu["Comida_segundo"]}}" data-parsley-required>
        <br>

        <label for="comida_postre">Postre :</label>
        <input type="text" id="comida_postre" name="comida_postre" value="{{menu["Comida_postre"]}}" data-parsley-required>
        <br>

        <label for="merienda">Merienda :</label>
        <input type="text" id="merienda" name="merienda" value="{{menu["Merienda"]}}" data-parsley-required>
        <br>
        <br>

        <button type="submit">Modificar menú</button>
        <a href="{{ url('menu/menu') }}">Cancelar</a>
    </form>
{%endif%}

{%if menu is empty%}
    <form action="{{ url('menu/addMenu') }}" method="POST" data-parsley-validate>
        <label for="fecha_add">Fecha :</label>
        <input type="date" id="fecha_add" name="fecha_add" value="{{fecha}}" readonly>
        <br>

        <label for="comida_primero">Primer plato :</label>
        <input type="text" id="comida_primero" name="comida_primero" value="" data-parsley-required>
        <br>

        <label for="comida_segundo">Segundo plato :</label>
        <input type="text" id="comida_segundo" name="comida_segundo" value="" data-parsley-required>
        <br>

        <label for="comida_postre">Postre :</label>
        <input type="text" id="comida_postre" name="comida_postre" value="" data-parsley-required>
        <br>

        <label for="merienda">Merienda :</label>
        <input type="text" id="merienda" name="merienda" value="" data-parsley-required>
        <br>
        <br>

        <button type="submit">Añadir menú</button>
        <a id="cancel" href="{{ url('menu/menu') }}">Cancelar</a>
    </form>
{%endif%}

<div id="error">
    {%if not(error is empty)%}
        {{error}}
    {%endif%}
</div>
<div id="succes">
    {%if not(succes is empty)%}
        {{succes}}
    {%endif%}
</div>
