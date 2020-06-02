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

class aulaValidate extends Validation {

    public function initialize() {

        $this->add('nombre', new PresenceOf(
                array('message' => 'El nombre no puede estar vacio')
                )
        );

        $this->add('logo', new PresenceOf(
                array('message' => 'El logo no puede estar vacio')
                )
        );
    }

}
