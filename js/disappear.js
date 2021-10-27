class Status {
    constructor(id, restaurant_id, status, created) {
        this.id = id;
        this.restaurant_id = restaurant_id;
        this.status = status;
        this.created = created;
    }
}

// add a status
// let status_1 = new Status("Papa Murphy's Pizza", "Half N Half Medium Original"),
//     status_2 = new Status("Tandoori jumction", "Coconut Shrimp Curry Bowl"),
//     status_3 = new Status("Kailash Parbat", "Masiu Ramen Large Bowl"),
//     status_4 = new Status("Papa Ichiraku Ochan", "Naruto Ichiraku Ramen Regular"),
//     status_5 = new Status("Golden Paris Way Restaurant", "Milk of Poppy Clean Cut Opium");

class Node {
    constructor(value) {
        this.value = value;
        this.prev = null;
        this.next = null;
    }
}

class DoublyLinkedList {
    constructor() {
        this.length = 0;
        this.head = null;
        this.tail = null;
    }

    // get a specific node
    get(index) {
        if (!this.length || index < 0 || index >= this.length) {
            return null;
        } else {
            let currentNode;

            if (index < this.length / 2) {
                let counter = 0;
                currentNode = this.head;

                while (counter < index) {
                    currentNode = currentNode.next;
                    counter += 1;
                }
            } else {
                let counter = this.length - 1;
                currentNode = this.tail;

                while (counter > index) {
                    currentNode = currentNode.prev;
                    counter -= 1;
                }
            }
            return currentNode;
        }
    }

    // add a node to the end
    push(value) {
        const newNode = new Node(value);

        if (!this.length) {
            this.head = newNode;
            this.tail = newNode;
        } else {
            this.tail.next = newNode;
            newNode.prev = this.tail;
            this.tail = newNode;
        }
        this.length += 1;
        return newNode;
    }

    // remove a node from the end
    pop() {
        if (!this.length) {
            return null;
        } else {
            const nodeToRemove = this.tail;

            if (this.length === 1) {
                this.head = null;
                this.tail = null;
            } else {
                this.tail = this.tail.prev;
                this.tail.next = null;
                nodeToRemove.prev = null;
            }
            this.length -= 1;
            return nodeToRemove;
        }
    }

    // add a node to the beginning
    unshift(value) {
        const newNode = new Node(value);

        if (!this.length) {
            this.head = newNode;
            this.tail = newNode;
        } else {
            newNode.next = this.head;
            this.head.prev = newNode;
            this.head = newNode;
        }

        this.length += 1;

        return newNode;
    }

    // remove a node from the beginning
    shift() {
        if (!this.length) {
            return null;
        }

        const nodeToRemove = this.head;

        if (this.length === 1) {
            this.head = null;
            this.tail = null;
        } else {
            this.head = nodeToRemove.next;
            this.head.prev = null;
            nodeToRemove.next = null;
        }

        this.length -= 1;

        return nodeToRemove;
    }

    remove(index) {
        if (!this.length || index < 0 || index >= this.length) {
            return null;
        } else if (index === 0) {
            return this.shift();
        } else if (index === this.length - 1) {
            return this.pop();
        } else {
            const nodeToRemove = this.get(index);
            const prevNodeToRemove = nodeToRemove.prev;
            const nextNodeToRemove = nodeToRemove.next;

            nodeToRemove.prev = null;
            nodeToRemove.next = null;

            prevNodeToRemove.next = nextNodeToRemove;
            nextNodeToRemove.prev = prevNodeToRemove;

            this.length -= 1;

            return nodeToRemove;
        }
    }

    // printList() {
    //     let array = [];
    //     let currentList = this.head;
    //     while (currentList !== null) {
    //         array.push(currentList.value);
    //         currentList = currentList.next;
    //     }

    //     console.log(array.join(' <--> '));
    //     return this;
    // }
}