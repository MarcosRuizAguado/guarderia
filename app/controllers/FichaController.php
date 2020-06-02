<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FichaController extends ControllerBase {

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

    public function crudAction() {
        $this->tag->prependTitle("Administrar - ");
    }

    public function registroAction() {
        $this->tag->prependTitle("Nueva Ficha - ");
        $aulas = Aula::find();
        $aulas->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("aulas", $aulas);

        if (isset($_POST['aula'])) {
            $cod = $_POST['aula'];
            $ninos = Nino::find("CodAula=" . $cod);
            $ninos->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
            $this->view->setVar("ninos", $ninos);
        }

        if (isset($_POST['enviar'])) {
            //datos del alumno
            $CodAlum = $_POST['alumno'];
            $nino = Nino::find("CodAlum=" . $CodAlum);
            $nino->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
            $nen = $nino[0];
            $this->view->setVar("nino", $nen);

            //datos de la fecha
            $fecha = $_POST['fecha'];

            //comprobamos que dia de la semana es segun la fecha
            $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
            $fecha_dia = $dias[date('N', strtotime($fecha))];

            $dia = $fecha_dia;

            //comprobar q la fecha es mayor q la fecha actual
            $fecha_actual = date("Y-m-d");
            $fecha_mod_ficha = new DateTime($fecha);
            $fecha_mod_actual = new DateTime($fecha_actual);
            $interval = $fecha_mod_ficha->diff($fecha_mod_actual);

            if ($interval->format('%R%a días') < 2) {
                if ($dia === "Sabado" || $dia === "Domingo") {
                    $this->view->setVar("error", "No hay fichas para fines de semana");
                    $this->dispatcher->forward(
                            array(
                                "action" => "crud"
                    ));
                } else {
                    $ficha = Ficha::find("Fecha='" . $fecha . "' and CodAlum=" . $CodAlum);
                    $index = 1;
                    if ($index > count($ficha)) {
                        $menus = Menu::find("Fecha='" . $fecha . "'");
                        if ($index > count($menus)) {
                            $fecha_mostrar = date("d-m-Y");
                            $this->view->setVar("fecha", $fecha);
                            $this->view->setVar("dia", $dia);
                            $this->view->setVar("fecha_mostrar", $fecha_mostrar);
                            $this->dispatcher->forward(array(
                                "controller" => "menu",
                                "action" => "formMenu_ficha"
                            ));
                        } else {
                            $menu = $menus[0];
                            //$this->view->setVar("ficha", $ficha);
                            $this->view->setVar("menu", $menu);
                            $this->view->setVar("nino", $nen);
                            $this->view->setVar("fecha", $fecha);
                            $this->dispatcher->forward(array(
                                "action" => "formFicha"
                            ));
                        }
                    } else {
                        $ficha->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
                        $ficha = $ficha[0];
                        $this->view->setVar("ficha", $ficha);
                        $menus = Menu::find("Fecha='" . $fecha . "'");
                        $menu = $menus[0];
                        $this->view->setVar("menu", $menu);
                        $this->view->setVar("nino", $nen);
                        $this->view->setVar("fecha", $fecha);
                        $this->dispatcher->forward(array(
                            "action" => "formFicha"
                        ));
                    }
                }
            } else {
                $this->view->setVar("error", "No se puede añadir o modificar la ficha una vez pasada la fecha");
                $this->dispatcher->forward(
                        array(
                            "action" => "crud"
                ));
            }
        }
    }

    public function formFichaAction() {
        
    }

    public function addFichaAction() {

        $CodAlum = $this->request->getPost("CodAlum");
        $Fecha = $this->request->getPost("Fecha");
        $Comida_primero = $this->request->getPost("comida_primero");
        $Comida_segundo = $this->request->getPost("comida_segundo");
        $Comida_postre = $this->request->getPost("comida_postre");
        $Merienda = $this->request->getPost("merienda");
        $Pipi = $this->request->getPost("pipi");
        $Caca = $this->request->getPost("caca");
        $Caca_num = $this->request->getPost("caca_num");
        $Observaciones = $this->request->getPost("observaciones");

        $fichas = Ficha::findFirst("Fecha='" . $Fecha . "' and CodAlum=" . $CodAlum);
        $ficha = $fichas[0];
        if ($ficha) {
            $this->view->setVar("error", "Ya hay una ficha para esa fecha");
            $this->dispatcher->forward(
                    array(
                        "action" => "crud"
            ));
        } else {
            $ficha = New Ficha();
            $ficha->setCodAlum($CodAlum);
            $ficha->setFecha($Fecha);
            $ficha->setComidaPrimero($Comida_primero);
            $ficha->setComidaSegundo($Comida_segundo);
            $ficha->setComidaPostre($Comida_postre);
            $ficha->setMerienda($Merienda);
            $ficha->setPipi($Pipi);
            $ficha->setCaca($Caca);
            $ficha->setCacaNum($Caca_num);
            $ficha->setObservaciones($Observaciones);

            if ($ficha->save() == false) {
                foreach ($ficha->getMessages() as $mensajes) {
                    $error = $error . " " . $mensajes->getMessage();
                }
                $this->view->setVar("error", $error);
                $this->dispatcher->forward(
                        array(
                            "action" => "registro"
                ));
            } else {
                $this->view->setVar("succes", "Ficha creada correctamente");
                $this->dispatcher->forward(
                        array(
                            "action" => "crud"
                ));
            }
        }
    }

    public function modFichaAction() {
        $CodAlum = $this->request->getPost("CodAlum");
        $Fecha = $this->request->getPost("Fecha");
        $Comida_primero = $this->request->getPost("comida_primero");
        $Comida_segundo = $this->request->getPost("comida_segundo");
        $Comida_postre = $this->request->getPost("comida_postre");
        $Merienda = $this->request->getPost("merienda");
        $Pipi = $this->request->getPost("pipi");
        $Caca = $this->request->getPost("caca");
        $Caca_num = $this->request->getPost("caca_num");
        $Observaciones = $this->request->getPost("observaciones");

        $ficha = Ficha::findFirst("Fecha='" . $Fecha . "' and CodAlum=" . $CodAlum);

        if ($ficha) {
            $ficha->setCodAlum($CodAlum);
            $ficha->setFecha($Fecha);
            $ficha->setComidaPrimero($Comida_primero);
            $ficha->setComidaSegundo($Comida_segundo);
            $ficha->setComidaPostre($Comida_postre);
            $ficha->setMerienda($Merienda);
            $ficha->setPipi($Pipi);
            $ficha->setCaca($Caca);
            $ficha->setCacaNum($Caca_num);
            $ficha->setObservaciones($Observaciones);

            if ($ficha->save() == false) {
                foreach ($ficha->getMessages() as $message) {
                    $error = $error . " " . $message->getMessage();
                }
                $this->view->setVar("error", $error);
                $this->dispatcher->forward(
                        array(
                            "action" => "crud"
                ));
            } else {
                $this->view->setVar("succes", "Ficha modificada correctamente");
                $this->dispatcher->forward(
                        array(
                            "action" => "crud"
                ));
            }
        } else {
            $this->view->setVar("error", "Ficha no encontrada");
            $this->dispatcher->forward(
                    array(
                        "action" => "crud"
            ));
        }
    }

    public function eliminarAction() {
        $this->tag->prependTitle("Eliminar Ficha - ");
        $aulas = Aula::find();
        $aulas->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $this->view->setVar("aulas", $aulas);

        if (isset($_POST['aula'])) {
            $cod = $_POST['aula'];
            $ninos = Nino::find("CodAula=" . $cod);
            $ninos->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
            $this->view->setVar("ninos", $ninos);
        }

        if (isset($_POST['enviar'])) {
            //datos del alumno
            $CodAlum = $_POST['alumno'];
            $nino = Nino::find("CodAlum=" . $CodAlum);
            $nino->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
            $nen = $nino[0];
            $this->view->setVar("nino", $nen);

            //datos de la fecha
            $fecha = $_POST['fecha'];

            //comprobamos que dia de la semana es segun la fecha
            $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
            $fecha_dia = $dias[date('N', strtotime($fecha))];

            $dia = $fecha_dia;

            //comprobar q la fecha es mayor q la fecha actual
            $fecha_actual = date("Y-m-d");
            $fecha_mod_ficha = new DateTime($fecha);
            $fecha_mod_actual = new DateTime($fecha_actual);
            $interval = $fecha_mod_ficha->diff($fecha_mod_actual);

            if ($interval->format('%R%a días') < 2) {
                if ($dia === "Sabado" || $dia === "Domingo") {
                    $this->view->setVar("error", "No hay fichas para fines de semana");
                    $this->dispatcher->forward(
                            array(
                                "action" => "crud"
                    ));
                } else {
                    $ficha = Ficha::find("Fecha='" . $fecha . "' and CodAlum=" . $CodAlum);
                    $index = 1;
                    if ($index > count($ficha)) {
                        $menus = Menu::find("Fecha='" . $fecha . "'");
                        if ($index > count($menus)) {
                            $fecha_mostrar = date("d-m-Y");
                            $this->view->setVar("fecha", $fecha);
                            $this->view->setVar("dia", $dia);
                            $this->view->setVar("fecha_mostrar", $fecha_mostrar);
                            $this->view->setVar("error", "No hay ficha para este dia");
                            $this->dispatcher->forward(array(
                                "action" => "crud"
                            ));
                        } else {
                            $menu = $menus[0];
                            $this->view->setVar("ficha", $ficha);
                            $this->view->setVar("menu", $menu);
                            $this->view->setVar("nino", $nen);
                            $this->view->setVar("fecha", $fecha);
                            $this->dispatcher->forward(array(
                                "action" => "formFicha"
                            ));
                        }
                    } else {
                        $ficha->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
                        $ficha = $ficha[0];
                        $this->view->setVar("ficha", $ficha);
                        $menus = Menu::find("Fecha='" . $fecha . "'");
                        $menu = $menus[0];
                        $this->view->setVar("menu", $menu);
                        $this->view->setVar("nino", $nen);
                        $this->view->setVar("fecha", $fecha);
                        $this->dispatcher->forward(array(
                            "action" => "formFicha_eliminar"
                        ));
                    }
                }
            } else {
                $this->view->setVar("error", "No se puede añadir o modificar la ficha una vez pasada la fecha");
                $this->dispatcher->forward(
                        array(
                            "action" => "crud"
                ));
            }
        }
    }

    public function formFicha_eliminarAction() {
        
    }

    public function deleteFichaAction() {
        $ID = $_POST['ID'];

        $ficha = Ficha::find("ID='" . $ID . "'");
        if ($ficha) {
            if ($ficha->delete() == false) {
                $this->view->setVar("error", "No se ha podido eliminar la ficha seleccionada");
                $this->dispatcher->forward(array(
                    "action" => "crud"
                ));
            } else {
                $this->view->setVar("succes", "Ficha eliminada correctamente");
                $this->dispatcher->forward(array(
                    "action" => "crud"
                ));
            }
        } else {
            $this->view->setVar("error", "Ficha no encontrada");
            $this->dispatcher->forward(array(
                "action" => "crud"
            ));
        }
    }

    public function showAction($pagina = 1) {

        $this->tag->prependTitle("Ver Ficha - ");
        $CodAlum = $this->session->get("codAlum");
        if (isset($_POST['fecha'])) {
            $fecha = $_POST['fecha'];
        } else {
            $fecha = date("Y-m-d");
        }
        $this->view->setVar("fecha", $fecha);

        //paginar
        $numFichaPag = 1;
        $pagActual = isset($pagina) ? (int) $pagina : 1;

        $fichas = Ficha::find("Fecha='" . $fecha . "' and CodAlum=" . $CodAlum);
        $index = 1;
        if ($index > count($fichas)) {
            $ninos = Nino::find("CodAlum=" . $CodAlum);
            $ninos->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
            $nino = $ninos[0];
            $this->view->setVar("nino", $nino);
            $paginator = new Phalcon\Paginator\Adapter\Model(
                    array(
                "data" => $fichas,
                "limit" => $numFichaPag,
                "page" => $pagActual
            ));
            $this->view->pagina = $paginator->getPaginate();
            return $this->view->setVar("noEncontrado", "No hay ficha para este dia.");
        } else {
            $fichas->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
            $ficha = $fichas[0];
            //paginar
            $paginator = new Phalcon\Paginator\Adapter\Model(
                    array(
                "data" => $fichas,
                "limit" => $numFichaPag,
                "page" => $pagActual
            ));
            $this->view->pagina = $paginator->getPaginate();
            $this->view->setVar("ficha", $ficha);
        }

        $ninos = Nino::find("CodAlum=" . $CodAlum);
        $ninos->setHydrateMode(Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS);
        $nino = $ninos[0];
        $this->view->setVar("nino", $nino);

        $menus = Menu::find("Fecha='" . $fecha . "'");
        $menu = $menus[0];
        $this->view->setVar("menu", $menu);
    }

}
