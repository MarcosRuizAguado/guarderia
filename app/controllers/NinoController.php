<?php

class NinoController extends ControllerBase {

    public function beforeExecuteRoute($dispatcher) {
        if (!($this->session->has("padre"))) {
            $this->dispatcher->forward(array(
                "controller" => "index",
                "action" => "index"
            ));
            return false;
        }
        $papa_id = $this->session->get("id");
        $leido = Mensajes::count("Leido = 0 and Para =" . $papa_id);
        if ($leido > 0) {
            $this->view->setVar("unread", "Tiene mensajes nuevos");
        }
    }

    public function registroAlumnoAction() {
        $this->tag->prependTitle("Registrar alumn@ - ");
        $aulas = Aula::find();
        $aulas->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("aulas", $aulas);
    }

    public function addOtroPadreAction() {
        $CodAlum = $_POST['nino'];
        if ($CodAlum == 0) {
            $this->view->setVar("error", "Selecciona un niño/niña");
            $this->dispatcher->forward(array(
                "controller" => "index",
                "action" => "crud"
            ));
        } else {
            $nino = Nino::findFirst("CodAlum=" . $CodAlum);
            $this->view->setVar("nino", $nino);
            $this->dispatcher->forward(array(
                "controller" => "index",
                "action" => "registroPadre"
            ));
        }
    }

    public function submitRegistroAlumnoAction() {
        $nombre = $this->request->getPost("nombre", "trim");
        $apellido1 = $this->request->getPost("apellido1", "trim");
        $apellido2 = $this->request->getPost("apellido2", "trim");
        $foto = $this->request->getPost("foto");
        $aula = $this->request->getPost("aula");

        //guarda los datos ya introducidos en cada input
        $this->view->datosPost = $this->request->getPost();

        //VALIDACION
        $regVal = new ninoValidate();
        $valores = array("nombre" => $nombre, "apellido1" => $apellido1, "apellido2" => $apellido2, "foto" => $foto, "aula" => $aula,);
        $mensajesValida = $regVal->validate($valores);

        if (count($mensajesValida)) {
            foreach ($mensajesValida as $mensajeV) {
                $error = $error . "<br> " . $mensajeV;
            }
            $this->view->setVar("error", $error);
            $this->dispatcher->forward(
                    array(
                        "controller" => "index",
                        "action" => "crud"
            ));
        } else {
            $nino = Nino::findFirst("Nombre='" . $nombre . "'and Apellido1='" . $apellido1 . "'and Apellido2='" . $apellido2 . "'");
            if ($nino) {
                $this->view->setVar("error", "Ya existe el usuario");
                $this->dispatcher->forward(
                        array(
                            "controller" => "index",
                            "action" => "crud"
                ));
            } else {
                $nino = new Nino();
                $nino->setNombre($nombre);
                $nino->setApellido1($apellido1);
                $nino->setApellido2($apellido2);
                $nino->setFoto($foto);
                $nino->setCodAula($aula);

                if ($nino->save() == false) {
                    foreach ($nino->getMessages() as $mensaje) {
                        $error = $error . " " . $mensaje->getMessage();
                    }
                    $this->view->setVar("error", $error);
                    $this->dispatcher->forward(
                            array(
                                "controller" => "index",
                                "action" => "crud"
                    ));
                } else {
                    $this->view->setVar("succes", "Usuario creado correctamente");
                    $this->view->setVar("nino", $nino);
                    $this->dispatcher->forward(
                            array(
                                "controller" => "index",
                                "action" => "registroPadre"
                    ));
                }
            }
        }
    }

    public function formUpdatePerfilAction() {
        $this->tag->prependTitle("Actualizar el perfil - ");

        $CodAlum = $_POST['nino'];
        if ($CodAlum == 0) {
            $this->view->setVar("error", "Selecciona un padre/madre o niño/niña para modificar");
            $this->dispatcher->forward(array(
                "controller" => "padre",
                "action" => "elegirPerfil"
            ));
        } else {
            $nino = Nino::find("CodAlum=" . $CodAlum);
            $nino->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
            $nene = $nino[0];
            $this->view->setVar("nino", $nene);
            $aulas = Aula::find();
            $aulas->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
            $this->view->setVar("aulas", $aulas);
        }
    }

