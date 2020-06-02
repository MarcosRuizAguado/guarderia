<?php

class PadreController extends ControllerBase {

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
        $this->tag->prependTitle("Inicio - ");
        $this->dispatcher->forward(array(
            "action" => "perfil"
        ));
    }

    public function perfilAction() {

        $this->tag->prependTitle("Perfil - ");
//        $this->view->setVar("nombre", $this->session->get("padre"));
//        $this->view->setVar("mail", $this->session->get("email"));
        $cod = $this->session->get("codAlum");
        $nino = Nino::find("CodAlum=" . $cod);
        $nino->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("nino", $nino);
    }

    public function elegirPerfilAction() {
        $this->tag->prependTitle("Seleccion - ");

        $padres = Padre::find();
        $padres->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("padres", $padres);

        $ninos = Nino::find();
        $ninos->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("ninos", $ninos);
    }

    public function elegirPerfilDeleteAction() {
        $this->tag->prependTitle("Seleccion - ");

        $padres = Padre::find();
        $padres->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("padres", $padres);

        $ninos = Nino::find();
        $ninos->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("ninos", $ninos);
    }

    public function formUpdatePerfilAction() {
        $this->tag->prependTitle("Actualizar el perfil - ");

        $id = $_POST['padre'];
        if ($id == 0) {
            $this->view->setVar("error", "Selecciona un padre/madre o niño/niña para modificar");
            $this->dispatcher->forward(array(
                "action" => "elegirPerfil"
            ));
        } else {
            $padre = Padre::find("ID=" . $id);
            $padre->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
            $papa = $padre[0];
            $this->view->setVar("padre", $papa);
        }
    }

    public function formDeletePerfilAction() {
        $this->tag->prependTitle("Eliminar el perfil - ");

        $id = $_POST['padre'];
        if ($id == 0) {
            $this->view->setVar("error", "Selecciona un padre/madre o niño/niña para eliminar");
            $this->dispatcher->forward(array(
                "action" => "elegirPerfilDelete"
            ));
        } else {
            $padre = Padre::find("ID=" . $id);
            $padre->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
            $papa = $padre[0];
            $this->view->setVar("padre", $papa);
        }
    }

    public function deletePerfilAction() {
        $id = $_POST['id'];
        $padre = Padre::find("ID=" . $id);

        if ($padre->delete() == false) {
            $this->view->setVar("error", "No se ha podido eliminar el padre/madre seleccionado");
            $this->dispatcher->forward(array(
                "controller" => "index",
                "action" => "crud"
            ));
        } else {
            $this->view->setVar("succes", "Padre/madre eliminado correctamente");
            $this->dispatcher->forward(array(
                "controller" => "index",
                "action" => "crud"
            ));
        }
    }

    public function updatePerfilAction() {
        $this->tag->prependTitle("Actualizar el perfil - ");

        $id = $this->request->getPost("id");
        $nombre = $this->request->getPost("nombre", "trim");
        $ape1 = $this->request->getPost("apellido1", "trim");
        $ape2 = $this->request->getPost("apellido2", "trim");
        $email = $this->request->getPost("email", "trim");
        $contra = $this->request->getPost("contra", "trim");
        $contra2 = $this->request->getPost("contra2", "trim");
        $rol = $this->request->getPost("rol");

        $padre = Padre::findFirst("ID='" . $id . "'");

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
                        "controller" => "index",
                        "action" => "crud"
            ));
        } else {
            $padre->setNombre($nombre);
            $padre->setApellido1($ape1);
            $padre->setApellido2($ape2);
            $padre->setEmail($email);
            $padre->setContra(hash("sha256",$contra));

            if ($padre->save() == false) {
                foreach ($padre->getMessages() as $mensaje) {
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

    public function formModContraAction() {
        $this->tag->prependTitle("Modificar contraseña - ");
        $id = $this->session->get("id");
        $padres = Padre::find("ID=" . $id);
        $padre = $padres[0];
        $contra = $padre->getContra();
        $this->view->setVar("contra", $contra);
    }

    public function modContraAction() {
        $contra = $this->request->getPost("NewContra");
        $contra2 = $this->request->getPost("NewContra2");
        $id = $this->session->get("id");
        $padres = Padre::find("ID=" . $id);
        $padre = $padres[0];

//VALIDACION
        $regVal = new padreContraValidate();
        $valores = array("NewContra" => $contra, "NewContra2" => $contra2);
        $mensajesValida = $regVal->validate($valores);

        if (count($mensajesValida)) {
            foreach ($mensajesValida as $mensajeV) {
                $error = $error . "<br> " . $mensajeV;
            }
            $this->view->setVar("error", $error);
            $this->dispatcher->forward(
                    array(
                        "action" => "formModContra"
            ));
        } else {
            $padre->setContra(hash("sha256",$contra));
            if ($padre->save() == false) {
                foreach ($padre->getMessages() as $message) {
                    $error = $error . " " . $message->getMessage();
                }
                $this->view->setVar("error", $error);
                $this->dispatcher->forward(
                        array(
                            "action" => "formModContra"
                ));
            } else {
                $this->view->setVar("succes", "Contraseña modificada correctamente");
                $this->dispatcher->forward(
                        array(
                            "action" => "formModContra"
                ));
            }
        }
    }

}
