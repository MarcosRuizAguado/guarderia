<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;

class ninoValidate extends Validation {

    public function initialize() {

        //nombre, apellido1, apellido2, foto, aula

        $this->add('nombre', new PresenceOf(
                array('message' => 'El nombre no puede estar vacio')
                )
        );
        
        $this->add('apellido1', new PresenceOf(
                array('message' => 'El primer apellido no puede estar vacio')
                )
        );
        
        $this->add('apellido2', new PresenceOf(
                array('message' => 'El segundo apellido no puede estar vacio')
                )
        );
        
        $this->add('aula', new PresenceOf(
                array('message' => 'Tiene que seleccionar un aula')
                )
        );
        
        
        
    }

}
