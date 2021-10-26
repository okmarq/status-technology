<?php
class Restaurant
{
    private $conn;
    protected $table_name = 'restaurant';

    private $id;
    private $name;
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

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function save(): bool
    {
        $query = "INSERT INTO " . $this->table_name . " SET name = :name";

        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));

        $stmt->bindParam(":name", $this->name);

        if (!$stmt->execute()) {
            $this->showError($stmt);

            return false;
        }
        return true;
    }

    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE name = ? and restaurant_meal = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->restaurant_meal);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->restaurant_owner = $row['restaurant_owner'];
        $this->restaurant_id = $row['restaurant_id'];
        $this->name = $row['name'];
        $this->restaurant_meal = $row['restaurant_meal'];
        $this->created = strtotime($row['created']);

        $data[] = array(
            'restaurant_owner' => $row['restaurant_owner'],
            'restaurant_id' => $row['restaurant_id'],
            'name' => $row['name'],
            'restaurant_meal' => $row['restaurant_meal'],
            'created' => strtotime($row['created']),
        );

        header('Content-Type: application/json');

        return json_encode($data);
    }

    public function readAll()
    {
        $query = "SELECT * FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function deleteStatus($restaurant_id): bool
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE restaurant_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $restaurant_id);

        if (!$stmt->execute()) {
            $this->showError($stmt);
            $data = [];
            $data['message'] = 'Unable to delete status';
            header('Content-Type: application/json');
            return json_encode($data);
        }
        $data = [];
        $data['message'] = 'Status deleted';
        header('Content-Type: application/json');
        return json_encode($data);
    }

    public function __toString()
    {
        $data = [];
        $data['restaurant_owner'] = $this->restaurant_owner;
        $data['restaurant_id'] = $this->restaurant_id;
        $data['name'] = $this->name;
        $data['restaurant_meal'] = $this->restaurant_meal;
        $data['created'] = strtotime($this->created);
        header('Content-Type: application/json');
        return json_encode($data);
    }
}
