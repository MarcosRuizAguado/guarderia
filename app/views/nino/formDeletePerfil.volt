<?php echo $this->tag->stylesheetLink("css/style_perfil0.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formUpdatePerfil.css"); ?>
<div>
    <form action="{{url('nino/deletePerfil')}}" method="POST">
        <h3>Datos del niño/niña :</h3>

        <img src="../img/{{nino["Foto"]}}"><br>

        <label for="CodAlum">Codigo alumno:</label>
        <input type="text" id="CodAlum" name="CodAlum"
               placeholder="Codigo" value="{{nino["CodAlum"]}}" readonly><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"
               placeholder="Nombre" value="{{nino["Nombre"]}}" readonly><br>

        <label for="apellido1">Primer apellido:</label>
        <input type="text" id="apellido1" name="apellido1"
               placeholder="Apellido1" value="{{nino["Apellido1"]}}" readonly><br>

        <label for="apellido2">Segundo apellido:</label>
        <input type="text" id="apellido2" name="apellido2"
               placeholder="Apellido2" value="{{nino["Apellido2"]}}" readonly><br>

        <label for="CodAula">Codigo del aula:</label>
        <input type="text" id="cod" name="cod" value="{{nino['CodAula']}}" readonly><br><br>        

        <h3>¿Desea continuar?</h3>
        Si elimina el perfil del estudiante tambien se eliminaran los perfiles de padres que tenga asociados.
        <br><br>
        <button type='submit' id="aceptar" name="aceptar">Aceptar</button> 
        <a id="cancel" href="{{ url('index/crud') }}">Cancelar</a>
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





