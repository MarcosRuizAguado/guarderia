<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MensajesController extends ControllerBase {

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

    public function formMensajesAction() {
        $this->tag->prependTitle("Comunicaciones - ");

        $padre = Padre::find();
        $padre->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("padres", $padre);
    }

    public function enviarMensajeAction() {
        $titulo = $this->request->getPost("titulo", "trim");
        $texto = $this->request->getPost("mensaje", "trim");
        $para = $this->request->getPost("para");
        $de = "Admin";
        $fecha = date("Y-m-d");
        $leido = 0;
        $estado = "activo";

        //VALIDACION
        $regVal = new mensajeValidate();
        $valores = array("titulo" => $titulo, "mensaje" => $texto);
        $mensajesValida = $regVal->validate($valores);

        if (count($mensajesValida)) {
            foreach ($mensajesValida as $mensajeV) {
                $error = $error . "<br> " . $mensajeV;
            }
            $this->view->setVar("error", $error);
            $this->dispatcher->forward(
                    array(
                        "action" => "formMensajes"
            ));
        } else {
            if ($para == 0) {
                $padres = Padre::count();
                for ($index = 0; $index < $padres; $index++) {
                    $mensaje = new Mensajes();
                    $mensaje->setID(NULL);
                    $mensaje->setTitulo($titulo);
                    $mensaje->setMensaje($texto);
                    $mensaje->setDe($de);
                    $mensaje->setPara($index + 1);
                    $mensaje->setFecha($fecha);
                    $mensaje->setLeido($leido);
                    $mensaje->setEstado($estado);

                    if ($mensaje->save() == false) {
                        foreach ($mensaje->getMessages() as $mensajes) {
                            $error = $error . " " . $mensajes->getMessage();
                        }
                        $this->view->setVar("error", $error);
                        $this->dispatcher->forward(
                                array(
                                    "action" => "formMensajes"
                        ));
                    } else {
                        $this->view->setVar("succes", "Mensaje enviado correctamente");
                        $this->dispatcher->forward(
                                array(
                                    "action" => "formMensajes"
                        ));
                    }
                }
            } else {
                $mensaje = new Mensajes();
                $mensaje->setID(NULL);
                $mensaje->setTitulo($titulo);
                $mensaje->setMensaje($texto);
                $mensaje->setDe($de);
                $mensaje->setPara($para);
                $mensaje->setFecha($fecha);
                $mensaje->setLeido($leido);
                $mensaje->setEstado($estado);
            }

            if ($mensaje->save() == false) {
                foreach ($mensaje->getMessages() as $mensajes) {
                    $error = $error . " " . $mensajes->getMessage();
                }
                $this->view->setVar("error", $error);
                $this->dispatcher->forward(
                        array(
                            "action" => "formMensajes"
                ));
            } else {
                $this->view->setVar("succes", "Mensaje enviado correctamente");
                $this->dispatcher->forward(
                        array(
                            "action" => "formMensajes"
                ));
            }
        }
    }

    public function enviarMensajeAdminAction() {
        $titulo = $this->request->getPost("titulo", "trim");
        $texto = $this->request->getPost("mensaje", "trim");
        $para = 1;
        $de = $this->session->get("id");
        $padre = Padre::findFirst("ID=" . $de);
        if ($padre) {
            $nombre = $padre->getNombre();
            $ape1 = $padre->getApellido1();
            $ape2 = $padre->getApellido2();
            $nom_completo = $nombre . " " . $ape1 . " " . $ape2;
        }

        $fecha = date("Y-m-d");
        $leido = 0;
        $estado = "activo";

        //VALIDACION
        $regVal = new mensajeValidate();
        $valores = array("titulo" => $titulo, "mensaje" => $texto);
        $mensajesValida = $regVal->validate($valores);

        if (count($mensajesValida)) {
            foreach ($mensajesValida as $mensajeV) {
                $error = $error . "<br> " . $mensajeV;
            }
            $this->view->setVar("error", $error);
            $this->dispatcher->forward(
                    array(
                        "action" => "formMensajesAdmin"
            ));
        } else {
            $mensaje = new Mensajes();
            $mensaje->setID(NULL);
            $mensaje->setTitulo($titulo);
            $mensaje->setMensaje($texto);
            $mensaje->setDe($nom_completo);
            $mensaje->setPara($para);
            $mensaje->setFecha($fecha);
            $mensaje->setLeido($leido);
            $mensaje->setEstado($estado);


            if ($mensaje->save() == false) {
                foreach ($mensaje->getMessages() as $mensajes) {
                    $error = $error . " " . $mensajes->getMessage();
                }
                $this->view->setVar("error", $error);
                $this->dispatcher->forward(
                        array(
                            "action" => "listaMensajes"
                ));
            } else {
                $this->view->setVar("succes", "Mensaje enviado correctamente");
                $this->dispatcher->forward(
                        array(
                            "action" => "listaMensajes"
                ));
            }
        }
    }

    public function listaMensajesAction() {
        $this->tag->prependTitle("Mensajes - ");
        $papa_id = $this->session->get("id");
        $this->view->setVar("padre", $papa_id);
        $activo = "activo";
        $mensajes = Mensajes::find(array("order" => "Leido", "Estado = 'activo' and Para =" . $papa_id));
        $mensajes->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("mensajes", $mensajes);

        $leido = Mensajes::count("Leido = 0 and Para =" . $papa_id);
        if ($leido > 0) {
            $this->view->setVar("unread", "Tiene mensajes nuevos");
        }
    }

    public function showAction($id) {
        $this->tag->prependTitle("Mostrar mensaje - ");
        $mensaje = Mensajes::findFirst("ID='" . $id . "'");
        $mensaje->setLeido(1);
        if ($mensaje->save() == false) {
            foreach ($mensaje->getMessages() as $message) {
                $error = $error . " " . $message->getMessage();
                $this->view->setVar("error", $error);
                $this->dispatcher->forward(
                        array(
                            "action" => "listaMensajes"
                ));
            }
        } else {
            $mensaje = Mensajes::find("ID='" . $id . "'");
            $this->view->setVar("mensa", $mensaje);
        }
    }

    public function deleteAction($id) {
        $mensaje = Mensajes::findFirst("ID='" . $id . "'");
        $mensaje->setEstado('NOactivo');
        if ($mensaje->save() == false) {
            foreach ($mensaje->getMessages() as $message) {
                $error = $error . " " . $message->getMessage();
                $this->view->setVar("error", "No hemos podido eliminar el mensaje");
                $this->dispatcher->forward(
                        array(
                            "action" => "listaMensajes"
                ));
            }
        } else {
            $this->view->setVar("succes", "Mensaje eliminado correctamente");
            $this->dispatcher->forward(
                    array(
                        "action" => "listaMensajes"
            ));
        }
    }

    public function formMensajesAdminAction() {
        $this->tag->prependTitle("Enviar mensaje - ");
    }

}
