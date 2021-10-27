<?php
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

$database = new Database();
$db = $database->getConnection();
$restaurant = new Restaurant($db);
$status = new Status($db);

$stmt = $restaurant->readAll();
$num = $stmt->rowCount();

$data = array();

if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $stmt_2 = $status->readAllStatusById($id);
        $num_2 = $stmt_2->rowCount();

        if ($num_2 > 0) {
            while ($status_row = $stmt_2->fetch(PDO::FETCH_ASSOC)) {
                $data[] = array(
                    'status' => $status_row['status'],
                    'id' => $status_row['id'],
                    'restaurant_id' => $status_row['restaurant_id'],
                    'created' => strtotime($status_row['created']),
                );
            }
        }
    }
}

header('Content-Type: application/json');
echo json_encode($data);
