<?php
class productDAO {

    static $_instance;

//constructor vacio
    private function __construct() {

    }
//funcion para instanciar clases
    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_product_DAO($db, $arrArgument) {

        $serial_number = $arrArgument['serial_number'];
        $category = $arrArgument['category'];
        $trademark = $arrArgument['trademark'];
        $model = $arrArgument['model'];
        $date_entry = $arrArgument['date_entry'];
        $date_exit = $arrArgument['date_exit'];
        $purchase_price = $arrArgument['purchase_price'];
        $sale_price = $arrArgument['sale_price'];
        $provider = $arrArgument['provider'];
        $weight = $arrArgument['weight'];
        $height = $arrArgument['height'];
        $width = $arrArgument['width'];
        $description = $arrArgument['description'];
        $status = $arrArgument['status'];
        $warranty = $arrArgument['warranty'];
        $avatar = $arrArgument['avatar'];

        $Any = 0;
        $six_months = 0;
        $one_year = 0;
        $five_years = 0;
        $eight_years = 0;

        foreach ($warranty as $indice) {
            if ($indice === 'Any')
                $Any = 1;
            if ($indice === '6 months')
                $six_months = 1;
            if ($indice === '1 year')
                $one_year = 1;
            if ($indice === '5 years')
                $five_years = 1;
            if ($indice === '8 years')
                $eight_years = 1;
        }

        $sql = "INSERT INTO products(serial_number, category, trademark, model,"
                  . " date_entry, date_exit,purchase_price,sale_price,provider,weight,height,"
                  . " width,description,status,Any,6_months,1_year,5_years,8_years,avatar)"
                  . " VALUES ('$serial_number','$category','$trademark','$model','$date_entry','$date_exit','$purchase_price','$sale_price',"
                  . " '$provider','$weight','$height','$width','$description','$status','$Any','$six_months','$one_year','$five_years','$eight_years','$avatar')";

        return $db->ejecutar($sql);
    }
//Descargamos con curl los datos de la url y devolvemos el contenido
public function obtain_paises_DAO($url) {
            $ch = curl_init();
            $timeout="";
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $file_contents = curl_exec($ch);
            curl_close($ch);

            return ($file_contents) ? $file_contents : FALSE;
        }

//Obtenemos marcas de un xml y devolvemos un array de nombres
    public function obtain_trademarks_DAO() {
            $json = array();
            $tmp = array();

            $trademarks = simplexml_load_file("../resources/trademarks_and_models.xml");
            $result = $trademarks->xpath("/list/trademark/name | /list/trademark/@id");

            for ($i=0; $i<count($result); $i+=2) {
                $e=$i+1;
                $trademark=$result[$e];

                $tmp = array(
                    'id' => (string) $result[$i], 'name' => (string) $trademark
                );

                array_push($json, $tmp);
            }

            return $json;
        }

        public function obtain_models_DAO($arrArgument) {
            $json = array();
            $tmp = array();

            $filter = (string)$arrArgument;
            $xml = simplexml_load_file('../resources/trademarks_and_models.xml');
            $result = $xml->xpath("/list/trademark[@id='$filter']/models");

            for ($i=0; $i<count($result[0]); $i++) {
                $tmp = array(
                    'model' => (string) $result[0]->model[$i]
                );
                array_push($json, $tmp);
            }
            return $json;
        }


}
