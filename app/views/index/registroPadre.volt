<?php echo "<script src='https://code.jquery.com/jquery-3.4.1.js'></script>"; ?>
<?php echo "<script src='../js/parsley.min.js'></script>"; ?>
<?php echo "<script src='../js/es.js'></script>"; ?>
<?php echo $this->tag->stylesheetLink("css/parsley.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_registro.css"); ?>
<h3>Registrar nuevo usuario</h3>
<h4>Datos del padre/madre</h4>

<form action="{{ url('index/submitRegistro') }}" method="POST" data-parsley-validate>
    <div>
        <label for="codAulm">Codigo del Alumno:</label>
        <input type="text" id="codalum" name="codalum"
               value="{{nino.getCodAlum()}}" readonly><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"
               placeholder="Nombre" value="" data-parsley-required><br>

        <label for="apellido1">Primer apellido:</label>
        <input type="text" id="apellido1" name="apellido1"
               placeholder="Apellido1" value="" data-parsley-required><br>

        <label for="apellido2">Segundo apellido:</label>
        <input type="text" id="apellido2" name="apellido2"
               placeholder="Apellido2" value="" data-parsley-required><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email"
               placeholder="Email" value="" data-parsley-required data-parsley-type="email"><br>

        <label for="contra">Contraseña:</label>
        <input type="password" id="contra" name="contra"
               placeholder="Contraseña" value="" data-parsley-required><br>

        <label for="contra2">Repita contraseña:</label>
        <input type="password" id="contra2" name="contra2"
               placeholder="Contraseña" value="" data-parsley-required data-parsley-equalto="#contra"><br>

        <label for="rol">Rol:</label>
        <select id="rol" name="rol" >
            <option value="Padre">Dejar por defecto</option>
            <option value="Admin">Administrador</option>
        </select>
        <br>
    </div>

    <div>
        <br>
        <button type="submit">Enviar datos</button>
        <a id="cancel" href="{{ url('index/crud') }}">Cancelar</a>

    </div>
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


