<?php

/* * * nullify any existing autoloads ** */
spl_autoload_register(null, false);

spl_autoload_extensions('.php,.inc.php,.class.php,.class.singleton.php');
//spl_autoload_extensions('.php,.class.php,.class.singleton.php,.inc.php,.conf.php,.conf.class.php');

spl_autoload_register('loadClasses');

function loadClasses($className) {

    //Get module name 
    $porciones = explode("_", $className);
    $module_name = $porciones[0];

    $model_name = "";

    //we need have this because if not exist $porciones[1], app will have problems when we sent error (showErrorPage(2..)).
    if (isset($porciones[1])) {
        $model_name = $porciones[1];
        $model_name = strtoupper($model_name);
    }

    if (file_exists('modules/' . $module_name . '/model/' . $model_name . '/' . $className . '.class.singleton.php')) {//require(BLL_USERS . "user_bll.class.singleton.php");
        set_include_path('modules/' . $module_name . '/model/' . $model_name . '/');
        spl_autoload($className);
    } elseif (file_exists('model/' . $className . '.class.singleton.php')) {//require(MODEL_PATH . "db.class.singleton.php");
        set_include_path('model/');
        spl_autoload($className);
    } elseif (file_exists('classes/log/' . $className . '.class.singleton.php')) {
        set_include_path('classes/log/');
        spl_autoload($className);
    } elseif (file_exists('classes/email/' . $className . '.class.singleton.php')) {//require(EMAIL . 'email.class.singleton.php');
        set_include_path('classes/email/');
        spl_autoload($className);
    } elseif (file_exists('libs/PHPMailer_v5.1/class.' . $className . '.php')) {//require(LIBS . 'PHPMailer_v5.1/class.phpmailer.php');
        set_include_path('libs/PHPMailer_v5.1/');
        spl_autoload('class.' . $className);
    }
}
