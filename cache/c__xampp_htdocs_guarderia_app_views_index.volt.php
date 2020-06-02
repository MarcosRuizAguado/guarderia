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

            <a href="<?= $this->url->get('index/index') ?>">
                <h1>Guarderia Infantil</h1>
            </a>
            <div class="user">
                <span><a href="<?= $this->url->get('padre/perfil') ?>"><?= $this->session->get('padre') ?> <?= $this->session->get('ape1') ?></a></span>
                <?php if (!empty($unread)) { ?>
                    <a href="<?= $this->url->get('mensajes/listaMensajes') ?>"><img src="http://localhost/guarderia/img/unread.png" alt="unread" class="icon"></a> <h3><?= $unread ?></h3>
                    <?php } else { ?>
                    <a href="<?= $this->url->get('mensajes/listaMensajes') ?>"><img src="http://localhost/guarderia/img/read.png" alt="read" class="icon"></a><h3>No tiene mensajes nuevos</h3>
                    <?php } ?>
            </div>
            <div class="nav-toggle">
                <div class="nav-toggle-bar"></div>
            </div>
        </header>
        <!-- Navigation -->
        <nav class="nav">
            <ul>

                <?php if ((!empty($this->session->has('padre')))) { ?>
                    <li class="list">
                        <a href="<?= $this->url->get('index/index') ?>">Inicio</a>
                    </li>
                    <li class="list">
                        <a href="<?= $this->url->get('ficha/show') ?>">Ficha Diaria</a>
                    </li>
                    <li class="list">
                        <a href="<?= $this->url->get('mensajes/listaMensajes') ?>">Mensajes</a>
                    </li>
                    <li class="list">
                        <a href="<?= $this->url->get('padre/perfil') ?>">Mi perfil</a>
                    </li>
                    <li class="list">
                        <a href="<?= $this->url->get('menu/menu') ?>">Menú</a>
                    </li>
                    <?php if ($this->session->has('rol') == 'admin') { ?>
                        <li class="list">
                            <a href="<?= $this->url->get('mensajes/formMensajes') ?>">Comunicaciones</a>
                        </li>
                        <li class="list">
                            <a href="<?= $this->url->get('ficha/crud') ?>">Administrar Fichas</a>
                        </li>
                        <li class="list">
                            <a href="<?= $this->url->get('index/crud') ?>">Administrar usuarios</a>
                        </li>
                        <li class="list">
                            <a href="<?= $this->url->get('aula/crud') ?>">Administrar aulas</a>
                        </li>
                    <?php } ?>
                    <li class="list">
                        <a href="<?= $this->url->get('index/logout') ?>">Salir</a>
                    </li>

                <?php } ?>
            </ul>

        </nav>
        <div class="content">
            <?= $this->getContent() ?>
        </div>

        <footer>
            <?php
function dameFecha() {
    
$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

$arrayDias = array('Domingo', 'Lunes', 'Martes',
    'Miercoles', 'Jueves', 'Viernes', 'Sabado');

echo "<h3>" . $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y') . "</h3>";
}
dameFecha();
?>
        </footer>

    </body>
</html>
