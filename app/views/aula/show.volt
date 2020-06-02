<?php echo $this->tag->stylesheetLink("css/style_aulas_ninos.css"); ?>
<?php echo $this->tag->stylesheetLink("css/imagehover.min.css"); ?>
<script src="../../public/js/menu.js"></script>
<h2>{{aula.getNombre()}}</h2>

<div id="clase">  
    {% set emp=aula.getNene()%}
    {%for nino in emp%}

        <figure class="imghvr-slide-down" id="nino" style="background-color:yellow;">
            <img src="../../img/ninos/{{nino.getFoto()}}">
            <figcaption style="background-color: rgba(0,0,0,0.5);">
                <h4 style="color: white;">{{nino.getNombre()}}</h4>
                {%if nino.getCodAlum() == codi_padre %}
                    <a href="{{ url('ficha/show') }}"></a>
                {%endif%}
            </figcaption>
        </figure>
        {%if nino.getCodAlum() == codi_padre %}
            <h4 id="nom"><a href="{{ url('ficha/show') }}">{{nino.getNombre()}}</a></h4>
            {%else%}
            <h4 id="nom">{{nino.getNombre()}}</h4>
            {%endif%}
        {%endfor%}
</div>


<div id="volver">
    <a href="{{ url('index/index') }}">Volver</a>
</div>