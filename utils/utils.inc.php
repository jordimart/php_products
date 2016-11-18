<?php

function debugPHP($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre><br>";
    //die(); no va
}

function debugChrome($array) {
    include 'libs/chromephp-master/ChromePhp.php';
    ChromePhp::warn($array);
}

function redirect($url) {
    die('<script>top.location.href="' . $url . '";</script>');
}

function amigable($url, $return = false) {
    $amigableson = URL_AMIGABLES;
    $link = "";
    if ($amigableson) {
        $url = explode("&", str_replace("?", "", $url));
        foreach ($url as $key => $value) {
            $aux = explode("=", $value);
            $link .= $aux[1] . "/";
        }
    } else {
        $link = "index.php" . $url;
    }
    if ($return) {
        return  "/". $link;
    }
    echo  "/". $link;
}

