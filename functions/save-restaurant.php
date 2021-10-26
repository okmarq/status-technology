<?php
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

$database = new Database();
$db = $database->getConnection();
$restaurant = new Restaurant($db);

if (isset($_POST['save_restaurant']) && isset($_POST['restaurant_name'])) {
    $restaurant->setName($_POST['restaurant_name']);

    if ($restaurant->save()) {
        $response = array('success' => true);

        header('Content-Type: application/json');

        echo json_encode($response);
    } else {
        $response = array('success' => false);

        header('Content-Type: application/json');
        
        echo json_encode($response);
    }
}

if (isset($_POST['delete_restaurant']) && isset($_POST['restaurant_id'])) {
    if ($restaurant->deleteRestaurant($_POST['restaurant_id'])) {
        echo "Restaurant deleted";
    } else {
        echo "Unable to delete restaurant";
    }
}
