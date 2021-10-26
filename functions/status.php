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

    public function saveStatus()
    {
        $query = "INSERT INTO " . $this->table_name . " SET status_name = :status_name, status_meal = :status_meal";

        $stmt = $this->conn->prepare($query);

        $this->status_name = htmlspecialchars(strip_tags($this->status_name));
        $this->status_meal = htmlspecialchars(strip_tags($this->status_meal));

        $stmt->bindParam(":status_name", $this->status_name);
        $stmt->bindParam(":status_meal", $this->status_meal);

        if (!$stmt->execute()) {
            $this->showError($stmt);
            return false;
        }
        return true;
    }

    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE status_name = ? and status_meal = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->status_name);
        $stmt->bindParam(2, $this->status_meal);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->status_owner = $row['status_owner'];
        $this->status_id = $row['status_id'];
        $this->status_name = $row['status_name'];
        $this->status_meal = $row['status_meal'];
        $this->created = strtotime($row['created']);

        $data[] = array(
            'status_owner' => $row['status_owner'],
            'status_id' => $row['status_id'],
            'status_name' => $row['status_name'],
            'status_meal' => $row['status_meal'],
            'created' => strtotime($row['created']),
        );

        header('Content-Type: application/json');
        return json_encode($data);
    }

    public function readAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE status_owner = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->status_owner);

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
        $data['status_owner'] = $this->status_owner;
        $data['status_id'] = $this->status_id;
        $data['status_name'] = $this->status_name;
        $data['status_meal'] = $this->status_meal;
        $data['created'] = strtotime($this->created);
        header('Content-Type: application/json');
        return json_encode($data);
    }
}
