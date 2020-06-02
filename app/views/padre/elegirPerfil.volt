<?php echo $this->tag->stylesheetLink("css/style_perfil0.css"); ?>
<div>
    <form action='{{ url('padre/formUpdatePerfil') }}' method='POST'>
        <h3>Datos del padre/madre :</h3>
        <select id="padre" name="padre">
            <option value="0">Seleccione para modificar</option>
            {%if padres is not empty%}
                {%for padre in padres%}
                    <option value='{{padre["ID"]}}'>{{padre["Nombre"]}} {{padre["Apellido1"]}} {{padre["Apellido2"]}}</option>
                {%endfor%}
            {%endif%}
        </select>
        <button type='submit'>Modificar</button>
    </form>


    <form action="{{ url('nino/formUpdatePerfil')}}" method="POST">
        <h3>Datos del niño/niña :</h3>
        <select id="nino" name="nino">
            <option value="0">Seleccione para modificar</option>
            {%if ninos is not empty%}
                {%for nino in ninos%}
                    <option value='{{nino["CodAlum"]}}'>{{nino["Nombre"]}} {{nino["Apellido1"]}} {{nino["Apellido2"]}}</option>
                {%endfor%}
            {%endif%}
        </select>
        <button type='submit'>Modificar</button>
    </form>

    <div id="volver">
        <a href="{{ url('index/crud') }}">Volver</a>
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






