<?php
class page_products_dao {

    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    //selecciona todos los producto de la db
    public function list_products_DAO($db) {
        $sql = "SELECT * FROM products";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }
    //Consulta losdatos de un producto según un id pasado previamente
    public function details_products_DAO($db,$id) {
        $sql = "SELECT * FROM products WHERE serial_number LIKE '".$id."'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }
    //Pagina los productos segun la posición en la página y los productos por página
    public function page_products_DAO($db,$arrArgument) {
        $position = $arrArgument['position'];
        $item_per_page = $arrArgument['item_per_page'];
        $sql = "SELECT * FROM products ORDER BY serial_number ASC LIMIT ".$position." , ".$item_per_page;
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }
    //consulta el número de productos
    public function total_products_DAO($db) {
        $sql = "SELECT COUNT(*) as total FROM products";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }
    //ordena los productos por la letra o palabra que insertemos en search
    public function select_column_products_DAO($db, $arrArgument) {
        $sql = "SELECT " . $arrArgument . " FROM products ORDER BY " . $arrArgument;
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
    //escoge los productos que contengan las letras del argumento
    public function select_like_products_DAO($db, $arrArgument) {
        $sql = "SELECT DISTINCT * FROM products WHERE " . $arrArgument['column'] . " like '%" . $arrArgument['like'] . "%'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
    //cuenta los productos con las letras indicadas
     public function count_like_products_DAO($db, $arrArgument) {
        $sql = "SELECT COUNT(*) as total FROM products WHERE " . $arrArgument['column'] . " like '%" . $arrArgument['like'] . "%'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
    //ordena los productos
    public function select_like_limit_products_DAO($db, $arrArgument) {
        $sql="SELECT DISTINCT * FROM products WHERE ".$arrArgument['column']." like '%". $arrArgument['like']. "%' ORDER BY serial_number ASC LIMIT ". $arrArgument['position']." , ". $arrArgument['limit'];
        $stmt=$db->ejecutar($sql);
        return $db->listar($stmt);
    }


}
