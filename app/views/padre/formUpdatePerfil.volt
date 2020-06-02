<?php echo "<script src='https://code.jquery.com/jquery-3.4.1.js'></script>"; ?>
<?php echo "<script src='../js/parsley.min.js'></script>"; ?>
<?php echo "<script src='../js/es.js'></script>"; ?>
<?php echo $this->tag->stylesheetLink("css/parsley.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formUpdatePerfil.css"); ?>
<div>
    <form action="{{url('padre/updatePerfil')}}" method="POST" data-parsley-validate>
        <h3>Datos del padre/madre :</h3>
        
        <label for="id">ID:</label>
        <input type="text" id="id" name="id"
               placeholder="ID" value="{{padre["ID"]}}" readonly><br>
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"
               placeholder="Nombre" value="{{padre["Nombre"]}}" data-parsley-required><br>

        <label for="apellido1">Primer apellido:</label>
        <input type="text" id="apellido1" name="apellido1"
               placeholder="Apellido1" value="{{padre["Apellido1"]}}" data-parsley-required><br>

        <label for="apellido2">Segundo apellido:</label>
        <input type="text" id="apellido2" name="apellido2"
               placeholder="Apellido2" value="{{padre["Apellido2"]}}" data-parsley-required><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email"
               placeholder="Email" value="{{padre["Email"]}}" data-parsley-required data-parsley-type="email"><br>

        <label for="contra">Contraseña:</label>
        <input type="password" id="contra" name="contra"
               placeholder="Contraseña" value="{{padre["Contra"]}}" data-parsley-required><br>
        
        <label for="contra2">Repetir contraseña:</label>
        <input type="password" id="contra2" name="contra2"
               placeholder="Contraseña" value="" data-parsley-required data-parsley-equalto="#contra"><br>


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





