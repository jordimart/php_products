function validate_search(search_value) {
    if (search_value.length > 0) {
        var regexp = /^[a-zA-Z0-9 .,]*$/;
        return regexp.test(search_value);
    }
    return false;
}

function refresh() {
    $('.pagination').html = '';
    $('.pagination').val = '';
}

function search(keyword) {

    $.post("../../products/num_pages/", {'num_pages': true, 'keyword': keyword}, function (data, status) {

        var json = JSON.parse(data);
        var pages = json.pages;

        $("#results").load("../../products/obtain_products/", {'keyword': keyword});

        if (pages !== 0) {
            refresh();

            $(".pagination").bootpag({
                total: pages,
                page: 1,
                maxVisible: 5,
                next: 'next',
                prev: 'prev'
            }).on("page", function (e, num) {
                e.preventDefault();
                if (!keyword)
                    $("#results").load(
                            "../../products/obtain_products/", {
                                'page_num': num
                            });
                else
                    $("#results").load(
                            "../../products/obtain_products/", {
                                'page_num': num,
                                'keyword': keyword
                            });
                reset();
            });
        } else {
            $("#results").load(
                    "../../products/view_error_false/", {'view_error': false}
            );
            $('.pagination').html('');
            reset();
        }
        reset();

    }).fail(function (xhr) {
        $("#results").load(
                "../../products/view_error_true/", {'view_error': true}
        );
        $('.pagination').html('');
        reset();
    });
}

function search_product(keyword) {
    $.post(
            "../../products/trademark/", {'trademark': keyword},
            function (data, status) {
                var json = JSON.parse(data);
                var product = json.product_autocomplete;

                $('#results').html('');
                $('.pagination').html('');

                var img_prod = document.getElementById('img_product');
                img_prod.innerHTML = '<img src="../../' + product[0].avatar +
                        '" class="prodImg"> ';

                var trademark = document.getElementById('trademark');
                trademark.innerHTML = product[0].trademark;
                var model = document.getElementById('model');
                model.innerHTML = "Model: " + product[0].model;
                var serial_number = document.getElementById('serial_number');
                serial_number.innerHTML = "Serial_number: " + product[0].serial_number;
                var category = document.getElementById('category');
                category.innerHTML = "Country: " + product[0].category;
                var desc_product = document.getElementById('description');
                desc_product.innerHTML = "Description: " + product[0].description;
                var price_product = document.getElementById('price_product');
                price_product.innerHTML = "Precio: " + product[0].sale_price +
                        " €";


            }).fail(function (xhr) {
        $("#results").load(
                "../../products/view_error_false/", {'view_error': false}
        );
        $('.pagination').html('');
        reset();
    });
}

function count_product(keyword) {
    $.post(
            "../../products/count_product/", {'count_product': keyword},
            function (data, status) {
                var json = JSON.parse(data);
                var num_products = json.num_products;

                if (num_products == 0) {
                    $("#results").load(
                            "../../products/view_error_false/", {'view_error': false}
                    ); //view_error=false
                    $('.pagination').html('');
                    reset();
                }
                if (num_products == 1) {
                    search_product(keyword);
                }
                if (num_products > 1) {
                    search(keyword);
                }
            }).fail(function () {
        $("#results").load(
                "../../products/view_error_false/", {'view_error': false}
        ); //view_error=false
        $('.pagination').html('');
        reset();
    });
}

function reset() {
    $('#img_prod').html('');
    $('#serial_number').html('');
    $('#country').html('');
    $('#sale_price').html('');

    $('#keyword').val('');
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return 0;
}

////////////////////////// inici carregar pàgina /////////////////////////
$(document).ready(function () {

    if (getCookie("search")) {
        var keyword = getCookie("search");
        count_product(keyword);
        setCookie("search", "", 1);
    } else {
        search();
    }

    //evento cuando pulso en las busquedas cpge cookies
    $("#search_prod").submit(function (e) {
        var keyword = document.getElementById('keyword').value;
        var v_keyword = validate_search(keyword);
        if (v_keyword)
            setCookie("search", keyword, 1);
        location.reload(true);

        //si no ponemos la siguiente línea, el navegador nos redirecciona a index.php
        e.preventDefault(); //STOP default action
    });

    //evento cuando pulso el boton buscar
    $('#Submit').click(function () {
        var keyword = document.getElementById('keyword').value;
        var v_keyword = validate_search(keyword);
        if (v_keyword)
            setCookie("search", keyword, 1);
        location.reload(true);

    });

    $.post(
            "../../products/autocomplete_products/", {'autocomplete': true},
            function (data, status) {

                var json = JSON.parse(data);
                var trademark = json.trademark;

                var suggestions = new Array();
                for (var i = 0; i < trademark.length; i++) {
                    suggestions.push(trademark[i].trademark);
                }

                $("#keyword").autocomplete({
                    source: suggestions,
                    minLength: 1,
                    select: function (event, ui) {
                        var keyword = ui.item.label;
                        count_product(keyword);
                    }
                });
            }).fail(function (xhr) {
        if (xhr.status === 404) {
            $("#results").load("../../products/view_error_false/", {'view_error': false});
        } else {
            $("#results").load("../../products/view_error_true/", {'view_error': true});
        }
        $('.pagination').html('');
        reset();
    });

});


