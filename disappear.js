class Status {
    constructor(restaurant_name, restaurant_meal) {
        this.restaurant_name = restaurant_name;
        this.restaurant_meal = restaurant_meal;
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
// const newDLL = new DoublyLinkedList();
// console.log(newDLL.push(status_1));
// console.log(newDLL.push(status_2));
// console.log(newDLL.push(status_3));
// console.log(newDLL);
// console.log(newDLL.pop());
// console.log(newDLL);

// console.log(status_1);
// console.log(status_2);
// console.log(status_3);
// console.log(status_4);
// console.log(status_5);


// set 48hrs duration for status display
// 48 Hours = 172,800,000 Milliseconds
// let statusDisplay;

// display3Secs = window.onload = setTimeout(function () {
//     document.getElementById('status').innerHTML = `displayed`;
// }, 0);

// remove3Secs = window.onload = setTimeout(function () {
//     document.getElementById('status').innerHTML = `removed`;
// }, 3000);

// display48Hrs = window.onload = setTimeout(function () {
//     document.getElementById('status').innerHTML = `displayed display48Hrs`;
// }, 0);

// remove48Hrs = window.onload = setTimeout(function () {
//     document.getElementById('status').innerHTML = `removed display48Hrs`;
// }, 172800000);

// display30Secs = window.onload = setTimeout(function () {
//     document.getElementById('statusView').innerHTML = `displayed display30Secs`;
// }, 0);

// remove30Secs = window.onload = setTimeout(function () {
//     document.getElementById('statusView').innerHTML = `removed display30Secs`;
// }, 30000);

// add option to delete status before time elapses

// set 30secs for status view before view closes

// let time = new Date(),
//     currentHour = time.getHours(),
//     currentSec = time.getSeconds(),
//     // start time
//     start48Hrs = currentHour,
//     start30Secs = currentSec,
//     // end time
//     end48Hrs = 48,
//     end30Secs = 30;

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
