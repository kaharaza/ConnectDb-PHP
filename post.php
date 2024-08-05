<?php
require_once './config/db.php';
require_once './config/helper.class.php';
require_once './config/response.class.php';
require_once './genKeyId.php/genID.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $data = $_POST['payload'];
        $insert = "INSERT INTO `Table`(`field1`, `field2`,) 
           VALUES (?,?)";
        $params = array(
            Helper::clean('เอาค่า payload มาใส่ ตามจำนวน field')
        );

        $query = DB::query($insert, $params);
        if (!empty($query)) {
            return Response::success('success', 200);
        }
    } catch (\Throwable $e) {
        throw $e;
    }
} else {
    Response::error('Method Error', 500);
}