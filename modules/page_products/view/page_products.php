<script type="text/javascript" src="modules/page_products/view/js/jquery.bootpag.min.js"></script>
<script type="text/javascript" src="modules/page_products/view/js/pages_products.js" ></script>
<link rel="stylesheet" type="text/css" href="modules/page_products/view/css/main.css">

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
                <h3 class="media-heading title-product"  id="trademark"></h3>
                <p class="text-limited" id="model" ></p>
                <p class="text-limited" id="serial_number" ></p>
                <p class="text-limited" id="category" ></p>
                <p class="text-limited" id="description" ></p>
                <br>
                <h5 > <strong  id="price_product"></strong> </h5>
                </div>
            </div>
        </div>
    </div>
</section>
