$(function () {
    $('#form').submit(function (event) {
        event.preventDefault();

        let formData = {
            restaurantName: $('#restaurantName').val(),
            restaurantMeal: $('#restaurantMeal').val(),
            saveRestaurant: true,
        };

        $.post('functions/save-restaurant.php', formData, function (response) {
            // return response;
        }, 'json').done(function (response) {
            // add a status
            let status_1 = new Status("Papa Murphy's Pizza", "Half N Half Medium Original"),
                myDoublyList = new DoublyLinkedList(status_1);

            // set 30 secs duration for status display
            display30Secs = window.onload = setTimeout(function () {
                document.getElementById('statusView').innerHTML = `displayed display30Secs`;
                $("#id").html('id: ' + response.restaurant_id);
                $("#name").html('name: ' + response.restaurant_name);
                $("#meal").html('meal: ' + response.restaurant_meal);
                $("#created").html('created: ' + response.created);
            }, 0);

            // delete 30secs status from database after 30 secs
            remove30Secs = window.onload = setTimeout(function () {
                document.getElementById('statusView').innerHTML = `removed display30Secs`;
                $("#id").html('');
                $("#name").html('');
                $("#meal").html('');
                $("#created").html('');
                $.post('functions/save-restaurant.php', { deleteStatus: true, restaurantId: response.restaurant_id }, function (response) {
                    console.log(response.message);
                }, 'json');
            }, 30000);
        });
    });
});