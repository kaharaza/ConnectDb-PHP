<?php 
require_once './config/db.php';
require_once './config/helper.class.php';
require_once './config/response.class.php';


if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    try {
      parse_str(file_get_contents("php://input"), $deleteData);
      if (isset($deleteData['memberID'])) {
        $numId = $deleteData['memberID'];

        $delete = "DELETE FROM 'table' WHERE id = :id ";
        $params = array(':id' => $numId);
        $$query = DB::query($delete, $params);

        if (!empty($query)) {
            Response::success("Deleted member with ID: $numId", 200);
        } else {
            Response::error('Failed to delete member', 400);
        }
    } else {
        Response::error('Missing memberID', 400);
    }
    } catch (\Throwable $th) {
        throw $e;
    }
} else {
    Response::error('Method Error', 500);
}