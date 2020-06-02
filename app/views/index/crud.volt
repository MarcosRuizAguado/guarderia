<?php echo $this->tag->stylesheetLink("css/style_crud.css"); ?>
<h2>Administracion de perfiles de usuario</h2>

<nav>
    <li class="list">
        <a href="{{ url('index/registro') }}">Registrar nuevo usuario</a>
    </li>
    <li class="list">
        <a href="{{ url('padre/elegirPerfil') }}">Modificar</a>
    </li>
    <li class="list">
        <a href="{{ url('padre/elegirPerfilDelete') }}">Eliminar</a>
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

