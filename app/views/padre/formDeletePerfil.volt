
<?php echo $this->tag->stylesheetLink("css/style_formUpdatePerfil.css"); ?>
<div>
    <form action="{{url('padre/deletePerfil')}}" method="POST">
        <h3>Datos del padre/madre :</h3>

        <label for="id">ID:</label>
        <input type="text" id="id" name="id"
               placeholder="ID" value="{{padre["ID"]}}" readonly><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"
               placeholder="Nombre" value="{{padre["Nombre"]}}" readonly><br>

        <label for="apellido1">Primer apellido:</label>
        <input type="text" id="apellido1" name="apellido1"
               placeholder="Apellido1" value="{{padre["Apellido1"]}}" readonly><br>

        <label for="apellido2">Segundo apellido:</label>
        <input type="text" id="apellido2" name="apellido2"
               placeholder="Apellido2" value="{{padre["Apellido2"]}}" readonly><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email"
               placeholder="Email" value="{{padre["Email"]}}"readonly><br>

        <label for="contra">Contraseña:</label>
        <input type="password" id="contra" name="contra"
               placeholder="Contraseña" value="{{padre["Contra"]}}" readonly><br><br>

        <button type="submit">Eliminar</button>
        <a id="cancel" href="{{ url('padre/elegirPerfilDelete') }}">Volver</a>
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





