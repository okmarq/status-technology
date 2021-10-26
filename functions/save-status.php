<?php
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

$database = new Database();
$db = $database->getConnection();
$status = new Status($db);

if (isset($_POST['save_status']) && isset($_POST['restaurant_id']) && isset($_POST['status'])) {
    $status->setName($_POST['status']);
    $status->setRestaurantId($_POST['restaurant_id']);

    if ($status->save()) {
        $response = array('success' => true);

        header('Content-Type: application/json');

        echo json_encode($response);
    } else {
        $response = array('success' => false);

        header('Content-Type: application/json');
        
        echo json_encode($response);
    }
}

if (isset($_POST['delete_status']) && isset($_POST['status_id'])) {
    if ($status->deleteStatus($_POST['status_id'])) {
        echo "Status deleted";
    } else {
        echo "Unable to delete status";
    }
}
