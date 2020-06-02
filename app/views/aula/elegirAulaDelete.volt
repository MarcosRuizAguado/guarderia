<?php echo $this->tag->stylesheetLink("css/style_perfil.css"); ?>
<div>
    <form action='{{ url('aula/deleteAula') }}' method='POST'>
        <h3>Aulas</h3>
        <select id="aula" name="aula">
            <option value="0">Seleccione para eliminar</option>
            {%if aulas is not empty%}
                {%for aula in aulas%}
                    <option value='{{aula["CodAula"]}}'>{{aula["Nombre"]}}</option>
                {%endfor%}
            {%endif%}
        </select>
        <button type='submit'>Eliminar</button>
    </form>

    <div id="volver">
        <a href="{{ url('aula/crud') }}">Volver</a>
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
</div>






