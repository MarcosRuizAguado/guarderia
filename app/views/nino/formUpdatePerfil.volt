<?php echo "<script src='https://code.jquery.com/jquery-3.4.1.js'></script>"; ?>
<?php echo "<script src='../js/parsley.min.js'></script>"; ?>
<?php echo "<script src='../js/es.js'></script>"; ?>
<?php echo $this->tag->stylesheetLink("css/parsley.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formUpdatePerfil.css"); ?>

<div>
    <form action="{{url('nino/updatePerfil')}}" method="POST" data-parsley-validate>
        <h3>Datos del niño/niña :</h3>

        <img src="../img/{{nino["Foto"]}}"><br>

        <label for="CodAlum">Codigo alumno:</label>
        <input type="text" id="CodAlum" name="CodAlum"
               placeholder="Codigo" value="{{nino["CodAlum"]}}" readonly><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"
               placeholder="Nombre" value="{{nino["Nombre"]}}" data-parsley-required><br>

        <label for="apellido1">Primer apellido:</label>
        <input type="text" id="apellido1" name="apellido1"
               placeholder="Apellido1" value="{{nino["Apellido1"]}}" data-parsley-required><br>

        <label for="apellido2">Segundo apellido:</label>
        <input type="text" id="apellido2" name="apellido2"
               placeholder="Apellido2" value="{{nino["Apellido2"]}}" data-parsley-required><br>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" value=""><br>

        <label for="CodAula">Codigo del aula:</label>
        <select id="CodAula" name="CodAula" required data-parsley-required-message="Seleccione un aula.">
            <option value="{{nino['CodAula']}}">{{nino['CodAula']}}</option>
            {%if aulas is not empty%}
                {%for aula in aulas%}                
                    <option value="{{aula['CodAula']}}">{{aula['CodAula']}}</option>
                {%endfor%}
            {%endif%}
        </select>
        <br><br>

        <button type="submit">Modificar</button>
        <a id="cancel" href="{{ url('padre/elegirPerfil') }}">Volver</a>
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
</div>





