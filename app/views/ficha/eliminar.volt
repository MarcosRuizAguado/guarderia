<?php echo $this->tag->stylesheetLink("css/style_formRegistroFicha.css"); ?>
<h2>Eliminar ficha</h2>
<form action="{{ url('ficha/eliminar') }}" method="POST">
    <label for="aula">Aula:</label>
    <select id="aula" name="aula">
        <option value="0">Seleccione un aula</option>
        {%if aulas is not empty%}
            {%for aula in aulas%}
                <option value='{{aula['CodAula']}}'>{{aula['CodAula']}}</option>
            {%endfor%}
        {%endif%}
    </select>
    <br>

    <button type="submit">Buscar aula</button>
    <a id="cancel" href="{{ url('ficha/crud') }}">Cancelar</a>
</form>
<br><br>

<form action="{{ url('ficha/eliminar') }}" method="POST">
    <label for="alumno">Alumno:</label>
    <select id="alumno" name="alumno">
        <option value="0">Seleccione un alumno</option>
        {%if ninos is not empty%}
            {%for nino in ninos%}
                <option value='{{nino['CodAlum']}}'>{{nino['Nombre']}} {{nino['Apellido1']}} {{nino['Apellido2']}}</option>
            {%endfor%}
        {%endif%}
    </select>
    <br>
    <label for="fecha">Fecha :</label>
    <input type="date" id="fecha" name="fecha">
    <br>

    <button type="submit" id="enviar" name="enviar">Ver ficha del alumno</button>
    <a id="cancel" href="{{ url('ficha/crud') }}">Cancelar</a>
</form>
<br><br>

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
