<?php echo "<script src='https://code.jquery.com/jquery-3.4.1.js'></script>"; ?>
<?php echo "<script src='../js/parsley.min.js'></script>"; ?>
<?php echo "<script src='../js/es.js'></script>"; ?>
<?php echo $this->tag->stylesheetLink("css/parsley.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formRegistroFicha.css"); ?>
<h2>Añade el menú del {{dia}}, {{fecha_mostrar}}</h2>

<br>

{%if menu is empty%}
    <form action="{{ url('menu/addMenuFicha') }}" method="POST" data-parsley-validate>
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
        <a href="{{ url('menu/menu') }}">Cancelar</a>
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