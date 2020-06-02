<?php echo $this->tag->stylesheetLink("css/style_perfil0.css"); ?>
<div>
    <form action="{{ url('nino/addOtroPadre')}}" method="POST">
        <h3>Datos del niño/niña :</h3>
        <select id="nino" name="nino">
            <option value="0">Seleccione un alumno</option>
            {%if ninos is not empty%}
                {%for nino in ninos%}
                    <option value='{{nino["CodAlum"]}}'>{{nino["Nombre"]}} {{nino["Apellido1"]}} {{nino["Apellido2"]}}</option>
                {%endfor%}
            {%endif%}
        </select>
        <button type='submit'>Seleccionar</button>
    </form>

    
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
    <a id="cancel" href="{{ url('index/crud') }}">Volver</a>
</div>






