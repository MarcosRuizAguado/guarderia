<?php echo $this->tag->stylesheetLink("css/style_crud.css"); ?>
<h2>Administracion aulas</h2>

<nav>
    <li class="list">
        <a href="{{ url('aula/registro') }}">Registrar nueva aula</a>
    </li>
    <li class="list">
        <a href="{{ url('aula/elegirAula') }}">Modificar</a>
    </li>
    <li class="list">
        <a href="{{ url('aula/elegirAulaDelete') }}">Eliminar</a>
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
