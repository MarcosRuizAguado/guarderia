<?php echo $this->tag->stylesheetLink("css/style_crud.css"); ?>
<h2>Administracion fichas</h2>

<nav>
    <li class="list">
        <a href="{{ url('ficha/registro') }}">Añadir / Modificar ficha</a>
    </li>
    <li class="list">
        <a href="{{ url('ficha/eliminar') }}">Eliminar</a>
    </li>
</nav>

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

