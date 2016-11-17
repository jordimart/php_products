<?php
	/*** nullify any existing autoloads ***/
    spl_autoload_register(null, false);
	
	spl_autoload_extensions('.php,.inc.php,.class.php,.class.singleton.php');
	//spl_autoload_extensions('.php,.class.php,.class.singleton.php,.inc.php,.conf.php,.conf.class.php');
	
	spl_autoload_register('loadClasses');
    
	function loadClasses($className){
		if( file_exists('modules/page_products/model/BLL/'.$className.'.class.singleton.php' ) ){//require(BLL_USERS . "user_bll.class.singleton.php");
			set_include_path('modules/page_products/model/BLL/'); 
			spl_autoload($className);
		}elseif( file_exists('modules/page_products/model/DAO/'.$className.'.class.singleton.php' ) ){//require(DAO_USERS . "user_dao.class.singleton.php");
			set_include_path('modules/page_products/model/DAO/');
			spl_autoload($className);
		}elseif( file_exists('model/'.$className.'.class.singleton.php' ) ){//require(MODEL_PATH . "db.class.singleton.php");
			set_include_path('model/');
			spl_autoload($className);
		}
                elseif( file_exists('classes/'.$className.'.class.singleton.php' ) ){//require(MODEL_PATH . "log.class.singleton.php");
			set_include_path('classes/');
			spl_autoload($className);
		}
	}
