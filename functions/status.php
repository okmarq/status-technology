<?php
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

$database = new Database();
$db = $database->getConnection();
$restaurant = new Restaurant($db);

$restaurant->setOwner('no one');
$stmt = $restaurant->readAll();
$num = $stmt->rowCount();
if ($num > 0) {

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $data[] = array(
            'restaurant_owner' => $row['restaurant_owner'],
            'restaurant_id' => $row['restaurant_id'],
            'restaurant_name' => $row['restaurant_name'],
            'restaurant_meal' => $row['restaurant_meal'],
            'created' => strtotime($row['created']),
        );
    }
    header('Content-Type: application/json');
    
    echo json_encode($data);
}
// else {
//     $data[] = array('response' => 'no status', 'status' => 404);
// }


if (isset($_POST['deleteStatus']) && isset($_POST['restaurantId'])) {
    if ($restaurant->deleteStatus($_POST['restaurantId'])) {
        echo "Status deleted";
    } else {
        echo "Unable to delete status";
    }
}
