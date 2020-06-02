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

class menuValidate extends Validation{
    
    public function initialize(){
        
        //comida_primero. comida_segundo, comida_postre, merienda
        
        $this->add('comida_primero', new PresenceOf(
                array('message' => 'Introduce la primera comida')
                )
        );
        
        $this->add('comida_segundo', new PresenceOf(
                array('message' => 'Introduce la segunda comida')
                )
        );
        
        $this->add('comida_postre', new PresenceOf(
                array('message' => 'Introduce el postre')
                )
        );
        
        $this->add('merienda', new PresenceOf(
                array('message' => 'Introduce la merienda')
                )
        );
        
    }
    
}