<?php echo $this->tag->stylesheetLink("css/style_perfil0.css"); ?>
<div>
    <form action="{{ url('nino/deletePerfil')}}" method="POST">
        <h3>¿Desea continuar?</h3>
        Si elimina el perfil del estudiante tambien se eliminaran los perfiles de padres que tenga asociados.
        <br><br>
        <button type='submit' id="aceptar" name="aceptar">Aceptar</button> <button href="{{ url('aula/crud') }}">Cancelar</button>
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






