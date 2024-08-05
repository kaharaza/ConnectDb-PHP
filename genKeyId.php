<?php
require_once './config/db.php';
require_once './config/helper.class.php';
require_once './config/response.class.php';

function checkColumn($id, $field) {
    try {
        $check = "SELECT COUNT(*) FROM Table_name WHERE $field = :id";
        $params = array('id' => $id);
        $query = DB::query($check, $params);
        return $query[0]['COUNT(*)'] > 0;
    } catch (\Throwable $e) {
        throw $e;
    }
}

//Generate random string
function generateRandomString($length = 10)
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Generate Pre_ID
function generateBoasID($gennumIdLength = 3)
{
    do {
        $numberid = 'Pre' . generateRandomString($gennumIdLength) . 'N';
    } while (checkColumn($numberid, 'ใช่ชื่อ fielde ที่ต้องการเช็ค'));

    return $numberid;
}


?>