    public function formDeletePerfilAction() {
        $this->tag->prependTitle("Eliminar el perfil - ");

        $CodAlum = $_POST['nino'];
        if ($CodAlum == 0) {
            $this->view->setVar("error", "Selecciona un padre/madre o niño/niña para eliminar");
            $this->dispatcher->forward(array(
                "controller" => "padre",
                "action" => "elegirPerfilDelete"
            ));
        } else {
            $nino = Nino::find("CodAlum=" . $CodAlum);
            $nino->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
            $nene = $nino[0];
            $this->view->setVar("nino", $nene);
        }
    }

    public function deletePerfilAction() {
        $this->tag->prependTitle("Eliminar el perfil - ");

        $CodAlum = $_POST['CodAlum'];
        $nino = Nino::find("CodAlum=" . $CodAlum);
        $padre = Padre::find("codAlum=" . $CodAlum);

        if ($nino->delete() == false) {
            $this->view->setVar("error", "No se ha podido eliminar el alumno seleccionado");
            $this->dispatcher->forward(array(
                "controller" => "index",
                "action" => "crud"
            ));
        } else {
            if ($padre) {
                if ($padre->delete() == false) {
                    $this->view->setVar("error", "No se ha podido eliminar el padre del alumno seleccionado");
                    $this->dispatcher->forward(array(
                        "controller" => "index",
                        "action" => "crud"
                    ));
                } else {
                    $this->view->setVar("succes", "Alumno y padre eliminado correctamente");
                    $this->dispatcher->forward(array(
                        "controller" => "index",
                        "action" => "crud"
                    ));
                }
            } else {
                $this->view->setVar("succes", "Alumno eliminado correctamente");
                $this->dispatcher->forward(array(
                    "controller" => "index",
                    "action" => "crud"
                ));
            }
        }
    }

    public function buscarNinoAction() {
        $ninos = Nino::find();
        $ninos->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("ninos", $ninos);
    }

    public function updatePerfilAction() {
        $this->tag->prependTitle("Actualizar el perfil - ");

        $codAlum = $this->request->getPost("CodAlum");
        $nombre = $this->request->getPost("nombre", "trim");
        $ape1 = $this->request->getPost("apellido1", "trim");
        $ape2 = $this->request->getPost("apellido2", "trim");
        $foto = $this->request->getPost("foto");
        $codAula = $this->request->getPost("CodAula");

        $nino = Nino::findFirst("CodAlum=" . $codAlum);

        if (empty($foto)) {
            $foto = $nino->getFoto();
        }

        //VALIDACION
        $regVal = new ninoValidate();
        $valores = array("nombre" => $nombre, "apellido1" => $ape1, "apellido2" => $ape2, "foto" => $foto, "aula" => $codAula);
        $mensajesValida = $regVal->validate($valores);

        if (count($mensajesValida)) {
            foreach ($mensajesValida as $mensajeV) {
                $error = $error . "<br> " . $mensajeV;
            }
            $this->view->setVar("error", $error);
            $this->dispatcher->forward(
                    array(
                        "controller" => "index",
                        "action" => "crud"
            ));
        } else {
            $nino->setNombre($nombre);
            $nino->setApellido1($ape1);
            $nino->setApellido2($ape2);
            $nino->setFoto($foto);
            $nino->setCodAula($codAula);

            if ($nino->save() == false) {
                foreach ($nino->getMessages() as $mensaje) {
                    $error = $error . " " . $mensaje->getMessage();
                }
                $this->view->setVar("error", $error);
                $this->dispatcher->forward(
                        array(
                            "action" => "formUpdatePerfil"
                ));
            } else {
                $this->view->setVar("succes", "Modificado correctamente");
                $this->dispatcher->forward(
                        array(
                            "controller" => "index",
                            "action" => "crud"
                ));
            }
        }
    }

}
