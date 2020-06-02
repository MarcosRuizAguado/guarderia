<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MenuController extends ControllerBase {

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

    public function menuAction() {
        $this->tag->prependTitle("Menú - ");
    }

    public function formMenuAction() {
        $this->tag->prependTitle("Menú - ");

        if (isset($_POST['fecha'])) {
            $fecha = $_POST['fecha'];

            //comprobamos que dia de la semana es segun la fecha
            $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
            $fecha_dia = $dias[date('N', strtotime($fecha))];

            $dia = $fecha_dia;

            //comprobar q la fecha es mayor q la fecha actual
            $fecha_actual = date("Y-m-d");
            $fecha_mod_menu = new DateTime($fecha);
            $fecha_mod_actual = new DateTime($fecha_actual);
            $interval = $fecha_mod_menu->diff($fecha_mod_actual);

            //si pasan mas de 2 dias, ya no se podra modficar o agregar un menu
            if ($interval->format('%R%a días') < 2) {
                if ($dia === "Sabado" || $dia === "Domingo") {
                    $this->view->setVar("error", "No hay menús para fines de semana");
                    $this->dispatcher->forward(
                            array(
                                "action" => "menu"
                    ));
                } else {
                    $menus = Menu::find("Fecha='" . $fecha . "'");
                    if ($index >= count($menus)) {
                        return $this->view->setVar("fecha", $fecha);
                        return $this->response->redirect('/menu/formMenu');
                    } else {
                        $menus->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
                        $menu = $menus[0];
                        $this->view->setVar("menu", $menu);
                    }
                }
            } else {
                $this->view->setVar("error", "No se puede añadir o modificar el menú una vez pasada la fecha");
                $this->dispatcher->forward(
                        array(
                            "action" => "menu"
                ));
            }
        }
    }

    public function formMenu_fichaAction() {
        
    }

    public function addMenuAction() {

        $fecha = $this->request->getPost("fecha_add");

        $dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
        $fecha_dia = $dias[date('N', strtotime($fecha))];

        $dia = $fecha_dia;

        $comida_primero = $this->request->getPost("comida_primero", "trim");
        $comida_segundo = $this->request->getPost("comida_segundo", "trim");
        $comida_postre = $this->request->getPost("comida_postre", "trim");
        $merienda = $this->request->getPost("merienda", "trim");

        //VALIDACION
        $regVal = new menuValidate();
        $valores = array("comida_primero" => $comida_primero, "comida_segundo" => $comida_segundo, "comida_postre" => $comida_postre, "merienda" => $merienda);
        $mensajesValida = $regVal->validate($valores);

        if (count($mensajesValida)) {
            foreach ($mensajesValida as $mensajeV) {
                $error = $error . "<br> " . $mensajeV;
            }
            $this->view->setVar("error", $error);
            $this->dispatcher->forward(
                    array(
                        "action" => "formMenu"
            ));
        } else {
            $menu = Menu::findFirst("Fecha=" . $fecha);
            if ($menu) {
                $this->view->setVar("error", "Ya hay un menu establecido para esa fecha");
                $this->dispatcher->forward(
                        array(
                            "action" => "formMenu"
                ));
            } else {
                $menu = new Menu();
                $menu->setFecha($fecha);
                $menu->setDiaSemana($dia);
                $menu->setComidaPrimero($comida_primero);
                $menu->setComidaSegundo($comida_segundo);
                $menu->setComidaPostre($comida_postre);
                $menu->setMerienda($merienda);

                if ($menu->save() == false) {
                    foreach ($menu->getMessages() as $mensajes) {
                        $error = $error . " " . $mensaje->getMessage();
                    }
                    $this->view->setVar("error", $error);
                    $this->dispatcher->forward(
                            array(
                                "action" => "formMenu"
                    ));
                } else {
                    $this->view->setVar("succes", "Menu creado correctamente");
                    $this->dispatcher->forward(
                            array(
                                "action" => "menu"
                    ));
                }
            }
        }
    }

    public function addMenuFichaAction() {

        $fecha = $this->request->getPost("fecha_add");

        $dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
        $fecha_dia = $dias[date('N', strtotime($fecha))];

        $dia = $fecha_dia;

        $comida_primero = $this->request->getPost("comida_primero", "trim");
        $comida_segundo = $this->request->getPost("comida_segundo", "trim");
        $comida_postre = $this->request->getPost("comida_postre", "trim");
        $merienda = $this->request->getPost("merienda", "trim");

        //VALIDACION
        $regVal = new menuValidate();
        $valores = array("comida_primero" => $comida_primero, "comida_segundo" => $comida_segundo, "comida_postre" => $comida_postre, "merienda" => $merienda);
        $mensajesValida = $regVal->validate($valores);

        if (count($mensajesValida)) {
            foreach ($mensajesValida as $mensajeV) {
                $error = $error . "<br> " . $mensajeV;
            }
            $this->view->setVar("error", $error);
            $this->dispatcher->forward(
                    array(
                        "action" => "formMenu"
            ));
        } else {
            $menu = Menu::findFirst("Fecha=" . $fecha);
            if ($menu) {
                $this->view->setVar("error", "Ya hay un menu establecido para esa fecha");
                $this->dispatcher->forward(
                        array(
                            "action" => "formMenu"
                ));
            } else {
                $menu = new Menu();
                $menu->setFecha($fecha);
                $menu->setDiaSemana($dia);
                $menu->setComidaPrimero($comida_primero);
                $menu->setComidaSegundo($comida_segundo);
                $menu->setComidaPostre($comida_postre);
                $menu->setMerienda($merienda);

                if ($menu->save() == false) {
                    foreach ($menu->getMessages() as $mensajes) {
                        $error = $error . " " . $mensajes->getMessage();
                    }
                    $this->view->setVar("error", $error);
                    $this->dispatcher->forward(
                            array(
                                "controller" => "ficha",
                                "action" => "registro"
                    ));
                } else {
                    $this->view->setVar("succes", "Menu creado correctamente");
                    $this->dispatcher->forward(
                            array(
                                "controller" => "ficha",
                                "action" => "registro"
                    ));
                }
            }
        }
    }

    public function modMenuAction() {
        $fecha = $this->request->getPost("fecha_mod");

        //saca el dia de la semana segun la fecha dada
        $dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
        $fecha_dia = $dias[date('N', strtotime($fecha))];

        $dia = $fecha_dia;
        $comida_primero = $this->request->getPost("comida_primero", "trim");
        $comida_segundo = $this->request->getPost("comida_segundo", "trim");
        $comida_postre = $this->request->getPost("comida_postre", "trim");
        $merienda = $this->request->getPost("merienda", "trim");

        //VALIDACION
        $regVal = new menuValidate();
        $valores = array("comida_primero" => $comida_primero, "comida_segundo" => $comida_segundo, "comida_postre" => $comida_postre, "merienda" => $merienda);
        $mensajesValida = $regVal->validate($valores);

        if (count($mensajesValida)) {
            foreach ($mensajesValida as $mensajeV) {
                $error = $error . "<br> " . $mensajeV;
            }
            $this->view->setVar("error", $error);
            $this->dispatcher->forward(
                    array(
                        "action" => "formMenu"
            ));
        } else {
            $menu = Menu::findFirst("Fecha='" . $fecha . "'");

            $menu->setFecha($fecha);
            $menu->setDiaSemana($dia);
            $menu->setComidaPrimero($comida_primero);
            $menu->setComidaSegundo($comida_segundo);
            $menu->setComidaPostre($comida_postre);
            $menu->setMerienda($merienda);

            if ($menu->save() == false) {
                foreach ($menu->getMessages() as $mensajes) {
                    $error = $error . " " . $mensaje->getMessage();
                }
                $this->view->setVar("error", $error);
                $this->dispatcher->forward(
                        array(
                            "action" => "formMenu"
                ));
            } else {
                $this->view->setVar("succes", "Menu modificado correctamente");
                $this->dispatcher->forward(
                        array(
                            "action" => "menu"
                ));
            }
        }
    }

    public function verMenuAction() {
        $this->tag->prependTitle("Ver Menú - ");

        if (isset($_POST['fecha'])) {
            $fecha = $_POST['fecha'];
            $menus = Menu::find("Fecha='" . $fecha . "'");
            if ($index >= count($menus)) {
                return $this->view->setVar("fecha", $fecha);
                return $this->response->redirect('/menu/verMenu');
            } else {
                $menus->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
                $menu = $menus[0];
                $this->view->setVar("menu", $menu);
            }
        }
    }

    public function formMenuEliminarAction() {
        $this->tag->prependTitle("Menú - ");

        if (isset($_POST['fecha'])) {
            $fecha = $_POST['fecha'];

            $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
            $fecha_dia = $dias[date('N', strtotime($fecha))];

            $dia = $fecha_dia;

            //comprobar q la fecha es mayor q la fecha actual
            $fecha_actual = date("Y-m-d");
            $fecha_mod_menu = new DateTime($fecha);
            $fecha_mod_actual = new DateTime($fecha_actual);
            $interval = $fecha_mod_menu->diff($fecha_mod_actual);

            //si pasan mas de 2 dias, ya no se podra modficar o agregar un menu
            if ($interval->format('%R%a días') < 2) {
                if ($dia === "Sabado" || $dia === "Domingo") {
                    $this->view->setVar("error", "No hay menús para fines de semana");
                    $this->dispatcher->forward(
                            array(
                                "action" => "menu"
                    ));
                } else {
                    $menus = Menu::find("Fecha='" . $fecha . "'");
                    if ($index >= count($menus)) {
                        return $this->view->setVar("fecha", $fecha);
                        return $this->response->redirect('/menu/formMenuEliminar');
                    } else {
                        $menus->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
                        $menu = $menus[0];
                        $this->view->setVar("menu", $menu);
                    }
                }
            } else {
                $this->view->setVar("error", "No se puede eliminar el menú una vez pasada la fecha");
                $this->dispatcher->forward(
                        array(
                            "action" => "menu"
                ));
            }
        }
    }

    public function deleteMenuAction() {
        $this->tag->prependTitle("Eliminar menú - ");

        $fecha = $_POST['fecha'];

        $menu = Menu::find("Fecha='" . $fecha . "'");
        if ($menu) {
            if ($menu->delete() == false) {
                $this->view->setVar("error", "No se ha podido eliminar el menú seleccionado");
                $this->dispatcher->forward(array(
                    "action" => "menu"
                ));
            } else {
                $this->view->setVar("succes", "Menu eliminado correctamente");
                $this->dispatcher->forward(array(
                    "action" => "menu"
                ));
            }
        }
    }

}
