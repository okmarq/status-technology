class Node {
    constructor(value) {
        this.value = value;
        this.prev = null;
        this.next = null;
    }
}

// a Doubly Linked List has a length, a beginning (= head), an end (= tail)
class DoublyLinkedList___0 {
    constructor() {
        this.length = 0;
        this.head = null;
        this.tail = null;
    }
}

class DoublyLinkedList {
    constructor(value) {
        this.head = {
            value: value,
            next: null,
            prev: null
        };
        this.length = 1;
        this.tail = this.head;
    }

    printList() {
        let array = [];
        let currentList = this.head;
        while (currentList !== null) {
            array.push(currentList.value);
            currentList = currentList.next;
        }

        console.log(array.join(' <--> '));
        return this;
    }

    // Insert node at end of the list
    append(value) {
        let newNode = new Node(value);

        this.tail.next = newNode;
        newNode.prev = this.tail;
        this.tail = newNode;

        this.length++;
        // this.printList();
    }

    // Insert node at the start of the list
    prepend(value) {
        let newNode = new Node(value);

        newNode.next = this.head;
        this.head.prev = newNode;
        this.head = newNode;

        this.length++;
        // this.printList();
    }

    // Insert node at a given index
    insert(index, value) {
        if (!Number.isInteger(index) || index < 0 || index > this.length + 1) {
            console.log(`Invalid index. Current length is ${this.length}.`);
            return this;
        }

        // If index is 0, prepend
        if (index === 0) {
            this.prepend(value);
            return this;
        }

        // If index is equal to this.length, append
        if (index === this.length) {
            this.append(value);
            return this;
        }

        // Reach the node at that index
        let newNode = new Node(value);
        let previousNode = this.head;

        for (let k = 0; k < index - 1; k++) {
            previousNode = previousNode.next;
        }

        let nextNode = previousNode.next;

        newNode.next = nextNode;
        previousNode.next = newNode;
        newNode.prev = previousNode;
        nextNode.prev = newNode;

        this.length++;
        // this.printList();
    }

    // Remove a node
    remove(index) {
        if (!Number.isInteger(index) || index < 0 || index > this.length) {
            console.log(`Invalid index. Current length is ${this.length}.`);
            return this;
        }

        // Remove head
        if (index === 0) {
            this.head = this.head.next;
            this.head.prev = null;

            this.length--;
            // this.printList();
            return this;
        }

        // Remove tail
        if (index === this.length - 1) {
            this.tail = this.tail.prev;
            this.tail.next = null;

            this.length--;
            // this.printList();
            return this;
        }

        // Remove node at an index
        let previousNode = this.head;

        for (let k = 0; k < index - 1; k++) {
            previousNode = previousNode.next;
        }
        let deleteNode = previousNode.next;
        let nextNode = deleteNode.next;

        previousNode.next = nextNode;
        nextNode.prev = previousNode;

        this.length--;
        // this.printList();
        return this;
    }
}

class Status {
    constructor(restaurant_name, restaurant_meal) {
        this.restaurant_name = restaurant_name;
        this.restaurant_meal = restaurant_meal;
    }
}

// add a status
let status_1 = new Status("Papa Murphy's Pizza", "Half N Half Medium Original"),
    status_2 = new Status("Tandoori jumction", "Coconut Shrimp Curry Bowl"),
    status_3 = new Status("Kailash Parbat", "Masiu Ramen Large Bowl"),
    status_4 = new Status("Papa Ichiraku Ochan", "Naruto Ichiraku Ramen Regular"),
    status_5 = new Status("Golden Paris Way Restaurant", "Milk of Poppy Clean Cut Opium");
// console.log(status_1);
// console.log(status_2);
// console.log(status_3);
// console.log(status_4);
// console.log(status_5);

let myDoublyList = new DoublyLinkedList(status_1);

myDoublyList.append(status_2);
// 10 <--> 5
myDoublyList.append(status_3);
// 10 <--> 5 <--> 16

myDoublyList.prepend(status_4);
// 1 <--> 10 <--> 5 <--> 16
myDoublyList.prepend(status_5);
// 1 <--> 10 <--> 5 <--> 16

myDoublyList.insert(2, 99);
// 1 <--> 10 <--> 99 <--> 5 <--> 16
myDoublyList.insert(20, 88);
// Invalid index. Current length is 5.
myDoublyList.insert(5, 80);
// 1 <--> 10 <--> 99 <--> 5 <--> 16 <--> 80
myDoublyList.insert(0, 80);
// 80 <--> 1 <--> 10 <--> 99 <--> 5 <--> 16 <--> 80

myDoublyList.remove(0);
// 1 <--> 10 <--> 99 <--> 5 <--> 16 <--> 80
myDoublyList.remove(5);
// 1 <--> 10 <--> 99 <--> 5 <--> 16
myDoublyList.remove(2);
// 1 <--> 10 <--> 5 <--> 16


// set 48hrs duration for status display
// 48 Hours = 172,800,000 Milliseconds
let statusDisplay;

// display3 = window.onload = setTimeout(function () {
//     document.getElementById('status').innerHTML = `displayed`;
// }, 0);

// remove3 = window.onload = setTimeout(function () {
//     document.getElementById('status').innerHTML = `removed`;
// }, 3000);

display48Hrs = window.onload = setTimeout(function () {
    document.getElementById('status').innerHTML = `displayed display48Hrs`;
}, 0);

remove48Hrs = window.onload = setTimeout(function () {
    document.getElementById('status').innerHTML = `removed display48Hrs`;
}, 172800000);

display30Secs = window.onload = setTimeout(function () {
    document.getElementById('statusView').innerHTML = `displayed display30Secs`;
}, 0);

remove30Secs = window.onload = setTimeout(function () {
    document.getElementById('statusView').innerHTML = `removed display30Secs`;
}, 30000);

// add option to delete status before time elapses

// set 30secs for status view before view closes

let time = new Date(),
    currentHour = time.getHours(),
    currentSec = time.getSeconds(),
    // start time
    start48Hrs = currentHour,
    start30Secs = currentSec,
    // end time
    end48Hrs = 48,
    end30Secs = 30;

// if (start48Hrs < 48) {
//     // keep status displayed
// }
// else {
//     // delete the status
// }

// if (start30Secs < 30) {
//     // keep status in view
// }
// else {
//     // remove the status from view
// }
