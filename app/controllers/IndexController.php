<?php

class IndexController extends ControllerBase {

    public function indexAction() {
        $this->tag->prependTitle("Inicio - ");
        if ($this->session->has("padre")) {
            //comprobar si tiene mensajes sin leer
            $papa_id = $this->session->get("id");
            $leido = Mensajes::count("Leido = 0 and Para =" . $papa_id);
            if ($leido > 0) {
                $this->view->setVar("unread", "Tiene mensajes nuevos");
            }
            $this->dispatcher->forward(
                    array(
                        "controller" => "aula",
                        "action" => "index"
            ));
        } else {
            $this->dispatcher->forward(
                    array(
                        "action" => "login"
            ));
        }
    }

    public function show404Action() {
        $this->tag->prependTitle("No existe - ");
        $this->response->setStatusCode(404, "Not Found");
    }

    public function loginAction() {
        $this->tag->prependTitle("Conectarse - ");
    }

    public function submitLoginAction() {
        $mail = $this->request->getPost("email");
        $pass = $this->request->getPost("contra");
        $padre = Padre::findFirst("Email='" . $mail . "' and Contra='" .hash("sha256",$pass)."'");

        if ($padre) {
            $this->session->set("id", $padre->getID());
            $this->session->set("padre", $padre->getNombre());
            $this->session->set("ape1", $padre->getApellido1());
            $this->session->set("ape2", $padre->getApellido2());
            $this->session->set("codAlum", $padre->getCodAlum());
            $this->session->set("email", $padre->getEmail());
            if ($padre->rol == 'admin') {
                $this->session->set("rol", $padre->getRol());
            }
        } else {
            $this->view->setVar("error", "Usuario incorrecto");
        }

        $this->dispatcher->forward(
                array(
                    "controller" => "aula",
                    "action" => "index"
        ));
    }

    public function logoutAction() {
        $this->session->remove("padre");
        $this->session->remove("email");
        $this->session->remove("id");
        $this->session->remove("ape1");
        $this->session->remove("ape2");
        $this->session->remove("codAlum");
        $this->session->remove("rol");
        $this->session->destroy();
        $this->dispatcher->forward(
                array(
                    "action" => "index"
        ));
    }

    public function registroAction() {
        $this->tag->prependTitle("Registrarse - ");
        $aulas = Aula::find();
        $aulas->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("aulas", $aulas);
    }

    public function registroPadreAction() {
        $this->tag->prependTitle("Registrarse - ");
    }

    public function submitRegistroAction() {
//REGISTRO DEL PADRE
        $codigo = $this->request->getPost("codalum");
        $nombre = $this->request->getPost("nombre", "trim");
        $ape1 = $this->request->getPost("apellido1", "trim");
        $ape2 = $this->request->getPost("apellido2", "trim");
        $email = $this->request->getPost("email", "trim");
        $contra = $this->request->getPost("contra", "trim");
        $contra2 = $this->request->getPost("contra2", "trim");
        $rol = $this->request->getPost("rol");

        //VALIDACION
        $regVal = new padreValidate();
        $valores = array("nombre" => $nombre, "apellido1" => $ape1, "apellido2" => $ape2, "email" => $email, "contra" => $contra, "contra2" => $contra2);
        $mensajesValida = $regVal->validate($valores);

        if (count($mensajesValida)) {
            foreach ($mensajesValida as $mensajeV) {
                $error = $error . "<br> " . $mensajeV;
            }
            $this->view->setVar("error", $error);
            $this->dispatcher->forward(
                    array(
                        "action" => "crud"
            ));
        } else {
            $padre = Padre::findFirst("Email='" . $email . "'");
            if ($padre) {
                $this->view->setVar("error", "Ya existe el usuario");
                $this->dispatcher->forward(
                        array(
                            "controller" => "index",
                            "action" => "crud"
                ));
            } else {
                $padre = new Padre();
                $padre->setCodAlum($codigo);
                $padre->setNombre($nombre);
                $padre->setApellido1($ape1);
                $padre->setApellido2($ape2);
                $padre->setEmail($email);
                $padre->setContra(hash("sha256",$contra));
                $padre->setRol($rol);

                if ($padre->save() == false) {
                    foreach ($padre->getMessages() as $mensaje) {
                        $error = $error . " " . $mensaje->getMessage();
                    }
                    $this->view->setVar("error", $error);
                    $this->dispatcher->forward(
                            array(
                                "controller" => "index",
                                "action" => "crud"
                    ));
                } else {
                    $this->mail->send(
                            array($padre->getEmail() => $padre->getNombre()), 'Registro de usuario', 'confirmareg', 
                            array('nombre' => $padre->getNombre(),
                        'ape1' => $padre->getApellido1(),
                        'ape2' => $padre->getApellido2(),
                        'email' => $padre->getEmail(),
                        'contra' => $padre->getEmail())
                    );
                    $this->view->setVar("succes", "Usuario creado correctamente");
                    $this->dispatcher->forward(
                            array(
                                "controller" => "index",
                                "action" => "crud"
                    ));
                }
            }
        }
    }

    public function crudAction() {
        $this->tag->prependTitle("Administrar - ");
    }

    //pruebas de busquedas
    public function busquedasAction() {
        $this->view->disable();
        $padres = Padre::find();
        echo "PADRE", "<BR>";
        foreach ($padres as $padre) {
            echo $padre->getNombre(), "----", $padre->getEmail(), "<br>";
        }

        echo "<hr/>";

        $aulas = Aula::find();
        $aulas->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $aul = $aulas[0];
        echo "codigo ", $aul['CodAula'], "<br>";
        echo "nombre ", $aul['Nombre'], "<br>";

        echo "<hr/>";

        $aula = Aula::find();
        foreach ($aula as $aul) {
            echo "<h3>", $aul->getNombre(), "</h3>";
            $cod = $aul->getCodAula();
            $ninos = Nino::find("CodAula=" . $cod);
            foreach ($ninos as $nen) {
                echo "<h5>", $nen->getNombre(), " ", $nen->getApellido1(), "</h5>";
            }
        }

        echo "<hr/>";

        $codigo = Aula::find();
        foreach ($codigo as $cod) {
            echo "<p>", $cod->getCodAula(), "</p>";
        }

        echo "<hr/>";

        $nino = Nino::find("CodAlum=2");
        $nino->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $nene = $nino[0];
        echo $nene['Nombre'];

        echo "<hr/>";

        echo "Dia de la semana segun la fecha";
        echo "<br>";
        echo jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m"), date("d"), date("y")), 1);

        echo "<hr/>";

        $fecha = "2020-06-02";
        $menu = Menu::findFirst("Fecha='" . $fecha . "'");
        echo $menu->getDiaSemana();

        echo "<hr/>";

        $nen = Nino::count("CodAula=2");
        echo $nen;

        echo "<hr/>";

        $fecha_actual = date("Y-m-d");
        echo $fecha_actual;

        echo "<hr/>";
        $padress = Padre::count();
        echo $padress;

        echo "<hr/>";
        $id = $padre->getID();
        echo $id;

        echo "<hr/>";
        $leido = Mensajes::count("Leido = 0 and Para=1");
        echo $leido;

        echo "<hr/>";
        echo "prueba";
        $mensaje = Mensajes::findFirst("ID= 1");
        $mensaje->setLeido(1);
    }

}
