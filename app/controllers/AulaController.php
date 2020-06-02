<?php

class AulaController extends ControllerBase {

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

    public function indexAction() {
        $aulas = Aula::find();
        $aulas->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("aula", $aulas);
    }

    public function showAction($codAula) {

        $this->tag->prependTitle("Mostrar - ");
        $aula = Aula::findFirst("CodAula=" . $codAula);
        $this->view->setVar("aula", $aula);
        $codi_padre = $_SESSION["codAlum"];
        $this->view->setVar("codi_padre", $codi_padre);
    }

    public function crudAction() {
        $this->tag->prependTitle("Administrar aulas - ");
    }

    public function registroAction() {
        $this->tag->prependTitle("Añadir nueva aula - ");
    }

    public function addAction() {
        $this->tag->prependTitle("Añadir nueva aula - ");

        $nombre = $this->request->getPost("nombre", "trim");
        $logo = $this->request->getPost("logo");

        //VALIDACION
        $regVal = new aulaValidate();
        $valores = array("nombre" => $nombre, "logo" => $logo);
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
            $aula = Aula::findFirst("Nombre='" . $nombre . "'");
            if ($aula) {
                $this->view - setVar("error", "Ya existe un aula con ese mismo nombre");
                $this->dispatcher->forward(
                        array(
                            "action" => "crud"
                ));
            } else {
                $codigo = (Aula::count()) + 1;

                $aula = new Aula();
                $aula->setCodAula($codigo);
                $aula->setNombre($nombre);
                $aula->setLogo($logo);

                if ($aula->save() == false) {
                    foreach ($aula->getMessages() as $mensaje) {
                        $error = $error . " " . $mensaje->getMessages();
                    }
                    $this->view->setVar("error", $error);
                    $this->dispatcher->forward(
                            array(
                                "action" => "crud"
                    ));
                } else {
                    $this->view->setVar("succes", "Aula creada correctamente");
                    $this->dispatcher->forward(
                            array(
                                "action" => "crud"
                    ));
                }
            }
        }
    }

    public function elegirAulaAction() {
        $this->tag->prependTitle("Modificar aula - ");

        $aulas = Aula::find();
        $aulas->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("aulas", $aulas);
    }

    public function formUpdateAulaAction() {
        $this->tag->prependTitle("Modificar aula - ");

        $cod = $_POST['aula'];
        if ($cod == 0) {
            $this->view->setVar("error", "Selecciona un aula para modificar");
            $this->dispatcher->forward(array(
                "action" => "elegirAula"
            ));
        } else {
            $aula = Aula::find("CodAula=" . $cod);
            $aula->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
            $aul = $aula[0];
            $this->view->setVar("aula", $aul);
        }
    }

    public function updateAulaAction() {
        $this->tag->prependTitle("Modificar aula - ");

        $codigo = $this->request->getPost("CodAula");
        $nombre = $this->request->getPost("nombre", "trim");
        $logo = $this->request->getPost("logo");

        $aula = Aula::findFirst("CodAula='" . $codigo . "'");

        if (empty($logo)) {
            $logo = $aula->getLogo();
        }

        //VALIDACION
        $regVal = new aulaValidate();
        $valores = array("nombre" => $nombre, "logo" => $logo);
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
            $aula->setNombre($nombre);
            $aula->setLogo($logo);

            if ($aula->save() == false) {
                foreach ($aula->getMessages() as $mensaje) {
                    $error = $error . " " . $mensaje->getMessage();
                }
                $this->view->setVar("error", $error);
                $this->dispatcher->forward(
                        array(
                            "action" => "formUpdateAula"
                ));
            } else {
                $this->view->setVar("succes", "Modificado correctamente");
                $this->dispatcher->forward(
                        array(
                            "action" => "crud"
                ));
            }
        }
    }

    public function elegirAulaDeleteAction() {
        $this->tag->prependTitle("Eliminar aula - ");

        $aulas = Aula::find();
        $aulas->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("aulas", $aulas);
    }

    public function deleteAulaAction() {
        $this->tag->prependTitle("Eliminar aula - ");

        $cod = $_POST['aula'];
        if ($cod == 0) {
            $this->view->setVar("error", "Selecciona un aula para eliminar");
            $this->dispatcher->forward(array(
                "action" => "elegirAulaDelete"
            ));
        } else {
            $aula = Aula::find("CodAula=" . $cod);
            $ninos = Nino::count("CodAula=" . $cod);
            if ($ninos <= 0) {
                if ($aula->delete() == false) {
                    $this->view->setVar("error", "No se ha podido eliminar el aula seleccionada");
                    $this->dispatcher->forward(array(
                        "action" => "crud"
                    ));
                } else {
                    $this->view->setVar("succes", "Aula eliminada correctamente");
                    $this->dispatcher->forward(array(
                        "action" => "crud"
                    ));
                }
            } else {
                $this->view->setVar("error", "Este aula tiene estudiantes asignados, no se puede eliminar");
                $this->dispatcher->forward(array(
                    "action" => "crud"
                ));
            }
        }
    }

}
