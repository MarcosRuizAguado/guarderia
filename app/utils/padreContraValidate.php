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

class padreContraValidate extends Validation{
    
    public function initialize(){
                $this->add('NewContra', new PresenceOf(
                array('message' => 'Debe introducir una contraseña')
                )
        );
        
        $this->add('NewContra2', new PresenceOf(
                array('message' => 'Debe introducir una contraseña')
                )
        );
        
        $this->add('NewContra', new Confirmation(array( 'message' => 'Las contraseñas no coinciden', 'with' => 'NewContra2' ))); 
    }
    
}