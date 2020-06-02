<?php echo $this->tag->stylesheetLink("css/style_ver_menu.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formUpdatePerfil.css"); ?>
<h2 id="titulo">Menú</h2>

<form action="{{ url('menu/verMenu') }}" method="POST">
    <label for="fecha">Introduce una fecha :</label>
    <input type="date" id="fecha" name="fecha">
    <br>
    <button type="submit">Obtener menú</button>
</form>
<br><br>
{%if menu is not empty%}
    <div id="menu">
        <p>Fecha : {{menu["Fecha"]}}</p> 
        <br>

        <p>Primer plato : {{menu["Comida_primero"]}}</p> 
        <br>

        <p>Segundo plato : {{menu["Comida_segundo"]}}</p> 
        <br>

        <p>Postre : {{menu["Comida_postre"]}}</p> 
        <br>

        <p>Merienda : {{menu["Merienda"]}}</p> 
        <br>
        <br>
    </div>
    
{%endif%}

{%if menu is empty%}
    <h2>No hay menú establecido para esa fecha</h2>
{%endif%}
<div id="volver">
    <a href="{{ url('index/index') }}">Volver</a>
</div>
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
