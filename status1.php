<?php
class Node
{
    public Status $data;
    public Node $prev;
    public Node $next;

    public function __construct(Status $data)
    {
        $this->status = $data;
        $this->next = null;
    }
}

class LinkedList
{
    private Node $head;
    private Node $tail;
    private int $count;

    public function __construct(Status $status)
    {
        $this->status = $status;
        $this->head = null;
    }

    public function push(Node $head, Status $status): void
    {
        $new_node = new Node();

        $new_node->data = $status;

        $new_node->next = $head;
        $new_node->prev = null;

        if ($head != null) {
            $head->prev = $new_node;
        }
        $head = $new_node;
    }

    public function insertAfter(Node $prev_node, Status $status): void
    {
        if ($prev_node == null) {
            echo "the previous node cannot be NULL";
            return;
        }

        $new_node = new Node();

        $new_node->data = $status;

        $new_node->next = $prev_node->next;

        $prev_node->next = $new_node;

        $new_node->prev = $prev_node;

        if ($new_node->next != null) {
            $new_node->next->prev = $new_node;
        }
    }

    public function append(Node $head, Status $status): void
    {
        $new_node = new Node();

        $last = $head;

        $new_node->data = $status;

        $new_node->next = null;

        if ($head == null) {
            $new_node->prev = null;
            $head = $new_node;
            return;
        }

        while ($last->next != null) {
            $last = $last->next;
        }

        $last->next = $new_node;

        $new_node->prev = $last;

        return;
    }

    public function printList(Node $node)
    {
        echo 'Traversing in the forward direction';
        while ($node != null) {
            echo " " . $node->data . " ";
            $last = $node;
            $node = $node->next;
        }

        echo 'Traversing in the backward direction';
        while ($last != null) {
            echo " " . $last->data . " ";
            $last = $last->prev;
        }
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

// class Status
// {
//     public array $data;
//     public string $restaurant_name;
//     public string $restaurant_meal;
//     public int $restaurant_id;
//     public static int $id = 0;

//     function __construct($restaurant_name, $restaurant_meal)
//     {
//         $this->restaurant_id = ++self::$id;
//         $this->restaurant_name = $restaurant_name;
//         $this->restaurant_meal = $restaurant_meal;
//     }

//     public function __toString()
//     {
//         return $this->data;
//     }
// }

// $status_1 = new Status("Papa Murphy's Pizza", "Half N Half Medium Original");

// $status_2 = new Status("Tandoori jumction", "Coconut Shrimp Curry Bowl");

// $status_3 = new Status("Kailash Parbat", "Masiu Ramen Large Bowl");

// $status_4 = new Status("Papa Ichiraku Ochan", "Naruto Ichiraku Ramen Regular");

// $status_5 = new Status("Golden Paris Way Restaurant", "Milk of Poppy Clean Cut Opium");

// $list = new SplDoublyLinkedList();
// $list->push($status_1);
// $list->push($status_2);
// $list->push($status_3);
// $list->push($status_4);
// $list->push($status_5);

// $data = array();
// // Displays all the items in the status
// for ($list->rewind(); $list->valid(); $list->next()) {

//     $data[] = $list->current();
// }
