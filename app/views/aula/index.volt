<?php echo $this->tag->stylesheetLink("css/style_aulas.css"); ?>
<div id="aula">

    {%if aula is not empty%}
        {%for aul in aula%}
            <section>
                <h2>{{aul["Nombre"]}}</h2>
                <a href="{{ url('aula/show/') }}{{aul["CodAula"]}}"><img src="http://localhost/guarderia/img/{{aul["Logo"]}}" title="Ver aula"></a>
            </section>
        {%endfor%}
    {%endif%}
</div>