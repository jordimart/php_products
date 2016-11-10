<?php

//Plantillas para pintar en la vista errores o productos
//pintamos la página por html mediante php
function paint_template_error($message) {
    $log = Log::getInstance();
    //añadimos los errores al log general y de user
    $log->add_log_general("error paint_template_error", "page_products", "response" . http_response_code()); //$text, $controller, $function
    $log->add_log_user("error paint_template_error", "", "page_products", "response" . http_response_code()); //$msg, $username = "", $controller, $function

    $arrData = response_code(http_response_code());

    print ("<br><br><br><br><br><br>");
    print ("<div id='page'>");
    print ("<br><br>");
    print ("<div id='header_error' class='status4xx'>");
    //https://es.wikipedia.org/wiki/Anexo:C%C3%B3digos_de_estado_HTTP
    print("<h1>" . $message . "</h1>");
    print("</div>");
    print ("<div id='content'>");
    print ("<h2>The following error occurred:</h2>");
    print ("<p>The requested URL was not found on this server.</p>");
    print ("<P>Please check the URL or contact the <!--WEBMASTER//-->webmaster<!--WEBMASTER//-->.</p>");
    print ("</div>");
    print ("<div id='footer'>");
    print ("<p>Powered by <a href='http://www.ispconfig.org'>ISPConfig</a></p>");
    print ("</div>");
    print("</div>");
}

//pintamos el html por php los productos en el modal
function paint_template_products($arrData) {
    print ("<script type='text/javascript' src='modules/page_products/view/js/modal_products.js' ></script>");
    print ("<section >");
    print ("<div class='container'>");
    print ("<div id='list_prod' class='row text-center pad-row'>");
    print ("<ol class='breadcrumb'>");
    print ("<li class='active' >Products</li>");
    print ("</ol>");
    print ("<br>");
    print ("<br>");
    print ("<br>");
    print ("<br>");

    if (isset($arrData) && !empty($arrData)) {
        $i = 0;
        foreach ($arrData as $product) {
            $i++;
            if (count($arrData) % 2 !== 0 && i >= count($arrData)) {
                print( '<div class="odd_prod">');
            } else {
                if ($i % 2 != 0) {
                    print( '<div class="table-row">');
                } else
                    print('<div class="table-separator"></div>');
            }

            print('<div class="table-cell">');


            print('<div class="media">');
            print('<div class="pull-left">');
            print('<img src="' . $product['avatar'] . '" class="icon-md" height="80" width="80">');
            print('</div>');
            print('<div class="media-body">');
            print('<h3 class="media-heading">' . $product['trademark'] . '</h3>');
            print('<p>' . $product['model'] . '</p>');
            print('<p>' . $product['description'] . '</p>');
            print('<h5> <strong>Precio:' . $product['sale_price'] . '</strong><strong>€</strong> </h5>');
            print("<div id='" . $product['serial_number'] . "' class='product_name' type='button'> Read Details </div>");

            print('</div>');
            print('</div>');
            print('<br>');


            print('</div>');
            if (count($arrData) % 2 !== 0 && i >= count($arrData)) {
                print( '</div>');
            } else {
                if ($i % 2 == 0) {
                    print('</div> <br>');
                }
            }
        }
    }
    print ("</div>");
    print ("</div>");
    print ("</section>");
}

function paint_template_search($message) {
    $log = Log::getInstance();
    $log->add_log_general("error paint_template_search", "products", "response " . http_response_code()); //$text, $controller, $function
    $log->add_log_user("error paint_template_search", "", "products", "response " . http_response_code()); //$msg, $username = "", $controller, $function

    print ("<section> \n");
    print ("<div class='container'> \n");
    print ("<div class='row text-center pad-row'> \n");

    print ("<h2>" . $message . "</h2> \n");
    print ("<br><br><br><br> \n");

    print ("</div> \n");
    print ("</div> \n");
    print ("</section> \n");
}
