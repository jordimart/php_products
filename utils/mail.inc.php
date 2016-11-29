<?php

function responder_email($arr) {
    $html = '';
    $subject = '';
    $body = '';
    $ruta = '';
    $return = '';

    switch ($arr['type']) {
        case 'alta':
            $subject = 'Tu Alta en FindMenu';
            $ruta = "<a href='" . amigable("?module=login&function=activar&aux=A" . $arr['token'], true) . "'>aqu&iacute;</a>";
            $body = 'Gracias por unirte a nuestra aplicaci&oacute;n<br> Para finalizar el registro, pulsa ' . $ruta;
            break;

        case 'modificacion':
            $subject = 'Tu Nuevo Password en FindMenu<br>';
            $ruta = '<a href="' . amigable("?module=login&function=activar&aux=F" . $arr['token'], true) . '">aqu&iacute;</a>';
            $body = 'Para recordar tu password pulsa ' . $ruta;
            break;

        case 'contact':
            $subject = 'Tu Petición a Findmenu ha sido enviada';
            $ruta = "https://solarspain.jordimart.tk";
            $body = 'Para visitar nuestra web, pulsa ' . $ruta;
            break;

        case 'admin':
            $subject = $arr['inputSubject'];
            $body = 'inputName: ' . $arr['inputName'] . '<br>' .
                    'inputEmail: ' . $arr['inputEmail'] . '<br>' .
                    'inputSubject: ' . $arr['inputSubject'] . '<br>' .
                    'inputMessage: ' . $arr['inputMessage'];
            break;
    }

    $html .= "<html>";
    $html .= "<head>";
    $html .= "<meta charset='utf-8' />
    <style>
            * {
                margin: 0;
                padding: 0;
                text-align: center;
              }

            body {
                margin: 0 auto;
                width: 600px;
                height: 300px;
            }

            header {
                padding: 20px;
                background-color: blue;
                color: white;
                padding-left: 20px;
                font-size: 25px;
            }

            section {
                padding-top: 50px;
                padding-left: 50px;
                margin-top: 3px;
                margin-bottom: 3px;
                height: 100px;
                background-color: ghostwhite;
              }

             footer {
                padding: 5px;
                padding-left: 20px;
                background-color: blue;
                color: white;
              }
        </style>";
    $html .= "</head>";
    $html .= "<body>";
    $html .= "<header>";
    $html .= "<p>" . $subject . "</p>";
    $html .= "</header>";
    $html .= "<section>";
    $html .= $body;
    $html .= "</section>";
    $html .= "<footer>";
    $html .= "<p>Enviado por FindMenu.com</p>";
    $html .= "</footer>";
    $html .= "</body>";
    $html .= "</html>";

    set_error_handler('ErrorHandler');
    try {
        $mail = email::getInstance();
        $mail->name = $arr['inputName'];
        //Si el tipo es de admin el correo se envia con la paeticion del usuario al admin de la app
        if ($arr['type'] === 'admin') {
            $mail->address = 'gv.web.denvelopers@gmail.com';
            $mail->subject = $subject;
            $mail->body = $html;
            //Si el tipo es de contact le enviamos al usuario una contestación
        } else if ($arr['type'] === 'contact') {
            $mail->address = $arr['inputEmail'];
            $mail->subject = $subject;
            $mail->body = $html;
        }
    } catch (Exception $e) {
        $return = 0;
    }
    restore_error_handler();

    //Aqui utilizamos la funcion mailgun
    $return = $mail->send_mailgun();
    return $return;
}
