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

class mensajeValidate extends Validation{
    
    public function initialize(){
        
        //titulo, mensaje
        
        $this->add('titulo', new PresenceOf(
                array('message' => 'El titulo no puede estar vacio')
                )
        );
        
        $this->add('mensaje', new PresenceOf(
                array('message' => 'El mensaje no puede estar vacio')
                )
        );
        
        
    }
    
}