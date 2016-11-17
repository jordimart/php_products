<?php

//controlador para el módulo de page products

class controller_page_products {
    public function __construct() {
include (UTILS_PRODUCTS . 'utils.inc.php'); //utilidades de este módulopara pintar html por php
//include (UTILS . 'filters.inc.php');
//include (UTILS . 'common.inc.php');

//include (UTILS . 'response_code.inc.php');
//include(UTILS . "utils.inc.php");
//include LOG_DIR;
//session_start();

$_SESSION['module'] = "page_products"; //guardamos el valor del módulo
    }
    
    public function page_products() {
   			require_once(VIEW_PATH_INC."header.php"); 
			require_once(VIEW_PATH_INC."menu.php");
	
            loadView('modules/page_products/view/', 'page_products.php');
            
            require_once(VIEW_PATH_INC."footer.html");
        }
    
    public function autocomplete_page_products() {
if ((isset($_GET["autocomplete"])) && ($_GET["autocomplete"] === "true")) {
    set_error_handler('ErrorHandler');
    
    try {

        $nameProducts = loadModel(MODEL_PRODUCTS, "page_products_model", "select_column_products", "trademark");
    } catch (Exception $e) {
        showErrorPage(2, "ERROR - 503 BD", 'HTTP/1.0 503 Service Unavailable', 503);
    }
    restore_error_handler();

    if ($nameProducts) {
        $jsondata["trademark"] = $nameProducts;
        echo json_encode($jsondata);
        exit;
    } else {

        showErrorPage(2, "ERROR - 404 NO DATA", 'HTTP/1.0 404 Not Found', 404);
    }
}
    }

public function trademark() {
if (($_GET["trademark"])) {
    //filtrar $_GET["nom_product"]

    $result = filter_string($_GET["trademark"]);
    if ($result['resultado']) {
        $search = $result['datos'];
    } else {
        $search = '';
    }
    //$model_path = SITE_ROOT . '/modules/page_products/model/model/';
    set_error_handler('ErrorHandler');
    try {

        $arrArgument = array(
            'column' => 'trademark',
            'like' => $search
        );
        $producto = loadModel(MODEL_PRODUCTS, "page_products_model", "select_like_products", $arrArgument);


        //throw new Exception(); //que entre en el catch
    } catch (Exception $e) {
        showErrorPage(2, "ERROR - 503 BD", 'HTTP/1.0 503 Service Unavailable', 503);
    }
    restore_error_handler();

    if ($producto) {
        $jsondata["product_autocomplete"] = $producto;
        echo json_encode($jsondata);
        exit;
    } else {
        //if($producto){{ //que lance error si no existe el producto
        showErrorPage(2, "ERROR - 404 NO DATA", 'HTTP/1.0 404 Not Found', 404);
    }
}

}

public function count_product() {

if (($_GET["count_product"])) {
    //filtrar $_GET["count_product"]
    $result = filter_string($_GET["count_product"]);
    if ($result['resultado']) {
        $search = $result['datos'];
    } else {
        $search = '';
    }
    //$model_path = SITE_ROOT . '/modules/page_products/model/model/';
    set_error_handler('ErrorHandler');
    try {

        $arrArgument = array(
            "column" => "trademark",
            "like" => $search
        );
        $total_rows = loadModel(MODEL_PRODUCTS, "page_products_model", "count_like_products", $arrArgument);
        //throw new Exception(); //que entre en el catch
    } catch (Exception $e) {
        showErrorPage(2, "ERROR - 503 BD", 'HTTP/1.0 503 Service Unavailable', 503);
    }
    restore_error_handler();

    if ($total_rows) {
        $jsondata["num_products"] = $total_rows[0]["total"];
        echo json_encode($jsondata);
        exit;
    } else {
        //if($total_rows){ //que lance error si no existe el producto
        showErrorPage(2, "ERROR - 404 NO DATA", 'HTTP/1.0 404 Not Found', 404);
    }
}
}

public function num_pages() {

//obtenemos el número de páginas según los productos que hayan en base de datos
if ((isset($_GET["num_pages"])) && ($_GET["num_pages"] === "true")) {
    
    //filtrar $_GET["keyword"]
    if (isset($_GET["keyword"])) {
        $result = filter_string($_GET["keyword"]);
        if ($result['resultado']) {
            $search = $result['datos'];
        } else {
            $search = '';
        }
    } else {
        $search = '';
    }

    //definimos el número de productos por página
    $item_per_page = 6;
    //buscamos el modelo
    //$path_model = SITE_ROOT . '/modules/page_products/model/model/';

    //change work error apache
    set_error_handler('ErrorHandler');

    try {
        $arrArgument = array(
            "column" => "trademark",
            "like" => $search
        );

        //este load utilizara la función de buscar el número total de productos
        $arrValue = loadModel(MODEL_PRODUCTS, "page_products_model", "count_like_products", $arrArgument);
        $get_total_rows = $arrValue[0]["total"]; //total records
        $pages = ceil($get_total_rows / $item_per_page); //break total records into pages
    } catch (Exception $e) {
        //error en caso de que no funcione la base de datos, se pinta en el log
        showErrorPage(2, "ERROR - 503 BD", 'HTTP/1.0 503 Service Unavailable', 503);
    }

    //change to defualt work error apache
    restore_error_handler();

    if ($get_total_rows) {
        //devolvemos al frontend el número de páginas mediante JSON
        $jsondata["pages"] = $pages;
        echo json_encode($jsondata);
        exit;
    } else {
        //si no hay productos lanzará el error de que no hay productos, se pinta en el log
        showErrorPage(2, "ERROR - 404 NO DATA", 'HTTP/1.0 404 Not Found', 404);
    }
}
}


function view_error_true(){
if ((isset($_GET["view_error"])) && ($_GET["view_error"] === "true")) {
    //esta función pintaría el error mediante un template de php en html
    showErrorPage(0, "ERROR - 503 BD Unavailable");
}
}

function view_error_false(){
if ((isset($_GET["view_error"])) && ($_GET["view_error"] === "false")) {
    //esta función pintaría el error mediante un template de php en html
    showErrorPage(0, "ERROR - 404 NO DATA");
}
}

function id_product(){
//Obtenemos según un id de producto seleccionado en el frontend los detalles del producto
if (isset($_GET["idProduct"])) {

    $arrValue = null;
    $result = filter_string($_GET["idProduct"]);

    if ($result['resultado']) {
        $id = $result['datos'];
    } else {
        $id = 1;
    }

    set_error_handler('ErrorHandler');
    try {
        $arrValue = false;
        
        $arrValue = loadModel(MODEL_PRODUCTS, "page_products_model", "details_products", $id);
    } catch (Exception $e) {
        //error en caso de no poder consultar en la base de datos, se pinta en el log
        showErrorPage(2, "ERROR - 503 BD", 'HTTP/1.0 503 Service Unavailable', 503);
    }
    restore_error_handler();

    if ($arrValue) {
        //si hay datos en el array se los devolvemos al frontend mediante json
        $jsondata["product"] = $arrValue[0];
        echo json_encode($jsondata);
        exit;
    } else {
        //error en caso de que no exista el producto, se pinta en el log
        showErrorPage(2, "ERROR - 404 NO DATA", 'HTTP/1.0 404 Not Found', 404);
    }
} else {

    //filter to $_POST["page_num"]
    if (isset($_POST["page_num"])) {
        $result = filter_num_int($_POST["page_num"]);
        if ($result['resultado']) {
            $page_number = $result['datos'];
        }
    } else {
        $page_number = 1;
    }
    //si no hay un producto seleccionado paginará los productos
    $item_per_page = 6;

    if (isset($_GET["keyword"])) {
        $result = filter_string($_GET["keyword"]);
        if ($result['resultado']) {
            $search = $result['datos'];
        } else {
            $search = '';
        }
    } else {
        $search = '';
    }

    if (isset($_POST["keyword"])) {
        $result = filter_string($_POST["keyword"]);
        if ($result['resultado']) {
            $search = $result['datos'];
        } else {
            $search = '';
        }
    }

    //esto se utiliza para no perder la posición al paginar
    $position = (($page_number - 1) * $item_per_page);
    //$path_model = SITE_ROOT . '/modules/page_products/model/model/';

    $arrArgument = array(
        'column' => 'trademark',
        'like' => $search,
        'position' => $position,
        'limit' => $item_per_page
    );
    set_error_handler('ErrorHandler');
    //utilizamos load model para consultar en bd los productos a paginar
    try {
        $arrValue = loadModel(MODEL_PRODUCTS, "page_products_model", "select_like_limit_products", $arrArgument);
    } catch (Exception $e) {
        //error si no se ha producido la consulta
        //esta función pintaría el error mediante un template de php en html
        showErrorPage(0, "ERROR - 503 BD Unavailable");
    }
    restore_error_handler();

    if ($arrValue) {
        //si hay valores en el array pintara por html hecho con php
        paint_template_products($arrValue);
    } else {
        //error si no hay productos
        //esta función pintaría el error mediante un template de php en html
        showErrorPage(0, "ERROR - 404 NO PRODUCTS");
    }
}
}
}