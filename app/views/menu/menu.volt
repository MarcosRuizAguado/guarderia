<?php echo $this->tag->stylesheetLink("css/style_crud.css"); ?>
{% if session.has("rol") == 'admin' %}
    <h2>Administracion de menús</h2>
{%else%}
    <h2>Menús</h2>
{% endif %}
<nav>
    {% if session.has("rol") == 'admin' %}
        <li class="list">
            <a href="{{ url('menu/formMenu') }}">Añadir / Modificar menú</a>
        </li>
        <li class="list">
            <a href="{{ url('menu/formMenuEliminar') }}">Eliminar menú</a>
        </li>
    {% endif %}
    <li class="list">
        <a href="{{ url('menu/verMenu') }}">Ver menú</a>
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