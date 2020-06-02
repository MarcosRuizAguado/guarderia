<?php echo $this->tag->stylesheetLink("css/style_listaMensajes.css"); ?>
<div id="cabecera">
    <h2>Mensajes</h2> 
    {% if session.has("rol") != 'admin' %}
        <a id="enlace" href="{{url('mensajes/formMensajesAdmin')}}">¿Necesitas mandarnos un mensaje?</a>
    {%endif%}
</div>
<div>
    {%if not(unread is empty)%}
        <h3>{{unread}}</h3>
    {%endif%}
</div>
{%if not(mensajes is empty)%}
    {%for mensa in mensajes%}
        {%if mensa['Leido'] == 0%}
            <div id="mensaje">
                <div id="lista-no">
                    Titulo : {{mensa['Titulo']}} <br>
                    Fecha : {{mensa['Fecha']}} <br>
                    De : {{mensa['De']}} <br>       
                </div>
                <section>
                    <img src="../img/unread.png" alt="unread" class="icon">
                    <a href="{{ url('mensajes/show/') }}{{mensa['ID']}}">Ver mensaje</a>
                    <a href="{{ url('mensajes/delete/') }}{{mensa['ID']}}">Eliminar mensaje</a>
                </section>
            </div>
        {%else%}
            <div id="mensaje">
                <div id="lista">
                    Titulo : {{mensa['Titulo']}} <br>
                    Fecha : {{mensa['Fecha']}} <br>
                    De : {{mensa['De']}} <br>     
                </div>
                <section>
                    <img src="../img/read.png" alt="read" class="icon">
                    <a href="{{ url('mensajes/show/') }}{{mensa['ID']}}">Ver mensaje</a>
                    <a href="{{ url('mensajes/delete/') }}{{mensa['ID']}}">Eliminar mensaje</a>
                </section>
            </div>
        {%endif%}

    {%endfor%}
{%else%}
    <h3>No tiene mensajes para mostrar</h3>
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
<div id="volver">
    <a href="{{ url('index/index') }}">Volver</a>
</div>

