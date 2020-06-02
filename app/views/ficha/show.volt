<?php echo $this->tag->stylesheetLink("css/style_ficha_show.css"); ?>
<h2 id="titulo">Ficha alumno</h2>

<form action="{{ url('ficha/show') }}" method="POST">
    <label for="fecha">Fecha :</label>
    <input type="date" id="fecha" name="fecha">
    <br>
    <button type="submit" id="enviar" name="enviar">Ver ficha del alumno</button>
</form>

{%if ficha is empty%}
    <div>
        <h3>Datos del alumno :</h3>
        <img src="../img/ninos/{{nino["Foto"]}}">
        <h4>Nombre : {{nino['Nombre']}} {{nino['Apellido1']}} {{nino['Apellido2']}}</h4>
    </div>

    <div>
        <h3>{{noEncontrado}}</h3>
    </div>

{%endif%}

{%if ficha is not empty%}
    <div id="datos">
        <img src="../img/ninos/{{nino["Foto"]}}">
        <h4>{{nino['Nombre']}} {{nino['Apellido1']}} {{nino['Apellido2']}}</h4>
    </div>

    <div id="ficha">
        <label for="fecha">Fecha :</label>{{fecha}}
        <br>

        <label for="comida_primero">Primer plato :</label>{{menu.getComidaPrimero()}}
        <br>

        <label for="comida_segundo">Segundo plato :</label>{{menu.getComidaSegundo()}}
        <br>

        <label for="comida_postre">Postre :</label>{{menu.getComidaPostre()}}
        <br>

        <label for="merienda">Merienda :</label>{{menu.getMerienda()}}
        <br>

        <label for="pipi">Pipi :</label>{{ficha['Pipi']}}
        <br>

        <label for="caca">Caca :</label>{{ficha['Caca']}}
        <br>

        <label for="caca_num">¿Cuantas cacas ha hecho? :</label>{{ficha['Caca_num']}}
        <br>

        <textarea name="observaciones" placeholder="Observaciones" cols="40" rows="10" readonly>{{ficha['Observaciones']}}</textarea>
        <br>
        <br>
    </div>

{%endif%}
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
<div id="volver">
    <a href="{{ url('index/index') }}">Volver</a>
</div>

