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
  //changes the url to avoid creating another different function
  var urlbase =
    "modules/page_products/controller/controller_page_products.class.php";
  if (!keyword)
    url = urlbase + "?num_pages=true";
  else
    url = urlbase + "?num_pages=true&keyword=" + keyword;

  $.get(url, function(data, status) {
    var json = JSON.parse(data);
    var pages = json.pages;

    if (!keyword) {
      url = urlbase;
      //console.log(url);
    } else {
      url = urlbase + "?keyword=" + keyword;
      //console.log(url);
    }
    //console.log("numero de paginas: " + pages);
    $("#results").load(url);

    if (pages !== 0) {
      refresh();

      $(".pagination").bootpag({
        total: pages,
        page: 1,
        maxVisible: 5,
        next: 'next',
        prev: 'prev'
      }).on("page", function(e, num) {
        e.preventDefault();
        if (!keyword)
          $("#results").load(
            "modules/page_products/controller/controller_page_products.class.php", {
              'page_num': num
            });
        else
          $("#results").load(
            "modules/page_products/controller/controller_page_products.class.php", {
              'page_num': num,
              'keyword': keyword
            });
        reset();
      });
    } else {
      $("#results").load(
        "modules/page_products/controller/controller_page_products.class.php?view_error=false"
      ); //view_error=false
      $('.pagination').html('');
      reset();
    }
    reset();

  }).fail(function(xhr) {
    $("#results").load(
      "modules/page_products/controller/controller_page_products.class.php?view_error=true"
    );
    $('.pagination').html('');
    reset();
  });
}


function search_product(keyword) {
  $.get(
    "modules/page_products/controller/controller_page_products.class.php?trademark=" +
    keyword,
    function(data, status) {
      var json = JSON.parse(data);
      var product = json.product_autocomplete;
      //  alert("he entrat a search:" + product);
      $('#results').html('');
      $('.pagination').html('');

      var img_prod = document.getElementById('img_product');
      img_prod.innerHTML = '<img src="' + product[0].avatar +
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
      /*  var serial_number = document.getElementById('trademark');
        serial_number.innerHTML = product[0].serial_number;
        var country = document.getElementById('model');
        country.innerHTML = product[0].model;
        var sale_price = document.getElementById('price_product');
        sale_price.innerHTML = "Price: " + product[0].sale_price + " €";
        //sale_price.setAttribute("class", "special");*/

    }).fail(function(xhr) {
    $("#results").load(
      "modules/page_products/controller/controller_page_products.class.php?view_error=false"
    );
    $('.pagination').html('');
    reset();
  });
}

function count_product(keyword) {
  $.get(
    "modules/page_products/controller/controller_page_products.class.php?count_product=" +
    keyword,
    function(data, status) {
      var json = JSON.parse(data);
      var num_products = json.num_products;
      //alert("numero_trademarks: " + num_products);

      if (num_products == 0) {
        $("#results").load(
          "modules/page_products/controller/controller_page_products.class.php?view_error=false"
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
    }).fail(function() {
    $("#results").load(
      "modules/page_products/controller/controller_page_products.class.php?view_error=true"
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
  //$('#sale_price').removeClass("special");

  $('#keyword').val('');
}

$(document).ready(function() {
  ////////////////////////// inici carregar pàgina /////////////////////////

  if (getCookie("search")) {
    var keyword = getCookie("search");
    count_product(keyword);
    //alert("carrega pagina getCookie(search): " + getCookie("search"));
    //("#keyword").val(keyword) if we don't use refresh(), this way we could show the search param
    setCookie("search", "", 1);
  } else {
    search();
  }


  $("#search_prod").submit(function(e) {
    var keyword = document.getElementById('keyword').value;
    var v_keyword = validate_search(keyword);
    if (v_keyword)
      setCookie("search", keyword, 1);
    //  alert("getCookie(search): " + getCookie("search"));
    location.reload(true);


    //si no ponemos la siguiente línea, el navegador nos redirecciona a index.php
    e.preventDefault(); //STOP default action
  });

  $('#Submit').click(function() {
    var keyword = document.getElementById('keyword').value;
    var v_keyword = validate_search(keyword);
    if (v_keyword)
      setCookie("search", keyword, 1);
    //  alert("getCookie(search): " + getCookie("search"));
    location.reload(true);

  });

  $.get(
    "modules/page_products/controller/controller_page_products.class.php?autocomplete=true",
    function(data, status) {
      var json = JSON.parse(data);
      var trademark = json.trademark;
      //alert("numero deproductos" + nom_productos[0].serial_number);
      //console.log(trademark);

      var suggestions = new Array();
      for (var i = 0; i < trademark.length; i++) {
        suggestions.push(trademark[i].trademark);
      }
      //alert(suggestions);
      //console.log(suggestions);

      $("#keyword").autocomplete({
        source: suggestions,
        minLength: 1,
        select: function(event, ui) {
          //alert(ui.item.label);

          var keyword = ui.item.label;
          //console.log("este count es cuan tinc un producte");
          count_product(keyword);
        }
      });
    }).fail(function(xhr) {
    $("#results").load(
      "modules/page_products/controller/controller_page_products.class.php?view_error=false"
    ); //view_error=false
    $('.pagination').html('');
    reset();
  });

});

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
