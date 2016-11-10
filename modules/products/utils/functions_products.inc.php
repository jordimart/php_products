<?php

/* This function first use filters to all data,after if data is not ok pass string error and value false */
/* Function return array of arrays of result(boleans),error(message),data(results of regular expresion) */

function validate_products($value) {

    $error = array();
    $ok = true;

    $filter = array(
        'serial_number' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9a-zA-Z]{2,20}$/')
        ),
        'date_entry' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d/')
        ),
        'date_exit' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d/')
        ),
        'purchase_price' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[1-9]\d{1,7}(?:\.\d{1,4})?$/')
        ),
        'sale_price' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[1-9]\d{1,7}(?:\.\d{1,4})?$/')
        ),
        'provider' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[a-zA-Z0-9- ]+$/i')
        ),
        'weight' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9]\d{1,4}?$/')
        ),
        'height' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9]\d{1,4}?$/')
        ),
        'width' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9]\d{1,4}?$/')
        ),
        'description' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[a-zA-Z0-9- ]+$/i')
        ),
    );


    $result = filter_var_array($value, $filter);

    //Validaciones extra en php
        //no filter
        $result['category'] = $value['category'];
        $result['trademark'] = $value['trademark'];
        $result['model'] = $value['model'];
        $result['status'] = $value['status'];
        $result['warranty'] = $value['warranty'];

        if ($_POST['category'] === ' ') {
            $error['category'] = "You haven't select pais php";
            $ok = false;
        }

        //Este campo puede estar vacio si se realiza mal la consulta
        if ($_POST['trademark'] === ' ') {
            $error['trademark'] = "You haven't select trademark php";
            $ok = false;
        }

        //Este campo puede estar vacio si se realiza mal la consulta
        if ($_POST['model'] === ' ') {
            $error['model'] = "You haven't select model php";
            $ok = false;
        }

        //error message for date_entry
        if ($result['date_entry']) {
            //validate date entry must be on or before the today
            $dates = ok_entry($result['date_entry']);

            if (!$dates) {
                $error['date_entry'] = 'The date must be on or before the today';
                $ok = false;
            }
        }

        //error message for date_exit
        if (($result['date_exit']) && ($result['date_entry'])) {
            //validate  date exit can not be earlier than the date entry
            $dates = compare_dates($result['date_entry'], $result['date_exit']);
            if (!$dates) {
                $error['date_exit'] = 'The departure date can not be earlier than the date of entry';
                $ok = false;
            }
        }

        if (count($result['warranty']) <= 1) {
            $error['warranty'] = "Select 2 or more.";
            $ok = false;
        }

        if ($result != null && $result) {

                //error message for serial number
                if (!$result['serial_number']) {
                    $error['serial_number'] = 'Serial number must be 2 to 20 characters,no admit special characters php';
                    $ok = false;
                }

              //error message for purchase price
              if (!$result['purchase_price']) {
                  $error['purchase_price'] = 'The price format is wrong,example 000000.0000';
                  $ok = false;
              }
              //error message for purchase price
              if (!$result['sale_price']) {
                  $error['sale_price'] = 'The price format is wrong,example 0000000.0000';
                  $ok = false;
              }
              //error message for provider
              if (!$result['provider']) {
                  $error['provider'] = 'The provider format is wrong,you can not use characters';
                  $ok = false;
              }
              //error message for weight
              if (!$result['weight']) {
                  $error['weight'] = 'The weight format is wrong,you can not use more than 4 digits';
                  $ok = false;
              }
              //error message for height
              if (!$result['height']) {
                  $error['height'] = 'The height format is wrong,you can not use more than 4 digits';
                  $ok = false;
              }
              //error message for width
              if (!$result['width']) {
                  $error['width'] = 'The width format is wrong,you can not use more than 4 digits';
                  $ok = false;
              }
              //error message for textarea
              if (!$result['description']) {
                  $error['description'] = 'The description format is wrong,you can not use characters';
                  $ok = false;
              }
              if (!$result['date_entry']) {
                  if ($result['date_entry'] == "") {
                      $error['date_entry'] = "The field is empty";
                      $ok = false;
                  }
              }

              if (!$result['date_exit']) {
                  if ($result['date_exit'] == "") {
                      $error['date_exit'] = "The field is empty";
                      $ok = false;
                  }
              }

              if (!$result['description']) {
                  if ($result['description'] == "") {
                      $error['description'] = "The field is empty";
                      $ok = false;
                  }
              }
    };
    return $return = array('result' => $ok, 'error' => $error, 'data' => $result);


};

// validate date entry
function ok_entry($date) {

    $date_today = date("d-m-Y");
    if (is_string($date_today)) {
        $date_today = strtotime($date_today);
    }
    if (is_string($date)) {
        $date = strtotime($date);
    }
    if ($date > $date_today) {
        return false;
    }else{
    return true;
  }
}

function compare_dates($date_entry, $date_exit) {

    if (is_string($date_entry)) {
        $date_entry = strtotime($date_entry);
    }
    if (is_string($date_exit)) {
        $date_exit = strtotime($date_exit);
    }
    if ($date_entry > $date_exit) {
        return false;
    }else{
    return true;
  }
}
