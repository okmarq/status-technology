<?php
class Status
{
    public array $data;
    public string $restaurant_name;
    public string $restaurant_meal;

    function __construct($restaurant_name, $restaurant_meal)
    {
        $this->restaurant_name = $restaurant_name;
        $this->restaurant_meal = $restaurant_meal;
        $this->data = [
            $this->restaurant_name, $this->restaurant_meal
        ];
    }

    public function __toString()
    {
        return $this->data;
    }
}

class Node
{
    public Status $data;
    public Node $prev;
    public Node $next;
}

class DoublyLinkedList
{
    public function push(Node $head, Status $status): void
    {
        // allocate node
        $new_node = new Node();

        // input data
        $new_node->data = $status;

        // Make next of new node as head and previous as NULL
        $new_node->next = $head;
        $new_node->prev = null;

        // change prev of head node to new node
        if ($head != null) {
            $head->prev = $new_node;
        }
        // move the head to point to the new node
        $head = $new_node;
    }

    public function insertAfter(Node $prev, Status $status): void
    {
        // check if the given prev_node is NULL
        if ($prev == null) {
            echo "the previous node cannot be NULL";
            return;
        }

        // allocate node
        $new_node = new Node();

        // input data
        $new_node->data = $status;

        // Make next of new node as next of prev_node
        $new_node->next = $prev->next;

        // Make the next of prev_node as new_node
        $prev->next = $new_node;

        // Make prev_node as previous of new_node
        $new_node->prev = $prev;

        // Change previous of new_node's next node
        if ($new_node->next != null) {
            $new_node->next->prev = $new_node;
        }
    }

    public function append(Node $head, Status $status): void
    {
        // allocate node
        $new_node = new Node();

        $last = $head;

        // put in data
        $new_node->data = $status;

        // This new node is going to be the last node, so make next of it as NULL
        $new_node->next = null;

        // If the Linked List is empty, then make the new node as head
        if ($head == null) {
            $new_node->prev = null;
            $head = $new_node;
            return;
        }

        // Else traverse till the last node
        while ($last->next != null) {
            $last = $last->next;
        }

        // Change the next of last node
        $last->next = $new_node;

        // Make last node as previous of new node
        $new_node->prev = $last;

        return;
    }

    // insertion
    // deletion
    // insertLast
    // deleteLast
    // insertAfter
    // delete
    // displayForward
    // displayBackward
}

class Disappear
{
    public Status $status;
    public int $time_limit;
    public array $new_status;
    public array $viewed_status;
    public array $whole_status;

    function __construct(Status $status)
    {
        $this->status = $status;
    }

    public function createStatus()
    {
        # code...
    }
    public function deleteStatus()
    {
        # code...
    }
    public function getSingleStatus()
    {
        # code...
    }
    public function getAllStatus()
    {
        # code...
    }
    public function __toString()
    {
        return $this->status;
    }
}

$status = new Status("Papa Murphy's Pizza", "Half N Half Medium Original");
print_r($status);

echo '<br>';
echo '<br>';

$post = new Disappear($status);
print_r($post);
