
<script type="text/javascript" src="<?php echo PRODUCTS_JS_LIB_PATH ?>jquery.bootpag.min.js" ></script>
<script type="text/javascript" src="<?php echo PRODUCTS_JS_PATH ?>page_products.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo PRODUCTS_CSS_PATH ?>main.css">
<br><br><br><br><br><br>
<!--input de autocomplete añadida-->
<center>
    <form name="search_prod" id="search_prod" class="search_prod">
        <input type="text" value="" placeholder="Search Product ..." class="input_search" id="keyword" list="datalist">
        <!-- <div id="results_keyword"></div> -->
        <input name="Submit" id="Submit" class="button_search" type="button" />
        <br><br>
        <br><br>
    </form>
</center>

<!--aquí pintamos los resultados a paginar-->
<div id="results"></div>

<center>
    <!--aquí irá la paginación de productos,donde seleccionamos la página-->
    <div class="pagination"></div>

</center>

<!-- modal window details_product -->

<section >
    <div class="container" id="product">
        <div class="media">
            <div class="pull-left">
                <div id="img_product" class="img_product"></div>
            </div>
            <div class="media-body">
                <div id="text-product">
                    <h3 class="media-heading title-product"  id="provincia"></h3>
                    <p class="text-limited" id="nombre" ></p>
                    <p class="text-limited" id="precio_menu" ></p>
                    <p class="text-limited" id="precio_menu_almuerzo" ></p>
                    <p class="text-limited" id="precio_menu_noche" ></p>
                    <br>
                    <h5 > <strong  id="valoracion"></strong> </h5>
                </div>
            </div>
        </div>
    </div>
</section>
