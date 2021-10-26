<?php
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

$database = new Database();
$db = $database->getConnection();
$restaurant = new Restaurant($db);

if (isset($_POST['save_restaurant']) && isset($_POST['restaurant_name'])) {
    $restaurant->setName($_POST['restaurantName']);

    if ($restaurant->save()) {
        $response[] = array('success' => true);

        header('Content-Type: application/json');

        return json_encode($response);

        return $response;
    } else {
        $response[] = array('success' => false);

        header('Content-Type: application/json');
        
        return json_encode($response);

        return $response;
    }
}

if (isset($_POST['deleteStatus']) && isset($_POST['restaurantId'])) {
    if ($restaurant->deleteStatus($_POST['restaurantId'])) {
        echo "Status deleted";
    } else {
        echo "Unable to delete status";
    }
}
