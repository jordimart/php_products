
<?php

			 $host = "127.0.0.1";
    		$user = "jordimart";
    		$pass = "";
    		$db = "shop";
    		$port = 3306;
    		$tabla="products";

    		$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());


			$sql = "INSERT INTO products(serial_number, category, trademark, model,"
                . " date_entry, date_exit,purchase_price,sale_price,provider,weight,height,width,description,status,Any,6_months,1_year,5_years,8_years,avatar) VALUES ('NT6000A885452','Photovoltaic','Sunways','NT6000','05-10-2016','06-10-2016',1000,1500,'Soleos',20,30,40,'description','status',0,0,1,1,0,'/media/default-avatar.png')";
			$res = mysqli_query($conexion, $sql);
			print_r($res);


			mysqli_close($conexion);
			
