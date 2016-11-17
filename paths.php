<?php

    //SITE_ROOT
    $path=$_SERVER['DOCUMENT_ROOT'];
    define('SITE_ROOT', $path);

    //SITE_PATH
    define('SITE_PATH','https://'.$_SERVER['HTTP_HOST']);


    //CSS
    define('CSS_PATH', SITE_PATH . 'view/css/');


    //Define las rutas donde se guardarán los logs
    define('LOG_DIR',SITE_ROOT.'classes/Log.class.singleton.php');
    define('USER_LOG_DIR', SITE_ROOT . 'log/user/Site_User_errors.log');
    define('GENERAL_LOG_DIR', SITE_ROOT . 'log/general/Site_General_errors.log');

    //define si el modo producción estará activo o no
    define('PRODUCTION', true);

    //model
    define('MODEL_PATH',SITE_ROOT.'model/');
    //view
    define('VIEW_PATH_INC',SITE_ROOT.'view/inc/');
    define('VIEW_PATH_INC_ERROR',SITE_ROOT.'view/inc/');
    //modules
    define('MODULES_PATH',SITE_ROOT.'modules/');

    //resources
    define('RESOURCES',SITE_ROOT.'resources/');
   
    define('MEDIA_PATH',SITE_ROOT.'media/');
    //utils
    define('UTILS',SITE_ROOT.'utils/');

    //model products
    define('UTILS_PRODUCTS',SITE_ROOT.'modules/page_products/utils/');
    define('PRODUCTS_JS_LIB_PATH','/modules/page_products/view/lib/'); 
    define('PRODUCTS_JS_PATH', '/modules/page_products/view/js/'); 
    define('PRODUCTS_CSS_PATH', '/modules/page_products/view/css/');
   
    define('MODEL_PATH_PRODUCTS',SITE_ROOT.'modules/page_products/model/');
    define('DAO_PRODUCTS',SITE_ROOT.'modules/page_products/model/DAO/');
    define('BLL_PRODUCTS',SITE_ROOT.'modules/page_products/model/BLL/');
    define('MODEL_PRODUCTS',SITE_ROOT.'modules/page_products/model/model/');