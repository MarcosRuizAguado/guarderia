<?php echo $this->tag->stylesheetLink("css/style_perfil0.css"); ?>
<div id="contenido">
    <section>
        <h3>Datos del padre/madre :</h3>
        <p>Nombre: {{session.get("padre")}}</p>
        <p>Primer apellido: {{session.get("ape1")}}</p>
        <p>Segundo apellido: {{session.get("ape2")}}</p>
        <p>Email: {{session.get("email")}}</p>
    </section>


    <section>
        <h3>Datos del niño/niña :</h3>
        <img src="../img/ninos/{{nino[0]["Foto"]}}">
        <br>
        <p>Nombre: {{nino[0]["Nombre"]}}</p>
        <p>Primer apellido: {{nino[0]["Apellido1"]}}</p>
        <p>Segundo apellido: {{nino[0]["Apellido2"]}}</p>
        <p>Aula: {{nino[0]["CodAula"]}}</p>
    </section>

    <div id="volver">
        <a href="{{ url('padre/formModContra') }}">Cambiar contraseña</a><br>
        <br>
        <a href="{{ url('aula') }}">Volver</a>
    </div>
</div>





