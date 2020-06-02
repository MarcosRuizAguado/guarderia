<?php

use Phalcon\Mvc\User\Component;
use Phalcon\Mvc\View;

//require_once __DIR__ . '\..\library\swiftmailer\swift_required.php';
require_once __DIR__ . DIRECTORY_SEPARATOR. '..' .DIRECTORY_SEPARATOR. 'library'.
DIRECTORY_SEPARATOR.'swiftmailer'.DIRECTORY_SEPARATOR.'swift_required.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mail
 *
 * @author Marcos
 */
class Mail extends Component {

    //put your code here
    protected $_transport = false;

    public function getTemplate($name, $params) {
        return $this->view->getRender('emailTemplates', $name, $params, function($view) {
                    $view->setRenderLevel(View::LEVEL_LAYOUT);
                });
    }

    public function send($to, $subject, $name, $params, $bcc = '') {
        $mailSettings = $this->config->mail; //config/config.php
        // creamos el mensaje
        $message = Swift_Message::newInstance()
                ->setSubject($subject)
                ->setTo($to)
                ->setFrom(array(
            $mailSettings->fromEmail => $mailSettings->fromName));
        $template = $this->getTemplate($name, $params);
        $message->setBody($template, 'text/html');
        
        if (!$this->_transport){
            $this->_transport = Swift_SmtpTransport::newInstance(
                    $mailSettings->smtp->server,
                    $mailSettings->smtp->port,
                    $mailSettings->smtp->security
                    )->setUsername($mailSettings->smtp->username)
                    ->setPassword($mailSettings->smtp->password);
        }
        
        //creamos el objeto swiftmailer
        $mailer = Swift_Mailer::newInstance($this->_transport);
        return $mailer->send($message);
    }

}
