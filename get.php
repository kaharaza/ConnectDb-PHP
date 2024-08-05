<?php 
require_once './config/db.php';
require_once './config/helper.class.php';
require_once './config/response.class.php';


// GET ทั้งหมด
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $select = "SELECT * FROM 'Table' ORDER BY id ASC LIMIT 10";
        $query = DB::query($select);
    if (!empty($query)) {
        return Response::success($query, 200);
    } else {
        throw Response::error('Not found', 404);
    }
    } catch (\Throwable $e) {
        throw $e;
    }
} else {
    Response::error('Method Error', 500);
}

// GET เฉพาะไอดี
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $data = $_GET['payload_id']; 
        $select = "SELECT * FROM 'Table' WHERE id = :id";
        $params = array(':id' => $data['id']);
        $query = DB::query($select, $params);

    if (!empty($query)) {
        return Response::success($query, 200);
    } else {
        throw Response::error('Not found', 404);
    }
    } catch (\Throwable $e) {
        throw $e;
    }
} else {
    Response::error('Method Error', 500);
}

?>