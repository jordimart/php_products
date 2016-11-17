<?php

function loadModel($model_path, $model_name, $function, $arrArgument = '') {
    $model = $model_path . $model_name . '.class.singleton.php';

    if (file_exists($model)) {
        include_once($model);

        $modelClass = $model_name;

        if (!method_exists($modelClass, $function)) {
            //Añadida forma para que pinte los errores
            throw new Exception();
        }

        $obj = $modelClass::getInstance();

        if (isset($arrArgument)) {
            return $obj->$function($arrArgument);
        }
    } else {
        //Añadida forma para que pinte los errores
        throw new Exception();
    }
}

function loadView($rutaVista = "", $templateName = "", $arrPassValue = '') {
    $view_path = $rutaVista . $templateName;
    $arrData = '';

    if (file_exists($view_path)) {
        if (isset($arrPassValue))
            $arrData = $arrPassValue;
        include_once($view_path);
    } else {
        $error = filter_num_int($rutaVista);

        if ($error['resultado']) {
            $rutaVista = $error['datos'];
        } else {
            $rutaVista = http_response_code();
        }
        $log = log::getInstance();
        $log->add_log_general("error loadView", $_GET['module'], "response " . $rutaVista);
        $log->add_log_user("error loadView", "", $_GET['module'], "response " . $rutaVista);

        $result = response_code($rutaVista);
        $arrData = $result;
        require_once VIEW_PATH_INC_ERROR . "error.php";
        //die();
    }
}
