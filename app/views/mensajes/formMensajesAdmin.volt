<?php echo "<script src='https://code.jquery.com/jquery-3.4.1.js'></script>"; ?>
<?php echo "<script src='../js/parsley.min.js'></script>"; ?>
<?php echo "<script src='../js/es.js'></script>"; ?>
<?php echo $this->tag->stylesheetLink("css/parsley.css"); ?>
<?php echo $this->tag->stylesheetLink("css/style_formUpdatePerfil.css"); ?>
<h2>Nuevo mensaje</h2>
<form action="{{url('mensajes/enviarMensajeAdmin')}}" method="POST" data-parsley-validate>
    <div>
        <label for="titulo">Titulo :</label>
        <input type="text" id="titulo" name="titulo" placeholder="Titulo" data-parsley-required>
        <br>

        <label for="para">Destinatario :</label>

        <select id="para" name="para">
            <option value="1">Administracion</option>
        </select>
        <br>

        <label for="mensaje">Mensaje :</label>
        <textarea name="mensaje" placeholder="Escribe un mensaje" cols="40" rows="10" data-parsley-required></textarea>
        <br>
    </div>

    <div>
        <button type="submit">Enviar mensaje</button>
        <a href="{{ url('mensajes/listaMensajes') }}">Cancelar</a>
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
