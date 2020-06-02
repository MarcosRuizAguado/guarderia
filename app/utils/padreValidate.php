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

class padreValidate extends Validation {

    public function initialize() {

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

        $this->add('email', new PresenceOf(
                array('message' => 'El email no puede estar vacio')
                )
        );

        $this->add('email', new Email(
                array('message' => 'El email no es valido')
                )
        );

        $this->add('contra', new PresenceOf(
                array('message' => 'Debe introducir una contraseña')
                )
        );
        
        $this->add('contra2', new PresenceOf(
                array('message' => 'Debe introducir una contraseña')
                )
        );
        
        $this->add('contra', new Confirmation(array( 'message' => 'Las contraseñas no coinciden', 'with' => 'contra2' ))); 
    }

}
