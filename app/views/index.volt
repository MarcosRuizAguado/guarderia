<!-- <!DOCTYPE html> -->
<?php $this->tag->setDoctype(Phalcon\Tag::HTML5); 
echo $this->tag->getDocType();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- <title>Phalcon PHP Framework hh</title> -->
        <?php echo $this->tag->getTitle(); ?>
        <?php echo $this->tag->stylesheetLink("css/style.css"); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="../public/js/menu.js"></script>
    </head>
    <body>
        <!-- TITULO -->
        <header>
            <img src="http://localhost/guarderia/img/logo.png" alt="logo">

            <a href="{{ url('index/index') }}">
                <h1>Guarderia Infantil</h1>
            </a>
            <div class="user">
                <span><a href="{{ url('padre/perfil') }}">{{session.get("padre")}} {{session.get("ape1")}}</a></span>
                {%if unread is not empty%}
                    <a href="{{ url('mensajes/listaMensajes') }}"><img src="http://localhost/guarderia/img/unread.png" alt="unread" class="icon"></a> <h3>{{unread}}</h3>
                    {%else%}
                    <a href="{{ url('mensajes/listaMensajes') }}"><img src="http://localhost/guarderia/img/read.png" alt="read" class="icon"></a><h3>No tiene mensajes nuevos</h3>
                    {%endif%}
            </div>
            <div class="nav-toggle">
                <div class="nav-toggle-bar"></div>
            </div>
        </header>
        <!-- Navigation -->
        <nav class="nav">
            <ul>

                {%if (session.has("padre")is not empty)%}
                    <li class="list">
                        <a href="{{ url('index/index') }}">Inicio</a>
                    </li>
                    <li class="list">
                        <a href="{{ url('ficha/show') }}">Ficha Diaria</a>
                    </li>
                    <li class="list">
                        <a href="{{ url('mensajes/listaMensajes') }}">Mensajes</a>
                    </li>
                    <li class="list">
                        <a href="{{ url('padre/perfil') }}">Mi perfil</a>
                    </li>
                    <li class="list">
                        <a href="{{ url('menu/menu') }}">Menú</a>
                    </li>
                    {% if session.has("rol") == 'admin' %}
                        <li class="list">
                            <a href="{{ url('mensajes/formMensajes') }}">Comunicaciones</a>
                        </li>
                        <li class="list">
                            <a href="{{ url('ficha/crud') }}">Administrar Fichas</a>
                        </li>
                        <li class="list">
                            <a href="{{ url('index/crud') }}">Administrar usuarios</a>
                        </li>
                        <li class="list">
                            <a href="{{ url('aula/crud') }}">Administrar aulas</a>
                        </li>
                    {% endif %}
                    <li class="list">
                        <a href="{{ url('index/logout') }}">Salir</a>
                    </li>

                {%endif%}
            </ul>

        </nav>
        <div class="content">
            {{ content() }}
        </div>

        <footer>
            {% include '/../utils/Fecha.php'%}
        </footer>

    </body>
</html>
