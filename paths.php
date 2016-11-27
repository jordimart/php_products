<?php

//SITE_ROOT
$path = $_SERVER['DOCUMENT_ROOT'];
define('SITE_ROOT', $path);

//SITE_PATH
define('SITE_PATH', 'https://' . $_SERVER['HTTP_HOST']);

//CSS
define('CSS_PATH', '/view/css/');

//JS
define('JS_PATH', '/view/js/');

//IMG
define('IMG_PATH', '/view/img/');

//Define las rutas donde se guardarán los logs
define('LOG_DIR', SITE_ROOT . 'classes/Log.class.singleton.php');
define('USER_LOG_DIR', SITE_ROOT . 'log/user/Site_User_errors.log');
define('GENERAL_LOG_DIR', SITE_ROOT . 'log/general/Site_General_errors.log');

//define si el modo producción estará activo o no
define('PRODUCTION', false);

//model
define('MODEL_PATH', SITE_ROOT . 'model/');
//view
define('VIEW_PATH_INC', SITE_ROOT . 'view/inc/');
define('VIEW_PATH_INC_ERROR', SITE_ROOT . 'view/inc/');
//modules
define('MODULES_PATH', SITE_ROOT . 'modules/');

//resources
define('RESOURCES', SITE_ROOT . 'resources/');

define('MEDIA_PATH', SITE_ROOT . 'media/');
//utils
define('UTILS', SITE_ROOT . 'utils/');
//libs
define('LIBS', SITE_ROOT . '/libs/');

//model products
define('UTILS_PRODUCTS', SITE_ROOT . 'modules/products/utils/');
define('PRODUCTS_JS_LIB_PATH', '/modules/products/view/lib/');
define('PRODUCTS_JS_PATH', '/modules/products/view/js/');
define('PRODUCTS_CSS_PATH', '/modules/products/view/css/');

define('MODEL_PATH_PRODUCTS', SITE_ROOT . 'modules/products/model/');
define('DAO_PRODUCTS', SITE_ROOT . 'modules/products/model/DAO/');
define('BLL_PRODUCTS', SITE_ROOT . 'modules/products/model/BLL/');
define('MODEL_PRODUCTS', SITE_ROOT . 'modules/products/model/model/');

//model contact
define('CONTACT_JS_PATH', '/modules/contact/view/js/');
define('CONTACT_CSS_PATH', '/modules/contact/view/css/');
define('CONTACT_LIB_PATH', '/modules/contact/view/lib/');
define('CONTACT_IMG_PATH', '/modules/contact/view/img/');
define('CONTACT_VIEW_PATH', 'modules/contact/view/');

//amigables
define('URL_AMIGABLES', TRUE);
