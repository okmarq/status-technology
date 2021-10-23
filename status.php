<?php
class Status
{
    public array $data;
    public string $restaurant_name;
    public string $restaurant_meal;
    public int $restaurant_id;
    public static int $id = 0;

    function __construct($restaurant_name, $restaurant_meal)
    {
        $this->restaurant_id = ++self::$id;
        $this->restaurant_name = $restaurant_name;
        $this->restaurant_meal = $restaurant_meal;
    }

    public function __toString()
    {
        return $this->data;
    }
}

$status_1 = new Status("Papa Murphy's Pizza", "Half N Half Medium Original");

$status_2 = new Status("Tandoori jumction", "Coconut Shrimp Curry Bowl");

$status_3 = new Status("Kailash Parbat", "Masiu Ramen Large Bowl");

$status_4 = new Status("Papa Ichiraku Ochan", "Naruto Ichiraku Ramen Regular");

$status_5 = new Status("Golden Paris Way Restaurant", "Milk of Poppy Clean Cut Opium");

$list = new SplDoublyLinkedList();
$list->push($status_1);
$list->push($status_2);
$list->push($status_3);
$list->push($status_4);
$list->push($status_5);

$data = array();
// Displays all the items in the status
for ($list->rewind(); $list->valid(); $list->next()) {

    $data[] = $list->current();
}
?>