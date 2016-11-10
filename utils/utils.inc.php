<?php
    function debugPHP($array){
		echo "<pre>";
		print_r($array);
		echo "</pre><br>";
		//die(); no va
	}
	
	function debugChrome($array){
	    include 'libs/chromephp-master/ChromePhp.php';
		ChromePhp::warn($array);
	}
	
	function redirect($url){
		die('<script>top.location.href="'.$url .'";</script>');
	}

