
$(document).ready(function () {
    $('.product_name').click(function () {
        var id = this.getAttribute('id');
        console.log(id);
        $.post("../../products/id_product/", {'idProduct': id}, function (data, status) {

            var json = JSON.parse(data);
            var product = json.product;

            $('#results').html('');
            $('.pagination').html('');

            var img_product = document.getElementById('img_product');
            img_product.innerHTML = '<img src="../../' + product.foto +
                    '" class="img-product"> ';

            var provincia = document.getElementById('provincia');
            provincia.innerHTML = product.provincia;
            var nombre = document.getElementById('nombre');
            nombre.innerHTML = "Nombre: " + product.nombre;
            var sprecio_menu = document.getElementById('precio_menu');
            precio_menu.innerHTML = "Menu del día: " + product.precio_menu+" € ";
            var precio_menu_almuerzo = document.getElementById('precio_menu_almuerzo');
           precio_menu_almuerzo.innerHTML = "Almuerzo popular: " + product.precio_menu_almuerzo+" € ";
            var precio_menu_noche = document.getElementById('precio_menu_noche');
            precio_menu_noche.innerHTML = "Menu cena: " + product.precio_menu_noche+" € ";
            var valoracion = document.getElementById('valoracion');
            valoracion.innerHTML = "Valoracion: " + product.valoracion +
                    " estrellas";

        })
                .fail(function (xhr) {
                    $("#results").load(
                            "../../products/view_error_true/", {'view_error': true}
                    );
                });
    });
});
