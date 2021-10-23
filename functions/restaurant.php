<?php
class Restaurant
{
    private $conn;
    protected $table_name = 'restaurant';

    private $restaurant_id;
    private $restaurant_name;
    private $restaurant_meal;
    private $created;

    function __construct($db)
    {
        $this->conn = $db;
    }

    public function showError($stmt)
    {
        echo "<pre>";
        print_r($stmt->errorInfo());
        echo "</pre>";
    }

    public function setRestaurantName($restaurant_name): void
    {
        $this->restaurant_name = $restaurant_name;
    }

    public function getRestaurantName(): string
    {
        return $this->restaurant_name;
    }

    public function setRestaurantMeal($restaurant_meal): void
    {
        $this->restaurant_meal = $restaurant_meal;
    }

    public function getRestaurantMeal(): string
    {
        return $this->restaurant_meal;
    }

    public function saveRestaurant()
    {
        $query = "INSERT INTO " . $this->table_name . " SET restaurant_name = :restaurant_name, restaurant_meal = :restaurant_meal";

        $stmt = $this->conn->prepare($query);

        $this->restaurant_name = htmlspecialchars(strip_tags($this->restaurant_name));
        $this->restaurant_meal = htmlspecialchars(strip_tags($this->restaurant_meal));

        $stmt->bindParam(":restaurant_name", $this->restaurant_name);
        $stmt->bindParam(":restaurant_meal", $this->restaurant_meal);

        if (!$stmt->execute()) {
            $this->showError($stmt);
            return false;
        }
        return true;
    }

    public function readAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE restaurant_name = ? and restaurant_meal = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->restaurant_name);
        $stmt->bindParam(2, $this->restaurant_meal);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->restaurant_id = $row['restaurant_id'];
        $this->restaurant_name = $row['restaurant_name'];
        $this->restaurant_meal = $row['restaurant_meal'];
        $this->created = $row['created'];
    }

    public function __toString()
    {
        $data = [];
        $data['restaurant_id'] = $this->restaurant_id;
        $data['restaurant_name'] = $this->restaurant_name;
        $data['restaurant_meal'] = $this->restaurant_meal;
        $data['created'] = strtotime($this->created);
        header('Content-Type: application/json');
        return json_encode($data);
    }
}
