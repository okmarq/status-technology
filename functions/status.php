<?php
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

$database = new Database();
$db = $database->getConnection();
$restaurant = new Restaurant($db);

$restaurant->setOwner('no one');
$restaurant->readAll();

if (isset($_POST['deleteStatus']) && isset($_POST['restaurantId'])) {
    if ($restaurant->deleteStatus($_POST['restaurantId'])) {
        echo "Status deleted";
    } else {
        echo "Unable to delete status";
    }
}
