<?php
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

$database = new Database();
$db = $database->getConnection();
$restaurant = new Restaurant($db);

if (isset($_POST['saveRestaurant']) && isset($_POST['restaurantName']) && isset($_POST['restaurantMeal'])) {
    $restaurant->setRestaurantName($_POST['restaurantName']);
    $restaurant->setRestaurantMeal($_POST['restaurantMeal']);

    if ($restaurant->saveRestaurant()) {
        $restaurant->readAll();
        echo $restaurant;
    } else {
        echo "Something went wrong saving your restaurant details in the database";
    }
}
