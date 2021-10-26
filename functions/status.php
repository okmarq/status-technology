<?php
class Status
{
    private $conn;
    protected $table_name = 'status';

    private $id;
    private $status;
    private $restaurant_id;
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

    public function setName($status): void
    {
        $this->status = $status;
    }

    public function setRestaurantId($restaurant_id): void
    {
        $this->restaurant_id = $restaurant_id;
    }

    public function save(): bool
    {
        $query = "INSERT INTO " . $this->table_name . " SET status = :status, restaurant_id = :restaurant_id";

        $stmt = $this->conn->prepare($query);

        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->restaurant_id = htmlspecialchars(strip_tags($this->restaurant_id));

        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":restaurant_id", $this->restaurant_id);

        if (!$stmt->execute()) {
            $this->showError($stmt);
            return false;
        }
        return true;
    }

    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE status = ? and restaurant_id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->status);
        $stmt->bindParam(2, $this->restaurant_id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
        $this->status = $row['status'];
        $this->restaurant_id = $row['restaurant_id'];
        $this->created = strtotime($row['created']);

        $data = array(
            'id' => $row['id'],
            'status' => $row['status'],
            'restaurant_id' => $row['restaurant_id'],
            'created' => strtotime($row['created']),
        );

        header('Content-Type: application/json');
        return json_encode($data);
    }

    public function readAllStatusById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE restaurant_id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $id);

        $stmt->execute();

        return $stmt;
    }

    public function deleteStatus($status_id): bool
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE status_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $status_id);

        if (!$stmt->execute()) {
            $this->showError($stmt);
            $data = array('message' => 'Unable to delete status');
            header('Content-Type: application/json');
            return json_encode($data);
        }
        $data = array('message' => 'Status deleted');
        header('Content-Type: application/json');
        return json_encode($data);
    }
}
