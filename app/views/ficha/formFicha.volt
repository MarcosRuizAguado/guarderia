<?php echo $this->tag->stylesheetLink("css/style_formRegistroFicha.css"); ?>
<h2 id="titulo">Rellenar / Modificar ficha alumno</h2>

{%if ficha is empty%}
    <div>
        <h3>Datos del alumno :</h3>
        <img src="../img/ninos/{{nino["Foto"]}}">
        <h4>Nombre : {{nino['Nombre']}} {{nino['Apellido1']}} {{nino['Apellido2']}}</h4>
    </div>

    <div>
        <form action="{{ url('ficha/addFicha') }}" method="POST">
            <label for="CodAlum">Codigo alumno :</label>
            <input type="text" id="CodAlum" name="CodAlum" value="{{nino['CodAlum']}}" readonly>
            <br>

            <label for="fecha">Fecha :</label>
            <input type="text" id="Fecha" name="Fecha" value="{{fecha}}" readonly>
            <br>

            <label for="comida_primero">Primer plato :</label>
            <input type="text" id="comida_primero" name="comida_primero" value="{{menu.getComidaPrimero()}}" readonly>
            <br>

            <label for="comida_segundo">Segundo plato :</label>
            <input type="text" id="comida_segundo" name="comida_segundo" value="{{menu.getComidaSegundo()}}" readonly>
            <br>

            <label for="comida_postre">Postre :</label>
            <input type="text" id="comida_postre" name="comida_postre" value="{{menu.getComidaPostre()}}" readonly>
            <br>

            <label for="merienda">Merienda :</label>
            <input type="text" id="merienda" name="merienda" value="{{menu.getMerienda()}}" readonly>
            <br>

            <label for="pipi">Pipi :</label>
            <select id="pipi" name="pipi">
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
            <br>

            <label for="caca">Caca :</label>
            <select id="caca" name="caca">
                <option value="No">No</option>
                <option value="Si">Si</option>
            </select>

            <label for="caca_num">¿Cuantas cacas ha hecho? :</label>
            <select id="caca_num" name="caca_num">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <br>

            <textarea name="observaciones" placeholder="Observaciones" cols="40" rows="10"></textarea>
            <br>
            <br>

            <button type="submit">Crear ficha</button>
            <a id="cancel" href="{{ url('ficha/crud') }}">Cancelar</a>

        </form>
    </div>

{%endif%}

{%if ficha is not empty%}
    <div>
        <h3>Datos del alumno :</h3>
        <img src="../img/ninos/{{nino["Foto"]}}">
        <h4>Nombre : {{nino['Nombre']}} {{nino['Apellido1']}} {{nino['Apellido2']}}</h4>
    </div>

    <div>
        <form action="{{ url('ficha/modFicha') }}" method="POST">
            <label for="CodAlum">Codigo alumno :</label>
            <input type="text" id="CodAlum" name="CodAlum" value="{{nino['CodAlum']}}" readonly>
            <br>

            <label for="fecha">Fecha :</label>
            <input type="date" id="Fecha" name="Fecha" value="{{fecha}}" readonly>
            <br>

            <label for="comida_primero">Primer plato :</label>
            <input type="text" id="comida_primero" name="comida_primero" value="{{menu.getComidaPrimero()}}" readonly>
            <br>

            <label for="comida_segundo">Segundo plato :</label>
            <input type="text" id="comida_segundo" name="comida_segundo" value="{{menu.getComidaSegundo()}}" readonly>
            <br>

            <label for="comida_postre">Postre :</label>
            <input type="text" id="comida_postre" name="comida_postre" value="{{menu.getComidaPostre()}}" readonly>
            <br>

            <label for="merienda">Merienda :</label>
            <input type="text" id="merienda" name="merienda" value="{{menu.getMerienda()}}" readonly>
            <br>

            <label for="pipi">Pipi :</label>
            <select id="pipi" name="pipi">
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
            <br>

            <label for="caca">Caca :</label>
            <select id="caca" name="caca">
                <option value="{{ficha['Caca']}}">{{ficha['Caca']}}</option>
                <option value="No">No</option>
                <option value="Si">Si</option>
            </select>

            <label for="caca_num">¿Cuantas cacas ha hecho? :</label>
            <select id="caca_num" name="caca_num">
                <option value="{{ficha['Caca_num']}}">{{ficha['Caca_num']}}</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <br>

            <textarea name="observaciones" placeholder="Observaciones" cols="40" rows="10">{{ficha['Observaciones']}}</textarea>
            <br>
            <br>

            <button type="submit">Modificar ficha</button>
            <a id="cancel" href="{{ url('ficha/crud') }}">Cancelar</a>

        </form>
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

