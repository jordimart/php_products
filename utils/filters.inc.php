<?php
//función para filtrar integers en las rutas y que solo se pueda meter un integer
function filter_num_int($num) {
    $num = filter_var($num, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if (!is_numeric($num)) {
        return $return = array('resultado' => false, 'error' => "Invalid page number!", 'datos' => 1);
    }
    return $return = array('resultado' => true, 'error' => "", 'datos' => $num);
}
//función para evitar que nos metan scripts u otros elementos que no sean un string
function filter_string($cad){
        $result = filter_var($cad, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/^[a-zA-Z0-9 .,]*$/')));
        if (!$result) {
            return $return=array('resultado'=>false, 'error'=>"Invalid value input", 'datos'=>"");
        }
        return $return=array('resultado'=>true, 'error'=>"", 'datos'=>$cad);
    }
