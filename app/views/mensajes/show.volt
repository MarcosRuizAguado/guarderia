<?php echo $this->tag->stylesheetLink("css/style_mensajes_show.css"); ?>
<script src="../../public/js/menu.js"></script>
<h2>Mensaje</h2>
{%if mensa is not empty%}
    {%for men in mensa%}
        <div id="mensaje">  
            <div id="mensa">
                Titulo :{{men.getTitulo()}} <br>
                Fecha : {{men.getFecha()}} <br>
                De : {{men.getDe()}} <br><br>
            </div>

            <div id="mensa_content">
                Mensaje : {{men.getMensaje()}}<br>
            </div>
        </div>
    {%endfor%}
{%endif%}
<div id="volver">
    <a href="{{ url('mensajes/listaMensajes') }}">Volver</a>
</div>