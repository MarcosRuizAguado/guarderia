<?php echo $this->tag->stylesheetLink("css/style_formMenu.css"); ?>
<h2>Eliminar menú</h2>

<form action="{{ url('menu/formMenuEliminar') }}" method="POST">
    <label for="fecha">Introduce una fecha :</label>
    <input type="date" id="fecha" name="fecha">
    <br>
    <button type="submit">Obtener menú</button>
</form>
<br><br>
{%if menu is not empty%}
    <form action="{{ url('menu/deleteMenu') }}" method="POST">
        <label for="fecha">Fecha :</label>
        <input type="date" id="fecha" name="fecha" value="{{menu["Fecha"]}}" readonly>
        <br>

        <label for="comida_primero">Primer plato :</label>
        <input type="text" id="comida_primero" name="comida_primero" value="{{menu["Comida_primero"]}}" readonly>
        <br>

        <label for="comida_segundo">Segundo plato :</label>
        <input type="text" id="comida_segundo" name="comida_segundo" value="{{menu["Comida_segundo"]}}" readonly>
        <br>

        <label for="comida_postre">Postre :</label>
        <input type="text" id="comida_postre" name="comida_postre" value="{{menu["Comida_postre"]}}" readonly>
        <br>

        <label for="merienda">Merienda :</label>
        <input type="text" id="merienda" name="merienda" value="{{menu["Merienda"]}}" readonly>
        <br>
        <br>

        <button type="submit">Eliminar menú</button>
        <a id="cancel" href="{{ url('menu/menu') }}">Cancelar</a>
    </form>
{%endif%}

{%if menu is empty%}
    <h2>No hay menú establecido para esa fecha</h2>
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
