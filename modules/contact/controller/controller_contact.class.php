<?php

class controller_contact {

    public function __construct() {
        $_SESSION['module'] = "contact";
    }

    public function view_contact() {
        require_once(VIEW_PATH_INC . "header.php");
        require_once(VIEW_PATH_INC . "menu.php");

        loadView(CONTACT_VIEW_PATH, 'contact.php');

        require_once(VIEW_PATH_INC . "footer.html");
    }

    public function process_contact() {
        if ($_POST['token'] === "contact_form") {

           //Envio un correo al admin de la peticion
            $arrArgument = array(
                'type' => 'admin',
                'token' => '',
                'inputName' => $_POST['inputName'],
                'inputEmail' => $_POST['inputEmail'],
                'inputSubject' => $_POST['inputSubject'],
                'inputMessage' => $_POST['inputMessage']
            );
            set_error_handler('ErrorHandler');
            try {
                //envia un correo con los datos introducidos
                if (responder_email($arrArgument)) {
                    $value = true;
                } else {
                    $value = false;
                }
            } catch (Exception $e) {
                $value = false;
            }
            restore_error_handler();

             //Enviamos el correo al usuario
            $arrArgument = array(
                'type' => 'contact',
                'token' => '',
                'inputName' => $_POST['inputName'],
                'inputEmail' => $_POST['inputEmail'],
                'inputSubject' => $_POST['inputSubject'],
                'inputMessage' => $_POST['inputMessage']
            );
            set_error_handler('ErrorHandler');
            try {
                //envia un correo al admin dependiendo de el resultado
                //utiliza la función de utilidades mail.inv.php
                if (responder_email($arrArgument) && ($value==true)) {
                    echo "true|Tu mensaje ha sido enviado correctamente ";
                } else {
                    echo "false|Error en el servidor. Intentelo más tarde...";
                }
            } catch (Exception $e) {
                echo "false|Error en el servidor. Intentelo más tarde...";
            }
            restore_error_handler();
        } else {
            echo "false|Error en el servidor. Intentelo más tarde...";
        }
    }

}
