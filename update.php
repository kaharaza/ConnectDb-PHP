<?php
require_once './config/db.php';
require_once './config/helper.class.php';
require_once './config/response.class.php';
require_once './genKeyId.php/genID.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $data = $_POST['payload'];
        $insert = "UPDATE `Table` SET `field1` = ':params1', `field2` = ':params2' WHERE id = :paramsid";
        $params = array(
            ':params1' => $data['field1'],
            ':params2' => $data['field2'],
            ':paramsid' => $data['id'],
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