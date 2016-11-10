function load_product_ajax() {
  $.ajax({
      type: 'GET',
      url: "modules/products/controller/controller_products.class.php?load=true",
      // dataType: 'json',
      async: false
    })
    .done(function(data) {
      console.log(data);
      var json = JSON.parse(data);

      paint_product(json);

    })
    .fail(function(xhr) {

    });
}

$(document)
  .ready(function() {
    load_product_ajax();

  });

function paint_product(json) {

  var content = document.getElementById("content");
  var div_product = document.createElement("div");
  var parrafo = document.createElement("p");

  var msje = document.createElement("div");
  msje.innerHTML = "msje = ";
  msje.innerHTML += json.msje;

  var serial_number = document.createElement("div");
  serial_number.innerHTML = "serial_number = ";
  serial_number.innerHTML += json.product.serial_number;
  var category = document.createElement("div");
  category.innerHTML = "country = ";
  category.innerHTML += json.product.category;
  var trademark = document.createElement("div");
  trademark.innerHTML = "trademark = ";
  trademark.innerHTML += json.product.trademark;
  var model = document.createElement("div");
  model.innerHTML = "model = ";
  model.innerHTML += json.product.model;
  var date_entry = document.createElement("div");
  date_entry.innerHTML = "date_entry = ";
  date_entry.innerHTML += json.product.date_entry;
  var date_exit = document.createElement("div");
  date_exit.innerHTML = "date_exit = ";
  date_exit.innerHTML += json.product.date_exit;
  var purchase_price = document.createElement("div");
  purchase_price.innerHTML = "purchase_price = ";
  purchase_price.innerHTML += json.product.purchase_price;
  var sale_price = document.createElement("div");
  sale_price.innerHTML = "sale_price = ";
  sale_price.innerHTML += json.product.sale_price;
  var provider = document.createElement("div");
  provider.innerHTML = "provider = ";
  provider.innerHTML += json.product.provider;
  var weight = document.createElement("div");
  weight.innerHTML = "weight = ";
  weight.innerHTML += json.product.weight;
  var height = document.createElement("div");
  height.innerHTML = "height = ";
  height.innerHTML += json.product.height;
  var width = document.createElement("div");
  width.innerHTML = "width = ";
  width.innerHTML += json.product.width;
  var description = document.createElement("div");
  description.innerHTML = "description = ";
  description.innerHTML += json.product.description;
  var status = document.createElement("div");
  status.innerHTML = "status = ";
  status.innerHTML += json.product.status;
  var warranty = document.createElement("div");
  warranty.innerHTML = "warranty = ";
  warranty.innerHTML += json.product.warranty;

  var cad = json.product.avatar;
  var img = document.createElement("div");
  var html = '<img src="' + cad + '" height="75" width="75"> ';
  img.innerHTML = html;

  div_product.appendChild(parrafo);
  parrafo.appendChild(msje);
  parrafo.appendChild(serial_number);
  parrafo.appendChild(category);
  parrafo.appendChild(trademark);
  parrafo.appendChild(model);
  parrafo.appendChild(date_entry);
  parrafo.appendChild(date_exit);
  parrafo.appendChild(purchase_price);
  parrafo.appendChild(sale_price);
  parrafo.appendChild(provider);
  parrafo.appendChild(weight);
  parrafo.appendChild(height);
  parrafo.appendChild(width);
  parrafo.appendChild(description);
  parrafo.appendChild(status);
  parrafo.appendChild(warranty);

  content.appendChild(div_product);
  content.appendChild(img);
}
