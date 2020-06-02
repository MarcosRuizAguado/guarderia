<?php echo "<script src='https://code.jquery.com/jquery-3.4.1.js'></script>"; ?>
<?php echo "<script src='../js/parsley.min.js'></script>"; ?>
<?php echo "<script src='../js/es.js'></script>"; ?>
<?php echo $this->tag->stylesheetLink("css/parsley.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_perfil.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formUpdatePerfil.css"); ?>
<div>
    <form action="{{url('aula/updateAula')}}" method="POST" data-parsley-validate>
        <h3>Aula :</h3>

        <label for="CodAula">Codigo :</label>
        <input type="text" id="CodAula" name="CodAula"
               placeholder="Codigo" value="{{aula["CodAula"]}}" readonly><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"
               placeholder="Nombre" value="{{aula["Nombre"]}}" data-parsley-required><br>

        <label for="logo">Logo:</label>
        <input type="file" id="logo" name="logo" value=""><br>

        <button type="submit">Modificar</button>
        <a id="cancel" href="{{ url('aula/elegirAula') }}">Volver</a>
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





