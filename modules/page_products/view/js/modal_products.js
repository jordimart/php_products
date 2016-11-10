$(document).ready(function() {
  $('.product_name').click(function() {
    var id = this.getAttribute('id');

    $.get(
        "modules/page_products/controller/controller_page_products.class.php?idProduct=" +
        id,
        function(data, status) {
          var json = JSON.parse(data);
          var product = json.product;

          $('#results').html('');
          $('.pagination').html('');

          var img_product = document.getElementById('img_product');
          img_product.innerHTML = '<img src="' + product.avatar +
            '" class="img-product"> ';

          var trademark = document.getElementById('trademark');
          trademark.innerHTML = product.trademark;
          var model = document.getElementById('model');
          model.innerHTML = "Model: " + product.model;
          var serial_number = document.getElementById('serial_number');
          serial_number.innerHTML = "Serial_number: " + product.serial_number;
          var category = document.getElementById('category');
          category.innerHTML = "Country: " + product.category;
          var desc_product = document.getElementById('description');
          desc_product.innerHTML = "Description: " + product.description;
          var price_product = document.getElementById('price_product');
          price_product.innerHTML = "Precio: " + product.sale_price +
            " €";

        })
      .fail(function(xhr) {
        $("#results").load(
          "modules/page_products/controller/controller_page_products.class.php?view_error=true"
        );
      });
  });
});
